<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\EventParticipant;
use App\Http\Controllers\WebController;
use App\User;
use App\UserDocuments;
use App\UserFreind;
use App\UserQuote;
use App\UserReferral;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UsersController extends WebController
{
    public $user_obj;
    public function __construct()
    {
        $this->user_obj = new User();
    }
    public function index()
    {
        return view('admin.user.index', [
            'title' => 'Users',
            'breadcrumb' => breadcrumb([
                'Users' => route('admin.user.index'),
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
        $allowedTypes=['user','merchant'];
        $main = User::where('type', 'user')->orWhere('type','merchant');
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
                        'status' => route('admin.user.status_update', $value->id),
                        'edit' => route('admin.user.edit', $value->id),
                        'delete' => route('admin.user.destroy', $value->id),
                        'view' => route('admin.user.show', $value->id),
                    ],
                    'checked' => ($value->status == 'active') ? 'checked' : ''
                ];
                $return_data['data'][] = array(
                    'id' => $offset + $key + 1,
                    'profile_image' => get_fancy_box_html($value['profile_image']),
                    'name' =>$value->username,
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
        if ($data) {
            $data->delete();
            success_session('User Deleted successfully');
        } else {
            error_session('User not found');
        }
        return redirect()->route('admin.user.index');
    }

    public function status_update($id = 0)
    {
        $data = ['status' => 0, 'message' => 'User Not Found'];
        $find = User::find($id);
        if ($find) {
            $find->update(['status' => ($find->status == "inactive") ? "active" : "inactive"]);
            $data['status'] = 1;
            $data['message'] = 'User status updated';
        }
        return $data;
    }

    public function show($id)
    {
        $data = User::where(['type' => 'user', 'id' => $id])->first();

        if ($data) {
            return view('admin.user.view', [
                'title' => 'View User',
                'data' => $data,
                'breadcrumb' => breadcrumb([
                    'users' => route('admin.user.index'),
                    'view' => route('admin.user.show', $id)
                ]),
            ]);
        }
        error_session('user not found');
        return redirect()->route('admin.user.index');
    }

    public function create(){
        $title = "Create User";
        return view('admin.user.create', [
            'title' => $title,
            'breadcrumb' => breadcrumb([
                'Users' => route('admin.user.index'),
                'create' => route('admin.user.create')
            ]),
        ]);
    }
    public function store(Request $request){
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
        if(isset($user) && !empty($user)){
            success_session('user created successfully');
        }
        else{
            error_session('user not created.');
        }


        return redirect()->route('admin.user.index');
    }
    public function edit($id)
    {
        $data = User::find($id);
        if ($data) {
            $title = "Update Customer";
            return view('admin.user.create', [
                'title' => $title,
                'data' => $data,
                'breadcrumb' => breadcrumb([
                    'Custtomers' => route('admin.user.index'),
                    'edit' => route('admin.user.edit', $data->id)
                ]),
            ]);
        }
        error_session('User not found');
        return redirect()->route('admin.user.index');
    }

    public function update(Request $request, $id)
    {
        $data = User::find($id);
        if ($data) {
            $request->validate([
                'first_name' => ['required'],
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
            $user = $this->user_obj->saveUser($request_data,$id,$data);
            if(isset($user) && !empty($user)){
                success_session('user updated successfully');
            }
            else{
                error_session('user not updated');
            }
        } else {
            error_session('user not found');
        }
        return redirect()->route('admin.user.index');
    }

    public function pending_list($id)
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
        $main = UserQuote::where('user_id',$id)->where('status','pending');
        $return_data['recordsTotal'] = $main->count();
        if (!empty($search)) {
            $main->whereHas('event',function($query) use ($search) {
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
                        // 'status' => route('admin.events.status_update', $value->id),
                        // //'edit' => route('admin.user.edit', $value->id),
                        // 'delete' => route('admin.events.destroy', $value->id),
                         'view' => route('admin.user.details',['user_id' => $value->user_id, 'id' => $value->id]),
                    ],
                    'checked' => ($value->status == 'active') ? 'checked' : ''
                ];
                $return_data['data'][] = array(
                    'id' => $offset + $key + 1,
                    'pickup_postcode' => $value->pickup_postcode,
                    'drop_postcode' => $value->drop_postcode,
                    'vehicle_details' => $value->vehicle_details,
                    // 'status' => $this->generate_switch($param),
                    'action' => $this->generate_actions_buttons($param),
                );
            }
        }
        return $return_data;
    }

    public function ongoing_list($id)
    {
        $datatable_filter = datatable_filters();
        $offset = $datatable_filter['offset'];
        $search = $datatable_filter['search'];
        $return_data = array(
            'data' => [],
            'recordsTotal' => 0,
            'recordsFiltered' => 0
        );
        $main = UserQuote::with(['quoteByTransporter'])->where('user_id',$id)->where('status','ongoing');
        $return_data['recordsTotal'] = $main->count();
        if (!empty($search)) {
            $main->whereHas('event',function($query) use ($search) {
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
                        // 'status' => route('admin.events.status_update', $value->id),
                        // //'edit' => route('admin.user.edit', $value->id),
                        // 'delete' => route('admin.events.destroy', $value->id),
                        'view' => route('admin.user.details',['user_id' => $value->user_id, 'id' => $value->id]),
                    ],
                    'checked' => ($value->status == 'active') ? 'checked' : ''
                ];
                $return_data['data'][] = array(
                    'id' => $offset + $key + 1,
                    'pickup_postcode' => $value->pickup_postcode,
                    'drop_postcode' => $value->drop_postcode,
                    'vehicle_details' => $value->vehicle_details,
                    'price'=>'500',
                    'transporter_name'=>$value->quoteByTransporter->getTransporters->name,
                    // 'status' => $this->generate_switch($param),
                    'action' => $this->generate_actions_buttons($param),
                );
                
            }
        }
        return $return_data;
    }

    public function completed_list($id)
    {
        $datatable_filter = datatable_filters();
        $offset = $datatable_filter['offset'];
        $search = $datatable_filter['search'];
        $return_data = array(
            'data' => [],
            'recordsTotal' => 0,
            'recordsFiltered' => 0
        );
        $main = UserQuote::with(['quoteByTransporter'])->where('user_id',$id)->where('status','completed');
        $return_data['recordsTotal'] = $main->count();
        if (!empty($search)) {
            $main->whereHas('event',function($query) use ($search) {
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
                        // 'status' => route('admin.events.status_update', $value->id),
                        // //'edit' => route('admin.user.edit', $value->id),
                        // 'delete' => route('admin.events.destroy', $value->id),
                        'view' => route('admin.user.details',['user_id' => $value->user_id, 'id' => $value->id]),
                    ],
                    'checked' => ($value->status == 'active') ? 'checked' : ''
                ];
                $return_data['data'][] = array(
                    'id' => $offset + $key + 1,
                    'pickup_postcode' => $value->pickup_postcode,
                    'drop_postcode' => $value->drop_postcode,
                    'vehicle_details' => $value->vehicle_details,
                    'price'=>'500',
                    'transporter_name'=>$value->quoteByTransporter->getTransporters->name,
                    // 'status' => $this->generate_switch($param),
                     'action' => $this->generate_actions_buttons($param),
                );
            }
        }
        return $return_data;
    }

    public function approved_list($id)
    {
        $datatable_filter = datatable_filters();
        $offset = $datatable_filter['offset'];
        $search = $datatable_filter['search'];
        $return_data = array(
            'data' => [],
            'recordsTotal' => 0,
            'recordsFiltered' => 0
        );
        $main = UserQuote::where('user_id',$id)->where('status','approved');
        $return_data['recordsTotal'] = $main->count();
        if (!empty($search)) {
            $main->whereHas('event',function($query) use ($search) {
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
                        // 'status' => route('admin.events.status_update', $value->id),
                        // //'edit' => route('admin.user.edit', $value->id),
                        // 'delete' => route('admin.events.destroy', $value->id),
                        'view' => route('admin.user.details',['user_id' => $value->user_id, 'id' => $value->id]),
                    ],
                    'checked' => ($value->status == 'active') ? 'checked' : ''
                ];
                $return_data['data'][] = array(
                    'id' => $offset + $key + 1,
                    'pickup_postcode' => $value->pickup_postcode,
                    'drop_postcode' => $value->drop_postcode,
                    'vehicle_details' => $value->vehicle_details,
                   
                    // 'status' => $this->generate_switch($param),
                    'action' => $this->generate_actions_buttons($param),
                );
            }
        }
        return $return_data;
    }


    public function details($user_id,$id=0){
        
        $data = UserQuote::where(['user_id' => $user_id ,'id'=>$id])->first();
        if ($data) {
            return view('admin.user.details', [
                'title' => 'View User',
                'data' => $data,
                'breadcrumb' => breadcrumb([
                    'users' => route('admin.user.index'),
                    'details' => route('admin.user.details',['user_id' => $data->user_id, 'id' => $data->id])
                ]),
            ]);
        }
        error_session('user not found');
        return redirect()->route('admin.user.index');

    }

    public function vehicle_details_list($id) {
        $datatable_filter = datatable_filters();
        $offset = $datatable_filter['offset'];
        $search = $datatable_filter['search'];
        $return_data = array(
            'data' => [],
            'recordsTotal' => 0,
            'recordsFiltered' => 0
        );
        $main = UserQuote::where('id', $id);
    
        $return_data['recordsTotal'] = $main->count();
        if (!empty($search)) {
            $main->whereHas('event', function($query) use ($search) {
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
                $vehicle_details = json_decode($value->vehicle_details);
                if (!is_null($vehicle_details) && is_array($vehicle_details)) {
                    foreach ($vehicle_details as $key1 => $newdata) {
                        $return_data['data'][] = array(
                            'id' => $offset + $key1 + 1,
                            'vehicle_make' => $newdata->vehicle_make,
                            'vehicel_model' => $newdata->vehicel_model,
                        );
                    }
                }
            }
        }
        return $return_data;
    }    

}
