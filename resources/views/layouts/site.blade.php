<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ config('app.name', 'Quotation') }}</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        
        <!-- Font Awesome if you need it
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
        -->
        
        <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
        <!--Replace with your tailwind.css once created-->

        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">

        <style>		
            hr.hr {
                border-top: 2px solid green;
            }
        </style>
    </head>

    <body class="leading-normal tracking-normal text-gray-900" style="font-family: 'Source Sans Pro', sans-serif;">

        <div class="">
         
            <!--Main-->
            <div class="container pt-8 mx-auto flex flex-wrap flex-col md:flex-row items-center">
                
                <!--Left Col-->
                <div class="flex flex-col px-2 w-full justify-center lg:items-start">
                    <h1 class="text-3xl md:text-5xl text-purple-800 font-bold leading-tight text-center md:text-left">
                        <div class="flex justify-center sm:justify-start sm:pt-0">
                            <a href="{{route('welcome')}}">{{ __('Development Task') }}</a>    
                        </div>
                    </h1>
                    <p class="leading-normal text-base md:text-2xl mb-8 text-center md:text-left slide-in-bottom-subtitle">{{ $slot }}</p>
                </div>
                
                <!--Footer-->
                <div class="w-full pt-8 pb-8 text-sm text-center md:text-left">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </div>
        
            </div>
        </div>

        <!-- jQuery if you need it
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        -->

    </body>
</html>