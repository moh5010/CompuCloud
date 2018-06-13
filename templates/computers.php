<?php
  style("ownnotes", "bootstrap.min");
  style("ownnotes", "main");
  script('ownnotes', 'jquery-3.2.1.slim.min');
  script('ownnotes', 'popper.min');
  script('ownnotes', 'bootstrap.min');
 ?>
 <div style="background:black;color:white;text-align:center">
   <h6 style="font-size:24px;font-family:Georgia">welcom to our  campany</h6>
</div>
<br><br><br>
<?php
  print_unescaped($this->inc('search.inc', array('url' => $_["url"])));
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
New Computer
</button>
</div>
  <?php
  if (count($_["computers"]) == 0) {
    echo "<div class='alert alert-info' role='alert'>";
    echo "No Computers match search criteria";
    echo "</div>";
  }
  for ($i=0; $i < count($_["computers"]); $i++) {
    if ($i % 4 == 0) {
      ?>
      <div class="row">
      <?php
    }
    echo "<div class='col-md-3'>";
    print_unescaped($this->inc('computer.inc', array('computer' => $_["computers"][$i], "url" => $_["url"])));
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
        <h5 class="modal-title">New Computer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">

          <form method="POST" action="computers" id="computer_form" enctype="multipart/form-data">
            <div class="form-group">
            <label for="computer_name">computer_name:</label>
            <input name="computer_name" id="computer_name" type="text" required class="form-control" placeholder="entre name">
            <label>computer_model:</label>
            <input name="computer_model" type="text" required class="form-control" placeholder="enter model">
            <label> computer_cpu:</label>
            <input name="computer_cpu" type="text" required class="form-control" placeholder="entre cpu">
            <label>computer_ram:</label>
            <input name="computer_ram" type="number" class="form-control" required placeholder="entre ram">

            <label>computer_hard:</label>
            <input name="computer_hard" class="form-control" type="number" required placeholder="entre hard">
            <label>computer_price:</label>
            <input name="computer_price" class="form-control" type="number" required placeholder="entre price">
            <!--<label>image:</label>
            <input name="computer_image" class="form-control" type="file" required placeholder="Select Image">
          -->

          </div>
            <input type="submit" name="OK"value="OK">
            <input type="reset">

          </form>
      </div>
    </div>
  </div>
</div>
