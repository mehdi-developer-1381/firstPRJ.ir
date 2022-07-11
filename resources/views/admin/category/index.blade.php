@extends("layouts.css")
<x-app-layout>
    @if(session()->has("category_created") && session("category_created")=="successful")
    <x-slot name="header">
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </symbol>
            </svg>
            <div style="width: fit-content; position: absolute; top: 5px; right: 5px;" role="alert">
                <div class="alert alert-success d-flex align-items-center" role="alert" style="width: fit-content;">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <span style="margin-right: 10px;">دسته جدید با موفقیت ثبت شد</span>

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
                                        <th>نام دسته</th>
                                        <th>زمان ثبت</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(isset($categories) && !empty($categories))
                                    @foreach($categories as $category)
                                        <tr >
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->category_name}}</td>
                                            <td>{{\Morilog\Jalali\Jalalian::forge($category->created_at)->ago()}}</td>
                                            <td>
                                                <form action="{{route("category.remove",$category->id)}}" method="post">
                                                    @csrf
                                                    <input type="submit" name="remove_category" value="x" class="btn btn-danger">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
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
                                    <input type="text" value="{{old("category_name")}}" name="category_name" class="form-control" id="text-categoryName" placeholder="مثلا لوازم الکتریکی یا کتاب....">

                                    @error("category_name")
                                        <span class="text-danger" style="font-size: 14px;">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="d-grid gap-2 d-md-block">
                                    <input class="btn btn-primary" type="submit" value="ثبت">
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
    window.setTimeout(function() {
        $(".alert").fadeTo(1000, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 3000);
</script>
