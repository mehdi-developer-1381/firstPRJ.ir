@extends("layouts.css")
<x-app-layout>

    {{--    show fade message--}}


    @if(session()->has("category_message") && session("category_message")=="active")
    <x-slot name="header">
        @if(session()->has("message_active"))
            @if(session("message_active")=="created_category")
                <?php
                    $svg_path_created="M12 0c6.623 0 12 5.377 12 12s-5.377 12-12 12-12-5.377-12-12 5.377-12 12-12zm0 1c6.071 0 11 4.929 11 11s-4.929 11-11 11-11-4.929-11-11 4.929-11 11-11zm7 7.457l-9.005 9.565-4.995-5.865.761-.649 4.271 5.016 8.24-8.752.728.685z";
                    $span_alert_message="دسته مورد نظر با موفقیت ثبت شد";
                    $alert_color="success";
                ?>
            @elseif(session("message_active")=="removed_category")
                <?php
                    $svg_path_created="m12.002 21.534c5.518 0 9.998-4.48 9.998-9.998s-4.48-9.997-9.998-9.997c-5.517 0-9.997 4.479-9.997 9.997s4.48 9.998 9.997 9.998zm0-1.5c-4.69 0-8.497-3.808-8.497-8.498s3.807-8.497 8.497-8.497 8.498 3.807 8.498 8.497-3.808 8.498-8.498 8.498zm0-6.5c-.414 0-.75-.336-.75-.75v-5.5c0-.414.336-.75.75-.75s.75.336.75.75v5.5c0 .414-.336.75-.75.75zm-.002 3c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1z";
                    $span_alert_message="دسته مورد نظر با موفقیت حذف شد";
                    $alert_color="danger";
                ?>
            @elseif(session("message_active")=="removed_total_category")
                <?php
                    $svg_path_created="m12.002 21.534c5.518 0 9.998-4.48 9.998-9.998s-4.48-9.997-9.998-9.997c-5.517 0-9.997 4.479-9.997 9.997s4.48 9.998 9.997 9.998zm0-1.5c-4.69 0-8.497-3.808-8.497-8.498s3.807-8.497 8.497-8.497 8.498 3.807 8.498 8.497-3.808 8.498-8.498 8.498zm0-6.5c-.414 0-.75-.336-.75-.75v-5.5c0-.414.336-.75.75-.75s.75.336.75.75v5.5c0 .414-.336.75-.75.75zm-.002 3c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1z";
                    $span_alert_message="دسته‌های مورد نظر با موفقیت حذف شد";
                    $alert_color="danger";
                ?>
            @endif
        @endif

            <div style="width: fit-content; position: absolute; top: 7px; right: 7px;" role="alert">
                <div class="alert alert-{{$alert_color}} d-flex align-items-center" role="alert" style="width: fit-content;">
                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                        <path d="{{$svg_path_created}}"/>
                    </svg>
                    <span style="padding-right: 10px;">{{$span_alert_message}}</span>
                </div>
            </div>

    </x-slot>
    @endif

    <div class="py-12" >
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">همه دسته‌بندی‌ها</div>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>شناسه دسته</th>
                                        <th>نام کاربر</th>
                                        <th>نام دسته</th>
                                        <th>زمان ثبت</th>

                                        <th style="direction: ltr; ">
                                            <button id="remove_checked_category_btn"  class="btn btn-primary btn-sm rounded-0" title="Remove Checked Categories" type="submit" form="category_checked_form" form data-toggle="tooltip" data-placement="top" title="Add" style="display: inline; background-color: red;border: 1px solid red;">
                                                <i class="ri-delete-bin-2-line"></i>
                                            </button>
                                            <button id="edit_categories_btn"  class="btn btn-primary btn-sm rounded-0" title="Edit Categories" type="submit" form="category_total_update" form data-toggle="tooltip" data-placement="top" title="Add" style="display: inline; background-color: orange;border: 1px solid orange;">
                                                <i class="ri-check-double-line"></i>
                                            </button>
                                        </th>


                                    </tr>
                                </thead>
                                <tbody>
                                @if(isset($categories) && !empty($categories))
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->user->name}}</td>

                                            <td>
                                                <input id="category_{{$category->id}}" category_update_input_id="{{$category->id}}" name="category_{{$category->id}}" form="category_total_update" type="text" style="border: none; background:none; cursor: text; padding: 0;" disabled="true" readonly="true" value="{{$category->category_name}}">
                                            </td>
                                            <td>
                                                @if($category->created_at)
                                                    {{\Morilog\Jalali\Jalalian::forge($category->created_at)->ago()}}
                                                @else
                                                    <span class="text-danger">بدون تاریخ</span>
                                                @endif
                                            </td>

                                            <td style="width: fit-content; direction: ltr;">
                                                <form action="{{route("category.remove",$category->id)}}" method="post" style="width: fit-content;display: inline;">
                                                    @csrf
                                                    <button class="btn btn-primary btn-sm rounded-0" type="submit" data-toggle="tooltip" data-placement="top" title="remove" style="display: inline; background-color: red;border: 1px solid red;">
                                                        <i class="ri-close-line"></i>
                                                    </button>
                                                </form>
                                                    <button role="update_category_btn" category_update_btn_id="{{$category->id}}" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit" style="display: inline; background-color: orange;border: 1px solid orange;">
                                                        <i class="ri-edit-2-line"></i>
                                                    </button>

                                                <input class="form-check-input" form="category_checked_form" name="categoris[]" onclick="checkbox_checked()" type="checkbox" value="{{$category->id}}" style="width: 32px; height: 34px; margin-top: 0;">
                                            </td>
                                        </tr>
                                    @endforeach
                                    <form action="{{route("category.total.delete")}}" id="category_checked_form" method="post" style="display: inline;">
                                        @csrf
                                    </form>
                                    <form action="{{route("category.total.update")}}" id="category_total_update" method="post" style="display: inline;">
                                        @csrf

                                    </form>
                                @endif
                                </tbody>
                            </table>
                            {{$categories->onEachSide(0)->links("vendor.pagination.bootstrap-4")}}
                    </div>
                </div>
                <div class="col-md-4">
                    <form action="{{route("category.store",\Illuminate\Support\Facades\Auth::id())}}" method="post" >
                    <div class="card">
                        <div class="card-header">اضافه کردن دسته</div>
                          <div class="card-body">
                                @csrf

                                <div class="mb-3">
                                    <label for="text-categoryName" class="form-label">نام دسته</label>
                                    <input tabindex="1  " type="text" value="{{old("category_name")}}" name="category_name" class="form-control" id="text-categoryName" placeholder="مثلا لوازم الکتریکی یا کتاب....">

                                    @error("category_name")
                                        <span class="text-danger" style="font-size: 14px;">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="d-grid gap-2 d-md-block">
                                    <input class="btn btn-primary" type="submit" value="ثبت" tabindex="2">
                                </div>
                            </div>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
<script>
    // this script for fade message
    window.setTimeout(function() {
        $(".alert").fadeTo(1000, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 3000);


    // this script for total Remove category, checkbox
    function checkbox_checked(){
        $("#remove_checked_category_btn").removeAttr("hidden");
    }



    // this script for update category column

        $("button[role='update_category_btn']").click(function(){

            //this var is category->id, is btn update element
            this_button_click_for_update_cat_id=$(this).attr("category_update_btn_id");

            //this var is input category_id
            input_cat_id=$("input[category_update_input_id="+ this_button_click_for_update_cat_id +"]")[0];
            input_cat_id.removeAttribute("readonly");
            input_cat_id.removeAttribute("disabled");

            // change add border to selected input
            $("#category_"+ this_button_click_for_update_cat_id +"").css("border","1px solid blue")


        });

</script>
