
<div class="card">
  <div class="card-body">
    <h5 class="card-title"><?php p($_["mobile"]->getMobileModel()) ?></h5>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Name: <?php p($_["mobile"]->getMobileName()) ?></li>
      <li class="list-group-item">CPU: <?php p($_["mobile"]->getMobileCpu()) ?></li>
      <li class="list-group-item">RAM: <?php p($_["mobile"]->getMobileRam()) ?>GB</li>
      <li class="list-group-item">Camera: <?php p($_["mobile"]->getCamera()) ?>MP</li>
      <li class="list-group-item">Memory: <?php p($_["mobile"]->getMobileMemory()) ?>GB</li>
      <li class="list-group-item">Price: <?php p($_["mobile"]->getMobilePrice()) ?>$</li>
    </ul>
    <div style="text-align:center ; margin:10px">
    <?php if ($_["mobile"]->getSold()) {
      ?>
      <a href="<?php p($_['url'] . '/buy/' . $_['mobile']->getId()) ?>" class="btn btn-danger">Buy</a>
    <?php }
      else {
        ?>
        <a href="<?php p($_['url'] . '/buy/' . $_['mobile']->getId()) ?>" class="btn btn-secondary">Buy</a>
        <?php
      }
    ?>
  </div>

  </div>
</div>
