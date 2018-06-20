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
      <a class="button" href="#popup">
        <div class="col-lg-12 calender-wrap" id="calendar"></div>
      </a>
      <div class="popup" id="popup">
        <div class="popup-inner">
          <div class="popup__photo">
            <img src="https://images.unsplash.com/photo-1515224526905-51c7d77c7bb8?ixlib=rb-0.3.5&s=9980646201037d28700d826b1bd096c4&auto=format&fit=crop&w=700&q=80" alt="">
          </div>
          <div class="popup__text">
            <h1>Lorem ipsum dolor sit amet</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ex velit, viverra non vulputate vitae, blandit vitae nisl. Nullam fermentum orci et erat viverra bibendum. Aliquam sed varius nibh, vitae mattis purus. Mauris elementum sapien non ullamcorper vulputate. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed eget felis sit amet eros viverra pulvinar.</p>
          </div>
          <a class="popup__close" href="#">X</a>
        </div>
      </div>

  <a class="buttontambah" href="#popup">+</a>
  <div class="popup" id="popup">
    <div class="popup-inner">
      <a class="popup__close" href="#">X</a>
    </div>
  </div>
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
