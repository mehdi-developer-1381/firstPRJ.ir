<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset("fonts/fonts.css")}}">
    <link rel="stylesheet" href="{{asset("css/admin-category-index.css")}}">

</head>
<body>


<x-app-layout>
    {{--show edit modal--}}
    @include("admin.category.category_edit_modal")

    {{--show fade message--}}
    @include("admin.category.categories_message")

    {{--categories table--}}
    @include("admin.category.categories_show_in_table.categories_show_in_table")
    {{--pagination--}}
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


    // // this script for total Remove category, checkbox
    // function checkbox_checked() {
    //     $("#remove_checked_category_btn").removeAttr("hidden");
    // }


    // this script for update category column

    $("button[role='update_category_btn']").click(function () {

        //this var is category->id, is btn update element
        this_button_click_for_update_cat_id = $(this).attr("category_update_btn_id");

        //this var is input category_id
        input_cat_id = $("input[category_update_input_id=" + this_button_click_for_update_cat_id + "]")[0];
        input_cat_id.removeAttribute("readonly");
        input_cat_id.removeAttribute("disabled");

        // change add border to selected input
        $("#category_" + this_button_click_for_update_cat_id + "").css("border", "1px solid blue")

        // show hidden btn
        $("#edit_categories_btn").removeAttr("hidden")
    });

</script>
