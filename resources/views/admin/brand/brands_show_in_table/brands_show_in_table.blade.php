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
{{--                    {{$brands->onEachSide(0)->appends(["trashed"=>$trashed_brands->currentPage()])->links("vendor.pagination.bootstrap-4")}}--}}
                        {{$brands->onEachSide(0)->links("vendor.pagination.bootstrap-4")}}
                </div>
            </div>

{{--            --}}{{--add brand--}}
{{--            <div class="col-md-4">--}}
{{--                <form action="{{route("brand.store",\Illuminate\Support\Facades\Auth::id())}}" method="post" >--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header">اضافه کردن دسته</div>--}}
{{--                        <div class="card-body">--}}
{{--                            @csrf--}}

{{--                            <div class="mb-3">--}}
{{--                                <label for="text-brandName" class="form-label">نام دسته</label>--}}
{{--                                <input tabindex="1  " type="text" name="brand_name" class="form-control" id="text-brandName" placeholder="مثلا لوازم الکتریکی یا کتاب....">--}}

{{--                                @if($errors->create_brand_error->any())--}}
{{--                                        @foreach($errors->create_brand_error->all() as $error)--}}
{{--                                            <span style="color: red; font-size: 15px;">{{$error}}</span>--}}
{{--                                        @endforeach--}}
{{--                                        <script>--}}
{{--                                            $("#text-brandName").attr("value","{{old("brand_name")}}")--}}
{{--                                        </script>--}}
{{--                                @endif()--}}
{{--                            </div>--}}
{{--                            <div class="d-grid gap-2 d-md-block">--}}
{{--                                <input class="btn btn-success" type="submit" value="ثبت" tabindex="2">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}

{{--            --}}{{--trashed brands--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">دسته‌های حذف شده</div>--}}

{{--                    <table class="table table-striped">--}}
{{--                        <head>--}}
{{--                            @php($include_when="trashed")--}}
{{--                            @includeWhen(true,"admin.brand.brands_show_in_table.brands_table_head",["table_head"=>"trashed"])--}}
{{--                        </head>--}}
{{--                        <tbody>--}}
{{--                            @include("admin.brand.brands_show_in_table.trashed_brands_table_body")--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                    {{$trashed_brands->onEachSide(0)->appends(["brands"=>$brands->currentPage()])->links("vendor.pagination.bootstrap-4")}}--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</div>


