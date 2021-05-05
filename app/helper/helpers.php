<?php
// function htmlLangDir()
// {
//     $lang = app()->getLocale();
//     $dir = $lang == "ar" ? "rtl" : "auto";
//     return "lang=$lang dir=$dir";
// }

// function isPageRTL()
// {
//     return app()->getLocale() == "ar" ? true : false;
// }

function active($route, $text = "active")
{
    return request()->route()->getName() == $route ? $text : '';
}

function set_active($path, $active = 'active')
{
    return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

function notification($alert_type, $message)
{
    $notification['alert-type'] = $alert_type;
    $notification['message'] = $message;
    return $notification;
}

function dashboardURL()
{
    if (auth()->check()) {
        if (auth()->user()->hasRole('admin')) {
            return route('admin.dashboard');
        } else {
            return route('home');
        }
    }
}

function selected($data1, $data2)
{
    if (!is_array($data2)) {
        return $data1 == $data2 ? 'selected' : '';
    } else {
        return in_array($data1, $data2) ? 'selected' : '';
    }
}

function isActiveText($no)
{
    $text = ['Deactive', 'Active'];
    return $text[$no];
}

function isBan($user, $str = "bool")
{
    if ($str == 'text') {
        return $user->hasRole('ban') ? 'True' : 'False';
    } else if ($str == 'bool') {
        return $user->hasRole('ban');
    } else if ($str == 'check') {
        return $user->hasRole('ban') ? 'checked' : '';
    } else if ($str == 'class') {
        return $user->hasRole('ban') ? 'danger' : 'success';
    }
}

function isActiveClass($no)
{
    $class = ['danger', 'success'];
    return $class[$no];
}

function roleText()
{
    if (auth()->check()) {
        $role = ucwords(join(' ', auth()->user()->getRoleNames()->all()));
        return $role;
    }
}

function randomColor()
{
    $class = ['danger', 'info', 'primary', 'success', 'warning', 'megna', 'purple'];
    return $class[random_int(0, 6)];
}

// function tripStatus($no)
// {
//     switch ($no) {
//         case 0:
//             return ["Bidding", "dark"];
//         case 1:
//             return ["Running", "primary"];
//         case 2:
//             return ["Cancelled", "danger"];
//         case 3:
//             return ["Finished", "danger"];
//     }
// }
// function truckValid($status)
// {
//     switch ($status) {
//         case 0:
//             return ["Not Valid Yet", "warning"];
//         case 1:
//             return ["Valid", "success"];
//         case 2:
//             return ["Rejected", "danger"];
//     }
// }

function time_elapsed_string($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function days($value = null)
{
    $days = [
        ["id" => 0, "name" => "saturday", "value" => "satur"],
        ["id" => 1, "name" => "sunday", "value" => "sun"],
        ["id" => 2, "name" => "monday", "value" => "mon"],
        ["id" => 3, "name" => "tuesday", "value" => "tues"],
        ["id" => 4, "name" => "wednesday", "value" => "wednes"],
        ["id" => 5, "name" => "thursday", "value" => "thurs"],
        ["id" => 6, "name" => "friday", "value" => "fri"],
    ];
    if ($value == null) {
        return $days;
    } else {
        return collect($days)->where("value", $value)->first();
    }
}
