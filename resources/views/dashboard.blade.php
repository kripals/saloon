@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <section>
        <div class="section-body">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-bold text-center">Welcome to {{ config('app.name') }} Admin Panel.</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
