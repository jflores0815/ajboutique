<?php


echo '<li class="row" style="list-style-type:none;background:#f1f1f1;margin-bottom:2%;">';

  //images
  echo '<div class="col-md-2" style="padding-top:10px;padding-bottom:10px;">';

    echo '<img src="'. $rowDue['image'] .'" style="width:100%;"/>';

  echo '</div>';

  //details
  echo '<div class="col-md-10" style="padding-top:10px;padding-bottom:10px;">';


  if ( $sadDate > 0)
  {
    echo '<h4> Your Due date to this product'. $rowDue['name'] .'  is less than 8 from now <br>';
  }
  else if ( $sadDate <= 0)
  {
    echo '<h4 style="color:red"> You reach the dead line to pay this product :'. $rowDue['name'];
  }
    echo '<p style="margin-top:2%;"> Product price: ₱ '. $rowDue['price'] .' </p><br>';

    echo '<a href="shop.php">Shop now</a>';

  echo '</div>';

echo '</li>';

 ?>
