<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMinuteRequest;
use App\Http\Requests\UpdateMinuteRequest;
use App\Minute;
use App\Verify;
use Carbon\Carbon;

class MinutesController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('minute_access'), 403);

        $minutes = Minute::all();

        return view('admin.minutes.index', compact('minutes'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('minute_create'), 403);

        return view('admin.minutes.create');
    }

    public function store(StoreMinuteRequest $request)
    {
        abort_unless(\Gate::allows('minute_create'), 403);

        $userid = auth()->user()->id;

        $datetime = Carbon::parse($request->tarikh)->toDateTimeString();

        $minute = Minute::create($request->except('tarikh') + [
            'user_id' => $userid,
            'tarikh' => $datetime
        ]);

        $verify = Verify::create(['minute_id' => $minute->id]);

        return redirect()->route('admin.minutes.index');
    }

    public function edit(Minute $minute)
    {
        abort_unless(\Gate::allows('minute_edit'), 403);

        return view('admin.minutes.edit', compact('minute'));
    }

    public function update(UpdateMinuteRequest $request, Minute $minute)
    {
        abort_unless(\Gate::allows('minute_edit'), 403);

        $datetime = Carbon::parse($request->tarikh)->toDateTimeString();

        $minute->update($request->except('tarikh') + ['tarikh' => $datetime]);

        return redirect()->route('admin.minutes.index');
    }

    public function show(Minute $minute)
    {
        abort_unless(\Gate::allows('minute_show'), 403);

        $minute->load('verify');

        return view('admin.minutes.show', compact('minute'));
    }

    public function destroy(Minute $minute)
    {
        abort_unless(\Gate::allows('minute_delete'), 403);

        $minute->load('verify');

        $minute->verify->delete();

        $minute->delete();

        return back();
    }

    public function massDestroy(MassDestroyMinuteRequest $request)
    {
        Minute::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
