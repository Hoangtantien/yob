@if (auth()->user() )
<div class="header">
    <div class="header_wrap">
        <div class="user-name">
            <img src="{{asset('images/avatar.webp')}}" alt="">
        </div>
        <div class="user-control-menu">
            <a href=""> profile</a>
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
             {{ __('Logout') }}
         </a>

         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
         </form>
        </div>
    </div>
</div>
@endif