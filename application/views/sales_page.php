
<div style=" background: linear-gradient(135deg, rgba(71,230,255,1) 0%, rgba(30,127,195,1) 26%, rgba(76,37,188,1) 57%, rgba(126,7,192,1) 100%); min-height:15rem;" class="text-white position-relative">

    <div class="p-5">
        <h1 class="text-white"><i class="fa fa-cubes" style="font-size:36px"></i> Sales<i class="	fa fa-calendar float-end" style="font-size:36px"></i> </h1>
        <p class="text-white-50 fs-5 ">Point of Sales and Inventory Management System for Luminescence Company <button class="float-end btn btn-light"><?=  date("F j, Y - l")?></button></p>
    </div>
</div>
 
 <!-- CARDS -->
<?php if ($this->session->flashdata('status')){ ?>
    <div class="alert alert-success" role="alert">
        <p class="fw-bold" style=''><?= $this->session->flashdata('status');?></p>
    </div>
<?php unset($_SESSION['status']);} ?>

 <div>
<div class="d-flex justify-content-evenly pt-3" stlye=" margin-top:9rem;">

<div class="card w-50 text-white mb-3 " style="max-width: 20rem;background: #7E07C0;">
  
  <div class="card-body ">
    <h5 class="card-title text-white-50">Number of Sales <i class="fa fa-address-card float-end" style="font-size:36px"></i></h5>
    <h5 class="card-text"><?= $ns ?></h5>
   
  </div>
 
</div>

<div class="card w-50 text-white mb-3" style="max-width: 20rem;background: #1E7FC3;">
  
  <div class="card-body">
    <h5 class="card-title text-white-50">Total Sales<i class="fa fa-briefcase float-end" style="font-size:36px"></i></h5>
    <h5 class="card-text">₱&nbsp;<?=number_format($ts->total , 2 , '.' , ',' );?></h5>
    
  </div>
 
</div>

<div class="card w-50 text-white  mb-3" style="max-width: 20rem;background: #4C25BC;">
  
  <div class="card-body">
    <h5 class="card-title text-white-50">Total Products <i class="fa fa-cube float-end" style="font-size:36px"></i></h5>
    <h5 class="card-text"><?= $tp ?></h5>
   
  </div>
 
</div>
</div>

</div>

<div class="d-flex justify-content-evenly m-5">

<div class="chart-container shadow-lg bg-body rounded" style=" height:50vh; width:50vw;">
<canvas  id="myChart" style="background-color:white;padding:1rem"></canvas>
</div>
</div>


<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Sale</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?= base_url("sales/update")?>" enctype="multipart/form-data">
        <h5 class="card-title text-primary">Order ID</h5>

                <input name="saleid" type="text" class="form-control"  readonly required>

                <label for="recipient-name" class="col-form-label">Product Name</label>
                <select  name="salepn" id="pnid" class="form-select" aria-label="Default select example">
                <option>Select Product ---</option>
                <?php foreach($products as $product):?>
                    <option value=<?= $product->prod_id?> > <?= $product->prod_name?> (<?= $product->category?> Category)-<?= $product->selling_price?>-(<?= $product->stock?> Stock)</option>
     
                <?php endforeach; ?>

                </select>


                <label for="recipient-name" class="col-form-label">Price</label>
                <input name="saleprice" class="form-control"  readonly required>

                <label for="recipient-name" class="col-form-label">Quantity</label>
                <input name="salequantity" type="number" class="form-control"  required>

                <label for="recipient-name" class="col-form-label">Total</label>
                <input name="saletotal" class="form-control"  readonly required>

                <label for="recipient-name" class="col-form-label">Amount Paid</label>
                <input type ="salenumber" name="amntpaid" class="form-control"  required>

                <label for="recipient-name" class="col-form-label">Amount Tendered</label>
                <input name="saletendered" class="form-control" readonly  required>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> <i class="fa fa-close" style="font-size:16px"></i>  Close</button>
            <button type="submit" class="btn btn-primary" name="submit">  <i class="fa fa-send" style="font-size:16px"></i> Update Sale</button>
        </div>

        </form>
      </div>
      
    </div>
  </div>
</div>

<!-- PARA MAKITA UNG MGA LIST OF EMPLOYEE -->
<div class="container  border mt-5 shadow p-3 mb-5 bg-body rounded">
<table class="table table-light mt-3 table-hover">
<thead>
    <tr>
    <div class="p-3">
      <!-- <h3 style="color:#00B0F5;">List of Sales</h3> -->
      <img src="<?= base_url("./images/list3.png")?>" class="img-fluid" width="30%">
      <h5 class="text-black-50 pb-3">List of Sales for Luminescene Company</h5>
      <input class="form-control me-2" type="search" id="search" placeholder="Search for Sales" aria-label="Search">
    </div>
    </tr>
  </thead>
  
  <thead>
    <tr>
      <?php if($this->session->userdata("user_type") == "Admin"):?>
      <?php endif ?>
      <th scope="col">Added By</th>
      <th scope="col">Product Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Total</th>
      <th scope="col">Amount paid</th>
      <th scope="col">Amount tendered</th>
     
      <?php if($this->session->userdata("user_type") == "Admin"):?>
      <th scope="col">Remove</th>
      <?php endif ?>
    </tr>
  </thead>

  <tbody id="tbody">
      <?php foreach($all as $sale):?>
    <tr>
      <td><?= $sale->fname?></td>
      <td><?= $sale->prod_name?></td>
      <td><?= $sale->quantity?></td>
      <td>₱<?=number_format($sale->price , 2 , '.' , ',' );?></td>
      <td>₱<?=number_format($sale->total , 2 , '.' , ',' );?></td>
      <td>₱<?=number_format($sale->amount_paid , 2 , '.' , ',' );?></td>
      <td <?php if($sale->amount_tendered<0){echo 'style=color:red';}?> >₱<?=number_format($sale->amount_tendered , 2 , '.' , ',' );?></td>

      <?php if($this->session->userdata("user_type") == "Admin"):?>
      <!-- <td><button name="update" idd class="btn btn-info btn-sm text-white update" data-bs-toggle="modal" data-bs-target="#exampleModal1" data-bs-whatever="@mdo">  <i class="fa fa-trash" style="font-size:16px"> Update</button></td> -->
      <td><a name="delete" idu=<?= $sale->sales_id ?> href="<?= base_url("sales/delete/".$sale->sales_id)?>" class="btn btn-danger btn-sm delete"> <i class="fa fa-trash" style="font-size:16px"></i> Delete </a></td>
      <?php endif ?>

    </tr>
    <?php endforeach; ?> 


   
  </tbody>
</table>
<p><?php echo $links; ?></p>
</div>


<?php

$mon = array();
$sale = array();
foreach($sales as $month){
    
    
    $mon[] = $month->month;
    $sale[] = $month->total;

}
$jsonmonth = json_encode($mon); 
$jsonsale = json_encode($sale); 



?>

<script>
   var ctx = document.getElementById('myChart').getContext('2d');
  var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',
    // The data for our dataset

    
    data: {
        labels: <?php echo $jsonmonth ?>,
        datasets: [
          {
            label:["Monthly Sales"],
            backgroundColor: ['#1E7FC3'],
            borderColor: ['#1E7FC3'],
            data: <?php echo $jsonsale ?>,
          }
        ]
    },
    // Configuration options go here
    options: {
      scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    },  
    }
});

// $(".update").on("click",function(){

// var cust_id = $(this).attr("idd");

// var base_url ='';
  
//   $.ajax({
//     type: 'ajax',
//     url:base_url + cust_id,
//     async : true,
//     data:{cust_id:cust_id},
//     dataType:'JSON',
//     success:function(data){
      
//       $('[name="salepn"]').append($("<option value='"+data[0].prod_id+"'>"+data[0].prod_name+"</option>");
//       $('[name="saleprice"]').val(data[0].price);
//       $('[name="salequantity"]').val(data[0].quantity);
//       $('[name="saletotal"]').val(data[0].total);
//       $('[name="amntpaid"]').val(data[0].amount_paid);
//       $('[name="saletendered"]').val(data[0].amount_tendered);
//       $('[name="saleid"]').val(data[0].sales_id);
     
//     }
    
//   })

// })

//Pag calculate ng amount

// $(document).ready(function(){

//     $("#pnid").change(function(){
//       var id = $(this).children("option:selected").text().split("-")[1];
//       $("[name='saleprice']").val(id)
//         console.log(id);
//     })

    

//     $("[name='quantity']").on("keyup",function(){
//       var quantity =$(this).val()
//       var price  = $("[name='price']").val()
//       $("[name='total']").val(parseInt(price) * parseInt(quantity));
//     })

//     $("[name='amntpaid']").on("keyup",function(){
//       var paid =$(this).val()
//       var total  = $("[name='total']").val()
//       $("[name='tendered']").val(parseInt(paid) - parseInt(total));
//     })


//     // for updating
//     $("[name='amntpaid']").on("keyup",function(){
//       var paid =$(this).val()
//       var total  = $("[name='saletotal']").val()
//       $("[name='saletendered']").val(parseInt(paid) - parseInt(total));
//     })

//     $("[name='salequantity']").on("keyup",function(){
//       var quantity =$(this).val()
//       var price  = $("[name='saleprice']").val()
//       $("[name='saletotal']").val(parseInt(price) * parseInt(quantity));
//     })
    

  // });
  

$("#search").on("keyup", function(){

var value = $(this).val().toLowerCase();

$("#tbody tr").filter(function(){

  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);

})

})




</script>
