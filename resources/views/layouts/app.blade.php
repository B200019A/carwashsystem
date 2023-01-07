<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CWRMS</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital@1&display=swap" rel="stylesheet">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <!-- Scripts -->
    @vite(['resources/js/app.js'])

    <!-- NavBar -->
    <link rel="stylesheet" href="/css/Layout/navbar.css">

</head>
@if (Session::has('loginError'))
    <!---for deactivate user alert--->
    <div class="alert alert-danger" role="alert">
        {{ Session::get('loginError') }}
    </div>
@endif

@if (Session::has('Success'))
    <div class="alert alert-success" style="margin-bottom:-4px !important" role="alert">
        {{ Session::get('Success') }}
    </div>
@endif

@if (Session::has('Danger'))
    <div class="alert alert-danger" style="margin-bottom:-4px !important" role="alert">
        {{ Session::get('Danger') }}
    </div>
@endif


<style>
    .nav-link-modify {
        font-size: 15px !important;
        padding: 7.5px !important;
        font-family: Verdana, sans-serif;

    }
</style>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand nav-link-modify" href="{{ url('/') }}">
                    CWRMS
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link nav-link-modify" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <!--<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Register Type</a>
                                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">-->
                                    <a class="nav-link nav-link-modify"
                                        href="{{ route('register') }}">{{ __('Register') }}</a>
                                    <!--<a class="dropdown-item" href="{{ route('registerWithInv') }}">{{ __('Register With Inv') }}</a>
                                                        <a class="dropdown-item" href="{{ route('registerAdmin') }}">Register with Admin</a>
                                                    </div>-->
                                </li>
                            @endif
                        @else
                            <!-- role equals 0 is normal user------->
                            @if (Auth::user()->role == 0 || Auth::user()->role == 3)
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link nav-link-modify dropdown-toggle" href="#"
                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        v-pre>Reservation</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('viewMyReservation') }}">My reservation</a>
                                        <a class="dropdown-item" href="{{ route('viewSelectService') }}">Add
                                            reservation</a>
                                    </div>
                                </li>
                                <li class="nav-item-motion"><a href="{{ route('notification') }}"
                                        class="nav-link nav-link-modify px-2 text-dark nav-link-modify">Notification</a>
                                </li>
                                <li class="nav-item-motion"><a href="{{ route('referral') }}"
                                        class="nav-link nav-link-modify px-2 text-dark">Referral<span
                                            class="badge bg-danger">{{ Session()->get('cartItem') }}</span></a></li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link nav-link-modify dropdown-toggle" href="#"
                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" v-pre>Profile</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('myProfile') }}">My profile</a>
                                        <a class="dropdown-item" href="{{ route('changePassword') }}">Change Password</a>
                                        <a class="dropdown-item" href="{{ route('membership') }}">Membership</a>
                                        <a class="dropdown-item" href="{{ route('CarWashPackageSubscription') }}">Car
                                            wash package subscriptions</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                <input type="search" name="keyword" id="keyword"
                                    class="form-control  nav-link-modify form-control-dark" onkeyup="searchFunction()"
                                    placeholder="Search" aria-label="Search">

                                <!-- end role equals 0 is normal user------->

                                <!-- role equals 1 is admin------->
                            @elseif(Auth::user()->role == 1)
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link nav-link-modify dropdown-toggle"
                                        href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" v-pre>Reservation</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item"
                                            href="{{ route('viewReservationManagementDate') }}">Today
                                            reservation</a>
                                        <a class="dropdown-item" href="{{ route('viewReservationManagement') }}">All
                                            reservation</a>
                                    </div>
                                </li>
                                <li class="nav-item-motion"><a href="{{ route('viewMembershipManagement') }}"
                                        class="nav-link nav-link-modify px-2 text-dark">Membership </a></li>
                                <li class="nav-item-motion"><a href="{{ route('viewPackageSubscriptionManagement') }}"
                                        class="nav-link nav-link-modify px-2 text-dark">Package <span
                                            class="badge bg-danger"></span></a>
                                </li>
                                <li class="nav-item-motion"><a href="{{ route('viewNotificationManagement') }}"
                                        class="nav-link nav-link-modify px-2 text-dark">Notification <span
                                            class="badge bg-danger"></span></a></li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" v-pre>Reward</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('viewReferralManagement') }}">Referral
                                            reward</a>
                                        <a class="dropdown-item" href="{{ route('viewMemberPointManagement') }}">Member
                                            point </a>
                                    </div>
                                </li>
                                <input type="search" name="keyword" id="keyword"
                                    class="form-control  nav-link-modify form-control-dark" onkeyup="searchFunction()"
                                    placeholder="Search" aria-label="Search">
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" v-pre>
                                        Admin {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('myProfile') }}">Profile</a>
                                        <a class="dropdown-item" href="{{ route('changePassword') }}">Change Password</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                <!-- end role equals 1 is admin------->

                                <!-- role equals 2 is headadmin------->
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link nav-link-modify dropdown-toggle"
                                        href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" v-pre>Reservation</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item"
                                            href="{{ route('viewReservationManagementDate') }}">Today
                                            reservation</a>
                                        <a class="dropdown-item" href="{{ route('viewReservationManagement') }}">All
                                            reservation</a>
                                    </div>
                                </li>
                                <li class="nav-item-motion"><a href="{{ route('viewMembershipManagement') }}"
                                        class="nav-link nav-link-modify px-2 text-dark">Membership </a></li>
                                <li class="nav-item-motion"><a href="{{ route('viewPackageSubscriptionManagement') }}"
                                        class="nav-link nav-link-modify px-2 text-dark">Package <span
                                            class="badge bg-danger"></span></a>
                                </li>
                                <li class="nav-item-motion"><a href="{{ route('viewNotificationManagement') }}"
                                        class="nav-link nav-link-modify px-2 text-dark">Notification <span
                                            class="badge bg-danger"></span></a></li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link nav-link-modify dropdown-toggle"
                                        href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" v-pre>Reward</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('viewReferralManagement') }}">Referral
                                            reward</a>
                                        <a class="dropdown-item" href="{{ route('viewMemberPointManagement') }}">Member
                                            point </a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link nav-link-modify dropdown-toggle"
                                        href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" v-pre>Head Amin</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item"
                                            href="{{ route('viewCustomerAccountManagement') }}">Customer</a>
                                        <a class="dropdown-item" href="{{ route('viewBranchManagement') }}">Branch</a>
                                        <a class="dropdown-item" href="{{ route('viewServiceManagement') }}">Services</a>
                                        <a class="dropdown-item" href="{{ route('viewRefundManagement') }}">Refund</a>
                                        <!-- <a class="dropdown-item" href="{{ route('registerAdmin') }}">Register</a>-->
                                    </div>
                                </li>
                                <input type="search" name="keyword" id="keyword"
                                    class="form-control nav-link-modify form-control-dark" onkeyup="searchFunction()"
                                    placeholder="Search" aria-label="Search">
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link nav-link-modify dropdown-toggle"
                                        href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" v-pre>
                                        Admin {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('myProfile') }}">Profile</a>
                                        <a class="dropdown-item" href="{{ route('changePassword') }}">Change Password</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endif
                            <!-- end role equals 2 is headadmin------->

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>
</body>

</html>
