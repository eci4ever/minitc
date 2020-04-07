<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

        return view('admin.verifies.index', compact('minutes'));
    }

    public function edit(Verify $verify, Minute $minute)
    {
        abort_unless(\Gate::allows('verify_edit'), 403);

        $minute->load('verify');

        return view('admin.verifies.edit', compact('minute'));
    }

    public function update(UpdateVerifyRequest $request, Verify $verify)
    {
        abort_unless(\Gate::allows('verify_edit'), 403);

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
}
