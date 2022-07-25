@if(isset($brands) && !empty($brands))
    @foreach($brands as $brand)
        <tr style="line-height: revert;">

            {{--brand detail show in table--}}
            <td id="test">{{$brand->brand_id}}</td>
            <td>{{$brand->brand_name}}</td>
            <td><img src="{{asset("images/tst.jpg")}}" style="width: 80px;height: 80px;" alt=""></td>
            <td>

                {{--check created_at--}}
                @if($brand->created_at)
                    {{\Morilog\Jalali\Jalalian::forge($brand->created_at)->ago()}}
                @else
                    <span class="text-danger">بدون تاریخ</span>
                @endif
            </td>

            {{--btn for update brand--}}
            <td style="text-align: center; padding: 4px 2px 4px 2px;">
                <button role="update_brand_btn"  brand_update_btn_id="{{$brand->brand_id}}" class="btn btn-primary" type="button" title="Edit">
                    <span>ویرایش</span>
                </button>
            </td>

            {{--input check box for total delete brands--}}
            <td style="padding: 4px 2px 4px 2px; text-align: center;">
                <input class="form-check-input" form="brand_checked_form" name="brands[]" type="checkbox" value="{{$brand->brand_id}}" style="width: 32px; height: 34px; margin-top: 0;">
            </td>
        </tr>
    @endforeach

    {{--total delete brands form--}}
    <form action="{{route("brand.total.delete")}}" id="brand_checked_form" method="post" style="display: inline;">
        @csrf
    </form>

@endif
