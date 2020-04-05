<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMovementRequest;
use App\Http\Requests\UpdateMovementRequest;
use Carbon\Carbon;
use App\Movement;
use App\User;

class MovementsController extends Controller
{
    public function testpage()
    {
        //$movements = Movement::findMany(4)->paginate(5);

        $users = User::findMany(1);
        $users->load('movements');

        //dd($users);

        return view('admin.movements.testpage', compact('users'));
    }
    public function myIndex()
    {
        $id = auth()->user()->id;
        $users = User::findMany($id);

        $users->load('movements');

        return view('admin.movements.myindex', compact('users'));
    }

    public function index()
    {
        abort_unless(\Gate::allows('movement_access'), 403);

        $key = Carbon::today()->toDateString();

        if(!empty(request()->all()))
        {
            $key = request()->input('key');
        }

        $users = User::whereHas('movements', function ($query) use($key){
            $query->whereDate('start_date', $key);
        })
        ->get();

        $users->load(['movements' => function ($query) use($key) {
            $query->whereDate('start_date', $key);
        }]);

        return view('admin.movements.index',compact('users', 'key'));
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
