
<tr>
    <th style="font-family: vazir-font;">شناسه دسته</th>
    <th>نام کاربر</th>
    <th>نام دسته</th>
    <th>زمان ثبت</th>

    @if($table_head === "active")
        <th style="text-align: center; padding: 4px 2px 4px 2px;">
            <button id="edit_categories_btn" hidden  class="btn btn-primary" title="Edit Categories" type="submit" form="category_total_update" form data-toggle="tooltip" data-placement="top" title="Add" style=" display: inline; background-color: #198754;border: 1px solid #198754;">
                <span>ثبتهمه</span>
            </button>
        </th>
        <th style="text-align: center; padding: 4px 2px 4px 2px; direction: ltr; ">
            <button id="remove_checked_category_btn"  class="btn btn-warning" title="Remove Checked Categories" type="submit" form="category_checked_form" data-toggle="tooltip" data-placement="top" style="background-color: darkorange; border: darkorange; color: white">
                <span>حذف</span>
            </button>
        </th>

    @elseif($table_head === "trashed")
        <th style="text-align: center; padding: 4px 2px 4px 2px; direction: ltr; ">
            <button id="forceDelete_checked_category_btn" name="target" value="force_delete" class="btn btn-danger" title="Remove Checked Categories" type="submit" form="category_checked_forceDelete_form" data-toggle="tooltip" data-placement="top" style="background-color: darkred;  border: darkred; color: white">
                <span>حذف</span>
            </button>
            <button id="forceDelete_checked_category_btn" name="target" value="restore" class="btn btn-warning" title="Restore Checked Categories" type="submit" form="category_checked_forceDelete_form" data-toggle="tooltip" data-placement="top" style="background-color: darkorange;border: darkorange;">
                <span>بازگردانی</span>
            </button>
        </th>
    @endif


</tr>
