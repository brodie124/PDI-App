<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'NA') | MP Workshop</title>

    <script src="/javascript/jquery-3.6.0.js"></script>
    <script src="/javascript/bootstrap.js"></script>
    <script src="/javascript/all.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>

    <link href="/css/all.css" type="text/css" rel="stylesheet" />
    <link href="/css/bootstrap.css" type="text/css" rel="stylesheet" />
    <link href="/css/global.css" type="text/css" rel="stylesheet" />

</head>
<body>

@section('navigation')

@endsection

@yield('body');

</body>
</html>
