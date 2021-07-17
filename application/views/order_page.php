<style> 
    body { background-color: #f5f6fa; } 
    .order-title { font-weight: 700; }
    .input-bold { font-weight: 700; background-color:white !important; color: #00B0F5;}
    .req { border-color: #00B0F5; border-width:1px;}
    .no-outline { background-color:white; border-style: none;}

    
</style>

<div style="  background: linear-gradient(135deg, rgba(71,230,255,1) 0%, rgba(30,127,195,1) 26%, rgba(76,37,188,1) 57%, rgba(126,7,192,1) 100%); min-height:15rem;" class="text-white position-relative">

    <div class="p-5">
        <h1 class="text-white"><i class="fa fa-users" style="font-size:36px"></i> Order <i class="	fa fa-calendar float-end" style="font-size:36px"></i> </h1>
        <p class="text-white-50 fs-5 ">Point of Sales and Inventory Management System for Luminescence Company <button class="float-end btn btn-light"><?=  date("F j, Y - l")?></button></p>
    </div>

</div>

<div class="container" style="margin-top:2rem;">
    <div class="d-flex justify-content-center text-dark ">
        
        <div class="card w-50 shadow-sm p-3 mb-5 bg-body rounded" style="max-width: 60rem;">
            <center><img src="<?= base_url("./images/order3.png")?>" class="img-fluid" alt="..."></center>

       
        <!-- <p class="card-title text-primary order-title text-center" style="font-size:1.5rem;">ORDER FORM</p> -->

                <div class="col-auto ">
                    <div class="input-group">
                        <div class="input-group-text phone no-outline "><i class="fas fa-user"></i>&nbsp;Cashier's Name:</div>
                        <input class="form-control no-outline input-bold" value="<?= $emp ?>" readonly>
                    </div>
                </div>
           
            <form method="POST" action="<?= base_url("order/create/")?>">


                <div class="col-auto ">
                    <div class="input-group">
                        <div class="input-group-text phone no-outline "><i class="fas fa-calendar-day"></i>&nbsp;Date:</div>
                        <input name="date" type="text" class="form-control no-outline input-bold" value="<?php echo date('d/m/Y');?>" readonly>
                    </div>
                </div>
               
                <div class="col-auto ">
                    <div class="input-group">
                        <div class="input-group-text phone no-outline"><i class="fas fa-key"></i>&nbsp;Order ID:</div>
                        <input value="<?php echo uniqid().$id."_".$emp;?>" type="text" name="unique" class="form-control no-outline input-bold"  readonly>
                    </div>
                </div>
               
                <hr><input type="hidden" name="id" value="<?= $id ?>">
                
                <label for="recipient-name" class="col-form-label">Product Name</label>
                <div class="col-auto">
                    <div class="input-group">
                        <div class="input-group-text phone req"><i class="fas fa-lightbulb"></i>&nbsp;</div>
                        <select  name="pn" id="pnid" class="form-select req" aria-label="Default select example">
                            <option>Select Product --</option>
                            <?php foreach($products as $product):?>
                                <option value=<?= $product->prod_id?> > <?= $product->prod_name?> (<?= $product->category?> Category)-<?= $product->selling_price?>-(<?= $product->stock?> Stock)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

            
                <label for="recipient-name" class="col-form-label">Price</label>
                <div class="col-auto">
                    <div class="input-group">
                        <!-- <div class="input-group-text phone "><i class="fas fa-tags"></i></div> -->
                        <input name="price" id="price" type="number" class="form-control" readonly required>
                    </div>
                </div>

                <input type="hidden" name="stock" id="stock"value="">

                <label for="recipient-name" class="col-form-label">Quantity</label>
                <div class="col-auto">
                    <div class="input-group">
                        <div class="input-group-text phone req"> <i class="fas fa-list-ol"></i></div>
                        <input name="quantity" id="quantity" type="number" class="form-control req"  required>
                    </div>
                </div>

                <label for="recipient-name" class="col-form-label">Total</label>
                <div class="col-auto">
                    <div class="input-group">
                        <!-- <div class="input-group-text phone"> <i class="fas fa-file-invoice-dollar"></i></div> -->
                        <input name="total" type="number" id="total" class="form-control"  readonly required>
                    </div>
                </div>

                <label for="recipient-name" class="col-form-label">Amount Paid</label>
                <div class="col-auto">
                    <div class="input-group">
                        <div class="input-group-text phone req"><i class="far fa-credit-card"></i></div>
                        <input type ="number" name="amntpaid" id="amntpaid" class="form-control req"  required>
                    </div>
                </div>

                <label for="recipient-name" class="col-form-label">Amount Tendered</label>
                <div class="col-auto">
                    <div class="input-group">
                        <!-- <div class="input-group-text phone"><i class="fas fa-hand-holding-usd"></i></div> -->
                        <input name="tendered" id="tendered" type="number" class="form-control" readonly  required>
                    </div>
                </div>
            
                <button class="btn btn-outline-success mt-3 float-end" id="btn-check" type="submit" disabled>Check Out</button>

            </form>
        </div>
    </div>
</div>


<script>
//Pag calculate ng amount

$(document).ready(function(){

    $("#pnid").change(function(){
      var id = $(this).children("option:selected").text().split("-")[1];
      $("[name='price']").val(id)

      var stock = $(this).children("option:selected").text().split("-")[2];
      stock = stock.slice(0,stock.length-7);
      stock = stock.substring(1);

      $("[name='stock']").val(stock)
    })


    $("[name='quantity']").on("keyup",function(){
      var quantity =$(this).val()
      var price  = $("[name='price']").val()
      $("[name='total']").val(parseInt(price) * parseInt(quantity));

      var txtQuantity = parseInt(document.getElementById('quantity').value);
      var txtStock = parseInt(document.getElementById('stock').value);

      if(txtStock >= txtQuantity) {
            document.getElementById('quantity').style.borderColor=" #00B0F5";
            document.getElementById('quantity').style.color="black";
            document.getElementById("btn-check").disabled=false;
        }else {
            document.getElementById('quantity').style.borderColor="red";
            document.getElementById('quantity').style.color="red";
            document.getElementById("btn-check").disabled=true;

        }
    })

    $("[name='amntpaid']").on("keyup",function(){
      var paid =$(this).val()
      var total  = $("[name='total']").val()
      var tendered = $("[name='tendered']").val(parseInt(paid) - parseInt(total));

      var tenderedAmount = document.getElementById('tendered').value;

        console.log(tenderedAmount);
        if(tenderedAmount < 0) {
            document.getElementById('tendered').style.borderColor="red";
            document.getElementById('tendered').style.color="red";
            document.getElementById("btn-check").disabled=true;
        }else {
            document.getElementById('tendered').style.borderColor="#d3d3d3";
            document.getElementById('tendered').style.color="black";
            document.getElementById("btn-check").disabled=false;

        }
    })

   
  });


  
  
</script>





