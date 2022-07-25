@if(session()->has("brand_session_is_on"))

                <?php
                    $brand_job_done_alert_svg       = session("brand_session_is_on")["brand_job_done_alert_svg"];
                    $brand_job_done_alert_message   = session("brand_session_is_on")["brand_job_done_alert_message"];
                    $brand_job_done_alert_class     = session("brand_session_is_on")["brand_job_done_alert_class"];
                ?>

            <div style="width: fit-content; display: none; margin-top: 10px;" role="alert" id="message_div">
                <div class="alert alert-{{$brand_job_done_alert_class}} d-flex align-items-center" role="alert" style="width: fit-content;display: none; margin-bottom: 0;">
                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                        <path d="{{$brand_job_done_alert_svg}}"/>
                    </svg>
                    <span style="padding-right: 10px; padding-left: 100px">{{$brand_job_done_alert_message}}</span>
                </div>
            </div>


        <script>

            // this script for fade message
            $(document).ready(function () {
                $("#message_div").slideDown(500);
                window.setTimeout(function(){
                    $("#message_div").slideUp(500);
                },2500)
            });


        </script>

@endif
