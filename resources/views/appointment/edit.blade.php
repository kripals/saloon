@extends('layouts.master')

@section('title', 'Edit Appointment')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::model($appointment, ['route' =>['appointment.update', $appointment->id],'class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            {{ method_field('PUT') }}
            @include('appointment.partials.form', ['header' => 'Edit appointment <span class="text-primary">('.$appointment->name.')</span>'])
            {{ Form::close() }}
        </div>
    </section>
@stop
