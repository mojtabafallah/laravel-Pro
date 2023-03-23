<div class="card-header">
    <ul class="nav nav-pills card-header-pills">
        <li class="nav-item">
            <a href="{{route('profile')}}" class="nav-link {{ url()->current() == route('profile') ? "active" : "" }}">Index</a>
        </li>
        <li class="nav-item">
            <a href="{{route('twoFactor')}}" class="nav-link  {{ url()->current() == route('twoFactor') ? "active" : "" }}">Tow Factor Auth</a>
        </li>
    </ul>
</div>
