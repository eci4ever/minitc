<?php

namespace App\Http\Controllers\Admin;

use App\Minute;
use App\Announcement;
use App\Movement;
use App\User;

class HomeController
{
    public function index()
    {
        $dminute['total_announcements'] = Announcement::count();
        $dminute['total_minute'] = Minute::count();
        $dminute['total_moves'] = Movement::count();
        $dminute['total_users'] = User::count();

        //Month range for chart
        for ($i = 0; $i < 5; $i++) {
            $months[] = now()->subMonths($i)->format('Y-m-');
        }
        //Get array movement count by month
        for ($y = 0; $y < 5; $y++) {
            $movements[$y] = Movement::whereDate('start_date', 'like', $months[$y] . '%')->get()->count();
        }
        //Generate label for graph
        for ($i = 0; $i < 5; $i++) {
            $monthLabel[] = now()->subMonths($i)->format('F Y');
        }

        return view('home', compact('dminute', 'monthLabel', 'movements'));
    }
}
