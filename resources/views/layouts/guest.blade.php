<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato&family=Roboto&display=swap');

    </style>
    <link rel="stylesheet" href="../css/login_style.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--<title> Get Drugged | Pritom Drug Store</title>-->
    {{-- Yield the title section --}}
    <title>@yield('title')</title>
</head>

<!--Body-->
<body>
    <div class=info>
        <table class="info_table">
            <tr>
            <td style="border:None;">Call Us: 0123456789</td>
            <td>Email: Pritom@drugstore.com</td>
            <td><a style="text-decoration: none; color:white" href="#">Find a Store Near You</a></td>
            <td>Mon - Sat 8:00 - 17:30, Sunday - CLOSED</td>
            </tr>
        </table>
    </div>
    <div class="bar">
    <div class="icon"><a href="/"><img src="../image/home2.png" alt=""></a> </div>
    <div class="search">
        <form class="navbar-form" method="post" name="form1">
            <input class="form-control" type="text" name="search" placeholder="Search for products..." >
            <div class="search-button">
                <button type="submit" class="btn btn-default">Search</button>
            </div>
        </form>
    </div>
    <div class="login">
        @if (Route::has('login'))
                @auth
                    <div class="drop-profile">
                        <a href="{{ route('profile.edit') }}"><img src="../image/user.png" alt=""></a>
                        <div class="drop-profile-content">
                            <a href="{{ route('profile.edit') }}">Edit Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                        </div>
                    </div>
                    <a style="padding: 15px;" href="#"><img src="../image/heart.png" alt=""></a>
                    <a style="padding: 15px;" href="#"><img src="../image/cart.png" alt=""></a>
                    @if(auth()->user()->role == 1)
                        <a href="{{ url('/dashboard') }}"><img src="../image/dashboard.png" alt=""></a>
                        <h1 style=" margin:-10px 140px 0 -20px;text-align:center; color:#454B54;">{{ explode(' ',Auth::user()->name)[0] }}</h1>
                    @else
                        <h1 style="margin:-10px 105px 0 -20px;text-align:center; color:#454B54;">{{ explode(' ',Auth::user()->name)[0] }}</h1>
                    @endif

                @else
                <style>
                    .login
                    {
                        top: 25px;
                    }
                </style>
                    <a style="padding: 15px;" href="{{ route('login') }}"><img src="../image/user.png" alt=""></a>
                    @if (Route::has('register'))
                    <a style="padding: 15px;" href="{{ route('register') }}"><img src="../image/register2.png" alt=""></a>
                    @endif
                @endauth
        @endif
        </div>
        <div class="side_bar_btn">
            <span style="font-size:200%;cursor:pointer" onclick="openNav()"> ☰ </span>
        </div>

        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <h1>Main Menu</h1>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Clients</a>
            <a href="#">Contact</a>
        </div>

    </div>
    <script>
        function openNav()
        {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("mySidenav").style.boxShadow = "0px 0px 0px 30000px rgba(0, 0, 0, 0.5)";
        }
        function closeNav()
        {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("mySidenav").style.boxShadow = "None";
        }
    </script>
    <div class="dummy">
        <img src="../image/dummy_bar.png" alt="">
    </div>
    <!--x-guest---------------------------------------------->
    <div>
        {{ $slot }}
    </div>
    <!--x-guest----------------------------------------------->
    <div class="footer1">
        <a href="#" style="font-weight: 900;">Store Location<p style="font-size: smaller;font-weight: 400;">15051 E Alameda Pkwy, Aurora,</p><p style="font-size: smaller;font-weight: 400;">CO 80012, USA</p></a>
        <h2 style="cursor: default;">Call Us:<p style="color: rgb(103, 13, 131);">0123 456 789</p></h2>
        <h2 style="cursor: default;">Email<p style="font-size: smaller;font-weight: 400;">Pritom@drugstore.com</p></h2>
        <a href="#" style="font-weight: 900;">Your Questions<p style="font-size: smaller;font-weight: 400;">FAQs</p></a>

    </div>
    <div class="footer2">
        <p style="font-size: 16px;font-weight: 400; color: rgb(95, 95, 95);word-wrap: break-word;"> hi how are you are you good this is a test.hi how are you are you good this is a test.hi how are you are you good this is a test.hi how are you are you good this is a test.hi how are you are you good this is a test.hi how are you are you good this is a test.
        </p>
        <h1>Information
            <a href="">About Us</a>
            <a href="">FAQs</a>
            <a href="">Contact Us</a>
            <a href="">Find Us</a>
            <a href="">Terms And Conditions</a>
        </h1>

        <h1>Customer Care
            <a href="">My Account</a>
            <a href="">How to order</a>
            <a href="">Track your Order</a>
            <a href="">Customer Services</a>
            <a href="">Return Product</a>

        </h1>
        <div class="join">
            <h2>Join us: </h2>
            <a href=""></a>
            <a href=""></a>
            <a href=""></a>

        </div>
    </div>
    <div class="footer3">
        <table class="footer_table">
            <tr>
            <td>Free Easy Return<p>Return to 7days</p></td>
            <td>Fast and Easy<p>Free delivery over 400tk</p></td>
            <td>All Day Support<p>24/7 Support</p></td>
            <td>Secure Checkout<p>100% Protected</p></td>
            </tr>
        </table>
        <h1>Copyright @ 2023 Pharmacy. All rights reserved</h1>
        <h2>We Accept:  </h2>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
