@extends('layouts.master')

@section('title', 'Edit Employee')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::model($employee, ['route' =>['employee.update', $employee->id],'class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            {{ method_field('PUT') }}
            @include('employee.partials.form', ['header' => 'Edit employee <span class="text-primary">('.$employee->name.')</span>'])
            {{ Form::close() }}
        </div>
    </section>
@stop
