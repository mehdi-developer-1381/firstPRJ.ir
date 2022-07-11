@extends("layouts.css")
<x-app-layout>

    <x-slot name="header">
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </symbol>
        </svg>
        <div style="width: fit-content; position: absolute; top: 5px; right: 5px;" role="alert">
            <div class="alert alert-success d-flex align-items-center" role="alert" style="width: 500px;">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <span style="margin-right: 10px;">دسته جدید با موفقیت ثبت شد</span>

            </div>
        </div>

    </x-slot>

    <div class="py-12" >
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">همه دسته‌بندی‌ها</div>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>شناسه</th>
                                        <th>نام</th>
                                        <th>ایمیل</th>
                                        <th>عضویت</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">اضافه کردن دسته</div>
                        <div class="card-body">
                            <form action="{{route("category.store")}}">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">نام دسته</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="مثلا لوازم الکتریکی یا کتاب....">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">توضیحات</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <div class="d-grid gap-2 d-md-block">
                                    <button class="btn btn-primary" type="submit">ثبت</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<h1 id="h1">salam</h1>

    <button id="click">click</button>
</x-app-layout>

<script>

</script>
