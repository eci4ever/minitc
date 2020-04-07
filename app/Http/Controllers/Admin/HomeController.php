<?php

namespace App\Http\Controllers\Admin;

use App\Minute;
use App\Verify;
use App\Announcement;
use App\Movement;
use Illuminate\Support\Carbon;

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

        $dminute['total_announcements'] = count($announcements);
        $dminute['total_minute'] = count($minutes);
        $dminute['total_verify'] = count($verifies) - $dminute['total_unverify'];
        $dminute['total_users'] = count($users);

        //Month range for chart

        for ($i = 0; $i < 5; $i++) {
            $months[] = now()->subMonths($i)->format('Y-m-');
        }

        for ($y = 0; $y < 5; $y++) {
            $movements[$y] = Movement::whereDate('start_date', 'like', $months[$y] . '%')->get()->count();
        }

        for ($i = 0; $i < 5; $i++) {
            $monthLabel[] = now()->subMonths($i)->format('F Y');
        }

        //dd($movements);

        return view('home', compact('dminute', 'current_user', 'monthLabel', 'movements'));
    }
}
