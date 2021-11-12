<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Companyapp') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
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
                        @else
                            <li class="nav-item">
                                
                                    @if(Auth::user()->role_id==1)
                                        <a class="nav-link" href="{{ url('superadmin/company/detail') }}">{{ __('Company Details') }}</a>
                                    @endif
                                    @if(Auth::user()->role_id==2)
                                        <a class="nav-link" href="{{ url('admin/company/detail') }}">{{ __('Company Details') }}</a>
                                    @endif
                                    @if(Auth::user()->role_id==3)
                                        <a class="nav-link" href="{{ url('company/company/detail') }}">{{ __('Company Details') }}</a>
                                    @endif
                                    @if(Auth::user()->role_id==4)
                                        <a class="nav-link" href="{{ url('Employee/company/detail') }}">{{ __('Company Details') }}</a>
                                    @endif
                                
                            </li>
                            @if(Auth::user()->role_id==1 || Auth::user()->role_id==2 || Auth::user()->role_id==3)

                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                       Company
                                    </a>
                                    @if(Auth::user()->role_id==1 || Auth::user()->role_id==2)
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        
                                            <a class="dropdown-item" href="{{ url('superadmin/company/create') }}">{{ __('Create Company') }}</a>
        
                                            <a class="dropdown-item" href="{{ url('/superadmin/company/view') }}">{{ __('Company List') }}</a>
                                            {{-- <a class="dropdown-item" href="{{ url('/superadmin/company/edit') }}">{{ __('Edit Company') }}</a> --}}
                                            
                                        </div>
                                    @endif
                                </li>
    
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                       Employee
                                    </a>
    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                       
                                        <a class="nav-link" href="{{ url('/superadmin/employee/create') }}">{{ __('Create Employee') }}</a>
    
                                        <a class="nav-link" href="{{ url('/superadmin/employee/view') }}">{{ __('Employee List') }}</a>
    
                                        {{-- <a class="nav-link" href="{{ url('/superadmin/employee/edit') }}">{{ __('Edit Employee') }}</a> --}}
    
                                    </div>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   Welcome {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}!
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/changepassword">
                                        {{ __('Change Password') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
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

        <main class="py-4">
           <div class="container"> @include('inc.messages')</div>
            @yield('content')
        </main>
    </div>
</body>
</html>
