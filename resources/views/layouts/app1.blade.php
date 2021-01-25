<!DOCTYPE html>
<html lang="{{ config('app1.locale') }}">
    <head>
        <title>{{ config('', 'Job Portal') }}</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

       
        <script src="https://use.fontawesome.com/9712be8772.js"></script>
        @yield('styles')
    </head>

    <body>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ url('/') }}" style="color:#2E86C1;">
                        {{ config('', 'Job Portal') }}
                    </a>
                </div>
                <ul class="nav navbar-nav">
                    
                    <li><a href="{{ url('/show') }}" class="w3-hover-teal">Jobs Vacancy</a></li>
                    
                    @can('Administer roles & permissions' )
                        <li><a href="{{ route('jobs.create') }}" class="w3-hover-teal">Create Job</a></li>
                        <li><a href="{{ route('permissions.index') }}" class="w3-hover-teal">Permissions</a></li>
                        <li><a href="{{ route('roles.index') }}" class="w3-hover-teal">Roles</a></li>
                        <li><a href="{{ route('users.index') }}" class="w3-hover-teal">Users</a></li>
                    @endcan
                    <li><a href="{{ url('countries') }}" class="w3-hover-teal">Countries <sup>(REST API)</sup></a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}" class="w3-hover-teal">Login</a></li>
                            <li><a href="{{ route('register') }}" class="w3-hover-teal">Register</a></li>
                        @else
                            <li class="dropdown">
                                <li href="#" class="dropdown-toggle w3-text-black" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"><a href="{{ route('logout') }}" class="w3-hover-teal"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </li> <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        </span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        @role('Admin') {{-- Laravel-permission blade helper --}}
                                        <a href="#"><i class="fa fa-btn fa-unlock"></i>Admin</a>
                                        @endrole
                                        
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
            </div>
        </nav>

        @if(Session::has('flash_message'))
            <div class="container">      
                <div class="alert alert-success"><em>
                    {!! session('flash_message') !!}</em>
                </div>
            </div>
        @endif 

        <div class="row">
            <div class="col-md-8 col-md-offset-2">              
                @include ('errors.list') {{-- Including error file --}}
            </div>
        </div>
        @yield('content')
    </body>
</html>