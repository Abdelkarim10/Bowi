<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bowi</title>

        <link href="/css/main.css" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>  
        @livewireStyles      
        <script src="/js/main.js" defer></script>
    </head>
    <body class="antialiased">
      <div class="holBody">
        <header id="header">
            <nav>
                <div class="container">
                <div class="logo">
                  <a href="{{ route('home.index') }}">
                    <img src="/images/bowi-logo.png" alt="" />
                  </a>
                </div>
    
                <div class="links">
                    <ul>
                      <li>
                        <a class="noneactive" href="{{ route('pricing') }}" >{{__('pricing')}}</a>
                      </li>

                      @if(Auth::user())
                        <li>
                          <a class="noneactive" href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">{{__('logout' )}}
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                          </form>
                        </li>
                      @else
                        <li>
                            <a class="noneactive" href="{{ route('home') }}" target="_blank">{{__('login')}}</a>
                        </li>
                      @endif

                      <li>
                          <a class="active" href="{{ route('becomePartner') }}">{{__('Become a partner')}}</a>
                      </li>
                    </ul>
                </div>
    
                <div class="hamburger-menu">
                    <div class="bar"></div>
                </div>
                </div>
            </nav>
        </header>


        @yield('content')

      </div>
        <footer class="footer" id="footer">
            <div class="container">
              <div class="grid-4">
                <div class="grid-4-col footer-links">
                    <h3 class="title-sm">{{__('Company')}}</h3>
                    <ul>
                        <li>
                          <a href="{{ route('aboutUs') }}">{{__('About us')}}</a>
                        </li>
                        <li>
                          <a href="{{ route('newsRoom') }}">{{__('Newsroom')}}</a>
                        </li>
                        <li>
                          <a href="{{ route('careers') }}">{{__('Careers')}}</a>
                        </li>
                        <li>
                          <a href="{{ route('contactUs') }}">{{__('Contact us')}}</a>
                        </li>
                    </ul>
                </div>
                <div class="grid-4-col footer-links">
                  <h3 class="title-sm">{{__('How it Works')}}</h3>
                  <ul>
                    <li>
                      <a href="{{ route('mediaAssets') }}">{{__('Media assets')}}</a>
                    </li>
                    <li>
                      <a href="{{ route('rulesOfUse') }}">{{__('Rules of use')}}</a>
                    </li>
                    <li>
                      <a href="{{ route('FAQs') }}">{{__('FAQs')}}</a>
                    </li>
                  </ul>
                </div>
      
                <div class="grid-4-col footer-links">
                  <h3 class="title-sm">{{__('Legal')}}</h3>
                  <ul>
                    <li>
                      <a href="{{ route('terms') }}">{{__('Terms')}}</a>
                    </li>
                    <li>
                      <a href="{{ route('privacy') }}">{{__('Privacy Policy')}}</a>
                    </li>
                    <li>
                      <a href="{{ route('returnPolicy') }}">{{__('Return Policy')}}</a>
                    </li>
                  </ul>
                </div>
      
                <div class="grid-4-col footer-newstletter">
                  <h3 class="title-sm">{{__('Countries')}}</h3>
                  <ul>
                    {{-- <li>
                      <i class='bx bx-map'></i> Moldova
                    </li> --}}
                    @foreach($countries as $country)
                      <li>
                        {{$country->name}}
                      </li>
                    @endforeach
                  </ul>
                </div>
              </div>
      
              <div class="bottom-footer">
                <div class="copyright">
                  <p class="text">
                    Bowi International S.A.R.L
                  </p>
                </div>
                <div class="language">
                  <i class='bx bx-world'></i>     
                  <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn">{{ Session::get('locale') }}</button>
                    <div id="myDropdown" class="dropdown-content">
                      @foreach (App\Http\Controllers\Controller::LOCALES as $locale => $label)
                          <a href="locale/{{ $locale }}">{{ $label }}</a> 
                      @endforeach
                    </div>
                  </div>
                </div>
                <div class="followme-wrap">
                  <div class="followme">
                    <div class="social-media">
                        <a href="#">
                            <i class='bx bxl-facebook-square'></i>
                        </a>
                        <a href="#">
                            <i class='bx bxl-twitter' ></i>
                        </a>
                        <a href="#">
                            <i class='bx bxl-instagram' ></i>
                        </a>
                        <a href="#">
                            <i class='bx bxl-linkedin-square'></i>
                        </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </footer>
        @livewireScripts
    </body>
</html>
