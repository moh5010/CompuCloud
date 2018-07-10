<form action="<?php p($_['url']) ?>/search" method="get">
  <div class="form-row">
    <div class="col">
      <div class="form-check">
        <input name="filter_sold" id="filter_sold" type="checkbox" class="form-check-input-inline" value="sold" />
        <label for="filter_sold">Filter Not Sold</label>
      </div>
    </div>
    <div class="col">
      <label for="mobile_model">Choose Company</label>
      <input type="text" id="mobile_model" name="mobile_model" />
    </div>
    <!--
    <div class="col">
      <label for="min_price">Minumum Price</label>
      <input type="number" id="min_price" name="min_price" />
    </div>
    <div class="col">
      <label for="max_price">Mxiumum Price</label>
      <input type="number" id="max_price" name="max_price" />
    </div>
  -->
  <div class="col">
    <button type="submit" class="btn btn-primary">Search</button>
  </div>
  </div>
</form>
