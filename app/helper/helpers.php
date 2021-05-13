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

/**
 * active
 *
 * @param  mixed $route
 * @param  mixed $text
 * @return string
 */
function active($route, $text = "active"): string
{
    return request()->route()->getName() == $route ? $text : '';
}

/**
 * set_active
 *
 * @param  mixed $path
 * @param  mixed $active
 * @return string
 */
function set_active($path, $active = 'active'): string
{
    return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

/**
 * notification
 *
 * @param  mixed $alert_type
 * @param  mixed $message
 * @return array
 */
function notification($alert_type, $message): array
{
    $notification['alert-type'] = $alert_type;
    $notification['message'] = $message;
    return $notification;
}

/**
 * dashboardURL
 *
 * @return url
 */
function dashboardURL()
{
    if (auth()->check()) {
        if (auth()->user()->hasRole('admin')) {
            return route('admin.dashboard');
        } else if (auth()->user()->hasRole('doctor')) {
            return route('doctor.dashboard');
        } else if (auth()->user()->hasRole('patient')) {
            return route('patient.dashboard');
        } else {
            return route('home');
        }
    }
}

/**
 * selected
 *
 * @param  mixed $data1
 * @param  mixed $data2
 * @return string
 */
function selected($data1, $data2): string
{
    if (!is_array($data2)) {
        return $data1 == $data2 ? 'selected' : '';
    } else {
        return in_array($data1, $data2) ? 'selected' : '';
    }
}

/**
 * isActiveText
 *
 * @param  integer $no
 * @return string
 */
function isActiveText($no): string
{
    $text = ['Deactive', 'Active'];
    return $text[$no] ?? '';
}

/**
 * isBan
 *
 * @param  \App\Models\User $user
 * @param  mixed $str
 * @return string
 */
function isBan($user, $str = "bool"): string
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

/**
 * isActiveClass
 *
 * @param  integer $no
 * @return string
 */
function isActiveClass($no): string
{
    $class = ['danger', 'success'];
    return $class[$no] ?? '';
}

/**
 * roleText
 *
 * @return string
 */
function roleText(): string
{
    if (auth()->check()) {
        $role = ucwords(join(' ', auth()->user()->getRoleNames()->all()));
        return $role;
    }
}

/**
 * randomColor
 *
 * @return string
 */
function randomColor(): string
{
    $class = ['danger', 'info', 'primary', 'success', 'warning', 'megna', 'purple'];
    return $class[random_int(0, 6)] ?? '';
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

/**
 * time_elapsed_string
 *
 * @param  string $datetime
 * @param  boolean $full
 * @return string
 */
function time_elapsed_string($datetime, $full = false): string
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

/**
 * days
 *
 * @param  mixed $value
 * @return void
 */
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

/**
 * appointmentStatusClass
 *
 * @param  string $status
 * @return string
 */
function appointmentStatusClass($status): string
{
    $statusClass = [
        'request' => 'secondary',
        'accepted' => 'primary',
        'completed' => 'success',
        'cancelled' => 'danger',
        'ignore' => 'warning'
    ];
    return $statusClass[$status] ?? '';
}
