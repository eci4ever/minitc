<?php

namespace App\Http\Controllers\Admin;

use App\Minute;
use App\Verify;
use App\Announcement;


class HomeController
{
    public function index()
    {
        $current_user = auth()->user()->name;

        $announcements = Announcement::all();

        $minutes = Minute::all();

        $verifies = Verify::all();

        $users = \App\User::all();

        $vari = 0;
        $dminute['total_unverify'] = 0;

        foreach ($verifies as $verify) {

            if ($verify->status === null) {
                $dminute['total_unverify']++;
            }
        }

        $dminute['total_minute'] = count($minutes);
        $dminute['total_verify'] = count($verifies) - $dminute['total_unverify'];
        $dminute['total_users'] = count($users);

        //dd(count($verifies));

        return view('home', compact('dminute', 'current_user'));
    }
}
