<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="AuCreative theme tempalte">
    <meta name="author" content="AuCreative">
    <meta name="keywords" content="AuCreative theme template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Favicon-->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/default/favicon.png')}}" />

    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css')}}">
    <!--Bootstrap Icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <?php echo customCSS(); //function from -> App\Helper\frontend\base_url  ?>
    <!--Title-->

    <title>@yield('title')</title>
</head>
<?php $url = Illuminate\Support\Str::replace(base_url,'',Request::url());
$content = App\Models\Option::where('url',$url)->first(); ?>

<body>
    @if(!$content->status)
    @php
        header("Location: " . URL::to('/'), true, 302);
        exit();
    @endphp
    @endif
    @if($content->header)
    <!-- Header -->
    @include('frontend.partials.header')
    <!-- /Header -->
    @endif
    {!! $content->content !!}
    @if($content->footer)
    <!-- Footer -->
    @include('frontend.partials.footer')
    <!-- /Footer -->
    @endif
    <!-- Jquery -->
    <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/js/custom.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>