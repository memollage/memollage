<link href="<?php echo base_url();?>asset/theme/css/kalender/availability-calendar.css" rel="stylesheet">
<link href="<?php echo base_url();?>asset/theme/css/kalender/kalender.css" rel="stylesheet">

<section class="calender-area relative section-gap">
  <div class="overlay overlay-bg"></div>

  <div class="container card">

    <div class="row d-flex justify-content-center">
      <div class="col-md-8 pb-80 header-text">
        <h1>Calendar</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 calender-wrap" id="calendar"></div>

    </div>
  </div>
</section>

<div class="col-lg-12 event-dates card">
  <div class="single-event d-flex flex-row">
    <p class="col">
      Dec 01
    </p>
    <p class="col-8">
      World AIDS Day
    </p>
    <p class="col text-right">
      <span class="lnr lnr-highlight"></span>
      <span class="lnr lnr-trash"></span>
    </p>
  </div>
  <div class="single-event d-flex flex-row">
    <p class="col">
      Dec 16
    </p>
    <p class="col-8">
      Victory Day of people republic of Bangladesh
    </p>
    <p class="col text-right">
      <span class="lnr lnr-highlight"></span>
      <span class="lnr lnr-trash"></span>
    </p>
  </div>
  <div class="single-event d-flex flex-row">
    <p class="col">
      Dec 25
    </p>
    <p class="col-8">
      Chrismas Day Arrangement
    </p>
    <p class="col text-right">
      <span class="lnr lnr-highlight"></span>
      <span class="lnr lnr-trash"></span>
    </p>
  </div>
</div>
<script src="<?php echo base_url();?>asset/theme/js/kalender/availability-calendar.js"></script>
<script src="<?php echo base_url();?>asset/theme/js/kalender/main.js"></script>

<script type="text/javascript">
<?php
     include APPPATH ."modules/kalender/ajax/kalender.js";
?>
</script>
