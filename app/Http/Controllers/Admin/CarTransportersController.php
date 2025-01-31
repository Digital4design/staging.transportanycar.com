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
        $main = User::where('type', 'car_transporter')->where('is_status', 'approved');
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
        $datatable_filter = datatable_filters();
        $offset = $datatable_filter['offset'];
        $search = $datatable_filter['search'];
        // dd('here');
        $return_data = [
            'data' => [],
            'recordsTotal' => 0,
            'recordsFiltered' => 0
        ];
        $data = User::leftJoin('quote_by_transpoters', function ($join) {
            $join->on('users.id', '=', 'quote_by_transpoters.user_id')
                ->where('quote_by_transpoters.status', '=', 'accept');
        })
            ->leftJoin('user_quotes', function ($join) {
                $join->on('quote_by_transpoters.user_quote_id', '=', 'user_quotes.id')
                    ->where('user_quotes.status', 'completed');
            })
            ->where('users.type', 'car_transporter')
            ->where('users.is_status', 'approved')
            ->select('users.*', DB::raw('COUNT(user_quotes.id) as actual_completed_job'))
            ->groupBy('users.id'); // Group by user to properly count completed jobs

        $return_data['recordsTotal'] = $data->count();
        if (!empty($search)) {
            $data->where(function ($query) use ($search) {
                $query->AdminSearch($search);
            });
        }
        $return_data['recordsFiltered'] = $data->count();
        $all_data = $data->orderBy($datatable_filter['sort'], $datatable_filter['order'])
            ->offset($offset)
            ->limit($datatable_filter['limit'])
            ->get();
       
        if (!empty($all_data)) {
            foreach ($all_data as $key => $value) {
                $return_data['data'][] = array(
                    'id' => $offset + $key + 1,
                    'profile_image' => get_fancy_box_html($value['profile_image']),
                    'name' => $value->first_name,
                    'email' => $value->email,
                    'mobile_number' => $value->country_code . ' ' . $value->mobile,
                    // 'review' =>count($value->user_feedback),
                    'actual_completed_job' => $value->actual_completed_job,
                    'fake_completed_job' => $value->completed_job,
                    'user_id' => $value->id,

                    // 'action' => $this->generate_actions_buttons($param),
                );
            }
        }
        return $return_data;
    }
    public function review_data_save(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'rating' => 'required|integer|min:1|max:5',
            'pos_comment' => 'required|string',
            'first_name' => 'required|string',
            'vehical_name' => 'required|string',
        ]);
    
        try {
            Feedback::create([
                'transporter_id' => $validated['user_id'],
                'rating' => $validated['rating'],
                'comment' => $validated['pos_comment'],
                'first_name'=> $validated['first_name'],
                'vehical_name'=> $validated['vehical_name'],
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

    public function review_show(Request $request)
    {

        $data = User::where('type', 'car_transporter')->get();

        return view('admin.carTransporter.transporter_review', [
            'data' => $data,
        ]);
    }
    public function review_show_data(Request $request)
    {
        $datatable_filter = datatable_filters();
        $offset = $datatable_filter['offset'];
        $search = $datatable_filter['search'];
        // dd('here');
        $return_data = [
            'data' => [],
            'recordsTotal' => 0,
            'recordsFiltered' => 0
        ];
        $data = User::leftJoin('quote_by_transpoters', function ($join) {
            $join->on('users.id', '=', 'quote_by_transpoters.user_id')
                ->where('quote_by_transpoters.status', '=', 'accept');
        })
            ->leftJoin('user_quotes', function ($join) {
                $join->on('quote_by_transpoters.user_quote_id', '=', 'user_quotes.id')
                    ->where('user_quotes.status', 'completed');
            })
            ->where('users.type', 'car_transporter')
            ->where('users.is_status', 'approved')
            ->select('users.*', DB::raw('COUNT(user_quotes.id) as actual_completed_job'))
            ->groupBy('users.id'); // Group by user to properly count completed jobs

        $return_data['recordsTotal'] = $data->count();
        if (!empty($search)) {
            $data->where(function ($query) use ($search) {
                $query->AdminSearch($search);
            });
        }
        $return_data['recordsFiltered'] = $data->count();
        $all_data = $data->orderBy($datatable_filter['sort'], $datatable_filter['order'])
            ->offset($offset)
            ->limit($datatable_filter['limit'])
            ->get();
       
        if (!empty($all_data)) {
            foreach ($all_data as $key => $value) {
                $return_data['data'][] = array(
                    'id' => $offset + $key + 1,
                    'profile_image' => get_fancy_box_html($value['profile_image']),
                    'name' => $value->first_name,
                    'email' => $value->email,
                    'mobile_number' => $value->country_code . ' ' . $value->mobile,
                    // 'review' =>count($value->user_feedback),
                    'actual_completed_job' => $value->actual_completed_job,
                    'fake_completed_job' => $value->completed_job,
                    'user_id' => $value->id,

                    // 'action' => $this->generate_actions_buttons($param),
                );
            }
        }
        return $return_data;
    }
    
}
