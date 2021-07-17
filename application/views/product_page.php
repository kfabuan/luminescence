<style> body { background-color: #f5f6fa; } </style>

<div style="  background: linear-gradient(135deg, rgba(71,230,255,1) 0%, rgba(30,127,195,1) 26%, rgba(76,37,188,1) 57%, rgba(126,7,192,1) 100%); min-height:15rem;" class="text-white position-relative">

    <div class="p-5">
        <h1 class="text-white"><i class="fa fa-users" style="font-size:36px"></i> Products <i class="	fa fa-calendar float-end" style="font-size:36px"></i> </h1>
        <p class="text-white-50 fs-5 ">Point of Sales and Inventory Management System for Luminescene Company <button class="float-end btn btn-light"><?=  date("F j, Y - l")?></button></p>
    </div>

</div>

<!-- PAG ADD NG PRODUCTS -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Products</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?= base_url("product/create")?>" enctype="multipart/form-data">
          <div class="mb-3">

            <label for="recipient-name" class="col-form-label">Product Name</label>
            <input type="text" class="form-control" id="recipient-name" name="productname" required>
            <small class="text-danger"><?php echo form_error("productname"); ?></small>
            <label for="recipient-name" class="col-form-label">Height(cm)</label>
            <input type="text" class="form-control" id="recipient-name" name="height" required>
            <label for="recipient-name" class="col-form-label">Width(cm)</label>
            <input type="text" class="form-control" id="recipient-name" name="width" required>
            <label for="recipient-name" class="col-form-label">Length(cm)</label>
            <input type="text" class="form-control" id="recipient-name" name="length" required>
            <label for="recipient-name" class="col-form-label">Description</label>
            <textarea type="text" class="form-control" id="recipient-name" name="desc" required></textarea>

            <label for="recipient-name" class="col-form-label">Category</label>
            <select name="cat" id="" class="form-select" aria-label="Default select example">

            <option value="Floor">Floor</option>
            <option value="Grand">Grand (center)</option>
            <option value="Pendant">Pendant (single)</option>
            <option value="Suspension">Suspension (hanging)</option>
            <option value="Table">Table</option>
            <option value="Wall">Wall</option>

            </select>

            <label for="recipient-name" class="col-form-label">Original Price</label>
            <input type="number" class="form-control" id="recipient-name" name="orig" required>

            <label for="recipient-name" class="col-form-label">Selling Price</label>
            <input type="number" class="form-control" id="recipient-name" name="sell" required>

            <label for="recipient-name" class="col-form-label">Stock</label>
            <input type="number" class="form-control" id="recipient-name" name="stock" required>


            <label for="recipient-name" class="col-form-label">Product Status</label>
            <select name="status" id="" class="form-select" aria-label="Default select example">

            <option value="Active">Active</option>
            <option value="Not Active">Not Active</option>

            </select>

            <label for="recipient-name" class="col-form-label">Product Image</label>
            <input type="file" class="form-control" id="recipient-name" name="prodimg" required>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> <i class="fa fa-close" style="font-size:16px"></i>  Close</button>
            <button type="submit" class="btn btn-primary" name="submit">  <i class="fa fa-send" style="font-size:16px"></i> Add Products</button>
        </div>

        </form>
      </div>
      
    </div>
  </div>
</div>



<!-- PARA MAKITA UNG MGA LIST OF PRODUCTS NA PWEDENG MAEDIT -->

<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Products</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?= base_url("product/update")?>" enctype="multipart/form-data">
          <div class="mb-3">

            <input type="hidden" class="form-control" id="recipient-name" name="idup" required>

            <label for="recipient-name" class="col-form-label">Product Name</label>
            <input type="text" class="form-control" id="recipient-name" name="productnameup" required>
            <label for="recipient-name" class="col-form-label">Height(cm)</label>
            <input type="number" class="form-control" id="recipient-name" name="heightup" required>
            <label for="recipient-name" class="col-form-label">Width(cm)</label>
            <input type="number" class="form-control" id="recipient-name" name="widthup" required>
            <label for="recipient-name" class="col-form-label">Length(cm)</label>
            <input type="number" class="form-control" id="recipient-name" name="lengthup" required>
            <label for="recipient-name" class="col-form-label">Description</label>
            <textarea type="text" class="form-control" id="recipient-name" name="descup" required></textarea>

            <label for="recipient-name" class="col-form-label">Category</label>
            <select name="catup" id="" class="form-select" aria-label="Default select example">

            <option value="Floor">Floor</option>
            <option value="Grand">Grand (center)</option>
            <option value="Pendant">Pendant (single)</option>
            <option value="Suspension">Suspension (hanging)</option>
            <option value="Table">Table</option>
            <option value="Wall">Wall</option>

            </select>

            <label for="recipient-name" class="col-form-label">Original Price</label>
            <input type="number" class="form-control" id="recipient-name" name="origup" required>

            <label for="recipient-name" class="col-form-label">Selling Price</label>
            <input type="number" class="form-control" id="recipient-name" name="sellup" required>

            <label for="recipient-name" class="col-form-label">Stock</label>
            <input type="number" class="form-control" id="recipient-name" name="stockup" required>


            <label for="recipient-name" class="col-form-label">Product Status</label>
            <select name="statusup" id="" class="form-select" aria-label="Default select example">

            <option value="Active">Active</option>
            <option value="Not Active">Not Active</option>

            </select>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> <i class="fa fa-close" style="font-size:16px"></i>  Close</button>
            <button type="submit" class="btn btn-primary" name="submit">  <i class="fa fa-send" style="font-size:16px"></i> Update Products</button>
        </div>

        </form>
      </div>
      
    </div>
  </div>
</div>

<?php if ($this->session->flashdata('status')){ ?>
    <div class="alert alert-success" role="alert">
        <p class="fw-bold" style=''><?= $this->session->flashdata('status');?></p>
    </div>
 <?php unset($_SESSION['status']);} ?>

<?php if ($this->session->flashdata('prod_add_error')){ ?>
    <div class="alert alert-danger" role="alert">
        <p class="fw-bold" style=''><?= $this->session->flashdata('prod_add_error');?></p>
    </div>
 <?php unset($_SESSION['prod_add_error']);} ?>

<!-- PARA MAKITA UNG MGA LIST OF PRODUCTS -->
<div class="container  border mt-5 shadow p-3 mb-5 bg-body rounded table-responsive">
<table class="table table-light table-hover mt-3 ">
<thead>
    <tr>
    <div class="p-3">
    <img src="<?= base_url("./images/list1.png")?>" class="img-fluid" width="30%">
      <!-- <h3 style="color:#00B0F5;">List of Products</h3> -->
      <h5 class="text-black-50 pb-3">List of POS and IMS Products for Luminescene Company <?php if($this->session->userdata("user_type") == "Admin"):?> <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"> <i class="fa fa-plus" style="font-size:16px"></i> Add Products</button> <?php endif; ?></h5>
      <input class="form-control me-2" type="search" id="search" placeholder="Search for Product" aria-label="Search">
    </div>
    </tr>
  </thead>
  
  <thead>
    <tr>
      <?php if($this->session->userdata("user_type") == "Admin"):?>
      <th scope="col">View</th>
      <?php endif; ?>
      <th scope="col">Product Image</th>
      <th scope="col">Product Name</th>
      <th scope="col">Category</th>
      <th scope="col">Original Price</th>
      <th scope="col">Selling Price</th>
      <th scope="col">Stock</th>
      <th scope="col">Product Status</th>
      <th scope="col">Added By</th>
      <?php if($this->session->userdata("user_type") == "Admin"):?>
      <th scope="col">Update</th>
      <th scope="col">Remove</th>
      <?php endif; ?>
    </tr>
  </thead>

  <tbody id="tbody">
      <?php foreach($products->result() as $product):?>
    <tr>
      <?php if($this->session->userdata("user_type") == "Admin"):?>
      <td><a href="<?= base_url("product/detail/".$product->prod_id)?>">View</a></td>
      <?php endif; ?>
      <td><img src="<?= base_url("./images/".$product->prod_img)?>" alt="" class="rounded" width="60"></td>
      <td <?php if($product->stock<=5){echo 'style=color:red';}?>><?= $product->prod_name?></td>
      <td <?php if($product->stock<=5){echo 'style=color:red';}?>><?= $product->category ?></td>
      <td <?php if($product->stock<=5){echo 'style=color:red';}?>>₱ <?=number_format($product->orig_price, 2 , '.' , ',' );?></td>
      <td <?php if($product->stock<=5){echo 'style=color:red';}?>>₱ <?=number_format($product->selling_price, 2 , '.' , ',' );?></td>
      <td <?php if($product->stock<=5){echo 'style=color:red';}?>><?= $product->stock?></td>
      <td <?php if($product->stock<=5){echo 'style=color:red';}?>><?= $product->prod_status?></td>
      <td <?php if($product->stock<=5){echo 'style=color:red';}?>><?= $product->fname?></td>

      <?php if($this->session->userdata("user_type") == "Admin"):?>
      <td><button name="update" idd=<?= $product->prod_id ?> class="btn btn-info btn-sm text-white update" data-bs-toggle="modal" data-bs-target="#exampleModal1" data-bs-whatever="@mdo"> <i class="fas fa-edit" style="font-size:16px"></i>&nbsp; Update</button></td>
      <td><a href="<?= base_url("product/delete/".$product->prod_id)?>" class="btn btn-danger btn-sm delete"> <i class="fa fa-trash" style="font-size:16px"></i> Delete </a></td>
      <?php endif; ?>
      
    </tr>
    <?php endforeach; ?> 

        
   
  </tbody>
</table>
<p><?php echo $links; ?></p>
</div>



<script>
$(".update").on("click",function(){

  var cust_id = $(this).attr("idd");
  
  var base_url ='<?= site_url('product/retrieve/')?>';

    $.ajax({
      type: 'ajax',
      url:base_url + cust_id,
      async : true,
      data:{cust_id:cust_id},
      type:"POST",
      dataType:'JSON',
      success:function(data){
        
        $('[name="productnameup"]').val(data.prod_name);
        $('[name="heightup"]').val(data.height_cm);
        $('[name="widthup"]').val(data.width_cm);
        $('[name="lengthup"]').val(data.length_cm);
        $('[name="descup"]').val(data.prod_desc);
        $('[name="catup"]').val(data.category);
        $('[name="origup"]').val(data.orig_price);
        $('[name="sellup"]').val(data.selling_price);
        $('[name="stockup"]').val(data.	stock);
        $('[name="statusup"]').val(data.prod_status);
        $('[name="idup"]').val(data.prod_id);
        
        
        
      }
      
    })

})

// PARA MA FILTER UNG MGA DATA SA TABLE NG MABILISAN

$("#search").on("keyup", function(){

var value = $(this).val().toLowerCase();

$("#tbody tr").filter(function(){

  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);

})

})


setTimeout(function(){
    $(".alert").fadeOut();
}, 6000);

</script>

