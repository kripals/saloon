@extends('layouts.master')

@section('title', 'Appointment')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all appointments</header>
                    <div class="tools">
                        <a class="btn btn-primary ink-reaction" href="{{ route('appointment.create') }}">
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
                            <th width="15%" class="text-left">Time</th>
                            <th width="15%" class="text-left">Duration (Hrs)</th>
                            <th width="15%" class="text-left">Client</th>
                            <th width="15%" class="text-left">Service</th>
                            <th width="15%" class="text-left">Employee</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($appointments as $key => $appointment)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{ $appointment->appointment }}</td>
                                <td>{{ $appointment->duration }}</td>
                                <td>{{ $appointment->client->name }}</td>
                                <td>{{ $appointment->service->name }}</td>
                                <td>{{ $appointment->employee->name }}</td>
                                <td class="text-right">
                                    <a href="{{route('appointment.edit', $appointment->id)}}" class="btn btn-flat btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <button type="button" data-url="{{ route('appointment.destroy', $appointment->id) }}" class="btn btn-flat btn-primary btn-xs item-delete">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No appointments available.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop
