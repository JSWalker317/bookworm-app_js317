<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Layout-Blade</title>
    <link rel="stylesheet" href="{{asset('assets/clients/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/style.css')}}">
    <style>
        .active { color:#fff;}
    </style>

</head>
<body>
    {{-- header --}}
    @include('clients.blocks.header')
    {{-- main --}}
    <main class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <aside>
                        @section('sidebar')
                            @include('clients.blocks.sidebar')
                        @show
                    </aside>
                </div>

                {{--  --}}
                <div class="col-10">
                    <div class="content">
                        {{--  --}}
                        @yield('content')
                        {{--  --}}
                    </div>
                </div>
                {{--  --}}
            </div>
        </div>
    </main>
    {{-- footer --}}
    @include('clients.blocks.footer')
    @stack('scripts')

    <script> src={{asset('assets/js/bootstrap.min.js')}}</script>
    <script> src={{asset('assets/js/custom.js')}}</script>
</body>
</html>