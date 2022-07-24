@if(isset($trashed_categories) && !empty($trashed_categories))
    @foreach($trashed_categories as $trashed_category)
        <tr>
            <td>{{$trashed_category->id}}</td>
            <td>{{$trashed_category->user->name}}</td>
            <td>{{$trashed_category->category_name}}</td>
            <td>
                @if($trashed_category->deleted_at)
                    {{\Morilog\Jalali\Jalalian::forge($trashed_category->deleted_at)->ago()}}
                @else
                    <span class="text-danger">بدون تاریخ</span>
                @endif
            </td>
            <td style="padding: 4px 2px 4px 2px; text-align: center;">
                <input class="form-check-input" form="category_checked_forceDelete_form" name="categories[]" type="checkbox" value="{{$trashed_category->id}}" style="width: 32px; height: 34px; margin-top: 0;">
            </td>
        </tr>
    @endforeach
    <form action="{{route("category.total.force.delete")}}" id="category_checked_forceDelete_form" method="post" style="display: inline;">
        @csrf
    </form>
@endif
