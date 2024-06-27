@if (auth()->user()->type == 2)
    @include('layouts.sidebar.user2')
@elseif(auth()->user()->type == 0)
    @include('layouts.sidebar.user1')
@elseif(auth()->user()->type == 1)
    @include('layouts.sidebar.user1')
@endif
