<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="http://127.0.0.1/firstPRJ.ir/public/js/jquery-3.6.0.min.js"></script>



</head>
<body>

<button id="btn">click</button>
<div id="ajax_box"></div>


<script>
    $(document).ready(function() {
            $("#btn").click(function () {
                $("#ajax_box").load("ajax.html");
            });
        }
    )
</script>

</body>
</html>
