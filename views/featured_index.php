<?php
  include_once("../include/dbConnect.php");


  //category
  $cat_name = $_POST['cat_name'];

  // month NOW
  $month = date('m');


  $query_string = " SELECT orders.product_id, COUNT(orders.id) top, (products.name) product_name, MONTH(orders.order_date) month,

                    products.image, products.price

                    FROM `orders`

                    JOIN products ON products.id = orders.product_id

                    JOIN categories ON categories.category_id = products.category_id

                    WHERE categories.name = '$cat_name' AND MONTH(orders.order_date) = $month

                    GROUP BY products.id ORDER BY top DESC LIMIT 3 ";

  $query = mysqli_query($conn, $query_string);

  while ($row = mysqli_fetch_assoc($query)) {

    echo '<div class="img-top simpleCart_shelfItem">';

      echo '<img src="'. str_replace("../", ' ' ,$row['image']).'" class="img-responsive" alt="" style="width:100%;"/>';

      echo '<div class="tab_desc">';

        echo '<ul class="round-top">';

          echo '<li><a href="#"><i> </i></a></li>';

          echo '<li><a href="#"><i class="round"></i></a></li>';

        echo '</ul>';

        echo '<div class="agency ">';

          // left
          echo '<div class="agency-left">';


          echo '<h6 class="jean">'.$row['product_name'].'</h6>';

          echo '<span class="dollor item_price">P'.$row['price'].'</span>';

          echo '<div class="clearfix"> </div>';
          // end of left

          // right
          // echo '<div class="agency-right">';
          //
          //   echo '<ul class="social">';
          //
          //     echo '<li><a href="http://ajboutique.xyz/views/login.php"><i class="item_add"> </i></a></li>';
          //
          //     echo '<li><a href="#"><i class="text"> </i></a></li>';
          //
          //   echo '</ul>';
          //
          //   echo '<ul class="social-in">';
          //
          //     echo '<li><a href="#"><i> </i></a></li>';
          //
          //     echo '<li><a href="#"><i > </i></a></li>';
          //
          //     echo '<li><a href="#"><i> </i></a></li>';
          //
          //     echo '<li><a href="#"><i > </i></a></li>';
          //
          //     echo '<li><a href="#"><i > </i></a></li>';
          //
          //   echo '</ul>';
          //
          //   echo '<div class="clearfix"> </div>';
          //
          // echo '</div>';
          // end of right

        echo '</div>';


        echo '</div>';

      echo '</div>';

    echo '</div>';

  }

?>
