<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="{{asset("js/jquery-3.6.0.min.js")}}"></script>
</head>
<body>

<form action="{{route("demo2")}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image" >
    <br>
    <br>
    <input type="submit" value="submit">
</form>


    <script>

    </script>
</body>
</html>

