<?php
$this->load->view("common")

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
    <title>Summary</title>
</head>
<body style="background-color:#f5f6fa">
<div style="  background: linear-gradient(135deg, rgba(71,230,255,1) 0%, rgba(30,127,195,1) 26%, rgba(76,37,188,1) 57%, rgba(126,7,192,1) 100%); min-height:15rem;" class="text-white position-relative">

    <div class="p-5">
        <h1 class="text-white"><i class="fa fa-users" style="font-size:36px"></i> Order <i class="	fa fa-calendar float-end" style="font-size:36px"></i> </h1>
        <p class="text-white-50 fs-5 ">Point of Sales and Inventory Management System for Luminescence Company <button class="float-end btn btn-light"><?=  date("F j, Y - l")?></button></p>
    </div>

</div>

<div class="container" style="margin-top:2rem;">
    <?php if ($this->session->flashdata('order_status')){ ?>
        <div class="alert alert-success" role="alert">
            <p class="fw-bold" style=''><?= $this->session->flashdata('order_status');?></p>
        </div>
    <?php unset($_SESSION['order_status']);} ?>

    <div class="d-flex justify-content-center text-dark ">
        
        <div class="card w-50 shadow-sm p-3 mb-5 bg-body rounded" style="max-width: 30rem;" >
        <div id="printReceipt">
        <center><img src="<?= base_url("./images/order1.png")?>" class="img-fluid" width="70%"></center>
            <!-- <h3 style="color:#7E07C0;">Order Summary</h3> -->
            
            <hr>
            <div class="text-center">

                <h5><?= $quantity ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?= $prod_name ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?= $price ?> </h5>
                
            
            </div>

                <h3 style="color:#7E07C0;">Total <p class="float-end"><?= $total ?></p></h3>
                <hr>
                <h3 style="color:#7E07C0;">Payment</h3>
            
                <h5>Purchased Amount: <?= $total ?></h5>
                <h5>Received Amount: <?= $amount_paid ?></h5>

            <hr>

            <h3 style="color:#7E07C0;">Change <p class="float-end"><?= $amount_tendered ?></p></h3>
        </div>
            <button id="print"  class="btn btn-md text-white" style="background-color:#7E07C0;"><i class="fas fa-print"></i>&nbsp;Print Receipt</button>
           

        </div>
       
    </div>

    </div>
</div>

<script>

//Print ng Resibo
function printData()
{
   var divToPrint=document.getElementById("printReceipt");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('#print').on('click',function(){
    printData();
}) 

</script>



