<?php
  style("ownnotes", "bootstrap.min");
  script('ownnotes', 'jquery-3.2.1.slim.min');
  script('ownnotes', 'popper.min');
  script('ownnotes', 'bootstrap.min');
  script('ownnotes', 'Chart.min');
  script("ownnotes", "main");
  print_unescaped($this->inc('navbar.inc'));
 ?>
 <div style="background:black;color:white;text-align:center">
   <h6 style="font-size:24px;font-family:Georgia">welcom to our  campany</h6>
</div
<br><br><br>
<?php
  print_unescaped($this->inc('search.mobile.inc', array('url' => $_["mobileUrl"])));
  if ($_["message"]) {
    if ($_["warn"]) {
      echo "<div class='alert alert-danger' role='alert'>";
    }
    else {
      echo "<div class='alert alert-primary' role='alert'>";
    }

    p($_["message"]);
    echo "</div>";
  }


 ?>
<div style="margin: 10px">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
New Mobile
</button>
</div>
  <?php
  if (count($_["mobiles"]) == 0) {
    echo "<div class='alert alert-info' role='alert'>";
    echo "No Mobiles match search criteria";
    echo "</div>";
  }
  for ($i=0; $i < count($_["mobiles"]); $i++) {
    if ($i % 4 == 0) {
      ?>
      <div class="row">
      <?php
    }
    echo "<div class='col-md-3'>";
    print_unescaped($this->inc('mobile.inc', array('mobile' => $_["mobiles"][$i], "url" => $_["mobileUrl"])));
    echo "</div>";
    if($i % 4 == 3) {
      echo "</div>";
    }
  }
   ?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">New Mobile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">

          <form method="POST" action="mobiles" id="mobile_form" enctype="multipart/form-data">
            <div class="form-group">
            <label for="mobile_name">mobile_name:</label>
            <input name="mobile_name" id="mobile_name" type="text" required class="form-control" placeholder="entre name">
            <label>mobile_model:</label>
            <input name="mobile_model" type="text" required class="form-control" placeholder="enter model">
            <label> mobile_cpu:</label>
            <input name="mobile_cpu" type="text" required class="form-control" placeholder="entre cpu">
            <label>mobile_ram:</label>
            <input name="mobile_ram" type="number" class="form-control" required placeholder="entre ram">

            <label>mobile_memory:</label>
            <input name="mobile_memory" type="number" class="form-control" required placeholder="entre memory">

            <label>camera:</label>
            <input name="camera" class="form-control" type="number" required placeholder="entre camera">
            <label>mobile_price:</label>
            <input name="mobile_price" class="form-control" type="number" required placeholder="entre price">

          </div>
            <input type="submit" name="OK"value="OK">
            <input type="reset">

          </form>
      </div>
    </div>
  </div>
</div>
