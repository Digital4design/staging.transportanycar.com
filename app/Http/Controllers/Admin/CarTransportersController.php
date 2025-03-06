<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\EventParticipant;
use App\Http\Controllers\WebController;
use App\User;
use App\UserDocuments;
use App\UserFreind;
use App\UserQuote;
use App\Feedback;
use App\UserReferral;
use App\Services\EmailService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class CarTransportersController extends WebController
{
    public $user_obj;
    protected $emailService;
    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
        $this->user_obj = new User();
    }
    public function index()
    {
        return view('admin.carTransporter.index', [
            'title' => 'Car Transporters',
            'breadcrumb' => breadcrumb([
                'Car Transporters' => route('admin.carTransporter.index'),
            ]),
        ]);
    }

    public function listing()
    {
        $datatable_filter = datatable_filters();
        $offset = $datatable_filter['offset'];
        $search = $datatable_filter['search'];
        $return_data = array(
            'data' => [],
            'recordsTotal' => 0,
            'recordsFiltered' => 0
        );
        $main = User::where('type', 'car_transporter');
        $return_data['recordsTotal'] = $main->count();
        if (!empty($search)) {
            $main->where(function ($query) use ($search) {
                $query->AdminSearch($search);
            });
        }
        $return_data['recordsFiltered'] = $main->count();
        $all_data = $main->orderBy($datatable_filter['sort'], $datatable_filter['order'])
            ->offset($offset)
            ->limit($datatable_filter['limit'])
            ->get();
        //dd($all_data);
        if (!empty($all_data)) {
            foreach ($all_data as $key => $value) {
                $param = [
                    'id' => $value->id,
                    'url' => [
                        'status' => route('admin.carTransporter.status_update', $value->id),
                        'edit' => route('admin.carTransporter.edit', $value->id),
                        'delete' => route('admin.carTransporter.destroy', $value->id),
                        //'view' => route('admin.carTransporter.show', $value->id),
                    ],
                    'checked' => ($value->status == 'active') ? 'checked' : ''
                ];
                $return_data['data'][] = array(
                    'id' => $offset + $key + 1,
                    'profile_image' => get_fancy_box_html($value['profile_image']),
                    'name' => $value->name,
                    'email' => $value->email,
                    'mobile_number' => $value->country_code . ' ' . $value->mobile,
                    'type' => get_label(strtoupper($value->type)),
                    'status' => $this->generate_switch($param),
                    'action' => $this->generate_actions_buttons($param),
                );
            }
        }
        return $return_data;
    }


    public function destroy($id)
    {
        $data = User::where('id', $id)->first();
        // return $data;
        if ($data) {
            $data->delete();
            success_session('Car Transporter Deleted successfully');
        } else {
            error_session('Car Transporter not found');
        }
        return redirect()->route('admin.carTransporter.index');
    }

    public function status_update($id = 0)
    {
        $data = ['status' => 0, 'message' => 'Car Transporter Not Found'];
        $find = User::find($id);
        if ($find) {
            $find->update(['status' => ($find->status == "inactive") ? "active" : "inactive"]);
            $data['status'] = 1;
            $data['message'] = 'Car Transporter status updated';
        }
        return $data;
    }
    public function t_status()
    {
        $user_id = $_POST['user_id'];
        $status = $_POST['status'];
        if ($status == 'approved') {
            $status = 'approved';
        } else {
            $status = 'rejected';
        }
        $find = User::find($user_id);
        if ($find) {
            $email_to = $find->email;
            if ($status == 'approved') {
                $find->update(['is_status' => $status]);
            } else {
                $find->update(['is_status' => $status, 'driver_license' => null, 'goods_in_transit_insurance' => null]);
            }

            $response['result'] = true;
            if ($status == 'approved') {
                $response['tStatus'] = 'approved';
                try {
                    $htmlContent = view('mail.General.document-accept')->render();
                    $this->emailService->sendEmail($email_to, $htmlContent, 'Good news, your account has been approved');
                } catch (\Exception $ex) {
                    Log::error('Error sending email: ' . $ex->getMessage());
                }
            } else {
                $response['tStatus'] = 'rejected';
                try {
                    $htmlContent = view('mail.General.document-reject')->render();
                    $this->emailService->sendEmail($email_to, $htmlContent, 'Application Status');
                } catch (\Exception $ex) {
                    Log::error('Error sending email: ' . $ex->getMessage());
                }
            }
        } else {
            $response['result'] = false;
            $response['tStatus'] = 'Erro in updating..';
        }
        return $response;
    }

    public function show($id)
    {
        $data = User::where(['type' => 'car_transporter', 'id' => $id])->first();

        if ($data) {
            return view('admin.carTransporter.view', [
                'title' => 'View Car Transporter',
                'data' => $data,
                'breadcrumb' => breadcrumb([
                    'Car Transporters' => route('admin.carTransporter.index'),
                    'view' => route('admin.carTransporter.show', $id)
                ]),
            ]);
        }
        error_session('car transporter not found');
        return redirect()->route('admin.carTransporter.index');
    }

    public function create()
    {
        $title = "Create Car Transporter";
        return view('admin.carTransporter.create', [
            'title' => $title,
            'breadcrumb' => breadcrumb([
                'Users' => route('admin.carTransporter.index'),
                'create' => route('admin.carTransporter.create')
            ]),
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'country_code' => ['required'],
            'mobile' => ['required', Rule::unique('users', 'mobile')->where('country_code', $request->country_code)->whereNull('deleted_at')],
            'email' => ['required', 'email', Rule::unique('users')->whereNull('deleted_at')],
            'profile_image' => ['file', 'image'],
        ]);
        $request_data = $request->all();
        unset($request_data['documents']);
        unset($request_data['cpassword']);
        if ($request->hasFile('profile_image')) {
            $request_data['profile_image'] = upload_file('profile_image', 'user_profile_image');
        }
        $user = $this->user_obj->saveUser($request_data);
        if (isset($user) && !empty($user)) {
            success_session('user created successfully');
        } else {
            error_session('user not created.');
        }


        return redirect()->route('admin.carTransporter.index');
    }
    public function edit($id)
    {
        $data = User::find($id);
        if ($data) {
            $title = "Update Car Transporter";
            return view('admin.carTransporter.create', [
                'title' => $title,
                'data' => $data,
                'breadcrumb' => breadcrumb([
                    'Custtomers' => route('admin.carTransporter.index'),
                    'edit' => route('admin.carTransporter.edit', $data->id)
                ]),
            ]);
        }
        error_session('Car Transporter not found');
        return redirect()->route('admin.carTransporter.index');
    }

    public function update(Request $request, $id)
    {
        $data = User::find($id);
        if ($data) {
            $request->validate([
                'name' => ['required'],
                'country_code' => ['required'],
                'mobile' => ['required', Rule::unique('users', 'mobile')->ignore($id)->where('country_code', $request->country_code)->whereNull('deleted_at')],
                'email' => ['required', 'email', Rule::unique('users')->ignore($id)->whereNull('deleted_at')],
                'profile_image' => ['file', 'image'],
            ]);

            $request_data = $request->all();
            unset($request_data['documents']);
            $profile_image = $data->getRawOriginal('profile_image');
            if ($request->hasFile('profile_image')) {
                $up = upload_file('profile_image', 'user_profile_image');
                if ($up) {
                    un_link_file($profile_image);
                    $profile_image = $up;
                }
            }
            $request_data['profile_image'] = $profile_image;
            $user = $this->user_obj->saveUser($request_data, $id, $data);
            if (isset($user) && !empty($user)) {
                success_session('car transporter updated successfully');
            } else {
                error_session('car transporter not updated');
            }
        } else {
            error_session('car transporter not found');
        }
        return redirect()->route('admin.carTransporter.index');
    }

    public function events_list($id)
    {
        // dd($id);
        $datatable_filter = datatable_filters();
        $offset = $datatable_filter['offset'];
        $search = $datatable_filter['search'];
        $return_data = array(
            'data' => [],
            'recordsTotal' => 0,
            'recordsFiltered' => 0
        );
        $main = UserQuote::where('user_id', $id)->where('status', 'pending');
        $return_data['recordsTotal'] = $main->count();
        if (!empty($search)) {
            $main->whereHas('event', function ($query) use ($search) {
                $query->AdminSearch($search);
            });
        }
        $return_data['recordsFiltered'] = $main->count();
        $all_data = $main->orderBy($datatable_filter['sort'], $datatable_filter['order'])
            ->offset($offset)
            ->limit($datatable_filter['limit'])
            ->get();
        //dd($all_data);
        if (!empty($all_data)) {
            foreach ($all_data as $key => $eventParticipant) {
                $value = $eventParticipant->event;
                $param = [
                    'id' => $value->id,
                    'url' => [
                        // 'status' => route('admin.events.status_update', $value->id),
                        //'edit' => route('admin.carTransporter.edit', $value->id),
                        // 'delete' => route('admin.events.destroy', $value->id),
                        // 'view' => route('admin.events.show', $value->id),
                    ],
                    'checked' => ($value->status == 'active') ? 'checked' : ''
                ];
                $return_data['data'][] = array(
                    'id' => $offset + $key + 1,
                    'pickup_postcode' => $value->pickup_postcode,
                    'drop_postcode' => $value->drop_postcode,
                    'vehicle_details' => $value->vehicle_details,
                    // 'status' => $this->generate_switch($param),
                    // 'action' => $this->generate_actions_buttons($param),
                );
            }
        }
        return $return_data;
    }
    public function freinds_list($id)
    {
        // dd($id);
        $datatable_filter = datatable_filters();
        $offset = $datatable_filter['offset'];
        $search = $datatable_filter['search'];
        $return_data = array(
            'data' => [],
            'recordsTotal' => 0,
            'recordsFiltered' => 0
        );
        $main = UserFreind::with(['user_sender', 'user_recivever'])->where(['sender_id' => $id, 'status' => 'accepted'])
            ->orWhere(function ($query) use ($id) {
                $query->where(['receiver_id' => $id, 'status' => 'accepted']);
            });
        $return_data['recordsTotal'] = $main->count();
        if (!empty($search)) {
            $main->whereHas('event', function ($query) use ($search) {
                $query->AdminSearch($search);
            });
        }
        $return_data['recordsFiltered'] = $main->count();
        $all_data = $main->orderBy($datatable_filter['sort'], $datatable_filter['order'])
            ->offset($offset)
            ->limit($datatable_filter['limit'])
            ->get();
        //dd($all_data);
        if (!empty($all_data)) {
            foreach ($all_data as $key => $freinds) {
                if ($freinds->sender_id == $id) {
                    $value = $freinds->user_recivever;
                } else {
                    $value = $freinds->user_sender;
                }
                //$value=$freinds->event;
                // $param = [
                //     'id' => $value->id,
                //     'url' => [
                //         'status' => route('admin.events.status_update', $value->id),
                //         //'edit' => route('admin.carTransporter.edit', $value->id),
                //         'delete' => route('admin.events.destroy', $value->id),
                //         'view' => route('admin.events.show', $value->id),
                //     ],
                //     'checked' => ($value->status == 'active') ? 'checked' : ''
                // ];
                //dd($value['name']);
                $return_data['data'][] = array(
                    'id' => $offset + $key + 1,
                    'profile_image' => get_fancy_box_html($value['profile_image'] ?? ''),
                    'name' => $value['name'] ?? '',
                    'email' => $value['email'] ?? '',
                );
            }
        }
        //dd($return_data);
        return $return_data;
    }

    public function pendingView()
    {
        return view('admin.carTransporter.pending_view', [
            'title' => 'Pending Transporters',
            'breadcrumb' => breadcrumb([
                'Car Transporters' => route('admin.carTransporter.index'),
            ]),
        ]);
    }

    // public function  pendingListing(Request $request){

    //     $datatable_filter = datatable_filters();
    //     $offset = $datatable_filter['offset'];
    //     $search = $datatable_filter['search'];
    //     $return_data = array(
    //         'data' => [],
    //         'recordsTotal' => 0,
    //         'recordsFiltered' => 0
    //     );
    //     $main = User::where('type', 'car_transporter')
    //     ->whereNotIn('is_status', ['approved'])
    //     ->orderBy('id', 'desc')
    //     ->get();
    //     $return_data['recordsTotal'] = $main->count();
    //     if (!empty($search)) {
    //         $main->where(function ($query) use ($search) {
    //             $query->AdminSearch($search);
    //         });
    //     }
    //     $return_data['recordsFiltered'] = $main->count();
    //     $all_data = $main->orderBy($datatable_filter['sort'], $datatable_filter['order'])
    //     ->offset($offset)
    //     ->limit($datatable_filter['limit'])
    //     ->get();
    //         //dd($all_data);
    //     if (!empty($all_data)) {
    //         foreach ($all_data as $key => $value) {
    //             $param = [
    //                 'id' => $value->id,
    //                 'url' => [
    //                     'status' => route('admin.carTransporter.status_update', $value->id),
    //                     'edit' => route('admin.carTransporter.edit', $value->id),
    //                     'delete' => route('admin.carTransporter.destroy', $value->id),
    //                     'view' => route('admin.carTransporter.show', $value->id),

    //                 ],
    //                 'checked' => ($value->status == 'active') ? 'checked' : ''
    //             ];

    //             $return_data['data'][] = array(
    //                 'id' => $offset + $key + 1,
    //                 'profile_image' => get_fancy_box_html($value['profile_image']),
    //                 'name' => $value->name,
    //                 'email' => $value->email,
    //                 'mobile_number' => $value->country_code . ' ' . $value->mobile,
    //                 'type' => get_label(strtoupper($value->type)),
    //                 'status' => $this->generate_switch($param),
    //                 //'is_status'=> $this->Isapproved($value->id),
    //                 'is_status'=> $value->is_status == 'pending' ? '<span style ="font-size: 16px;
    //                 font-weight: 600;color:blue">Pending</span>' : ($value->is_status == 'rejected' ? '<span style ="font-size: 16px;
    //                 font-weight: 600;color:red">Rejected</span>' : '<span style="border-bottom: 1px dashed black;">-</span>'),
    //                 'action' => $this->generate_actions_buttons($param),
    //             );
    //         }
    //     }
    //     return $return_data;
    // }

    public function pendingListing(Request $request)
    {
        $datatable_filter = datatable_filters();
        $offset = $datatable_filter['offset'];
        $search = $datatable_filter['search'];
        $return_data = [
            'data' => [],
            'recordsTotal' => 0,
            'recordsFiltered' => 0
        ];

        // Create the query builder instance
        $query = User::where('type', 'car_transporter')
            ->where(function ($q) {
                $q->whereNotIn('is_status', ['approved'])
                    ->orWhereNull('is_status');
            });

        // Apply search filter if provided
        if (!empty($search)) {
            $query->where(function ($query) use ($search) {
                $query->AdminSearch($search);
            });
        }

        // Apply order by for filtered count
        $return_data['recordsFiltered'] = $query->count();

        // Apply pagination and get the data
        $all_data = $query->orderBy($datatable_filter['sort'], $datatable_filter['order'])
            ->offset($offset)
            ->limit($datatable_filter['limit'])
            ->get();

        // Apply order by for total count
        $totalCountQuery = clone $query;
        $return_data['recordsTotal'] = $totalCountQuery->count();


        // Process the data
        foreach ($all_data as $key => $value) {
            $param = [
                'id' => $value->id,
                'url' => [
                    'status' => route('admin.carTransporter.status_update', $value->id),
                    'login' => route('admin.loginAsTransporter', $value->id),
                    'delete' => route('admin.carTransporter.destroy', $value->id),
                    'view' => route('admin.carTransporter.show', $value->id),
                ],
                'checked' => ($value->status == 'active') ? 'checked' : ''
            ];

            $return_data['data'][] = [
                'id' => $offset + $key + 1,
                'profile_image' => get_fancy_box_html(checkFileExist($value->profile_image)),
                'name' => $value->name,
                'email' => $value->email,
                'mobile_number' => $value->country_code . ' ' . $value->mobile,
                'type' => get_label(strtoupper($value->type)),
                'status' => $this->generate_switch($param),
                'is_status' => $value->is_status == 'pending' ? '<span style="font-size: 16px; font-weight: 600; color: blue">Pending</span>' : ($value->is_status == 'rejected' ? '<span style="font-size: 16px; font-weight: 600; color: red">Rejected</span>' : '<span style="font-size: 16px; font-weight: 400;">Not Available</span>'),
                'action' => $this->generate_actions_buttons($param),

            ];
        }

        return $return_data;
    }



    public function approvedView()
    {
        return view('admin.carTransporter.approved_view', [
            'title' => 'Approved Transporters',
            'breadcrumb' => breadcrumb([
                'Car Transporters' => route('admin.carTransporter.index'),
            ]),

        ]);
    }


    public function  approvedListing(Request $request)
    {

        $datatable_filter = datatable_filters();
        $offset = $datatable_filter['offset'];
        $search = $datatable_filter['search'];
        $return_data = array(
            'data' => [],
            'recordsTotal' => 0,
            'recordsFiltered' => 0
        );
        $main = User::with('user_QuoteByTransporter', 'userbid_QuoteByTransporter')->where('type', 'car_transporter')->where('is_status', 'approved');
        $return_data['recordsTotal'] = $main->count();
        if (!empty($search)) {
            $main->where(function ($query) use ($search) {
                $query->AdminSearch($search);
            });
        }
        $return_data['recordsFiltered'] = $main->count();
        $all_data = $main->orderBy($datatable_filter['sort'], $datatable_filter['order'])
            ->offset($offset)
            ->limit($datatable_filter['limit'])
            ->get();

        if (!empty($all_data)) {
            foreach ($all_data as $key => $value) {

                $company_name = $value->name ?? ''; // Adjust based on actual field name in the database
                $username = $value->username ?? ''; // Assuming 'username' field exists
                $total_bids = count($value->userbid_QuoteByTransporter) ?? 0; // If it's calculated, adjust accordingly
                $total_jobs_won = count($value->user_QuoteByTransporter) ?? 0; // Adjust based on actual field
                $member_since = $value->created_at->format('d-m-Y');
                $param = [
                    'id' => $value->id,
                    'url' => [
                        'status' => route('admin.carTransporter.status_update', $value->id),
                        //'edit' => route('admin.carTransporter.edit', $value->id),
                        'login' => route('admin.loginAsTransporter', $value->id),
                        'delete' => route('admin.carTransporter.destroy', $value->id),
                        'view' => route('admin.carTransporter.show', $value->id),
                    ],
                    'checked' => ($value->status == 'active') ? 'checked' : ''
                ];
                $return_data['data'][] = array(
                    'id' => $offset + $key + 1,
                    'profile_image' => get_fancy_box_html($value['profile_image']),
                    'name' => $value->first_name . ' ' . $value->last_name,
                    'company_name' => $company_name,
                    'username' => $username,
                    'mobile_number' => $value->mobile,
                    'email' => $value->email,
                    'total_bids' => $total_bids,
                    'total_jobs_won' => $total_jobs_won,
                    'member_since' => $member_since,
                    'type' => get_label(strtoupper($value->type)),
                    'status' => $this->generate_switch($param),
                    'action' => $this->generate_actions_buttons($param),
                );
            }
        }
        return $return_data;
    }

    public function status(Request $request)
    {
        $data = ['status' => 0, 'message' => 'Status'];
        $find = User::find($request->id);
        if ($find) {
            $find->update(['is_status' => $request->is_status]);
            $data['status'] = $request->is_status;
            $data['message'] = 'Car Transporter is ' . $request->is_status;
        }
        return $data;
    }
    public function review(Request $request)
    {

        $data = User::where('type', 'car_transporter')->get();

        return view('admin.carTransporter.transporter_review', [
            'data' => $data,
        ]);
    }
    public function review_data(Request $request)
    {
        try {
            $start = $request->input('start', 0); 
            $length = $request->input('length', 10);
            $draw = $request->input('draw', 1); // ✅ Include draw for DataTables
    
            $datatable_filter = datatable_filters();
            $search = $datatable_filter['search'];
    
            // Initialize response structure
            $return_data = [
                'draw' => $draw,
                'data' => [],
                'recordsTotal' => 0,
                'recordsFiltered' => 0
            ];
    
            // ✅ Base Query with `fake_completed_job`
            $query = User::leftJoin('quote_by_transpoters', function ($join) {
                $join->on('users.id', '=', 'quote_by_transpoters.user_id')
                    ->where('quote_by_transpoters.status', '=', 'accept');
            })
            ->leftJoin('user_quotes', function ($join) {
                $join->on('quote_by_transpoters.user_quote_id', '=', 'user_quotes.id')
                    ->where('user_quotes.status', 'completed');
            })
            ->where('users.type', 'car_transporter')
            ->where('users.is_status', 'approved')
            ->select(
                'users.id', 
                'users.first_name', 
                'users.email', 
                'users.profile_image', 
                'users.country_code', 
                'users.mobile',
                DB::raw('COUNT(user_quotes.id) as actual_completed_job'),
                DB::raw('COALESCE(users.completed_job, 0) as fake_completed_job') // ✅ Ensure fake_completed_job exists
            )
            ->groupBy(
                'users.id', 
                'users.first_name', 
                'users.email', 
                'users.profile_image', 
                'users.country_code', 
                'users.mobile', 
                'users.completed_job' // ✅ Ensure fake_completed_job can be counted
            );
    
            // ✅ Get total count before filtering
            $return_data['recordsTotal'] = User::where('users.type', 'car_transporter')
                ->where('users.is_status', 'approved')
                ->count();
    
            // ✅ Apply search filter
            if (!empty($search)) {
                $query->where(function ($q) use ($search) {
                    $q->where('users.email', 'like', "%{$search}%")
                      ->orWhere('users.first_name', 'like', "%{$search}%")
                      ->orWhere('users.mobile', 'like', "%{$search}%");
                });
            }
    
            // ✅ Get filtered count
            $return_data['recordsFiltered'] = $query->get()->count();
    
            // ✅ Apply pagination correctly
            $all_data = $query->orderBy($datatable_filter['sort'], $datatable_filter['order'])
                ->offset($start)
                ->limit($length)
                ->get();
    
            // ✅ Populate data
            foreach ($all_data as $key => $value) {
                $return_data['data'][] = [
                    'id' => $start + $key + 1,
                    'profile_image' => get_fancy_box_html($value->profile_image),
                    'name' => $value->first_name,
                    'email' => $value->email,
                    'mobile_number' => $value->country_code . ' ' . $value->mobile,
                    'actual_completed_job' => $value->actual_completed_job,
                    'fake_completed_job' => $value->fake_completed_job, // ✅ Now it exists
                    'user_id' => $value->id
                ];
            }
    
            return response()->json($return_data);
    
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()], 500);
        }
    }
    

    public function review_data_save(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'rating' => 'required|integer|min:1|max:5',
            'pos_comment' => 'required|string',
            'first_name' => 'required|string',
            'vehical_name' => 'required|string',
            'date' => 'required|string',
        ]);

        try {
            Feedback::create([
                'transporter_id' => $validated['user_id'],
                'rating' => $validated['rating'],
                'comment' => $validated['pos_comment'],
                'first_name' => $validated['first_name'],
                'vehical_name' => $validated['vehical_name'],
                'date' => $validated['date'],
            ]);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }

        return response()->json([
            'success' => false,
            'errors' => $validated->errors()
        ]);
    }

    public function custom_jobCompleted(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id', // Ensuring the user exists in the database
            'job_Completed' => 'required|integer', // Ensure 'job_Completed' is a boolean
        ]);

        try {
            // Update the completed_job field for the user
            User::find($validated['user_id'])->update([
                'completed_job' => $validated['job_Completed'],
            ]);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // In case of an error during the update
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function review_show(Request $request, $id)
    {

        $data = User::find($id);
        return view('admin.carTransporter.view_review', [
            'data' => $data,
        ]);
    }
    // public function review_show_data(Request $request, $id)
    // {
    //     $datatable_filter = datatable_filters();
    //     $offset = $datatable_filter['offset'];
    //     $search = $datatable_filter['search'];
    //     // dd('here');
    //     $return_data = [
    //         'data' => [],
    //         'recordsTotal' => 0,
    //         'recordsFiltered' => 0
    //     ];
    //     $user = User::find($id);
    //     // return $user->completed_job;
    //     $data = Feedback::where('transporter_id', $id);

    //     $return_data['recordsTotal'] = $data->count();
    //     if (!empty($search)) {
    //         $data->where(function ($query) use ($search) {
    //             $query->AdminSearch($search);
    //         });
    //     }
    //     $return_data['recordsFiltered'] = $data->count();
    //     $all_data = $data->orderBy($datatable_filter['sort'], $datatable_filter['order'])
    //         ->offset($offset)
    //         ->limit($datatable_filter['limit'])
    //         ->get();
    //     $total_feedbacks = $all_data->count();

    //     if (!empty($all_data)) {
    //         foreach ($all_data as $key => $value) {
    //             $return_data['data'][] = array(
    //                 'id' => $offset + $key + 1,
    //                 'feedback_id' => $value->id,
    //                 'first_name' => $value->first_name,
    //                 'vehical_name' => $value->vehical_name,
    //                 'rating' => $value->rating,
    //                 'comment' => $value->comment,
    //                 'date' => $value->date,
    //                 'transporter_id' => $value->transporter_id,
    //                 'completed_job' => $user->completed_job,

    //             );
    //         }
    //     }
    //     return $return_data;
    // }

    public function review_show_data(Request $request, $id)
    {
        $datatable_filter = datatable_filters();
        $offset = $datatable_filter['offset'];
        $search = $datatable_filter['search'];

        $user = User::find($id);
        $completed_job = $user ? $user->completed_job : 0;

        $query = Feedback::where('transporter_id', $id)->where('quote_by_transporter_id', null);

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%$search%")
                    ->orWhere('vehical_name', 'like', "%$search%")
                    ->orWhere('comment', 'like', "%$search%");
            });
        }

        // Get count before pagination
        // $return_data['recordsTotal'] = Feedback::where('transporter_id', $id)->count();
        $return_data['recordsFiltered'] = $query->count();

        $all_data = $query->orderBy($datatable_filter['sort'] ?? 'created_at', $datatable_filter['order'] ?? 'desc')
            ->offset($offset)
            ->limit($datatable_filter['limit'])
            ->get();

        $ratings = Feedback::where('transporter_id', $id)->where('quote_by_transporter_id', null)
            ->selectRaw('rating, COUNT(*) as count')
            ->groupBy('rating')
            ->pluck('count', 'rating')
            ->toArray();

        $total_feedbacks = array_sum($ratings);
        $ratings = collect([5, 4, 3, 2, 1])->mapWithKeys(function ($rating) use ($ratings, $total_feedbacks) {
            $count = $ratings[$rating] ?? 0;
            $percentage = $total_feedbacks > 0 ? ($count / $total_feedbacks) * 100 : 0;
            return ['star_' . $rating => $percentage];
        });

        $average_rating = $total_feedbacks > 0 ? round($all_data->avg('rating'), 1) : 0;
        $return_data['average_rating'] =  $average_rating;
        $return_data['ratings'] =  $ratings;
        // Prepare response
        $return_data['data'] = $all_data->map(function ($value, $key) use ($offset, $completed_job) {
            return [
                'id' => $offset + $key + 1,
                'feedback_id' => $value->id,
                'first_name' => $value->first_name,
                'vehical_name' => $value->vehical_name,
                'rating' => $value->rating,
                'comment' => $value->comment,
                'date' => $value->date,
                'transporter_id' => $value->transporter_id,
                'completed_job' => $completed_job,
            ];
        })->toArray();

        return response()->json($return_data);
    }


    public function review_data_update(Request $request)
    {

        $validated = $request->validate([
            'id' => 'required|integer',
            'rating' => 'required|integer|min:1|max:5',
            'pos_comment' => 'required|string',
            'first_name' => 'required|string',
            'vehical_name' => 'required|string',
            'date' => 'required|string',
        ]);

        try {
            // Find the existing review by user_id
            $feedback = Feedback::find($validated['id']);
            // return $request->all();
            if (!$feedback) {
                return response()->json(['success' => false, 'message' => 'Review not found'], 404);
            }

            // Update the existing review
            $feedback->update([
                'rating' => $validated['rating'],
                'comment' => $validated['pos_comment'],
                'first_name' => $validated['first_name'],
                'vehical_name' => $validated['vehical_name'],
                'date' => $validated['date'],
            ]);

            return response()->json(['success' => true, 'message' => 'Review updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function update_job_completed(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'job_Completed' => 'required|integer|min:0',
        ]);

        try {
            $user = User::find($validated['user_id']);
            if (!$user) {
                return response()->json(['success' => false, 'message' => 'User not found'], 404);
            }

            // Update the completed job count
            $user->update([
                'completed_job' => $validated['job_Completed'],
            ]);

            return response()->json(['success' => true, 'message' => 'Jobs Completed updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
