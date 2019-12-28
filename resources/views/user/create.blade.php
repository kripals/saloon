@extends('layouts.master')

@section('title', 'Create User')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::open(['route' =>'user.store','class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            @include('user.partials.form', ['header' => 'Add a User'])
            {{ Form::close() }}
        </div>
    </section>
@stop
