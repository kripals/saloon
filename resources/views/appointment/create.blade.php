@extends('layouts.master')

@section('title', 'Create Appointment')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::open(['route' =>'appointment.store','class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            @include('appointment.partials.form', ['header' => 'Add a Appointment'])
            {{ Form::close() }}
        </div>
    </section>
@stop
