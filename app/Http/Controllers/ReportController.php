<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ReportController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function appointment(Request $request)
    {
        $search = [
            'employee' => 'Employee',
            'service'  => 'Service',
            'client'   => 'Client'
        ];

        return view('report.appointment', compact('search', 'request'));
    }

    /**
     * @return mixed
     */
    public function appointmentList($sdate =  null, $edate = null, $all = null, $search_key = null, $search_value = null)
    {
        return DataTables::of(appointmentReportCollection($sdate, $edate, $all, $search_key, $search_value)->flatten())
            ->addColumn('client_name', function($item)
            {
                return $item->client->name;
            })->addColumn('employee', function($item)
            {
                return $item->employee->name;
            })->addColumn('service', function($item)
            {
                $services =  $item->service;
                $return = '';

                foreach ($services as $service)
                {
                    $return .= $service->name . '<br>';
                }

                return $return;
            })->make(true);
    }
}
