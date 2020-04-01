<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVerifyRequest;
use App\Http\Requests\StoreVerifyRequest;
use App\Http\Requests\UpdateVerifyRequest;
use App\Minute;
use App\Verify;

class VerifiesController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('verify_access'), 403);

        $minutes = Minute::all();
        $minutes->load('verify');
        //$verifies = Verify::all();

        //dd($minutes);

        return view('admin.verifies.index', compact('minutes'));
    }

    public function edit(Verify $verify, \App\Minute $minute)
    {
        abort_unless(\Gate::allows('verify_edit'), 403);

        $minute->load('verify');

        return view('admin.verifies.edit', compact('minute'));
    }

    public function update(UpdateVerifyRequest $request, Verify $verify)
    {
        abort_unless(\Gate::allows('verify_edit'), 403);

        //dd($request->all());

        $verify->update($request->all());

        return redirect()->route('admin.verifies.index');
    }

    public function show(Verify $verify)
    {
        abort_unless(\Gate::allows('verify_show'), 403);

        return view('admin.verifies.show', compact('verify'));
    }

    public function destroy(Verify $verify)
    {
        abort_unless(\Gate::allows('verify_delete'), 403);

        $verify->delete();

        return back();
    }

    public function massDestroy(MassDestroyVerifyRequest $request)
    {
        Verify::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
