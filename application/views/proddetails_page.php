<style> body { background-color: #f5f6fa; } </style>

<div style="  background: linear-gradient(135deg, rgba(71,230,255,1) 0%, rgba(30,127,195,1) 26%, rgba(76,37,188,1) 57%, rgba(126,7,192,1) 100%); min-height:15rem;" class="text-white position-relative">

    <div class="p-5">
        <h1 class="text-white"><i class="fa fa-users" style="font-size:36px"></i> Product <i class="	fa fa-calendar float-end" style="font-size:36px"></i> </h1>
        <p class="text-white-50 fs-5 ">Point of Sales and Inventory Management System for Luminescene Company <button class="float-end btn btn-light"><?=  date("F j, Y - l")?></button></p>
    </div>

</div>


<?php if($this->session->flashdata('status') != ""):?>
<div class="alert alert-success">
  <strong><?php echo $this->session->flashdata('status')?></strong> 
</div>
<?php endif; ?>


<div class="container" style="margin-top:2rem;">
    <div class="d-flex justify-content-center text-dark ">
        
        <div class="card w-50 shadow-sm p-3 mb-5 bg-body rounded" style="max-width: 30rem;">
        <!-- <h3 class="card-title text-center" style="color:#00B0F5;">Product Picture</h3> -->
        <img src=<?= base_url("./images/".$result->prod_img)?> class="rounded mt-3" alt="Product Image">
        <div class="card-body">
            <h5 class="card-title text-center text-primary"><b><?=$result->prod_name?></b></h5>
            <h5><label class="card-text text-center mt-3">Update photo</label></h5>

            <form method="POST" enctype="multipart/form-data" action="<?= base_url("product/profile_update/".$result->prod_id)?>">
                <div class="form-group">
                    <input type="file" class="form-control" name="prodprof">
                </div>

                <input type="hidden" name="idupdate" value=<?= $result->prod_id ?>>
                <button class="btn btn-outline-primary mt-3" type="submit">Update Product Photo</button>
            </form>
           
        </div>
       
        </div>

        <div class="card w-50  shadow-sm p-3 mb-5 bg-body rounded " style="max-width: 25rem;">
        
        <div class="card-body">
            <!-- <h3 class="card-title text-center" style="color:#00B0F5;">Product's Information</h3> -->
            <center><img src="<?= base_url("./images/prod1.png")?>" class="img-fluid mb-4" alt="..."></center>

            <h5 for="exampleDataList" class="form-label">Product Size (cm):</h5>
            <label class="text-primary"><h6>Height: <?=$result->height_cm?> </h6> <h6> Width: <?=$result->width_cm?> </h6> <h6>Length: <?=$result->length_cm?> </h6></label>

            <h5 for="exampleDataList" class="form-label mt-2">Product Description:</h5>
            <label class="text-primary"><?=$result->	prod_desc?></label>
            
            <h5 for="exampleDataList" class="form-label mt-3">Category:</h5>
            <label class="text-primary"><?=$result->category?></label>

            <h5 for="exampleDataList" class="form-label mt-3">Original Price:</h5>
            <label class="text-primary">₱<?=$result->orig_price?></label>

            <h5 for="exampleDataList" class="form-label mt-3">Selling Price:</h5>
            <label class="text-primary">₱<?=$result->selling_price?></label>

            <h5 for="exampleDataList" class="form-label mt-3">Stock:</h5>
            <label class="text-primary"><?=$result->stock?></label>

            <h5 for="exampleDataList" class="form-label mt-3">Added By:</h5>
            <label class="text-primary"><?=$result->fname?></label>

            <h5 for="exampleDataList" class="form-label mt-3">Status:</h5>
            <label class="text-primary"><?=$result->prod_status?></label>



            
           

        </div>
       
        </div>

    </div>
</div>

<script>
setTimeout(function(){
    $(".alert").fadeOut();
}, 6000);

</script>


</body>
</html>