@extends('layouts.master_layout')

@section('main')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ url('css/profile.css') }}">
    <div class="profile-page-container">
        <div class="cover-photo">
            <img src="{{ asset('assets/images/cover-photo-3.jpg') }}" alt="Cover Photo">
        </div>
        <div class="profile-info">
            <div class="profile-pic">
                @if (Auth::check() && Auth::user()->profile_picture)
                    <img src="{{ asset('profile_picture/' . Auth::user()->profile_picture) }}" alt="Profile Picture">
                @else
                    <img src="{{ asset('assets/images/default_profile.jpg') }}" alt="Profile Picture">
                @endif
            </div>
            <div class="user-info">
                <h1>
                    @if (Auth()->user())
                        {{ Auth()->user()->username }}
                    @endif
                </h1>
                <p>
                    @if (Auth()->user())
                        {{ Auth()->user()->email }}
                    @endif
                </p>
            </div>
            <div class="profile-actions">
                <button class="btn btn-primary">Edit Profile</button>
            </div>
        </div>

        <div class="profile-content">
            <div class="left-column">
                <div class="photos">
                    <h2>Photos</h2>
                    <div class="photo-grid">
                        @foreach ($posts as $post)
                            <img src="{{ asset('post_images/' . $post->post_image) }}" alt="Post Image">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
