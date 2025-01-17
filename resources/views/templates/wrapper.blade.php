<!DOCTYPE html>
<html>
    <head>
        <title>{{ config('app.name', 'Jexactyl') }}</title>

        @section('meta')
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <meta name="robots" content="noindex">
            <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
            <link rel="icon" type="image/png" href="/favicons/favicon-32x32.png" sizes="32x32">
            <link rel="icon" type="image/png" href="/favicons/favicon-16x16.png" sizes="16x16">
            <link rel="manifest" href="/favicons/manifest.json">
            <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#bc6e3c">
            <link rel="shortcut icon" href="/favicons/favicon.ico">
            <meta name="msapplication-config" content="/favicons/browserconfig.xml">
            <meta name="theme-color" content="#0e4688">
            <meta property="og:title" content="Silly Development" />
            <meta property="og:description" content="Best Free 24/7 Hosting!" />
            <meta property="og:url" content="https://media.discordapp.net/attachments/1007565613130072104/1036999833959010387/static_1.png?width=230&height=230" />
            <meta property="og:image" content="https://media.discordapp.net/attachments/1007565613130072104/1036999833959010387/static_1.png?width=230&height=230" />
        @show

        @section('user-data')
            @if(!is_null(Auth::user()))
                <script>
                    window.JexactylUser = {!! json_encode(Auth::user()->toVueObject()) !!};
                </script>
            @endif
            @if(!empty($siteConfiguration))
                <script>
                    window.SiteConfiguration = {!! json_encode($siteConfiguration) !!};
                </script>
            @endif
            @if(!empty($storeConfiguration))
                <script>
                    window.StoreConfiguration = {!! json_encode($storeConfiguration) !!};
                </script>
            @endif
        @show

        @if(!empty($siteConfiguration['background']))
            <style>
                body {
                    background-image: url({!! $siteConfiguration['background'] !!});
                    background-repeat: no-repeat;
                    background-attachment: fixed;
                    background-size: cover;
                }
            </style>
        @endif

        <style>
            @import url('//fonts.googleapis.com/css?family=Rubik:300,400,500&display=swap');
            @import url('//fonts.googleapis.com/css?family=IBM+Plex+Mono|IBM+Plex+Sans:500&display=swap');
        </style>

        @yield('assets')

        @include('layouts.scripts')
    </head>
    <body>
        @section('content')
            @yield('above-container')
            @yield('container')
            @yield('below-container')
        @show
        @section('scripts')
            {!! $asset->js('main.js') !!}
        @show
    </body>
</html>
