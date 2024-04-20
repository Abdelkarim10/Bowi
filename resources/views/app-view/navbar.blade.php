  {{-- @guest
                                            @if (Route::has('login'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                            </li>
                                            @endif

                                            @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                            @endif
                                            @else --}}
                                            {{--

<div class="wrapper">
    <div class="sidebar">
                    <div id="app">
                            <nav class="navbar navbar-expand-md navbar-light   shadow p-3 mb-5 " style="height: 100px;">
                                <div class="container">

                                    <!-- <img src="" alt="logo" style="height:90px;" style="justify-content:center;">  -->
                                    <!-- UP IS THE LOGO -->


                                    <a class="navbar-brand btn" href="/home" style="margin:0 ;padding:0px 0 0 0;">
                                        <p    class="h2" style="font-weight:600;font-size:25px;text-shadow:2px 2px 4px #898483 ;"> Dashboard <p>
                                    </a>

                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>

                                    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="display:flex">
                                        <!-- Left Side Of Navbar -->




                                        <!-- Right Side Of Navbar -->
                                        <ul class="navbar-nav ms-auto">
                                            <!-- Authentication Links -->

                                            <ul class="navbar-nav me-auto" style="padding-left: 00px; ">

                                            <li>
                                                    <div class="sectionsNav" style="width:25%;height:100%;text-decoration: none;">
                                                        <a id="users_section" href="/contact-us" class="btn" style="">
                                                            <img  src="" alt="" style="height: 50px;width:50px;">
                                                            <p style="font-weight:600;">ContactUs</p>
                                                        </a>
                                                    </div>
                                                </li>



                                            <li>
                                                    <div   style="width:25%;height:100%;text-decoration: none;">
                                                        <a id="" href="" class="btn" style="">
                                                            <img src="" alt="" style="height: 50px;width:50px;">
                                                            <p style="font-weight:600;"> Sponsors</p>
                                                        </a>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div style="width:25%;height:100%;text-decoration: none;">
                                                        <a id="" href="" class="btn" style="">
                                                            <img src="" alt="" style="height: 50px;width:50px;">
                                                            <p style="font-weight:600;"> Partners</p>
                                                        </a>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div style="width:25%;height:100%;text-decoration: none;">
                                                        {{-- <a id="" href="/offers" class="btn" style="">
                                                            <img src="" alt="" style="height: 50px;width:50px;">
                                                            <p style="font-weight:600;"> Offers</p>
                                                        </a> --}}
                                                    {{-- </div>
                                                </li>

                                                <li>
                                                    <div style="width:25%;height:100%;text-decoration: none;">
                                                        <a id="users_section" href="/merchants" class="btn" style="">
                                                            <img src="{{env('APP_URL') . 'public/svg/shop-svgrepo-com.svg'}}" alt="" style="height: 50px;width:50px;">
                                                            <p style="font-weight:600;"> Merchants</p>
                                                        </a>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div id="classes_section" style="width:25%;height:100%;text-decoration: none;">
                                                        <a href="/users" class="btn" style="">
                                                            <img src="{{env('APP_URL') . '/public/svg/users-svgrepo-com.svg'}}" alt="" style="height: 50px;width:50px;">
                                                            <p style="font-weight:600;"> Users</p>
                                                        </a>
                                                    </div>
                                                </li>

                                            </ul>
                                            <li class="nav-item dropdown">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    {{ Auth::user()->name }}
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                        document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </li>
                                            @endguest
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <div>
 </div>
</div>                                 --}}
