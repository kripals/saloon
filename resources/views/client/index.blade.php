@extends('layouts.master')

@section('title', 'Client')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all clients</header>
                    <div class="tools">
                        <a class="btn btn-primary ink-reaction" href="{{ route('client.create') }}">
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
                            <th width="20%" class="text-left">First Name</th>
                            <th width="20%" class="text-left">Last Name</th>
                            <th width="20%" class="text-left">Gender</th>
                            <th width="20%" class="text-left">Mobile Number</th>
                            <th width="20%" class="text-left">Address</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($clients as $key => $client)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{ strtoupper($client->first_name) }}</td>
                                <td>{{ $client->last_name }}</td>
                                <td>{{ $client->gender }}</td>
                                <td>{{ $client->mobile_number }}</td>
                                <td>{{ $client->address }}</td>
                                <td class="text-right">
                                    <a href="{{route('client.edit', $client->id)}}" class="btn btn-flat btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <button type="button" data-url="{{ route('client.destroy', $client->id) }}" class="btn btn-flat btn-primary btn-xs item-delete">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No clients available.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop
