<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAnnouncementRequest;
use App\Http\Requests\StoreAnnouncementRequest;
use App\Http\Requests\UpdateAnnouncementRequest;
use App\Announcement;
use Carbon\Carbon;

class AnnouncementsController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('announcement_access'), 403);

        $announcements = Announcement::all();

        return view('admin.announcements.index', compact('announcements'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('announcement_create'), 403);

        return view('admin.announcements.create');
    }

    public function store(StoreAnnouncementRequest $request)
    {
        abort_unless(\Gate::allows('announcement_create'), 403);

        $datetime = Carbon::parse($request->datetime)->toDateTimeString();

        $announcement = Announcement::create($request->except('datetime') + ['datetime' => $datetime]);

        return redirect()->route('admin.announcements.index');
    }

    public function edit(Announcement $announcement)
    {
        abort_unless(\Gate::allows('announcement_edit'), 403);

        return view('admin.announcements.edit', compact('announcement'));
    }

    public function update(UpdateAnnouncementRequest $request, Announcement $announcement)
    {
        abort_unless(\Gate::allows('announcement_edit'), 403);

        $datetime = Carbon::parse($request->datetime)->toDateTimeString();

        $announcement->update($request->except('datetime') + ['datetime' => $datetime]);

        return redirect()->route('admin.announcements.index');
    }

    public function show(Announcement $announcement)
    {
        abort_unless(\Gate::allows('announcement_show'), 403);

        return view('admin.announcements.show', compact('announcement'));
    }

    public function destroy(Announcement $announcement)
    {
        abort_unless(\Gate::allows('announcement_delete'), 403);

        $announcement->delete();

        return back();
    }

    public function massDestroy(MassDestroyAnnouncementRequest $request)
    {
        Announcement::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
