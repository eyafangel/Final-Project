
<nav class="navbar navbar-expand-md navbar-inverse bg-black navbar-style">
        
     <div class="container navbar-height">

     <div class="nav-font">
        <img class="logo"src="{{ asset('/images/heart.png') }}" />
       
     </div> 
     
     

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <!-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif -->
                        @else


                                {{-- Bell Notification --}}
                        <li class="nav-item dropdown" style="margin-top: 9px;">
                            <a id="navbarDropdown" class="bell-notif dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa fa-bell"></i>
                                @if(auth()->user()->unreadnotifications->count())
                            <span class="badge badge-light">{{auth()->user()->unreadnotifications->count()}}</span>
                                @endif
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <li><a style="color: green" class="dropdown-item" href="{{route('markRead')}}">Mark All As Read</a></li>
                                @foreach(auth()->user()->unreadNotifications as $notification)
                            <li><a class="dropdown-item" style="background-color: lightgray" href="#">{{$notification->data['data']}}</a></li> 
                            @endforeach                               
                            </ul>
                        </li> 
                        {{-- End of Bell Notification --}}
                                


                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-font nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Home</a>
                                    <a class="dropdown-item" href="#">Patient List</a>
                                    <a class="dropdown-item" href="#">Orders</a>
                                    <a class="dropdown-item" href="#">Calendar</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
    </div>
</nav>