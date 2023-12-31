<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <!--PWA -->
    	<meta name="theme-color" content="#6777ef"/>
    	<link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
    	<link rel="manifest" href="{{ asset('/manifest.json') }}">
    	
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
        
            <!-- PWA -->
        	<script src="{{ asset('/sw.js') }}"></script>
        	<script>
        	    if (!navigator.serviceWorker.controller) {
        	        navigator.serviceWorker.register("/sw.js").then(function (reg) {
        	            console.log("Service worker has been registered for scope: " + reg.scope);
        	        });
            }
        	</script> 
    </body>
</html>
