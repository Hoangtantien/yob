@if (auth()->user())
    <div class="header">
        <div class="header_wrap">
            <div class="user-name">
                @if (auth()->user()->avatar !== null)
                    <img src="{{ showImage(auth()->user()->avatar) }}" alt="">
                @else
                    <img src="{{ asset('images/avatar.webp') }}" alt="">
                @endif
            </div>
            <div class="user-control-menu">
                <a href="{{ route('user.show-profile', auth()->user()->id) }}"> Thông tin cá nhân</a>
                <a href="{{ route('password.change') }}"> Đổi mật khẩu</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                    Đăng xuất
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endif
