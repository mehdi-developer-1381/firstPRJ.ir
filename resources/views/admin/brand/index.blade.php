<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="{{asset("js/jquery-3.6.0.min.js")}}"></script>
    <link rel="stylesheet" href="{{asset("fonts/fonts.css")}}">
    <link rel="stylesheet" href="{{asset("css/admin-category-index.css")}}">


</head>
<body>


<x-app-layout>


    {{--brands table--}}
    @include("admin.brand.brands_show_in_table.brands_show_in_table")


</x-app-layout>

</body>
</html>


<script>



</script>
