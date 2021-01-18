@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')

    <section>
        <h1>Welcome In Dashboard</h1>

        <p>Hello {{ auth()->guard('admin')->user()->name }}</p>
    </section>

@endsection