@extends('layouts.master')

@section('title', 'User')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all users</header>
                    <div class="tools">
                        <a class="btn btn-primary ink-reaction" href="{{ route('user.create') }}">
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
                            <th width="20%" class="text-left">Email</th>
                            <th width="20%" class="text-left">Branch</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($users as $key => $user)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->branch->location }}</td>
                                <td class="text-right">
                                    <a href="{{route('user.edit', $user->id)}}" class="btn btn-flat btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <button type="button" data-url="{{ route('user.destroy', $user->id) }}" class="btn btn-flat btn-primary btn-xs item-delete">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No users available.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop
