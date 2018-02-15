<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        
        <!-- Styles -->
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/modern-business.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                /*align-items: center;*/
                /*display: flex;*/
                /*justify-content: center;*/
                padding-top: 200px;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    UMW Cost Saving Initiative
                </div>

                <div class="row ">
                    <div class="col-md-8 col-md-offset-2 padding1">
                        <div class="col-md-4">
                            <a type="button" href="{{ url('/dashboard') }}" class="btn btn-lg btn-primary custom">Main Dashboard</a>
                        </div>
                        <div class="col-md-4">
                            <a type="button" href="{{ url('/group-dashboard') }}" class="btn btn-lg btn-primary custom">Group Dashboard</a>
                        </div>
                        <div class="col-md-4">
                            <a type="button" href="{{ url('/user') }}" class="btn btn-lg btn-primary custom">User Management Page</a>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-8 col-md-offset-2 padding2">
                        <div class="col-md-4">
                            <a type="button" href="{{ url('/company/index') }}" class="btn btn-lg btn-primary custom">Company Management Page</a>
                        </div>
                        <div class="col-md-4">
                            <a type="button" href="{{ url('/initiative') }}" class="btn btn-lg btn-primary custom">Initiative Management Page</a>
                        </div>
                        <div class="col-md-4">
                            <a type="button" href="{{ url('/saving') }}" class="btn btn-lg btn-primary custom">Saving Management Page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

        <!-- Script to Activate the Carousel -->
        <script>
        $('.carousel').carousel({
            interval: 5000 //changes the speed
        })
        </script>

    </body>
</html>
