<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Fedorenko Test App</title>
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-md-center">
        <div class="table-responsive col-md-8">
        @if(session()->has('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @yield('content')
        </div>
    </div>
</div>
<script src="/js/client.js"></script>
</body>
</html>
