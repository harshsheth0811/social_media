@extends('layouts.master_layout')

@section('title')
    Social Media
@endsection

@section('main')
    <link rel="stylesheet" href="{{ url('css/friends.css') }}">
    <div class="main-content">
        <div class="friend-list">
            <h2>My Friends</h2>
            {{-- foreach --}}
            <div class="friend-card">
                <img src="{{ asset('assets/images/member-1.png') }}" alt="Friend Profile Picture">
                <div class="friend-info">
                    <div class="friend-text">
                        <h3>John Doe</h3>
                        <p>jhon@gmail.com</p>
                    </div>
                    {{-- <button>Remove</button> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
