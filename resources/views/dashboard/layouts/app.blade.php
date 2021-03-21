<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designreset.com/cork/ltr/demo6/form_layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Mar 2020 11:19:53 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>@yield('title') | {{config('app.name')}} </title>
    @include('dashboard.layouts.partials.style')

</head>
<body class="sidebar-noneoverflow" data-spy="scroll" data-target="#navSection" data-offset="100">
<div class="main-container" id="container">
@include('dashboard.layouts.partials.header')
@include('dashboard.layouts.partials.sidebar')

@yield('content')
</div>

@include('dashboard.layouts.partials.scripts')



</body>
</html>
