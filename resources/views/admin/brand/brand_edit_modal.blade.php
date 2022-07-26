{{--<button  class="btn btn-success" data-toggle="modal" data-target="#brandModal">Launch Demo Modal</button>--}}

<div class="modal" id="brandModal" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 400px;">
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-15">

                            <div class="card">

                                {{--brand card head--}}
                                <div class="card-header">
                                    <span>ویرایش برند</span>
                                    <button class="bi bi-x-lg btn btn-danger" style="float: left;
                                            padding: 7px 7px 7px 7px;
                                            border-radius: 5px" id="close_modal_btn"></button>
                                </div>


                                {{--brand card body--}}
                                <div class="card-body">
                                    <form action="{{route("brand.update")}}" method="post" style="margin-bottom: 0;" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">نام برند</label>
                                            <input type="text" name="brand_name" class="form-control" id="input_brandName_for_modal" placeholder="مثلا سونی،ایکس ویژن،ساسونگ ..." style="margin-bottom: 5px;">
                                            <span id="edit-brandName-error-message" style="color: red; font-size: 15px; display: inline-block; margin-bottom: 10px;"></span>
                                            <br>

                                            <lable for="inputGroupFile02">انتخاب‌عکس</lable>
                                            <input type="file" class="form-control" name="brand_logo" id="inputGroupFile02" style="margin-top: 7px;" tabindex="2">
                                            <span style="color: red; display: inline-block; margin: 5px 0 10px 0; font-size: 15px;" id="edit-brandImage-error-message"></span>

                                            <input type="text" name="brand_id" id="input_brandId_for_modal" hidden>
                                        </div>

                                        <button type="submit" style="margin-bottom: 0 !important;" class="btn btn-primary mb-3" >ثبت تغییر</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
