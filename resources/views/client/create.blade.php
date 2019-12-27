@extends('layouts.master')

@section('title', 'Create Client')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::open(['route' =>'client.store','class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            @include('client.partials.form', ['header' => 'Add a Client'])
            {{ Form::close() }}
        </div>
    </section>
@stop
