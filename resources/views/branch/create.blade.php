@extends('layouts.master')

@section('title', 'Create Branch')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::open(['route' =>'branch.store','class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            @include('branch.partials.form', ['header' => 'Add a Branch'])
            {{ Form::close() }}
        </div>
    </section>
@stop
