@extends('layouts.master_layout')

@section('title')
    Social Media
@endsection

@section('main')
    <style>
        .er ror {
            color: red;
        }
    </style>
    {{-- <div class="story-gallery">
        <div class="story story1">
            <img src="{{ asset('assets/images/upload.png') }}" alt="Upload logo">
            <p>Post Story</p>
        </div>
        <div class="story story2">
            <img src="{{ asset('assets/images/member-1.png') }}" alt="Member1 logo">
            <p>Alison</p>
        </div>
        <div class="story story3">
            <img src="{{ asset('assets/images/member-2.png') }}" alt="Member2 logo">
            <p>Jackson</p>
        </div>
        <div class="story story4">
            <img src="{{ asset('assets/images/member-3.png') }}" alt="Member3 logo">
            <p>Samona</p>
        </div>
        <div class="story story5">
            <img src="{{ asset('assets/images/member-4.png') }}" alt="Member4 logo">
            <p>Jhon Doe</p>
        </div>
    </div> --}}

    <div class="write-post-container">
        <div class="user-profile">
            <img src="{{ is_external_url(auth()->user()->profile_picture) ? auth()->user()->profile_picture : asset('profile_picture/' . auth()->user()->profile_picture) }}"
                alt="Profile Picture">
            <div>
                <p>
                    @if (Auth()->user())
                        {{ Auth()->user()->username }}
                    @endif
                </p>
                <small>Public <i class="fa fa-caret-down"></i></small>
            </div>
        </div>

        <form method="POST" enctype="multipart/form-data" id="postForm">
            @csrf
            <div class="post-input-container">
                <textarea name="description" id="description" rows="3" placeholder="What's on your mind?" class="post-textarea"></textarea>
                <span class="text-danger" id="descriptionError">
                    @error('description')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="file-input-container">
                <input type="file" class="file-input-label" name="post_images" id="post_images">
                <span class="text-danger" id="post_imagesError">
                    @error('post_images')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="post-button-container">
                <button type="submit" class="post-button">Post</button>
            </div>
        </form>
    </div>

    <div class="posts-all">
        @forelse ($posts as $post)
            <div class="post-container" data-post-id="{{ $post->id }}">
                <div class="post-row">
                    <div class="user-profile">
                        @if (is_external_url($post->user->profile_picture))
                            <img src="{{ $post->user->profile_picture }}" alt="Profile Picture">
                        @elseif ($post->user->profile_picture)
                            <img src="{{ asset('profile_picture/' . $post->user->profile_picture) }}" alt="Profile Picture">
                        @else
                            <img src="{{ asset('assets/images/default_profile.jpg') }}" alt="Profile Picture">
                        @endif
                        <div>
                            <p>{{ $post->user->username }}</p>
                            <small>{{ $post->created_at->format('F d, Y') }}</small>
                        </div>
                    </div>
                    {{-- <a href="#"><i class="fa fa-ellipsis-v"></i></a> --}}
                </div>

                <p class="post-text">{{ $post->description }}</p>

                @if ($post->post_image)
                    <img src="{{ asset('post_images/' . $post->post_image) }}" alt="Post Image" class="post-img">
                @endif

                <div class="post-row">
                    <div class="activity-icons">
                        <div class="like-icon"
                            data-liked="{{ $post->likes()->where('user_id', Auth::id())->exists() ? 'true' : 'false' }}">
                            <img src="{{ $post->likes()->where('user_id', Auth::id())->exists() ? asset('assets/images/like-blue.png') : asset('assets/images/like.png') }}"
                                alt="Like logo">
                            <span class="like-count">{{ $post->likes()->count() }}</span>
                        </div>
                        <div class="comments-icon"><img src="{{ asset('assets/images/comments.png') }}"
                                alt="Comments logo"></div>
                        {{-- <div><img src="{{ asset('assets/images/share.png') }}" alt="Share logo"></div> --}}
                    </div>

                    <div class="post-profile-icon">
                        @if (is_external_url($post->user->profile_picture))
                            <img src="{{ $post->user->profile_picture }}" alt="Profile Picture"><i class="fa fa-caret-down"></i>
                        @elseif ($post->user->profile_picture)
                            <img src="{{ asset('profile_picture/' . $post->user->profile_picture) }}"
                                alt="Profile Picture"><i class="fa fa-caret-down"></i>
                        @else
                            <img src="{{ asset('assets/images/default_profile.jpg') }}" alt="Profile Picture"><i class="fa fa-caret-down"></i>
                        @endif
                        {{-- @if ($post->user->profile_picture)
                            <img src="{{ asset('profile_picture/' . $post->user->profile_picture) }}"
                                alt="Profile Picture"><i class="fa fa-caret-down"></i>
                        @else
                            <img src="{{ asset('assets/images/default_profile.jpg') }}" alt="Profile Picture"><i
                                class="fa fa-caret-down"></i>
                        @endif --}}
                    </div>
                </div>
            </div>
        @empty
            <p>No posts available.</p>
        @endforelse

        <!-- Comment Modal -->
        <div id="commentModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <div class="modal-header">
                    <h2>Comments</h2>
                </div>
                <div class="modal-body">
                    <div id="commentsContainer"></div>
                    <form id="commentsForm">
                        @csrf
                        <div class="add-comment">
                            <input type="text" id="modalCommentInput" class="comment-input"
                                placeholder="Add a comment...">
                            <button id="modalSubmitComment" class="submit-comment" data-post-id="">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="load-more-btn">Load More</button>

    <script type="text/javascript">
        var postStore = "{{ route('home.store') }}";
    </script>

    <script>
        var likeBlueImageUrl = "{{ asset('assets/images/like-blue.png') }}";
        var likeImageUrl = "{{ asset('assets/images/like.png') }}";
        var commentsImageUrl = "{{ asset('assets/images/comments.png') }}";
        var shareImageUrl = "{{ asset('assets/images/share.png') }}";
    </script>

    <script>
        var assetBaseUrl = "{{ asset('') }}";
    </script>

    <script type="text/javascript">
        var unlikeUrl = "{{ route('unlike') }}";
        var likeUrl = "{{ route('like') }}";
    </script>

    <script type="text/javascript">
        var commentUrl = "{{ route('comments.store') }}";
    </script>

    <script src="{{ url('javascript/post.js') }}"></script>
    <script src="{{ url('javascript/likes.js') }}"></script>
    <script src="{{ url('javascript/comments.js') }}"></script>
@endsection
