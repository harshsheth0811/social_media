<meta name="csrf-token" content="{{ csrf_token() }}">

{{-- <div class="sidebar-title">
    <h4>Events</h4>
    <a href="#">See All</a>
</div>
<div class="event">
    <div class="left-event">
        <h3>18</h3>
        <span>March</span>
    </div>
    <div class="right-event">
        <h4>Social Media</h4>
        <p><i class="fa fa-map-marker-alt" aria-hidden="true"></i> willson Tech Park</p>
        <a href="#">More Info</a>
    </div>
</div>
<div class="event">
    <div class="left-event">
        <h3>22</h3>
        <span>June</span>
    </div>
    <div class="right-event">
        <h4>Mobile Marketing</h4>
        <p><i class="fa fa-map-marker-alt" aria-hidden="true"></i> willson Tech Park</p>
        <a href="#">More Info</a>
    </div>
</div> --}}

<div class="sidebar-title">
    <h4>Advertisement</h4>
    {{-- <a href="#">Close</a> --}}
</div>
<img src="{{ asset('assets/images/advertisement.png') }}" alt="Advertisement logo" class="sidebar-ads">

<div class="sidebar-title">
    <h4>Suggession</h4>
    {{-- <a href="#">Hide Chat</a> --}}
</div>
@foreach ($users as $user)
    <div class="online-list">
        <div class="online">
            <img src="{{ asset('profile_picture/' . $user->profile_picture) }}"
                alt="{{ $user->username }}'s profile picture">
        </div>
        <p>{{ $user->username }}</p>
        <button class="add-friend-btn" data-user-id="{{ Auth::id() }}" data-friend-id="{{ $user->id }}">+Add
            Friend</button>
    </div>
@endforeach

<script type="text/javascript">
    var friendStore = "{{ route('friends.store') }}";
</script>

<script src="{{ url('javascript/friends.js') }}"></script>
