{{--brands list on table--}}
<div class="py-12" >
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">همه برندها</div>
                        <table class="table table-striped">
                            <thead>
                                @php($include_when="brands")
                                @includeWhen(true,"admin.brand.brands_show_in_table.brands_table_head",["table_head"=>"active"])
                            </thead>
                            <tbody>
                                @include("admin.brand.brands_show_in_table.active_brands_table_body")
                            </tbody>
                        </table>
                            {{$brands->onEachSide(0)->links("vendor.pagination.bootstrap-4")}}
                    </div>
                </div>

                {{--add new brand--}}
                <div class="col-md-4">
                    <div class="card">

                        {{--card header--}}
                        <div class="card-header">اضافه کردن برند</div>

                        {{--card body--}}
                        <div class="card-body">
                            <div class="mb-3">
                                <form action="{{route("brand.store",\Illuminate\Support\Facades\Auth::id())}}" method="post" enctype="multipart/form-data" id="crate_brand_form">
                                    @csrf

                                    {{--input get a brand name--}}
                                    <label for="text-brandName" class="form-label">نام برند</label>
                                    <input tabindex="1  " type="text" name="brand_name" class="form-control" id="text-brandName" placeholder="مثلا سونی،ایکس ویژن،ساموسونگ ...">
                                    <span style="color: red; display: inline-block; margin: 5px 0 10px 0;  font-size: 15px;" id="span-for-brand-nameError"></span>


                                    <br>

                                    {{--input get a file (image)--}}
                                    <lable for="inputGroupFile02">انتخاب‌عکس</lable>
                                    <input type="file" class="form-control" name="brand_logo" multiple id="inputGroupFile02" style="margin-top: 7px;" tabindex="2">
                                    <span style="color: red; display: inline-block; margin: 5px 0 10px 0; font-size: 15px;" id="span-for-brand-logoError"></span>

                                    {{--brand errors--}}

                                    {{--if eixists any errors--}}
                                    @if($errors->create_brand_errors->any())

                                        {{--if has  any brand error--}}
                                        <script>

                                            //make brand_name error message
                                            @foreach($errors->create_brand_errors->get("brand_name") as $brand_name_error)
                                                $("#span-for-brand-nameError").text("{{$brand_name_error}}")
                                            @endforeach

                                            //make brand_logo error message
                                            @foreach($errors->create_brand_errors->get("brand_logo") as $brand_logo_error)
                                                $("#span-for-brand-logoError").text("{{$brand_logo_error}}")
                                            @endforeach

                                        </script>

                                        {{--here you have to set old method, because returned an error--}}
                                        <script>
                                            $("#text-brandName").attr("value","{{old("brand_name")}}")
                                        </script>
                                    @endif()

                                    {{--input submit this form--}}
                                    <div class="d-grid gap-2 d-md-block" style="margin-top: 10px;">
                                        <input class="btn btn-success" type="submit" value="ثبت" tabindex="2">
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
