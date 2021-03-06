
<!--ОСНОВНОЙ ЛЕЙАУТ САЙТА-->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}")>
    {{-- HEAD --}}
    <head>
        @include('feed::links')
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title') {{config('site_title')}}</title>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/scripts.js') }}" defer></script>
        <!-- jQuery -->
        <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>

        {{-- TrumboWYG Text Editor --}}
        <script>window.jQuery || document.write('{{ asset('js/jquery-3.4.1.min.js') }}')</script>
        <script src="{{ asset('js/trumbowyg/trumbowyg.min.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('js/trumbowyg/ui/trumbowyg.min.css') }}">

        <!-- FontAwesome -->
        <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
        <!--Shared Scripts-->
        <script src="{{ asset('js/custom/shared/shared.js') }}"></script>
        <script src="{{ asset('js/custom/search.js') }}"></script>
        {{--  jQuery - RichText --}}
        <script src="{{ asset('js/jquery.richtext.min.js') }}"></script>
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        <link href="{{ asset('css/animations.css') }}" rel="stylesheet">

        <link href="{{ asset('css/richtext.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/jquery.tag-editor.css') }}" rel="stylesheet">
        <link href="{{ asset('css/plyr.css') }}" rel="stylesheet">
        <link href="{{ asset('css/basic.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
        <link href="{{ asset('css/tags-input.css') }}" rel="stylesheet">
        <!-- Bulma Extensions -->
        <link href="{{ asset('css/bulma-tooltip.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bulma-divider.min.css') }}" rel="stylesheet">
        <link href="{{asset('css/bulma-checkradio.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/bulma-radio-checkbox.min.css')}}" rel="stylesheet">

        <link href="{{ asset('css/bulma_override.css') }}" rel="stylesheet">
    </head>
<body style="background-color: {{config('settings')->bg_color}}">
        <div id="background_elem" style="background-image: url({{asset('/storage/'.config('settings')->bg_image) }}"">
            <h1>&nbsp;</h1>
        </div>

      <button class="rollup_button invisible" id="rollup_button">
          <span>
              <i class="fas fa-chevron-up" style="font-size: 1.8rem;"></i>
          </span>
      </button>

        <section class="hero header">
            <div class="hero-body">
                <div class="container has-text-centered">
                    <h1 class="title web-site-title">
                        {{config('settings')->site_title}}
                    </h1>
                    <h2 class="subtitle web-site-subtitle">
                        {{config('settings')->site_subtitle}}
                    </h2>
                </div>
            </div>
        </section>

        <nav class="navbar" id="navigation" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item">

                </a>
                @if(config('isMobile') == true)

                    <a href="/" id="home_button" class="home_button invisible has-text-info">
                        <span class="icon is-medium">
                            <i class="fas fa-home fa-2x"></i>
                        </span>
                    </a>
                    @if(Auth::check())
                        @if(Auth::user()->user_type == 0 || Auth::user()->user_type == 1)
                        <a href="/control" id="home_button" class="contol_panel_button has-text-info">
                            <span class="icon is-medium">
                                <i class="fas fa-cog fa-2x"></i>
                            </span>
                        </a>
                        @endif

                        <a class="navbar-item logout_mobile">
                            <span class="icon has-text-info has-tooltip-left" data-tooltip="Logout"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-2x"></i>
                            </span>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="invisible">
                                @csrf
                            </form>
                        </a>
                    @endif

                @endif

                <a role="button" id="nav-toggle" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="nav-menu" class="navbar-menu">
                <div class="navbar-start">
                    @if(config('isMobile') == true)
                        <div class="" style="margin-left: 30pt;">
                            <form action="/full_search" method="GET">
                            @csrf
                            <div class="field has-addons">
                                <div class="control has-icons-left has-icons-right"  style="width:60%;" id="search_bar_div">
                                    <input type="text" name="type" value="post" class="invisible">
                                    <input class="input" type="text" placeholder="Search" id="search_bar" name="search_value" value="{{$val ?? '' }}">
                                    <span class="icon is-small is-left">
                                    <i class="fas fa-search"></i>
                                    </span>
                                </div>
                                <div class="control">
                                    <button class="button is-link">
                                    Search
                                    </button>
                                </div>
                                </div>
                            </form>
                        </div>
              
                    @endif

                    <a class="navbar-item" href="/">
                        Home
                    </a>

                    @foreach(config('categories') as $categ)
                        <a class="navbar-item" href="/category/{{strtolower($categ->category_name)}}">
                        {{$categ->category_name}}
                        </a>
                    @endforeach

                    @if(config('settings')->show_about == 1)
                    <a class="navbar-item" href="/about">
                        About
                    </a>
                    @endif

                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            Links
                        </a>
                        <div class="navbar-dropdown" >
                            @foreach(config('social_media') as $item)
                                <a class="navbar-item" target="_blank" href={{$item->url}}>
                                    {{$item->platform_name}}
                                </a>
                            @endforeach
                            @if(count(config('social_media'))>0)
                            <hr class="navbar-divider">
                            @endif
                            <a class="navbar-item" id="showModalContact">
                                Contact
                            </a>
                        </div>
                    </div>
                </div>


                @if(Auth::check())
                    <div class="navbar-end">
                        <a class="navbar-item has-tooltip-bottom" data-tooltip="It's you! :)">
                            {{Auth::user()->name}}
                        </a>
                       
                        <a class="navbar-item" href="/control">
                            Control panel
                        </a>
                  
                        <a class="navbar-item">
                            <span class="icon has-text-info has-tooltip-left" data-tooltip="Logout"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>
                            </span>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="invisible">
                                @csrf
                            </form>
                        </a>
                    </div>
                @endif
            </div>
        </nav>

        {{-- content --}}
        <main id="main_content" class="py-4">
            @yield('content')
        </main>
        </div>
        
        <div class="modal" id="contact-modal">
            <div class="modal-background"></div>
            <div class="modal-content">
                <article class="message">
                    <div class="message-header">
                        <p>Contact</p>
                    </div>
                    <div class="message-body"> 
                        <div id="contact_content">
                            @if(config('settings')->contact_email !=null)
                            @if(config('settings')->contact_text)
                                <p>{{config('settings')->contact_text}}</p>
                            @endif
                                <p>Contact E-mail: {{config('settings')->contact_email}}</p>
                            @if(config('settings')->contact_text || config('settings')->contact_email)
                                <div class="is-divider"></div>
                            @endif
                            <div class="field">
                                <div class="control">
                                    <input type="email" class="input" id="contact_email" placeholder="Your email (optional)">
                                    <p class="help">Type your E-mail adress here, in case you want to get a reply (optional)</p>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input type="message_title" class="input" id="contact_title" placeholder="Subject of your message (optional)">
                                    <p class="help">Subject of your message (optional)</p>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                <textarea class="textarea contact_feedback" id="contact_feedback" placeholder="Your message"></textarea>
                                <p class="help">Your message</p>
                                </div>
                            </div>
                            <div class="field is-grouped">
                                <div class="control">
                                    <button class="button is-link" id="contact_submit">
                                        <span class="icon">
                                        <i class="fa fa-envelope"></i>
                                        </span>
                                        <span>Send</span>
                                    </button>
                                </div>
                            </div> 
                        @else
                            <div class="has-text-centered">
                                <h1 class="subtitle has-text-centered">Contact form is not available now</h1>
                                <span ><i class="fas fa-envelope"></i></span>
                                <p>Come again later</p>
                                
                            </div>
                        @endif 
                   
                        </div>

                        <article id="contact_overlay" class="invisible">
                            <div class="has-text-centered">
                  
                                <div id="contact_ring">
                                    <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
                                </div>
                               
                                <div id="contact_envelope" class="invisible">
                                    <span class="icon is-large has-text-link">
                                        <i class="fas fa-3x fa-envelope"></i>
                                      </span>
                                </div>
                                <div id="contact_sending">Sending your message...</div>
                                <div id="contact_sent" class="invisible">Your message has been sent!</div>
                              
                                <br>
                                <button id="contact_okay" class="button is-link" disabled>Okay!</button>
                            </div>
                        </article> 
                       
                    </div>
                </article>
             
            </div>
            <button class="modal-close is-large" id="contact_close" aria-label="close"></button>
        </div>

        {{-- Cookies Message --}}
        @if(config('isMobile') == false)
            <div class="white-bg invisible cookies_message" id="cookies_message">
                <p>This web-site uses cookies to enhance your experience. It is used for the user interface to work properly.</p>
                <hr>
                <button id="ok_cookie" class="button is-link">
                    <span class="icon is-small">
                        <i class="fa fa-cookie-bite"></i>
                    </span>
                    <span>Got it!</span>
                </button>
            </div>
        @else
            <div class="white-bg invisible cookies_message_mobile" id="cookies_message">
                <p>This web-site uses cookies to enhance your experience. It is used for the user interface to work properly.</p>
                <br>
                  <button id="ok_cookie" class="button is-link is-small is-fullwidth">
                      <span class="icon is-small">
                          <i class="fa fa-cookie-bite"></i>
                      </span>
                      <span>Got it!</span>
                    </button>
            </div>
        @endif

        @yield('modals')

        <div id="notifications" class="notifications">

        </div>
    </body>
</html>

@stack('scripts')
