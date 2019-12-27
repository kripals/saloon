@extends('layouts.master')

@section('title', 'Create Service')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::open(['route' =>'service.store','class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            @include('service.partials.form', ['header' => 'Add a Service'])
            {{ Form::close() }}
        </div>
    </section>
@stop
