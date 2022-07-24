@if(session()->has("category_message") && session("category_message")=="active")
    <x-slot name="header">
    @if(session()->has("message_active"))
        @if(session("message_active")=="created_category")
            <?php
            $svg_path_created="M12 0c6.623 0 12 5.377 12 12s-5.377 12-12 12-12-5.377-12-12 5.377-12 12-12zm0 1c6.071 0 11 4.929 11 11s-4.929 11-11 11-11-4.929-11-11 4.929-11 11-11zm7 7.457l-9.005 9.565-4.995-5.865.761-.649 4.271 5.016 8.24-8.752.728.685z";
            $span_alert_message="دسته مورد نظر با موفقیت ثبت شد";
            $alert_color="success";
            ?>
        @elseif(session("message_active")=="removed_category")
            <?php
            $svg_path_created="m12.002 21.534c5.518 0 9.998-4.48 9.998-9.998s-4.48-9.997-9.998-9.997c-5.517 0-9.997 4.479-9.997 9.997s4.48 9.998 9.997 9.998zm0-1.5c-4.69 0-8.497-3.808-8.497-8.498s3.807-8.497 8.497-8.497 8.498 3.807 8.498 8.497-3.808 8.498-8.498 8.498zm0-6.5c-.414 0-.75-.336-.75-.75v-5.5c0-.414.336-.75.75-.75s.75.336.75.75v5.5c0 .414-.336.75-.75.75zm-.002 3c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1z";
            $span_alert_message="دسته مورد نظر با موفقیت حذف شد";
            $alert_color="danger";
            ?>
        @elseif(session("message_active")=="removed_total_category")
            <?php
            $svg_path_created="m12.002 21.534c5.518 0 9.998-4.48 9.998-9.998s-4.48-9.997-9.998-9.997c-5.517 0-9.997 4.479-9.997 9.997s4.48 9.998 9.997 9.998zm0-1.5c-4.69 0-8.497-3.808-8.497-8.498s3.807-8.497 8.497-8.497 8.498 3.807 8.498 8.497-3.808 8.498-8.498 8.498zm0-6.5c-.414 0-.75-.336-.75-.75v-5.5c0-.414.336-.75.75-.75s.75.336.75.75v5.5c0 .414-.336.75-.75.75zm-.002 3c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1z";
            $span_alert_message="دسته‌های مورد نظر با موفقیت حذف شدند";
            $alert_color="danger";
            ?>
        @endif
    @endif
        <div style="width: fit-content; position: absolute; top: 7px; right: 7px;" role="alert">
            <div class="alert alert-{{$alert_color}} d-flex align-items-center" role="alert" style="width: fit-content;">
                <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                    <path d="{{$svg_path_created}}"/>
                </svg>
                <span style="padding-right: 10px;">{{$span_alert_message}}</span>
            </div>
        </div>

    </x-slot>
@endif
