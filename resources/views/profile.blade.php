@extends('layouts.master_layout')

@section('title')
    Social Media
@endsection

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
                <button class="btn btn-primary" id="editProfileBtn">Edit Profile</button>
            </div>
        </div>

        <div class="profile-content">
            <div class="left-column">
                <div class="photos">
                    <h2>Photos</h2>
                    <div class="photo-grid">
                        @foreach ($posts as $post)
                            <div class="photo-item" data-id="{{ $post->id }}">
                                <img src="{{ asset('post_images/' . $post->post_image) }}" alt="Post Image">
                                <span class="photo-description">{{ $post->description }}</span>
                                <div class="photo-actions">
                                    <button class="btn btn-edit" data-id="{{ $post->id }}"><i
                                            class="fa fa-pencil-square" aria-hidden="true"></i></button>
                                    <button class="btn btn-delete" data-id="{{ $post->id }}"><i class="fa fa-trash"
                                            aria-hidden="true"></i></button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div id="editProfileModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <form id="editProfileForm">
                    <label for="editUsername">Username</label>
                    <input type="text" id="editUsername" name="username" value="{{ Auth::user()->username }}" required>

                    <label for="editEmail">Email</label>
                    <input type="email" id="editEmail" name="email" value="{{ Auth::user()->email }}" required>

                    <label for="editProfilePicture">Profile Picture</label>
                    <input type="file" id="editProfilePicture" name="profile_picture">

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>

        <div id="editPhotoModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <form id="editPhotoForm">
                    <input type="hidden" name="post_id" id="post_id">
                    <label for="editDescription">Description</label>
                    <input type="text" id="editDescription" name="description" required maxlength="255">
                    <label for="editPostImage">Post Image</label>
                    <input type="file" id="editPostImage" name="post_image">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ url('javascript/update.js') }}"></script>
    <script src="{{ url('javascript/delete.js') }}"></script>
@endsection
