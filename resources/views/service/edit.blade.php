@extends('layouts.master')

@section('title', 'Edit Service')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::model($service, ['route' =>['service.update', $service->id],'class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            {{ method_field('PUT') }}
            @include('service.partials.form', ['header' => 'Edit service <span class="text-primary">('.$service->name.')</span>'])
            {{ Form::close() }}
        </div>
    </section>
@stop
