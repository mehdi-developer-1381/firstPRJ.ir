@if(isset($brands) && !empty($brands))
    @foreach($brands as $brand)
        <tr>
            <td>{{$brand->brand_id}}</td>
            <td>{{$brand->brand_name}}</td>
            <td>
                @if($brand->created_at)
                    {{\Morilog\Jalali\Jalalian::forge($brand->created_at)->ago()}}
                @else
                    <span class="text-danger">بدون تاریخ</span>
                @endif
            </td>
            <td style="text-align: center; padding: 4px 2px 4px 2px;">
                <button role="update_brand_btn"  brand_update_btn_id="{{$brand->brand_id}}" class="btn btn-primary" type="button" title="Edit">
                    <span>ویرایش</span>
                </button>
            </td>

            <td style="padding: 4px 2px 4px 2px; text-align: center;">
                <input class="form-check-input" form="brand_checked_form" name="brands[]" type="checkbox" value="{{$brand->brand_id}}" style="width: 32px; height: 34px; margin-top: 0;">
            </td>
        </tr>
    @endforeach
    <form action="{{route("brand.total.delete")}}" id="brand_checked_form" method="post" style="display: inline;">
        @csrf
    </form>
@endif
