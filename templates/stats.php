<?php
  style("ownnotes", "bootstrap.min");
  script('ownnotes', 'jquery-3.2.1.slim.min');
  script('ownnotes', 'popper.min');
  script('ownnotes', 'bootstrap.min');
  script('ownnotes', 'Chart.min');
  script("ownnotes", "main");
  print_unescaped($this->inc('navbar.inc'));
 ?>
 <div class="chart-container" style="position: relative; height:40vh; width:80vw">
    <canvas id="myChart"></canvas>
</div>
