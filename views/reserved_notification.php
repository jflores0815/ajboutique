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

  }          //CHAT NOTIFICATION    $fetchChat = mysqli_query($conn, "SELECT DISTINCT sender, message, time FROM `messages` ORDER BY `time` desc LIMIT 1");  while ( $ChatRow = mysqli_fetch_assoc($fetchChat))  {    $chatSender = $ChatRow['sender'];      $chatMessage = $ChatRow['message'];	$chatMessage_limit =  substr($chatMessage, 0, 200);    $fetchUser = mysqli_query($conn, "SELECT * FROM `clients` WHERE username = '$chatSender'");    $userRow = mysqli_fetch_assoc($fetchUser);    echo '<a class="dropdown-item" href="#">';    echo '<span class="text-success">';    echo '<strong>';    echo $userRow['last_name'] .','. $userRow['first_name']; echo"<span style='font-size:12px;font-style:italic;color:red;'> *Messages</span>";    echo '</strong>';    echo '</span>';    echo '<span class="small float-right text-muted">'. $ChatRow['time'] .'</span>';    echo '<div class="dropdown-message small">';    echo $chatMessage_limit;    echo '</div>';    echo '</a>';    echo '<div class="dropdown-divider"></div>';  }

  ?>
