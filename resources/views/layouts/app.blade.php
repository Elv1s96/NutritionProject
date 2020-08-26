<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>{{ config('app.name') }}</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script>
        // rename myToken as you like
        {{--window.myToken =  <?php echo json_encode([--}}
        {{--    'csrfToken' => csrf_token(),--}}
        {{--]); ?>--}}

        //     window.axios = require('axios');
        //
        // window.axios.defaults.headers.common = {
        //     'X-Requested-With': 'XMLHttpRequest',
        //     'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        // };
    </script>
</head>
<body>
<div class="container">
    @include('layouts.messages')
</div>
<v-app id="app">
    @if(Auth::user())

        <header-component user="{{Auth::user()->name}}"></header-component>
    @else
        <header-component></header-component>
        @endif

        @if(Auth::user())
            <navigation-drawers-component  user_name="{{Auth::user()->name}}" user_id="{{Auth::user()->id}}" ></navigation-drawers-component>
        @else
            <navigation-drawers-component></navigation-drawers-component>
        @endif


    <!-- Sizes your content based upon application components -->
    <v-main>
        <!-- Provides the application the proper gutter -->
        <v-container fluid>
        @yield('content')
            <!-- If using vue-router -->

        </v-container>
    </v-main>
    <footer-component></footer-component>
</v-app>
{{--<v-app id="app">--}}
{{--    <header-component></header-component>--}}
{{--    @include('layouts.header')--}}
{{--    <v-container>--}}
{{--        <v-row>--}}
{{--            <v-col>--}}

{{--                @include('layouts.messages')--}}
{{--                <message-component></message-component>--}}
{{--                @yield('content')--}}
{{--            </v-col>--}}
{{--        </v-row>--}}
{{--    </v-container>--}}
{{--</v-app>--}}
<script src="{{ asset('js/app.js') }}" defer></script>
<script>


</script>
</body>
</html>
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}
{{--    <meta name="description" content="">--}}
{{--    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">--}}
{{--    <meta name="generator" content="Jekyll v3.8.6">--}}
{{--    <title>@yield('title-block')</title>--}}

{{--    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/pricing/">--}}
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>--}}
{{--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>--}}
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">--}}
{{--</head>--}}
{{--<body>--}}


{{--@include('layouts.header')--}}
{{--@if(Request::is('/'))--}}
{{--    @include('layouts.banner')--}}
{{--@endif--}}

{{--<div class="container">--}}
{{--    @include('layouts.messages')--}}
{{--    @yield('content')--}}
{{--</div>--}}
{{--@include('layouts.footer')--}}
{{--<!-- Optional JavaScript -->--}}
{{--<!-- jQuery first, then Popper.js, then Bootstrap JS -->--}}
{{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>--}}
{{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>--}}
{{--</body>--}}
{{--</html>--}}
