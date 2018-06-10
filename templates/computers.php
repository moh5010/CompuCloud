<?php
  style("ownnotes", "bootstrap.min");
  style("ownnotes", "main");
  script('ownnotes', 'jquery-3.2.1.slim.min');
  script('ownnotes', 'popper.min');
  script('ownnotes', 'bootstrap.min');
 ?>
<h6>welcom for our  campany</h6>
<br><br><br>
<div class="computers">
  <?php
  for ($i=0; $i < count($_["computers"]); $i++) {
    print_unescaped($this->inc('computer.inc', array('computer' => $_["computers"][$i])));
  }
   ?>
</div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  New Computer
</button>

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

          <form method="POST" action="computers" id="computer_form">
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

          </div>
            <input type="submit" name="OK"value="OK">
            <input type="reset">

          </form>
      </div>
    </div>
  </div>
</div>
