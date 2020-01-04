@extends('layouts.master')

@section('title', 'Edit User')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::model($user, ['route' =>['user.update', $user->id],'class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            {{ method_field('PUT') }}
            @include('user.partials.form', ['header' => 'Edit user'])
            {{ Form::close() }}
        </div>
    </section>
@stop
