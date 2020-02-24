<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LifeLine</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Kelly+Slab&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Montserrat', sans-serif;
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
                margin-left: 100px;
                margin-top: 18px;
            }

            .button-default {
                background-color: #008CBA;
                border-radius: 12px;
                background-image: linear-gradient(to right, blue, purple);
            }

            .button:hover {
                background-image: linear-gradient(to right, purple, blue);
                border-radius: 12px;
            }

            .content {
                text-align: center;
                margin-top: 230px;
            } 

            .title {
                font-size: 84px;
                text-align: left;
                margin-left: 120px;
                padding-bottom: 250px;
                text-decoration-style: bold;
                text-transform: uppercase;
            }

            .title-thinner {
                font-family: 'Kelly Slab', sans-serif;
            }


            .links > a {
                color: #636b6f;
                padding: 5px 40px;
                color: white;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .link-margin {
                margin-left: 0px;
            }

            .description {
                font-size: 18px;
                text-transform: none;
            }

            .m-b-md {
                margin-top: 300px;
            }

            .header-div {
                margin-left: 185px;
                width: 100px;
                height: 100px;
                object-fit: scale-down;
            }

        </style>
    </head>
    <body>

        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    <div class="title-thinner">
                    LifeLine 
                    </div>
                    <div class="description">
                        Improving lines of communication within hospitals through
                        <div>
                            the utilization of Electronic Medical Record Systems
                         </div>
                         
                            @if (Route::has('login'))

                            <div class="top-right links link-margin">
                                @auth
                                    <a href="{{ url('/home') }}">Home</a>
                                 @else
                                    <a class="button-default button" href="{{ route('login') }}">Login</a>


                                 @if (Route::has('register'))  
                                    <a class="button-default button" href="{{ route('register') }}">Register</a>
                                    @endif 

                                @endauth
                            </div>

                            @endif
            
                         </div>
                    </div>
                </div>
            </div>

        <div class="header-div">
            <img src="images\header.png" />
        </div>

    </body>
</html>
