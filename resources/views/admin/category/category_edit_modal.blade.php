{{--<button  class="btn btn-success" data-toggle="modal" data-target="#myModal">Launch Demo Modal</button>--}}

<div class="modal" id="myModal" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 400px;">
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-15">

                            <div class="card">
                                <div class="card-header">
                                    <span>ویرایش دسته</span>
                                    <button class="bi bi-x-lg btn btn-danger"
                                            style="float: left;
                                            padding: 7px 7px 7px 7px;
                                            border-radius: 5px" id="close_modal_btn"></button>
                                </div>
                                <div class="card-body">
                                    <form action="{{route("category.update")}}" method="post" style="margin-bottom: 0;">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">نام دسته</label>
                                            <input type="text" name="category_name" class="form-control" id="exampleFormControlInput1" placeholder="مثلا لوازم الکتریکی یا کتاب...">
                                            <input type="text" name="category_id" id="input_categoryId_for_modal" hidden>
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
