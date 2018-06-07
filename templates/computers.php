<?php
  style("ownnotes", "bootstrap.min");
  style("ownnotes", "main");
?>

<h6>welcom for our  campany</h6>
<br><br><br>
<ul>
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
</ul>
