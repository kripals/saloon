<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployee;
use App\Http\Requests\UpdateEmployee;
use App\Model\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class EmployeeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $employees = Employee::where('branch_id', auth()->user()->branch_id)->get();

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
        DB::transaction(function () use ($request) {
            $data = $request->data();

            $employee = Employee::create($data);
        });

        return redirect()->route('employee.index')->withSuccess(trans('messages.create_success', [ 'entity' => 'Employee' ]));
    }

    /**
     * @param Employee $employee
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Employee $employee)
    {
        if ($employee->branch_id == auth()->user()->branch_id)
        {
            return view('employee.edit', compact('employee'));
        }
        else
        {
            return view('employee.index');
        }
    }

    /**
     * @param UpdateEmployee $request
     * @param Employee $employee
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateEmployee $request, Employee $employee)
    {
        if ($employee->branch_id == auth()->user()->branch_id)
        {
            DB::transaction(function () use ($request, $employee) {
                $data = $request->data();

                $employee->update($data);
            });

            return redirect()->route('employee.index')->with('success', trans('messages.update_success', [ 'entity' => 'Employee' ]));
        }
        else
        {
            return redirect()->route('employee.index')->with('warning', trans('messages.update_success', [ 'entity' => 'Employee' ]));
        }
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

    /**
     * @param int $user_branch
     * @return mixed
     */
    public function employeeList($user_branch = 1)
    {
        return DataTables::of(Employee::where('branch_id', $user_branch)->get()->flatten())
            ->addColumn('actions', function ($item)
            {
                $actions = '<a role="button" class="btn btn-xs btn-flat btn-primary"  href="' . route('employee.edit', $item->id) . '" target="_blank">Edit</a>';
                $actions .= '<a role="button" class="btn btn-xs btn-flat btn-primary item-delete" href="' . route('employee.destroy', $item->id) . '" target="_blank">DELETE</a>';

                return $actions;
            })->make(true);
    }
}
