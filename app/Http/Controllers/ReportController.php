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
    public function appointmentSearch()
    {
        $search = [
            'employee' => 'Employee',
            'service'  => 'Service',
            'client'   => 'Client'
        ];

        return view('report.appointmentSearch', compact('search'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function appointmentIndex(Request $request)
    {
        return view('report.appointmentIndex', compact('request'));
    }

    /**
     * @param $sdate
     * @param $edate
     * @param $all
     * @param $search_key
     * @param $search_value
     * @return mixed
     */
    public function appointmentList($sdate = null, $edate = null, $all = null, $search_key = null, $search_value = null)
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
