@extends('layouts.master')

@section('title', 'Employee')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all services</header>
                    <div class="tools">
                        <a class="btn btn-primary ink-reaction" href="{{ route('service.create') }}">
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
                            <th width="30%" class="text-left">Name</th>
                            <th width="20%" class="text-left">Service Per Cost</th>
                            <th width="20%" class="text-left">Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($services as $key => $service)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{ $service->name }}</td>
                                <td>{{ $service->cost_per }}</td>
                                <td>{{ $service->price }}</td>
                                <td class="text-right">
                                    <a href="{{route('service.edit', $service->id)}}" class="btn btn-flat btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <button type="button" data-url="{{ route('service.destroy', $service->id) }}" class="btn btn-flat btn-primary btn-xs item-delete">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No services available.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop
