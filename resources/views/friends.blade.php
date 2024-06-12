@extends('layouts.master_layout')

@section('title')
    Social Media
@endsection

@section('main')
    <link rel="stylesheet" href="{{ url('css/friends.css') }}">
    <div class="main-content">
        <div class="friend-list">
            <h2>My Friends</h2>
            @forelse ($friends as $friend)
                <div class="friend-card">
                    @if (is_external_url($friend->profile_picture))
                        <img src="{{ $friend->profile_picture }}" alt="Profile Picture">
                    @elseif ($friend->profile_picture)
                        <img src="{{ asset('profile_picture/' . $friend->profile_picture) }}" alt="Profile Picture">
                    @else
                        <img src="{{ asset('assets/images/default_profile.jpg') }}" alt="Profile Picture">
                    @endif
                    <div class="friend-info">
                        <div class="friend-text">
                            <h3>{{ $friend->username }}</h3>
                            <p>{{ $friend->email }}</p>
                        </div>
                        <button class="remove-friend-btn" data-friend-id="{{ $friend->id }}">Remove</button>
                    </div>
                </div>
            @empty
                <div class="friend-card">
                    <p>No Friends</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
