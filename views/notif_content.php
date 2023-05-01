<?php


echo '<li class="row" style="list-style-type:none;background:#f1f1f1;margin-bottom:2%;">';

  //images
  echo '<div class="col-md-2" style="padding-top:10px;padding-bottom:10px;">';

    echo '<img src="'. $row['image'] .'" style="width:100%;"/>';

  echo '</div>';

  //details
  echo '<div class="col-md-10" style="padding-top:10px;padding-bottom:10px;">';

    echo '<h4>'. $row['name'] .'  is available With  '. $row['stock'] .'  stock</h4>';

    echo '<p style="margin-top:2%;"> P'. $row['price'] .'</p>';

    echo '<a href="shop.php">Shop now</a>';

  echo '</div>';

echo '</li>';

 ?>
