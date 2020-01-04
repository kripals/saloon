@extends('layouts.master')

@section('title', 'Edit Client')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::model($client, ['route' =>['client.update', $client->id],'class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            {{ method_field('PUT') }}
            @include('client.partials.form', ['header' => 'Edit client'])
            {{ Form::close() }}
        </div>
    </section>
@stop
