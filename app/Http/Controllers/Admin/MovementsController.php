<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMovementRequest;
use App\Http\Requests\UpdateMovementRequest;
use Carbon\Carbon;
use App\Movement;
use App\User;

class MovementsController extends Controller
{
    public function myIndex()
    {
        $id = auth()->user()->id;
        $users = User::findMany($id);

        $users->load('movements');

        return view('admin.movements.myindex', compact('users'));
    }

    public function allindex(Request $request)
    {
        abort_unless(\Gate::allows('movement_access'), 403);

        $datekey = Carbon::today()->toDateString();

        if(!empty($request->all()))
        {
            $datekey = $request->input('datekey');
        }

        $users = User::whereHas('movements', function ($query) use($datekey){
            $query->whereDate('start_date', $datekey);
        })
        ->get()->paginate(10);

        $users->load(['movements' => function ($query) use($datekey) {
            $query->whereDate('start_date', $datekey);
        }]);

        return view('admin.movements.allindex',compact('users', 'datekey'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('movement_create'), 403);

        return view('admin.movements.create');
    }

    public function store(StoreMovementRequest $request)
    {
        $userid = auth()->user()->id;

        $mydate = explode(' - ', request()->input('datetime'));
        $start_datetime = Carbon::parse($mydate[0]);
        $end_datetime = Carbon::parse($mydate[1]);

        $movement = Movement::create($request->except('datetime') + [
            'user_id' => $userid,
            'start_date' => $start_datetime->toDateTimeString(),
            'end_date' => $end_datetime->toDateTimeString(),
        ]);

        return redirect()->route('admin.movements.myindex');

    }

    public function edit(Movement $movement)
    {
        abort_unless(\Gate::allows('movement_create'), 403);

        $movement['datetime'] = $movement->start_date.' - '.$movement->end_date;

        return view('admin.movements.edit', compact('movement'));
    }

    public function update(UpdateMovementRequest $request, Movement $movement)
    {
        $mydate = explode(' - ', request()->input('datetime'));
        $start_datetime = Carbon::parse($mydate[0]);
        $end_datetime = Carbon::parse($mydate[1]);

        $movement->update($request->except('datetime') + [
            'start_date' => $start_datetime->toDateTimeString(),
            'end_date' => $end_datetime->toDateTimeString(),
        ]);

        return redirect()->route('admin.movements.myindex');
    }

    public function destroy(Movement $movement)
    {
        $movement->delete();

        return back();
    }

}
