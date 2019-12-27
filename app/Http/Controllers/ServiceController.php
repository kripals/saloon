<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreService;
use App\Http\Requests\UpdateService;
use App\Model\Service;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $services = Service::all();

        return view('service.index', compact('services'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('service.create');
    }

    /**
     * @param StoreService $request
     * @return mixed
     */
    public function store(StoreService $request)
    {
        DB::transaction(function () use ($request)
        {
            $data = $request->data();

            $service = Service::create($data);
        });
        return redirect()->route('service.index')->withSuccess(trans('messages.create_success', [ 'entity' => 'Service' ]));
    }

    /**
     * @param Service $service
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Service $service)
    {
        return view('service.show',compact('service'));
    }

    /**
     * @param Service $service
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Service $service)
    {
        return view('service.edit',compact('service'));
    }

    /**
     * @param UpdateService $request
     * @param Service $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateService $request, Service $service)
    {
        DB::transaction(function () use ($request, $service)
        {
            $data = $request->data();

            $service->update($data);
        });

        return redirect()->route('service.index')->with('success', trans('messages.update_success', ['entity' => 'Service']));
    }

    /**
     * @param Service $service
     * @return mixed
     * @throws \Exception
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return back()->withSuccess(trans('message.delete_success', [ 'entity' => 'Service' ]));
    }
}
