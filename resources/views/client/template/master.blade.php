<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ - bán vàng</title>
    @include('client.template.css')
</head>
<body>
    <div class="container ">
       @include('client.template.header')
        <div class="row mt-2">
            @include('client.template.sidebar')
            <div class="col-9 ">
                @yield('content')
            </div>
        </div>
    </div>

    @include('client.template.js')
</body>
</html>
