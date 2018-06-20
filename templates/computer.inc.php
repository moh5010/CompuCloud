
<div class="card">
<img class="card-img-top" src="<?php p($_['computer']->getImage()) ?>" alt="<?php p($_['computer']->getComputerCompany()) ?>" />
  <div class="card-body">
    <h5 class="card-title"><?php p($_["computer"]->getComputerCompany()) ?></h5>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Model: <?php p($_["computer"]->getComputerModel()) ?></li>
      <li class="list-group-item">CPU: <?php p($_["computer"]->getCpu()) ?></li>
      <li class="list-group-item">RAM: <?php p($_["computer"]->getRam()) ?>GB</li>
      <li class="list-group-item">Hard: <?php p($_["computer"]->getHardCapacity()) ?>GB</li>
      <li class="list-group-item">Price: <?php p($_["computer"]->getPrice()) ?>$</li>
    </ul>
    <div style="text-align:center ; margin:10px">
    <?php if ($_["computer"]->getSold()) {
      ?>
      <a href="<?php p($_['url'] . '/buy/' . $_['computer']->getId()) ?>" class="btn btn-danger">Buy</a>
    <?php }
      else {
        ?>
        <a href="<?php p($_['url'] . '/buy/' . $_['computer']->getId()) ?>" class="btn btn-secondary">Buy</a>
        <?php
      }
    ?>
  </div>

  </div>
</div>
