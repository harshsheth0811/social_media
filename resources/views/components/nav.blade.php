<div class="nav-left">
    <img src="{{ asset('assets/images/logo.png') }}" alt="SocialBook logo" class="logo">

    <ul>
        <li><img src="{{ asset('assets/images/notification.png') }}" alt="Notification logo"></li>
        <li><img src="{{ asset('assets/images/inbox.png') }}" alt="Inbox logo"></li>
        <li><img src="{{ asset('assets/images/video.png') }}" alt="Video logo"></li>
    </ul>
</div>
<div class="nav-right">
    <div class="search-box">
        <img src="{{ asset('assets/images/search.png') }}" alt="Search logo">
        <input type="text" name="search" id="search" placeholder="Search">
    </div>

    <div class="nav-user-icon online" onclick="settingsMenuToggle()">
        @if (Auth::check() && Auth::user()->profile_picture)
            <img src="{{ asset('profile_picture/' . Auth::user()->profile_picture) }}" alt="Profile Picture">
        @else
            <img src="{{ asset('assets/images/default_profile.jpg') }}" alt="Profile Picture">
        @endif
    </div>
</div>

<div class="settings-menu">
    <div id="dark-btn">
        <span></span>
    </div>
    <div class="settings-menu-inner">
        <div class="user-profile">
            @if (Auth::check() && Auth::user()->profile_picture)
                <img src="{{ asset('profile_picture/' . Auth::user()->profile_picture) }}" alt="Profile Picture">
            @else
                <img src="{{ asset('assets/images/default_profile.jpg') }}" alt="Profile Picture">
            @endif
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
        <div class="user-profile">
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
        </div>
        <div class="settings-links">
            <img src="{{ asset('assets/images/logout.png') }}" alt="Logout logo" class="settings-icon">
            <a href="/logout">Logout <img src="{{ asset('assets/images/arrow.png') }}" alt="Arroe logo"
                    width="8px"></a>
        </div>
    </div>
</div>
