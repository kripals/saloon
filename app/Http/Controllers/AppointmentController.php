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
        $appointments = Appointment::where('branch_id', auth()->user()->branch_id)->get();

        return view('appointment.index', compact('appointments'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $services  = Service::where('branch_id', auth()->user()->branch_id)->pluck('name', 'id');
        $clients   = Client::where('branch_id', auth()->user()->branch_id)->get()->pluck('name', 'id');
        $employees = Employee::where('branch_id', auth()->user()->branch_id)->get()->pluck('name', 'id');

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
            $appointment->service()->sync($request->service);
        });

        return redirect()->route('appointment.index')->withSuccess(trans('messages.create_success', [ 'entity' => 'Appointment' ]));
    }

    /**
     * @param Appointment $appointment
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Appointment $appointment)
    {
        if ($appointment->branch_id == auth()->user()->branch_id)
        {
            $services  = Service::where('branch_id', auth()->user()->branch_id)->pluck('name', 'id');
            $clients   = Client::where('branch_id', auth()->user()->branch_id)->get()->pluck('name', 'id');
            $employees = Employee::where('branch_id', auth()->user()->branch_id)->get()->pluck('name', 'id');

            return view('appointment.edit', compact('appointment', 'services', 'clients', 'employees'));
        }
        else
        {
            return view('appointment.index');
        }
    }

    /**w
     * @param UpdateAppointment $request
     * @param Appointment $appointment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAppointment $request, Appointment $appointment)
    {
        if ($appointment->branch_id == auth()->user()->branch_id)
        {
            DB::transaction(function () use ($request, $appointment) {
                $data = $request->data();

                $appointment->update($data);
                $appointment->service()->sync($request->service);
            });

            return redirect()->route('appointment.index')->with('success', trans('messages.update_success', [ 'entity' => 'Appointment' ]));
        }
        else
        {
            return redirect()->route('appointment.index')->with('warning', trans('messages.update_success', [ 'entity' => 'Appointment' ]));
        }
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
