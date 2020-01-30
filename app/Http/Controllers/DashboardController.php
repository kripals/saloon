<?php

namespace App\Http\Controllers;

use App\Model\Appointment;
use App\Model\Client;
use App\Model\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $old_employee_count = Employee::where('branch_id', auth()->user()->branch_id)->whereDate('created_at', '<', date('Y-m-d'))->count();
        $new_employee_count = Employee::where('branch_id', auth()->user()->branch_id)->whereDate('created_at', '>=', date('Y-m-d'))->count();

        $old_appointment_count = Appointment::where('branch_id', auth()->user()->branch_id)->whereDate('created_at', '<', date('Y-m-d'))->count();
        $new_appointment_count = Appointment::where('branch_id', auth()->user()->branch_id)->whereDate('created_at', '>=', date('Y-m-d'))->count();

        $old_client_count = Client::where('branch_id', auth()->user()->branch_id)->whereDate('created_at', '<', date('Y-m-d'))->count();
        $new_client_count = Client::where('branch_id', auth()->user()->branch_id)->whereDate('created_at', '>=', date('Y-m-d'))->count();

        $today_date  = Carbon::create();
        $weekly_date = Carbon::create()->subDays(8);

        $appointments = Appointment::where('date', date('Y-m-d'))->get();

        while ($weekly_date <= $today_date)
        {
            $price[ $weekly_date->format('d') ] = Appointment::whereDate('date', '=', $weekly_date)->get()->sum('amount');
            $weekly_date->addDay();
        }

        $appointment_price = array_values($price);
        $appointment_keys  = array_keys($price);

        return view('dashboard', compact('new_employee_count', 'old_employee_count', 'old_appointment_count', 'new_appointment_count', 'old_client_count', 'new_client_count', 'appointment_price', 'appointment_keys', 'appointment_dates', 'appointments'));
    }
}
