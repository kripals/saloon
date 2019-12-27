@extends('layouts.master')

@section('title', 'Employee')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all employees</header>
                    <div class="tools">
                        <a class="btn btn-primary ink-reaction" href="{{ route('employee.create') }}">
                            <i class="md md-add"></i>
                            Add
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="30%" class="text-left">First Name</th>
                            <th width="20%" class="text-left">Last Name</th>
                            <th width="20%" class="text-left">In Time</th>
                            <th width="15%" class="text-right">Out Time</th>
                            <th width="15%" class="text-right">Phone Number</th>
                            <th width="15%" class="text-right">Address</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($employees as $key => $employee)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{ $employee->first_name }}</td>
                                <td>{{ $employee->last_name }}</td>
                                <td>{{ $employee->in_time }}</td>
                                <td>{{ $employee->out_time }}</td>
                                <td>{{ $employee->phone_number }}</td>
                                <td>{{ $employee->address }}</td>
                                <td class="text-right">
                                    <a href="{{route('employee.edit', $employee->id)}}" class="btn btn-flat btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <button type="button" data-url="{{ route('employee.destroy', $employee->id) }}" class="btn btn-flat btn-primary btn-xs item-delete">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No employees available.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop
