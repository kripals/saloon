@extends('layouts.master')

@section('title', 'Branch')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all branches</header>
                    <div class="tools">
                        <a class="btn btn-primary ink-reaction" href="{{ route('branch.create') }}">
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
                            <th width="30%" class="text-left">Location</th>
                            <th width="20%" class="text-left">Phone Number</th>
                            <th width="20%" class="text-left">Open Time</th>
                            <th width="15%" class="text-right">Close Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($branches as $key => $branch)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{ strtoupper($branch->location) }}</td>
                                <td>{{ $branch->phone_number }}</td>
                                <td>{{ $branch->open_time }}</td>
                                <td>{{ $branch->close_time }}</td>
                                <td class="text-right">
                                    <a href="{{route('branch.edit', $branch->id)}}" class="btn btn-flat btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <button type="button" data-url="{{ route('branch.destroy', $branch->id) }}" class="btn btn-flat btn-primary btn-xs item-delete">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No branchs available.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop
