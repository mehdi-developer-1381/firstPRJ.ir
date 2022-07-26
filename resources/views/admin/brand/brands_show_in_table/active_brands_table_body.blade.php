@if(isset($brands) && !empty($brands))
    @foreach($brands as $brand)
        <tr>

            {{--brand detail show in table--}}
            <td style="line-height: 80px;">{{$brand->brand_id}}</td>
            <td style="line-height: 80px;">{{$brand->brand_name}}</td>
            <td>
                @php($image=$brand->image()->get())
                @if(!empty($image) && isset($image[0]))
                    <img src="{{$image[0]->image_path}}" style="width: 150px;height: 80px;" alt="">
                @endif
            </td>
            <td style="line-height: 80px;">

                {{--check created_at--}}
                @if($brand->created_at)
                    {{\Morilog\Jalali\Jalalian::forge($brand->created_at)->ago()}}
                @else
                    <span class="text-danger">بدون تاریخ</span>
                @endif
            </td>

            {{--btn for update brand--}}
            <td style="text-align: center; padding: 4px 2px 4px 2px;">
                <button role="update_brand_btn"  brand_update_btn_id="{{$brand->brand_id}}" style="margin-top: 28px;" class="btn btn-primary" type="button" title="Edit">
                    <span>ویرایش</span>
                </button>
            </td>

            {{--input check box for total delete brands--}}
            <td style="padding: 4px 2px 4px 2px; text-align: center;">
                <input class="form-check-input" form="brand_checked_form" name="brands[]" type="checkbox" value="{{$brand->brand_id}}" style="width: 32px; height: 34px; margin-top: 29px;">
            </td>
            <input form="brand_checked_form" name="brands_name[]" type="hidden" value="{{$brand->brand_name}}">

        </tr>
    @endforeach

    {{--total delete brands form--}}
    <form action="{{route("brand.total.delete")}}" id="brand_checked_form" method="post">
        @csrf
    </form>

@endif
