<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointment;
use App\Http\Requests\UpdateAppointment;
use App\Model\Appointment;
use App\Model\Employee;
use App\Model\Service;
use App\Model\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $appointments = Appointment::all();

        return view('appointment.index', compact('appointments'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $services  = Service::pluck('name', 'id');
        $clients   = Client::all()->pluck('name', 'id');
        $employees = Employee::all()->pluck('name', 'id');

        return view('appointment.create', compact('services', 'clients', 'employees'));
    }

    /**
     * @param StoreAppointment $request
     * @return mixed
     */
    public function store(StoreAppointment $request)
    {
        DB::transaction(function () use ($request) {
            $data = $request->data();

            $appointment = Appointment::create($data);
        });

        return redirect()->route('appointment.index')->withSuccess(trans('messages.create_success', [ 'entity' => 'Appointment' ]));
    }

    /**
     * @param Appointment $appointment
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Appointment $appointment)
    {
        return view('appointment.show', compact('appointment'));
    }

    /**
     * @param Appointment $appointment
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Appointment $appointment)
    {
        $services  = Service::pluck('name', 'id');
        $clients   = Client::all()->pluck('name', 'id');
        $employees = Employee::all()->pluck('name', 'id');

        return view('appointment.edit', compact('appointment', 'services', 'clients', 'employees'));
    }

    /**
     * @param UpdateAppointment $request
     * @param Appointment $appointment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAppointment $request, Appointment $appointment)
    {
        DB::transaction(function () use ($request, $appointment) {
            $data = $request->data();

            $appointment->update($data);
        });

        return redirect()->route('appointment.index')->with('success', trans('messages.update_success', [ 'entity' => 'Appointment' ]));
    }

    /**
     * @param Appointment $appointment
     * @return mixed
     * @throws \Exception
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return back()->withSuccess(trans('message.delete_success', [ 'entity' => 'Appointment' ]));
    }
}
