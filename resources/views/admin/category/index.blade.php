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
    {{--show edit modal--}}
    @include("admin.category.category_edit_modal",$categories)

    {{--show error message--}}
    @if($errors->update_category_error->any())
        @foreach($errors->update_category_error->all() as $error)
            <span>{{$error}}</span>
        @endforeach

        @if($error)
            <script>
                $(document).ready(function(){
                    $("#myModal").modal("show");
                    $("#close_modal_btn").click(function(){
                        $("#myModal").modal("hide");
                    });
                    $("#input_categoryId_for_modal").attr("{{session("update_category_error_id")}}")
                    $("#edit-categoryName-error-message").text("{{$error}}")
                })
            </script>
        @endif

    @endif

    {{--show fade message--}}
    @include("admin.category.categories_message")

    {{--categories table--}}
    @include("admin.category.categories_show_in_table.categories_show_in_table")


</x-app-layout>

</body>
</html>


<script>
    // this script for fade message
    window.setTimeout(function () {
        $(".alert").fadeTo(1000, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 3000);

    $("button[role='update_category_btn']").click(function () {
        // Open modal on page load
        $("#myModal").modal('show');

        // merge category-id to modal form input value
        $("#input_categoryId_for_modal").attr("value", this.getAttribute("category_update_btn_id"))

        // // Close modal on button click
        $("#close_modal_btn").click(function () {
            $("#myModal").modal('hide');
        });
    });

</script>
