<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('page-title', 'Apollo')</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script>
    window.Laravel = {!! json_encode([
        'url' => URL('/'),
        'csrfToken' => csrf_token()
    ]) !!};
    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body class="sidebar-mini skin-black-light fixed">
    <div id="app" class="wrapper">
        @include('layouts._header')
        @include('layouts._sidebar')

        <div class="content-wrapper">
            <section class="content-header">
                @yield('content-header')
            </section>

            <section class="content">
                @yield('content')
            </section>
        </div>

        @include('layouts._footer')
    </div>

    @stack('js-before')
    <script data-turbolinks-eval="false" src="{{ asset('js/app.js') }}"></script>
    @if (notify()->ready())
        <script>
            toastr.{{notify()->type()}}('{{ notify()->message() }}');
        </script>
        {{ Session::forget(notify()->message()) }}
    @endif

    @stack('js-after')
</body>
</html>
