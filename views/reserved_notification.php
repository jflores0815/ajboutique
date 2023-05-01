<?php

  // reservation

  $fetchReserve = mysqli_query($conn, "SELECT * FROM `reserved` WHERE `status` = 7 ORDER BY `reserved_date` desc");

  while ( $reserveRow = mysqli_fetch_assoc($fetchReserve))
  {

    $c_id = $reserveRow['client_id'];

    $fetchUser = mysqli_query($conn, "SELECT * FROM `clients` WHERE id = '$c_id'");

    $userRow = mysqli_fetch_assoc($fetchUser);

    echo '<a class="dropdown-item" href="#">';

    echo '<span class="text-success">';

    echo '<strong>';

    echo $userRow['last_name'] .','. $userRow['first_name'];

    echo '</strong>';

    echo '</span>';

    echo '<span class="small float-right text-muted">'. $reserveRow['reserved_date'] .'</span>';

    echo '<div class="dropdown-message small">';

    echo 'New reservation from '. $userRow['nickname'] .' Total quantity: ';

    echo $reserveRow['quantity'];

    echo '</div>';

    echo '</a>';

    echo '<div class="dropdown-divider"></div>';

  }

  ?>