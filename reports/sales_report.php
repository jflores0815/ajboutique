<?php

ob_start();


require('../fpdf/diag.php');

include_once("../include/dbConnect.php");



$topSold = 5;

$barData = null;


$pieData = null;
$totals = null;

$rowMin = 0;

$rowMax = 30;

$y_axis_initial = 60;

$x_axis_initial = 30;

$row_height = 6;



//Select the Products you want to show in your PDF file

$statement = "";

$action = $_POST['action'];

$date = $_POST['date'];

$date_title=date_create($date);



if($action == "weekly") {

                    

    $statement = "select product_name, qty_sold, unit_price, sub_total

                    FROM(

                        select b.name as product_name, sum(a.quantity) as qty_sold, 

                    b.price as unit_price, (sum(a.quantity)*b.price) as sub_total

                    from orders a, products b, transactions c

                    where a.transaction_no = c.transaction_no

                    and b.id = a.product_id

                    and YEARWEEK(date) = YEARWEEK('$date')

                    group by b.name

                        ) as derived_table

                    order by qty_sold desc";

    $title = 'Sales Report for '.date_format($date_title,"F Y").' - Week '.week_number($date);

} else if($action == "monthly") {


    $statement = "select product_name, qty_sold, unit_price, sub_total

                    FROM(

                        select b.name as product_name, sum(a.quantity) as qty_sold, 

                    b.price as unit_price, (sum(a.quantity)*b.price) as sub_total

                    from orders a, products b, transactions c

                    where a.transaction_no = c.transaction_no

                    and b.id = a.product_id

                    and date_format(date, '%Y-%m') = '$date'

                    group by b.name

                        ) as derived_table

                    order by qty_sold desc";

                        

    $title = 'Sales Report for '.date_format($date_title,"F, Y");


}



$result = mysqli_query($conn, $statement);

$num = mysqli_num_rows($result);

//get data for bar chart



if($num > 0) {

    $pdf=new PDF_Diag();

    $pdf->SetTitle('Reports for Reservations');

    $pdf->AddPage('L');

    //$pdf->Image(');

    $pdf->Image('../images/reportLayout/border.jpg', 13, 53, 270, 140);

    $pdf->Image('../images/logo1.jpg',100,20,-100);

    

    //table header setting

    $pdf->SetFillColor(232, 232, 232);

    $pdf->SetFont('Arial', 'B', 12);

    $pdf->SetY($y_axis_initial);

    $pdf->SetX($x_axis_initial);

    

    //column setting w,h,title, x, x, align, x

    $pdf->Cell(100, $row_height, 'Product Name', 1, 0, 'L', 1);

    $pdf->Cell(30, $row_height, 'Qty Sold', 1, 0, 'C', 1);
    $pdf->Cell(40, $row_height, 'Unit Price', 1, 0, 'R', 1);

    $pdf->Cell(40, $row_height, 'Sub Total', 1, 0, 'R', 1);

  
  $pdf->Cell(30, $row_height, 'Total Sales', 1, 0, 'R', 1);

    $y_axis = $y_axis_initial + $row_height + 2;

    while($row = mysqli_fetch_assoc($result)) {

        $pdf->SetFont('Arial', '', 12);

        

        if ($rowMin == $rowMax) {

            $pdf->AddPage('L');

            $pdf->Image('../images/reportLayout/border.jpg', 3, 3, 290, 200);

            $pdf->Image('../images/reportLayout/border.jpg', 13, 53, 270, 140);

            $pdf->Image('../images/logo1.jpg',100,20,-100);

            $pdf->SetY($y_axis_initial);

            $pdf->SetX($x_axis_initial);

            $rowMin = 0;

        }

        

        $prodName = $row['product_name'];

        $qtySold = $row['qty_sold'];

        $unitPrice = $row['unit_price'];

        $subTotal = $row['sub_total'];

        $totalSales = $qtySold * $subTotal;

        $totals = $totals + $totalSales;

        $pdf->SetY($y_axis);

        $pdf->SetX($x_axis_initial);

        $pdf->Cell(100, $row_height, $prodName, 1, 0, 'L', 1);

        $pdf->Cell(30, $row_height, $qtySold, 1, 0, 'C', 1);

        $pdf->Cell(40, $row_height, $unitPrice, 1, 0, 'R', 1);

        $pdf->Cell(40, $row_height, $subTotal, 1, 0, 'R', 1);

        $pdf->Cell(30, $row_height, $totalSales, 1, 0, 'C', 1);

        if($topSold > 0) {


            if($barData == null)
 {
              $barData = array($prodName => (int)$subTotal);
              $pieData = array($prodName => (int)$subTotal);
            }
            else
 {
                $barData += array($prodName => (int)$subTotal);

                $pieData += array($prodName => (int)$subTotal);
            }
        }

        

        //Go to next row

        $y_axis = $y_axis + $row_height;

        $rowMin = $rowMin + 1;

        $topSold--;

    }


    $pdf->Ln(8);
    $pdf->Cell(254, $row_height, 'Total Sales:  '.$totals, 0, 0, 'R');


    //bar chart settings

    $pdf->Image('../images/reportLayout/border.jpg', 97, 43, 120, 10);

    $pdf->SetXY(125, 46);

    $pdf->SetFont('Arial', 'B', 12);

    $pdf->Cell(0, 5, $title, 0, 1);

    $pdf->Ln(8);

    

    $pdf->AddPage('L');

    $pdf->SetFont('Arial', 'BIU', 12);
    $pdf->Cell(0, 5, 'Line chart', 0, 1);
    $valX = $pdf->GetX();

    $valY = $pdf->GetY();

    $pdf->BarDiagram(280, 70, $barData, '%l : %v (%p)', array(246,157,157));


    // pie chart
    // $pdf->AddPage('L');
    $pdf->Ln(25);
    $pdf->SetFont('Arial', 'BIU', 12);
    $pdf->Cell(0, 5, 'Pie chart', 0, 1);

    $valX = $pdf->GetX();
    $valY = $pdf->GetY();

    $pdf->PieChart(300, 90, $pieData,'%l : %v (%p)');

    $pdf->SetXY($valX, $valY + 80);


    $now = new DateTime();

    $fileName = 'sales_report_'.$action.'-'.$now->getTimestamp().'.pdf';

    $pdf->Output($fileName,'D');

} else {

    echo "<script> alert('No transactions found: action: $action date: $date count: $num'); </script>";

}



function week_number($date) { 

    return ceil( date( 'j', strtotime( $date ) ) / 7 ); 

} 

ob_end_flush(); 


?>
