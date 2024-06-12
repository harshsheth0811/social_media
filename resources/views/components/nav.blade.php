<div class="nav-left">
    <a href="/" style="text-decoration: none"><img src="{{ asset('assets/images/logo.png') }}" alt="SocialBook logo"
            class="logo"></a>

    <ul>
        <li class="notification-icon" onclick="toggleNotificationMenu()">
            <img src="{{ asset('assets/images/notification.png') }}" alt="Notification logo">
        </li>
        {{-- <li><img src="{{ asset('assets/images/inbox.png') }}" alt="Inbox logo"></li>
        <li><img src="{{ asset('assets/images/video.png') }}" alt="Video logo"></li> --}}
    </ul>
</div>
<div class="nav-right">
    {{-- <div class="search-box">
        <img src="{{ asset('assets/images/search.png') }}" alt="Search logo">
        <input type="text" name="search" id="search" placeholder="Search">
    </div> --}}

    <div class="nav-user-icon online" onclick="settingsMenuToggle()">
        <img src="{{ is_external_url(auth()->user()->profile_picture) ? auth()->user()->profile_picture : asset('profile_picture/' . auth()->user()->profile_picture) }}"
            alt="Profile Picture">
    </div>
</div>


<div class="notification-menu">
    <div class="notification-menu-inner">
        <h4>Notifications</h4>
        <div>
            @if ($notification->isEmpty())
                <p>No notifications</p>
            @else
                <div class="notification-container">
                    @foreach ($notification as $notifications)
                        <div
                            class="notification-item p-3 bg-white dark:bg-gray-900 mb-2 border-2 border-gray-700 rounded-lg">
                            <div class="flex items-center">
                                <img class="object-cover w-12 h-12 rounded-full"
                                    src="{{ asset('post_images/' . $notifications->data['post_image']) }}"
                                    alt="Profile Image" />
                                <div class="ml-3 overflow-hidden">
                                    <p class="font-medium text-gray-800 dark:text-gray-200">
                                        {{ $notifications->data['username'] }}</p>
                                    <p class="max-w-xs text-sm text-gray-600 dark:text-gray-400 truncate">
                                        liked your post
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>

<div class="settings-menu">
    <div id="dark-btn">
        <span></span>
    </div>
    <div class="settings-menu-inner">
        <div class="user-profile">
            <img src="{{ is_external_url(auth()->user()->profile_picture) ? auth()->user()->profile_picture : asset('profile_picture/' . auth()->user()->profile_picture) }}"
                alt="Profile Picture">
            <div>
                <p>
                    @if (Auth()->user())
                        {{ Auth()->user()->username }}
                    @endif
                </p>
                <a href="/profile">See Your Profile</a>
            </div>
        </div>
        <hr>
        {{-- <div class="user-profile">
            <img src="{{ asset('assets/images/feedback.png') }}" alt="Feedback logo">
            <div>
                <p>Give Feedback</p>
                <a href="#">Help us to improve the new Design</a>
            </div>
        </div>
        <hr>
        <div class="settings-links">
            <img src="{{ asset('assets/images/setting.png') }}" alt="Setting logo" class="settings-icon">
            <a href="#">Settings & Privacy <img src="{{ asset('assets/images/arrow.png') }}" alt="Arroe logo"
                    width="8px"></a>
        </div>
        <div class="settings-links">
            <img src="{{ asset('assets/images/help.png') }}" alt="Help logo" class="settings-icon">
            <a href="#">Help & Support <img src="{{ asset('assets/images/arrow.png') }}" alt="Arroe logo"
                    width="8px"></a>
        </div>
        <div class="settings-links">
            <img src="{{ asset('assets/images/display.png') }}" alt="Display logo" class="settings-icon">
            <a href="#">Display & Accessibility <img src="{{ asset('assets/images/arrow.png') }}"
                    alt="Arroe logo" width="8px"></a>
        </div> --}}
        <div class="settings-links">
            <img src="{{ asset('assets/images/logout.png') }}" alt="Logout logo" class="settings-icon">
            <a href="/logout">Logout <img src="{{ asset('assets/images/arrow.png') }}" alt="Arroe logo"
                    width="8px"></a>
        </div>
    </div>
</div>
