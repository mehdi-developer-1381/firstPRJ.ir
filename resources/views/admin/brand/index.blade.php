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
    @include("admin.brand.brand_edit_modal",$brands)


    @if($errors->brand_update_error->any())

        @foreach($errors->brand_update_error->all() as $error)
        @endforeach

        @if($error)
            <script>

                $(document).ready(function(){
                    $("#brandModal").modal("show");
                    $("#close_modal_btn").click(function(){
                        $("#brandModal").modal("hide");
                    });

                    //this input for keep brand_id
                    $("#input_brandId_for_modal").attr("{{session("update_brand")}}");

                    $("#edit-brandName-error-message").text("{{$error}}");
                })
            </script>
        @endif
    @endif

    {{--brand message--}}
    @include("admin.brand.brands_message")

    {{--brands table--}}
    @include("admin.brand.brands_show_in_table.brands_show_in_table")



</x-app-layout>
</body>
<script>
    $("button[role='update_brand_btn']").click(function () {

        // Open modal on page load
        $("#brandModal").modal('show');

        // merge brand-id to modal form input value
        $("#input_brandId_for_modal").attr("value", this.getAttribute("brand_update_btn_id"))

        // // Close modal on button click
        $("#close_modal_btn").click(function () {
            $("#brandModal").modal('hide');
        });
    });
</script>
</html>


