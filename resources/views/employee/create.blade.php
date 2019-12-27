@extends('layouts.master')

@section('title', 'Create Employee')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::open(['route' =>'employee.store','class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            @include('employee.partials.form', ['header' => 'Add a Employee'])
            {{ Form::close() }}
        </div>
    </section>
@stop
