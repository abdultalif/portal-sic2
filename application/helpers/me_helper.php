<?php

function cek_login()
{
    $ci = get_instance();

    if (!$ci->session->userdata('email')) {
        $ci->session->set_flashdata('notif', 'Akses ditolak. Anda belum login!!');
        redirect('auth');
    }
}

function cek()
{
    $ci = get_instance();
    if (!$ci->session->userdata('reset_email')) {
        $ci->session->set_flashdata('notif', 'Akses ditolak!!');
        redirect('auth');
    }
}

function smarty_filesize($size)
{
    $size = max(0, (int)$size);
    $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    $power = $size > 0 ? floor(log($size, 1024)) : 0;
    return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
}

if (!function_exists('time_ago')) {
    function time_ago($time)
    {
        $periods = array("detik", "menit", "jam", "hari", "minggu", "bulan", "tahun", "dekake");
        $lengths = array("60", "60", "24", "7", "4.35", "12", "10");

        $now = time();

        $difference     = $now - $time;

        for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) {
            $difference /= $lengths[$j];
        }

        $difference = round($difference);

        return "$difference $periods[$j] lalu ";
    }
}
