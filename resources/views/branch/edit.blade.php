@extends('layouts.master')

@section('title', 'Edit Branch')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::model($branch, ['route' =>['branch.update', $branch->id],'class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            {{ method_field('PUT') }}
            @include('branch.partials.form', ['header' => 'Edit branch <span class="text-primary">('.$branch->name.')</span>'])
            {{ Form::close() }}
        </div>
    </section>
@stop
