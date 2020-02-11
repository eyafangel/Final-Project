<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LifeLine</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .position-ref {
                position: absolute;
            }

            .top-right {
                position: relative;
                margin-left: 1290px;
                margin-top: 18px;
            }

            .content {
                text-align: center;
                margin-top: 180px;
            } 

            .title {
                font-size: 84px;
                text-align: left;
                margin-left: 150px;
                padding-bottom: 150px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
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


                    @if (Route::has('register'))  
                        <a href="{{ route('register') }}">Register</a>
                     @endif         
                            
                       
                        

                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                LifeLine 
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Home</a>
                    <a href="https://laracasts.com">About</a>
                    <a href="https://laravel-news.com">Contacts</a>
                </div>
            </div>
        </div>
    </body>
</html>
