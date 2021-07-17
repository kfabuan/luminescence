<style> body { background-color: #f5f6fa; } </style><div style="  background: linear-gradient(135deg, rgba(71,230,255,1) 0%, rgba(30,127,195,1) 26%, rgba(76,37,188,1) 57%, rgba(126,7,192,1) 100%); min-height:15rem;" class="text-white position-relative">

    <div class="p-5">
        <h1 class="text-white"><i class="fa fa-users" style="font-size:36px"></i> Employee <i class="	fa fa-calendar float-end" style="font-size:36px"></i> </h1>
        <p class="text-white-50 fs-5 ">Point of Sales and Inventory Management System for Luminescene Company <button class="float-end btn btn-light"><?=  date("F j, Y - l")?></button></p>
    </div>

</div>

<?php if ($this->session->flashdata('photo_update')){ ?>
    <div class="alert alert-success" role="alert">
        <p class="fw-bold" style=''><?= $this->session->flashdata('photo_update');?></p>
    </div>
 <?php unset($_SESSION['photo_update']);} ?>

 <?php if ($this->session->flashdata('photo_update_error')){ ?>
    <div class="alert alert-danger" role="alert">
        <p class="fw-bold" style=''><?= $this->session->flashdata('photo_update_error');?></p>
    </div>
 <?php unset($_SESSION['photo_update_error']);} ?>

<div class="container" style="margin-top:2rem;">
    <div class="d-flex justify-content-center text-dark ">
        
        <div class="card w-50 shadow-sm p-3 mb-5 bg-body rounded" style="max-width: 30rem;">
        <!-- <h3 class="card-title text-center "style="color:#00B0F5;">Profile Picture</h3> -->
        <img src=<?= base_url("./images/".$result->emp_image)?> class="rounded mt-3" alt="...">
        <div class="card-body">
            <h5 class="card-title text-center text-primary">Profile Picture</h5>
            <h5><label class="card-text text-center mt-3">Update photo</label></h5>

            <form method="POST" enctype="multipart/form-data" action="<?= base_url("employee/profile_update/".$result->emp_id)?>">
                <div class="form-group">
                    <input type="file" class="form-control" name="emprof">
                </div>
                <input type="hidden" name="idupdate" value=<?= $result->emp_id ?>>
                <button class="btn btn-outline-primary mt-3" type="submit">Update your Photo</button>
            </form>
           
        </div>
       
        </div>

        <div class="card w-50  shadow-sm p-3 mb-5 bg-body rounded " style="max-width: 25rem;">
        
        <div class="card-body">
            <!-- <h3 class="card-title text-center" style="color:#00B0F5;">Employee's Information</h3> -->
            <center><img src="<?= base_url("./images/emp1.png")?>" class="img-fluid mb-4" alt="..."></center>
            <label for="exampleDataList" class="form-label">Full Name:</label>
            <h5 class="text-primary"><?=$result->fname?> <?=$result->mname?> <?=$result->lname?></h5>
            <label for="exampleDataList" class="form-label mt-2">Job position:</label>
            <h5 class="text-primary"><?=$result->user_type?></h5>
            <label for="exampleDataList" class="form-label mt-2">Employee's Username:</label>
            <h5 class="text-primary"><?=$result->uname?></h5>

        </div>
        <img src=<?= base_url("./images/profile.png")?> class="rounded" alt="...">
        </div>

    </div>
</div>

<!-- <script>
setTimeout(function(){
    $(".alert").fadeOut();
}, 6000);

</script> -->



</body>
</html>