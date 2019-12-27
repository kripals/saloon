<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployee;
use App\Http\Requests\UpdateEmployee;
use App\Model\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $employees = Employee::all();

        return view('employee.index', compact('employees'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * @param StoreEmployee $request
     * @return mixed
     */
    public function store(StoreEmployee $request)
    {
        DB::transaction(function () use ($request)
        {
            $data = $request->data();

            $employee = Employee::create($data);
        });
        return redirect()->route('employee.index')->withSuccess(trans('messages.create_success', [ 'entity' => 'Employee' ]));
    }

    /**
     * @param Employee $employee
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Employee $employee)
    {
        return view('employee.show',compact('employee'));
    }

    /**
     * @param Employee $employee
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit',compact('employee'));
    }

    /**
     * @param UpdateEmployee $request
     * @param Employee $employee
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateEmployee $request, Employee $employee)
    {
        DB::transaction(function () use ($request, $employee)
        {
            $data = $request->data();

            $employee->update($data);
        });

        return redirect()->route('employee.index')->with('success', trans('messages.update_success', ['entity' => 'Employee']));
    }

    /**
     * @param Employee $employee
     * @return mixed
     * @throws \Exception
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return back()->withSuccess(trans('message.delete_success', [ 'entity' => 'Employee' ]));
    }
}
