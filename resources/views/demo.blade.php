<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


</head>
<body>
<button id="btn">click</button>


<script src="{{asset("js/jquery-3.6.0.min.js")}}"></script>

<script src="{{asset("js/index.js")}}"></script>

<script>

    let test=new click();
    test.counter_click();
    test.up_down_click("#btn");
</script>




</body>
</html>
