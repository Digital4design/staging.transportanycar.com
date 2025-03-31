<?php

use App\DeviceToken;
use App\PushLog;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Jenssegers\Agent\Agent;

if (!function_exists('send_response')) {

    function send_response($Status, $Message = "", $ResponseData = NULL, $extraData = NULL, $null_remove = null)
    {
        $data = [];
        $valid_status = [412, 200, 401];
        if (is_array($ResponseData)) {
            $data["status"] = $Status;
            $data["message"] = $Message;
            $data["data"] = $ResponseData;
        } else if (!empty($ResponseData)) {
            $data["status"] = $Status;
            $data["message"] = $Message;
            $data["data"] = $ResponseData;
        } else {
            $data["status"] = $Status;
            $data["message"] = $Message;
            $data["data"] = new stdClass();
        }
        if (!empty($extraData) && is_array($extraData)) {
            foreach ($extraData as $key => $val) {
                $data[$key] = $val;
            }
        }
        //        if ($null_remove) {
        //            null_remover($data['data']);
        //        }
        $header_status = in_array($data['status'], $valid_status) ? $data['status'] : 412;
        response()->json($data, $header_status)->header('Content-Type', 'application/json')->send();
        die(0);
    }
}


//function null_remover($response, $ignore = [])
//{
//    array_walk_recursive($response, function (&$item) {
//        if (is_null($item)) {
//            $item = strval($item);
//        }
//    });
//    return $response;
//}


if (!function_exists('isMobile')) {
    function isMobile()
    {
        $agent = new Agent();
        return $agent->isMobile();
    }
}

function token_generator()
{
    return genUniqueStr('', 100, 'device_tokens', 'token', true);
}

function get_header_auth_token()
{
    $full_token = request()->header('Authorization');
    return (substr($full_token, 0, 7) === 'Bearer ') ? substr($full_token, 7) : null;
}

if (!function_exists('un_link_file')) {
    function un_link_file($image_name = "")
    {
        $pass = true;
        if (!empty($image_name)) {
            try {
                $default_url = URL::to('/');
                $get_default_images = config('constants.default');
                $file_name = str_replace($default_url, '', $image_name);

                $default_image_list = is_array($get_default_images)
                    ? array_map(function ($image) use ($default_url) {
                        return str_replace($default_url, '', $image);
                    }, array_values($get_default_images))
                    : [];

                if (!in_array($file_name, $default_image_list)) {
                    Storage::disk(config('constants.upload_type'))->delete($file_name);
                }
            } catch (Exception $exception) {
                $pass = $exception->getMessage();
            }
        } else {
            $pass = 'Empty Field Name';
        }
        return $pass;
    }
}



function get_asset($val = "", $file_exits_check = true, $no_image_available = null)
{
    $no_image_available = ($no_image_available ?? asset(get_constants('default.no_image_available')));
    if ($val) {
        if ($file_exits_check) {
            return (file_exists(public_path($val))) ? asset($val) : $no_image_available;
        } else {
            return asset($val);
        }
    } else {
        return asset($no_image_available);
    }
}

function print_title($title)
{
    return ucfirst($title);
}

function get_constants($name)
{
    return config('constants.' . $name);
}

function calculate_percentage($amount = 0, $discount = 0)
{
    return ($amount && $discount) ? (($amount * $discount) / 100) : 0;
}

function flash_session($name = "", $value = "")
{
    session()->flash($name, $value);
}

function success_session($value = "")
{
    session()->flash('success', ucfirst($value));
}

function error_session($value = "")
{
    session()->flash('error', ucfirst($value));
}

function getDashboardRouteName($guard = "web")
{
    $name = 'admin.dashboard';
    $user_data = Auth::guard($guard)->user();
    if ($user_data) {
        if (in_array($user_data->type, ["admin", "local_admin"])) {
            $name = 'admin.dashboard';
        }
        if (in_array($user_data->type, ["user"])) {
            $name = 'front.dashboard';
        }
        if (in_array($user_data->type, ["car_transporter"])) {
            $name = 'transporter.dashboard';
        }
    }
    return $name;

    /*if ($guard == "admin") {
        $name = 'admin.dashboard';
    } elseif ($guard == "transporter") {
        $name = 'transporter.dashboard';
    } else {
        $name = 'front.dashboard';
    }
    return $name;*/
}

function admin_modules()
{
    $pending_count = User::where('is_status', 'pending')->where('type', 'car_transporter')->count();
    $approved_count = User::where('is_status', 'approved')->where('type', 'car_transporter')->count();
    return [
        [
            'route' => route('admin.dashboard'),
            'name' => __('Dashboard'),
            'icon' => 'kt-menu__link-icon fa fa-home',
            'child' => [],
            'all_routes' => [
                'admin.dashboard',
            ]
        ],
        [
            'route' => route('admin.user.index'),
            'name' => __('Users'),
            'icon' => 'kt-menu__link-icon fas fa-users',
            'child' => [],
            'all_routes' => [
                'admin.user.index',
                'admin.user.show',
                'admin.user.add',
            ]
        ],
        [
            'route' => route('admin.carTransporter.index'),
            'name' => __('Car Transporters'),
            'icon' => 'kt-menu__link-icon fas fa-car',
            'child' => [],
            'all_routes' => [
                'admin.carTransporter.index',
                'admin.carTransporter.show',
                'admin.carTransporter.add',
            ],
            'child' => [
                [
                    'route' => route('admin.carTransporter.pendingview'),
                    'name' => 'Pending Transporters',
                    'icon' => 'badge badge-custom',
                    'counter' => true,
                    'all_routes' => [],
                ],
                [
                    'route' => route('admin.carTransporter.approvedview'),
                    'name' => 'Approved Transporters',
                    'icon' => 'badge badge-custom',
                    'approved_counter' => true,
                    'all_routes' => [],
                ],
            ]
        ],
        [
            'route' => route('admin.transactionHistory.index'),
            'name' => __('Transaction History'),
            'icon' => 'kt-menu__link-icon fa fa-history',
            'child' => [],
            'all_routes' => [
                'admin.transactionHistory.index',
                'admin.transactionHistory.show',
                'admin.transactionHistory.add',
            ]
        ],
        [
            'route' => route('admin.faqs.index'),
            'name' => __('FAQs'),
            'icon' => 'kt-menu__link-icon fas fa-anchor',
            'child' => [],
            'all_routes' => [
                'admin.faqs.index',
                'admin.faqs.show',
                'admin.faqs.add',
            ]
        ],
        // [
        //     'route' => route('admin.categories.index'),
        //     'name' => __('Categories'),
        //     'icon' => 'kt-menu__link-icon fas fa-anchor',
        //     'child' => [],
        //     'all_routes' => [
        //         'admin.categories.index',
        //         'admin.categories.show',
        //         'admin.categories.add',
        //     ]
        // ],
        // [
        //     'route' => route('admin.events.index'),
        //     'name' => __('Events'),
        //     'icon' => 'kt-menu__link-icon fa fa-calendar',
        //     'child' => [],
        //     'all_routes' => [
        //         'admin.events.index',
        //         'admin.events.show',
        //         'admin.events.add',
        //         'admin.events.view',
        //     ]
        // ],
        [
            'route' => 'javascript:;',
            'name' => __('General Settings'),
            'icon' => 'kt-menu__link-icon fa fa-cog',
            'all_routes' => [
                'admin.get_update_password',
                'admin.get_site_settings',
            ],
            'child' => [
                [
                    'route' => route('admin.content.index'),
                    'name' => 'Content',
                    'icon' => '',
                    'all_routes' => [
                        'admin.content.index',
                    ],
                ],
                // [
                //     'route' => route('admin.get_update_password'),
                //     'name' => 'Change Password',
                //     'icon' => '',
                //     'all_routes' => [
                //         'admin.get_update_password',
                //     ],
                // ],
                [
                    'route' => route('admin.get_site_settings'),
                    'name' => 'Site Settings',
                    'icon' => '',
                    'all_routes' => [
                        'admin.get_site_settings',
                    ],
                ],
                [
                    'route' => route('admin.get_smtp_settings'),
                    'name' => 'SMTP settings',
                    'icon' => '',
                    'all_routes' => [
                        'admin.get_smtp_settings',
                    ],
                ],
                [
                    'route' => route('admin.email_template'),
                    'name' => 'Email template',
                    'icon' => '',
                    'all_routes' => [
                        'admin.email_template',
                    ],
                ],
                [
                    'route' => route('admin.seo_settings'),
                    'name' => 'SEO Settings',
                    'icon' => '',
                    'all_routes' => [
                        'admin.seo_settings',
                    ],
                ]
            ],
        ],
        [
            'route' => route('admin.logout'),
            'name' => __('Logout'),
            'icon' => 'kt-menu__link-icon fas fa-sign-out-alt',
            'child' => [],
            'all_routes' => [],
        ],
    ];
}

function get_error_html($error)
{
    $content = "";
    if ($error->any() !== null && $error->any()) {
        foreach ($error->all() as $value) {
            $content .= '<div class="alert alert-danger alert-dismissible mb-1" role="alert">';
            $content .= '<div class="alert-text">' . $value . '</div>';
            $content .= '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div></div>';
        }
    }
    return $content;
}


function breadcrumb($aBradcrumb = array())
{
    $i = 0;
    $content = '';
    $is_login = Auth::user();
    if ($is_login) {
        if ($is_login->type == "admin") {
            $aBradcrumb = array_merge(['Home' => route('admin.dashboard')], $aBradcrumb);
        } elseif ($is_login->type == "vendor") {
            $aBradcrumb = array_merge(['Home' => route('vendor.dashboard')], $aBradcrumb);
        }
    }
    if (is_array($aBradcrumb) && count($aBradcrumb) > 0) {
        $total_bread_crumbs = count($aBradcrumb);
        foreach ($aBradcrumb as $key => $link) {
            $i += 1;
            $link = (!empty($link)) ? $link : 'javascript:void(0)';

            $content .=  '<li class="breadcrumb-item"> <a href="' . $link . '">' . ucfirst($key) . '</a>';


            // $content .= "<a href='" . $link . "' class='kt-subheader__breadcrumbs-link'>" . ucfirst($key) . "</a>";
            // if ($total_bread_crumbs != $i) {
            //     $content .= "<span class='kt-subheader__breadcrumbs-separator'></span>";
            // }
        }
    }
    return $content;
}

function success_error_view_generator()
{
    $content = "";
    if (session()->has('error')) {
        $content = '<div class="alert alert-danger alert-dismissible" role="alert">
        <div class="alert-text">' . session('error') . '</div>
        <div class="alert-close"><i class="flaticon2-cross kt-icon-sm"
        data-dismiss="alert"></i></div></div>';
    } elseif (session()->has('success')) {
        $content = '<div class="alert alert-success alert-dismissible" role="alert">
        <div class="alert-text">' . session('success') . '</div>
        <div class="alert-close"><i class="flaticon2-cross kt-icon-sm"
        data-dismiss="alert"></i></div></div>';
    }
    return $content;
}

function datatable_filters()
{
    $post = request()->all();
    return array(
        'offset' => isset($post['start']) ? intval($post['start']) : 0,
        'limit' => isset($post['length']) ? intval($post['length']) : 25,
        'sort' => isset($post['columns'][(isset($post["order"][0]['column'])) ? $post["order"][0]['column'] : 0]['data']) ? $post['columns'][(isset($post["order"][0]['column'])) ? $post["order"][0]['column'] : 0]['data'] : 'created_at',
        'order' => isset($post["order"][0]['dir']) ? $post["order"][0]['dir'] : 'DESC',
        'search' => isset($post["search"]['value']) ? $post["search"]['value'] : '',
        'sEcho' => isset($post['sEcho']) ? $post['sEcho'] : 1,
    );
}

function send_push($user_id = 0, $data = [], $notification_entry = false)
{
    //    $sample_data = [
    //        'push_type' => 0,
    //        'push_message' => 0,
    //        'from_user_id' => 0,
    //        'push_title' => 0,
    //////        'push_from' => 0,
    //        'object_id' => 0,
    //        'extra' => [
    //            'jack' => 1
    //        ],
    //    ];


    $pem_secret = '';
    $bundle_id = 'com.zb.project.Bambaron';
    $pem_file = base_path('storage/app/uploads/user.pem');
    $main_name = defined('site_name') ? site_name : env('APP_NAME');
    $push_data = [
        'user_id' => $user_id,
        'from_user_id' => $data['from_user_id'] ?? null,
        'sound' => 'defualt',
        'push_type' => $data['push_type'] ?? 0,
        'push_title' => $data['push_title'] ?? $main_name,
        'push_message' => $data['push_message'] ?? "",
        'object_id' => $data['object_id'] ?? null,
    ];
    if ($push_data['user_id'] !== $push_data['from_user_id']) {
        //        $to_user_data = User::find($user_id);
        //        if ($to_user_data) {
        $get_user_tokens = DeviceToken::get_user_tokens($user_id);
        $fire_base_header = ["Authorization: key=" . config('constants.firebase_server_key'), "Content-Type: application/json"];
        if (count($get_user_tokens)) {
            foreach ($get_user_tokens as $value) {
                $curl_extra = [];
                $push_status = "Sent";
                $value->update(['badge' => $value->badge + 1]);
                try {
                    $device_token = $value['push_token'];
                    $device_type = strtolower($value['type']);
                    if ($device_token) {
                        if ($device_type == "ios") {
                            $headers = ["apns-topic: $bundle_id"];
                            $url = "https://api.development.push.apple.com/3/device/$device_token";
                            $payload_data = [
                                'aps' => [
                                    'badge' => $value->badge,
                                    'alert' => $push_data['push_message'],
                                    'sound' => 'default',
                                    'push_type' => $push_data['push_type']
                                ],
                                'payload' => [
                                    'to' => $value['push_token'],
                                    'notification' => ['title' => $push_data['push_title'], 'body' => $push_data['push_message'], "sound" => "default", "badge" => $value->badge],
                                    'data' => $push_data,
                                    'priority' => 'high'
                                ]
                            ];
                            $curl_extra = [
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_2_0,
                                CURLOPT_SSLCERT => $pem_file,
                                CURLOPT_SSLCERTPASSWD => $pem_secret,
                            ];
                        } else {
                            $headers = $fire_base_header;
                            $url = "https://fcm.googleapis.com/fcm/send";
                            $payload_data = [
                                'to' => $value['push_token'],
                                'data' => $push_data,
                                'priority' => 'high'
                            ];
                        }
                        $ch = curl_init($url);
                        curl_setopt_array($ch, array_merge([
                            CURLOPT_URL => $url,
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_POSTFIELDS => json_encode($payload_data),
                            CURLOPT_POST => 1,
                            CURLOPT_HTTPHEADER => $headers,
                        ], $curl_extra));
                        $result = curl_exec($ch);
                        //                            $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                        if (curl_errno($ch)) {
                            $push_status = 'Curl Error:' . curl_error($ch);
                        }
                        curl_close($ch);
                        if (config('constants.push_log')) {
                            PushLog::add_log($user_id, $push_data['from_user_id'], $push_data['push_type'], $push_status, json_encode($push_data), $result);
                        }
                    } else {
                        PushLog::add_log($user_id, $push_data['from_user_id'], $push_data['push_type'], "Token Is empty");
                    }
                } catch (Exception $e) {
                    if (config('constants.push_log')) {
                        PushLog::add_log($user_id, $push_data['from_user_id'], $push_data['push_type'], $e->getMessage());
                    }
                }
            }
        } else {
            if (config('constants.push_log')) {
                PushLog::add_log($user_id, $push_data['from_user_id'], $push_data['push_type'], "Users Is not A Login With app");
            }
        }
        //            if ($notification_entry) {
        //                Notification::create([
        //                    'push_type' => $push_data['push_type'],
        //                    'user_id' => $push_data['user_id'],
        //                    'from_user_id' => $push_data['from_user_id'],
        //                    'push_title' => $push_data['push_title'],
        //                    'push_message' => $push_data['push_message'],
        //                    'object_id' => $push_data['object_id'],
        //                    'extra' => (isset($data['extra']) && !empty($data['extra'])) ? json_encode($data['extra']) : json_encode([]),
        //                    'country_id' => $push_data['country_id'],
        //                ]);
        //            }

        //        }
    } else {
        if (config('constants.push_log')) {
            PushLog::add_log($user_id, $push_data['from_user_id'], $push_data['push_type'], "User Cant Sent Push To Own Profile.");
        }
    }
}

function number_to_dec($number = "", $show_number = 2, $separated = '.', $thousand_separator = "")
{
    return number_format($number, $show_number, $separated, $thousand_separator);
}

function genUniqueStr($prefix = '', $length = 10, $table, $field, $isAlphaNum = false)
{
    $arr = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0'];
    if ($isAlphaNum) {
        $arr = array_merge($arr, array(
            'a',
            'b',
            'c',
            'd',
            'e',
            'f',
            'g',
            'h',
            'i',
            'j',
            'k',
            'l',
            'm',
            'n',
            'o',
            'p',
            'r',
            's',
            't',
            'u',
            'v',
            'x',
            'y',
            'z',
            'A',
            'B',
            'C',
            'D',
            'E',
            'F',
            'G',
            'H',
            'I',
            'J',
            'K',
            'L',
            'M',
            'N',
            'O',
            'P',
            'R',
            'S',
            'T',
            'U',
            'V',
            'X',
            'Y',
            'Z'
        ));
    }
    $token = $prefix;
    $maxLen = max(($length - strlen($prefix)), 0);
    for ($i = 0; $i < $maxLen; $i++) {
        $index = rand(0, count($arr) - 1);
        $token .= $arr[$index];
    }
    if (isTokenExist($token, $table, $field)) {
        return genUniqueStr($prefix, $length, $table, $field, $isAlphaNum);
    } else {
        return $token;
    }
}

function isTokenExist($token, $table, $field)
{
    if ($token != '') {
        $isExist = DB::table($table)->where($field, $token)->count();
        if ($isExist > 0) {
            return true;
        } else {
            return false;
        }
    } else {
        return true;
    }
}

function get_fancy_box_html($path = "", $class = "img_75")
{
    return '<a data-fancybox="gallery" href="' . $path . '"><img class="' . $class . '" src="' . $path . '" alt="image" width=40 height=40></a>';
}

function general_date($date)
{
    return date('d/m/Y', strtotime($date));
}

function current_route_is_same($name = "")
{
    return $name == request()->route()->getName();
}

function is_selected_blade($id = 0, $id2 = "")
{
    return ($id == $id2) ? "selected" : "";
}

function clean_number($number)
{
    return preg_replace('/[^0-9]/', '', $number);
}

function print_query($builder)
{
    $addSlashes = str_replace('?', "'?'", $builder->toSql());
    return vsprintf(str_replace('?', '%s', $addSlashes), $builder->getBindings());
}

function user_status($status = "", $is_delete_at = false)
{
    if ($is_delete_at) {
        $status = "<span class='badge badge-danger'>Deleted</span>";
    } elseif ($status == "inactive") {
        $status = "<span class='badge badge-warning'>" . ucfirst($status) . "</span>";
    } else {
        $status = "<span class='badge badge-success'>" . ucfirst($status) . "</span>";
    }
    return $status;
}


function is_active_module($names = [])
{
    $current_route = request()->route()->getName();
    return in_array($current_route, $names) ? "kt-menu__item--active kt-menu__item--open" : "";
}

function echo_extra_for_site_setting($extra = "")
{
    $string = "";
    $extra = json_decode($extra);
    if (!empty($extra) && (is_array($extra) || is_object($extra))) {
        foreach ($extra as $key => $item) {
            $string .= $key . '="' . $item . '" ';
        }
    }
    return $string;
}

function upload_file($file_name = "", $path = null)
{
    $file = "";
    $request = \request();
    if ($request->hasFile($file_name) && $path) {
        $path = config('constants.upload_paths.' . $path);
        $file = $request->file($file_name)->store($path, config('constants.upload_type'));
    } else {
        echo 'Provide Valid Const from web controller';
        die();
    }
    return $file;
}

function upload_base_64_img($base64 = "", $path = "uploads/product/")
{
    $file = null;
    if (preg_match('/^data:image\/(\w+);base64,/', $base64)) {
        $data = substr($base64, strpos($base64, ',') + 1);
        $up_file = rtrim($path, '/') . '/' . md5(uniqid()) . '.png';
        $img = Storage::disk('local')->put($up_file, base64_decode($data));
        if ($img) {
            $file = $up_file;
        }
    }
    return $file;
}

if (!function_exists('checkFileExist')) {

    /**
     * return path of image
     *
     * @param string $path
     * @return string
     *
     * @throws \RuntimeException
     */
    function checkFileExist($path = '')
    {
        $relativePath = parse_url($path, PHP_URL_PATH);
        $filePath = public_path($relativePath);
        if (file_exists($filePath)) {
            return asset($path);
        }
        //return asset('assets/images/no_image.png');
        return 'https://www.scrapcar.co/wp-content/uploads/2024/08/user.png';
    }
}
function get_label($label = "")
{
    switch ($label) {
        case "CAR_TRANSPORTER":
            $returnLabel = "<span class='badge badge-custom'>Car Transporter</span>";
            break;
        case "USER":
            $returnLabel = "<span class='badge badge-custom'>" . $label . "</span>";
            break;
        default:
            $returnLabel = "<span class='badge badge-success'>" . $label . "</span>";
    }

    return $returnLabel;
}

function getDistanceDuration($origin, $destination, $apiKey)
{
    $url = "https://maps.googleapis.com/maps/api/directions/json?units=imperial&origin=" . $origin . "&destination=" . $destination . "&key=" . $apiKey;

    // Initialize cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute cURL request
    $response = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
        curl_close($ch);
        throw new Exception("cURL error: {$error_msg}");
    }

    // Close cURL
    curl_close($ch);

    // Decode JSON response
    $data = json_decode($response, true);

    if (isset($data['status']) && $data['status'] == 'OK') {
        $distance = $data['routes'][0]['legs'][0]['distance']['text'];
        $duration = $data['routes'][0]['legs'][0]['duration']['text'];

        return [
            'distance' => $distance,
            'duration' => $duration
        ];
    } else {
        throw new Exception("Google Maps API error: " . $data['status']);
    }
}

function is_active_module_dashboard($names = [])
{
    $current_route = request()->route()->getName();
    return in_array($current_route, $names) ? "active" : "";
}

if (!function_exists('checkCarFileExist')) {

    /**
     * return path of image
     *
     * @param string $path
     * @return string
     *
     * @throws \RuntimeException
     */
    function checkCarFileExist($path = '')
    {
        $url = asset($path);
        $routeName = Illuminate\Support\Facades\Route::currentRouteName();
        if (!empty($path))
            $url = asset($path);
        elseif (in_array($routeName, ['transporter.new_jobs_new', 'transporter.watchlist.index', 'transporter.my_job', 'transporter.message.chat_list', 'front.message.chat_list', 'transporter.find_job']))
            $url = asset('uploads/no_car_image.png');
        elseif (in_array($routeName, ['front.dashboard']))
            $url = asset('uploads/svg_image.png');
        else
            $url = asset('uploads/no_quote.png');

        return $url;
    }
}


function formatAddress($address)
{
    $addressParts = explode(',', $address);
    $firstPart = trim($addressParts[0]);
    $lastTwoParts = array_slice($addressParts, -2);
    $limitedAddress = implode(',', $lastTwoParts);

    return $limitedAddress;
}

function readMoreHelper($story_desc, $chars)
{
    $chars = $chars ?? 50;
    if (strlen($story_desc) > $chars) {
        $short_desc = substr($story_desc, 0, $chars);
        $long_desc = substr($story_desc, $chars);
        $story_desc = $short_desc . '<a href="javascript:;" class="read_more_show"> Read More</a>';
        $story_desc .= '<span class="read_more_content d-none">' . $long_desc . '<a href="javascript:;" class="read_more_less d-none"> Read Less</a></span>';
    }

    return $story_desc;
}

function formatCustomDate($date)
{
    $d = new DateTime($date);
    $day = $d->format('d');
    $month = $d->format('m');
    $year = substr($d->format('Y'), -2); // Get last two digits of the year

    return "$day/$month/$year";
}

function extractPostcode($address)
{
    $addressParts = explode(',', $address);
    $firstPart = trim($addressParts[0]);
    $lastTwoParts = array_slice($addressParts, -2);
    $limitedAddress = $lastTwoParts[0];
    $spacePos = strpos($limitedAddress, ' ');
    if ($spacePos !== false) {
        $afterFirstWord = substr($limitedAddress, $spacePos + 1);
        if (preg_match('/\b[A-Za-z]{1,2}\d{1,2}\s*\d[A-Za-z]{2}\b/', $afterFirstWord, $matches)) {
            return $matches[0];
        } elseif (preg_match('/[A-Za-z]+\d+/', $afterFirstWord, $matches)) {
            return $matches[0];
        } elseif (preg_match('/\b\d{1,6}\b/', $afterFirstWord, $matches)) {
            return $matches[0];
        }
    }
    return $limitedAddress;
}
function getTimeAgo($timestamp, $timezone = 'Europe/London')
{
    // Create a Carbon instance with the provided timestamp and timezone
    $dateTime = Carbon::parse($timestamp, $timezone);

    // Get the current time in the specified timezone
    $now = Carbon::now($timezone);

    // Calculate the time difference in seconds
    $timeDifference = $now->diffInSeconds($dateTime);

    // Calculate time ago
    if ($timeDifference < 60) {
        return '1 min ago';
    } elseif ($timeDifference < 3600) {
        $minutes = floor($timeDifference / 60);
        return ($minutes == 1) ? '1 min ago' : "$minutes mins ago";
    } elseif ($timeDifference < 86400) {
        $hours = floor($timeDifference / 3600);
        return ($hours == 1) ? '1 hour ago' : "$hours hours ago";
    } else {
        $days = floor($timeDifference / 86400);
        return ($days == 1) ? '1 day ago' : "$days days ago";
    }
}



if (!function_exists('calculateCustomerQuote')) {
    function calculateCustomerQuote(float $offer): array
    {
        // if ($offer <= 100) {
        //     $markup = max($offer * 0.35, 15);
        // } elseif ($offer <= 200) {
        //     $markup = $offer * 0.30;
        // } else {
        //     $markup = $offer * 0.25;
        // }
        if ($offer <= 100) {
            $markup = max($offer * 0.30, 15);
        } elseif ($offer <= 200) {
            $markup = $offer * 0.25;
        } elseif ($offer <= 250) {
            $markup = $offer * 0.20;
        } elseif ($offer <= 300) {
            $markup = $offer * 0.18;
        } elseif ($offer <= 400) {
            $markup = $offer * 0.15;
        } elseif ($offer <= 500) {
            $markup = $offer * 0.12;
        } else {
            $markup = $offer * 0.10;
        }

        $customerQuote = $offer + $markup;
        $adjustedCustomerQuote = roundBasedOnDecimal($customerQuote);
        $deposit = $adjustedCustomerQuote - $offer;
        return [
            'customer_quote' => $adjustedCustomerQuote,
            'deposit' => $deposit,
            'transporter_payment' => $offer
        ];
    }
}

function roundBasedOnDecimal($number)
{
    $decimalPart = $number - floor($number);

    if ($decimalPart < 0.5) {
        return floor($number);
    } else {
        return ceil($number);
    }
}

function new_roundBasedOnDecimal($number)
{
    // Ensure $number is numeric
    if (!is_numeric($number)) {
        return 'N/A'; // or any default value you prefer
    }

    // Convert $number to float to ensure consistent behavior
    $number = floatval($number);

    $decimalPart = $number - floor($number);

    if ($decimalPart < 0.5) {
        return intval(floor($number));
    } else {
        return intval(ceil($number));
    }
}

if (!function_exists('create_notification')) {
    function create_notification($user_id, $from_user_id, $quote_id, $title = null, $message = null, $type = null, $reference_id = null)
    {
        // Validate input
        if (empty($user_id) || empty($type) || empty($message)) {
            throw new InvalidArgumentException('User ID, type, and message are required.');
        }
        // Create a new notification entry
        $notification = new \App\Notification();
        $notification->user_id = $user_id;
        $notification->from_user_id = $from_user_id;
        $notification->user_quote_id = $quote_id;
        $notification->title = $title;
        $notification->message = $message;
        $notification->type = $type;
        $notification->reference_id = $reference_id;
        $notification->seen = true;
        $notification->created_at = Carbon::now('Europe/London');
        $notification->updated_at = Carbon::now('Europe/London');
        // Save the notification
        $notification->save();
        return $notification;
    }
}
