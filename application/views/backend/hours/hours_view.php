<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Hours</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt bx-color"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Update Hours</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col">
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <?php $working_days = array("1" => "Monday", "2" => "Tuesday", "3" => "Wednesday", "4" => "Thursday", "5" => "Friday", "6" => "Saturday", "7" => "Sunday"); ?>
                        <form  class="row g-3" method="post" enctype="multipart/form-data">
                        <?php $i = 0;
                            foreach ($working_days as $day) { ?>
                            <input type="hidden" name="day_name[]" value="<?php echo $day; ?>">
                            
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label"><?php echo $day; ?>: Open Timings</label>
                                <input type="text" data-format="hh:mm A" class="form-control timepicker" value="<?php if (count($timings) > 0) { foreach ($timings as $day_name)
                                    if ($day_name->day_name == $day)
                                                echo DATE("h:i A", strtotime($day_name->start_time));
                                    } else {
                                        //echo DATE("h:i A");
                                    }
                                    ?>" name="start_time[]" readonly="">
                                    <input type="hidden" name="id[]" value="<?php echo $day_name->id; ?>">
                            </div>
                            <div class="col-md-6">
                            <label for="inputFirstName" class="form-label"><?php echo $day; ?>: Closed Timings</label>
                                <input type="text" data-format="hh:mm A" class="form-control timepicker" value="<?php
                                    if (count($timings) > 0) {
                                        foreach ($timings as $day_name)
                                            if ($day_name->day_name == $day)
                                                echo DATE("h:i A", strtotime($day_name->end_time));
                                    } else {
                                        //echo DATE("h:i A");
                                    }
                                    ?>" name="end_time[]" readonly="">
                            </div>
                            <?php } ?>
                            <div class="col-12">
                                <button type="submit" name="update" value="update_hours"
                                    class="btn btn-primary px-5">Update</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->

    <!--end row-->
</div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script>
$('.timepicker').timepicker({
    timeFormat: 'h:mm p',
    interval: 30,
    minTime: '06',
    maxTime: '10:00pm',
    <?php if (count($timings) == 0) { ?>
    defaultTime: '06',
    <?php }
?>
    startTime: '06:00',
    dynamic: true,
    dropdown: true,
    scrollbar: true
});
</script>