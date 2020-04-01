<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMinuteRequest;
use App\Http\Requests\UpdateMinuteRequest;
use App\Minute;

class MinutesApiController extends Controller
{
    public function index()
    {
        $minutes = Minute::all();

        return $minutes;
    }

    public function store(StoreMinuteRequest $request)
    {
        return Minute::create($request->all());
    }

    public function update(UpdateMinuteRequest $request, Minute $minute)
    {
        return $minute->update($request->all());
    }

    public function show(Minute $minute)
    {
        return $minute;
    }

    public function destroy(Minute $minute)
    {
        return $minute->delete();
    }
}
