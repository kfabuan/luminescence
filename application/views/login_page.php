


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;600;700&display=swap" rel="stylesheet">
    
    <!-- icons -->
    <script src="https://kit.fontawesome.com/c84b46effb.js" crossorigin="anonymous"></script>

    <!-- favicon -->
    <link rel="shortcut icon" href="<?php echo base_url("./images/3.png");?>" type="image/ico">

    <title>Login</title>
</head>
<body id="divToPrint" style="
    
    background-image: linear-gradient(rgba(47, 54, 64,0.6),rgba(47, 54, 64,0.6)),url(<?= base_url("./images/login_bg.jpg")?>);
    background-repeat: no-repeat;
    background-size: cover;
    height:89vh;
    "
>




<div class="container" style="margin-top:6rem;">
    <div class="d-flex justify-content-center text-dark ">

        <div class="card w-50 shadow-sm p-3 mb-5 bg-body rounded" style="max-width: 25rem;">
        <img src="<?= base_url("./images/login_bg1.png")?>" class="rounded mt-5" alt="...">
        <div class="card-body">
            <h5 class="card-title text-center text-primary">Welcome to Point of Sales and Inventory Management System</h5>
            <p class="card-text text-center mt-3">A web-based Sales and Inventory System for Luminescence</p>
        
        </div>
       
        </div>

        <div class="card w-50  shadow-sm p-3 mb-5 bg-body rounded " style="max-width: 25rem;">
        
        <div class="card-body">
            <?php if ($this->session->flashdata('status')){ ?>
                <div class="alert alert-danger" role="alert">
                    <p class="fw-bold" style=''><?= $this->session->flashdata('status');?></p>
                </div>
            <?php unset($_SESSION['status']);} ?>

            <?php if ($this->session->flashdata('success')){ ?>
                <div class="alert alert-danger" role="alert">
                    <p class="fw-bold" style=''><?= $this->session->flashdata('success');?></p>
                </div>
            <?php unset($_SESSION['success']);} ?>

            <h3 class="card-title text-center text-primary rounded">LOGIN</h3>
                <p class="text-center mb-4">Welcome to Luminescence</p>
            
            <form class="mt-3" method="POST" action="<?= base_url("login/login_credentials")?>">

            <label for="exampleDataList" class="form-label">Username as (Admin or Cashier)</label>
            <div class="col-auto">
                <div class="input-group">
                    <div class="input-group-text phone"><i class="fas fa-user"></i></div>
                    <input class="form-control me-2" name="username" type="text" placeholder="Enter your email " aria-label="Search" >
                </div>
                <small class="text-danger"><?php echo form_error("username"); ?></small>
            </div>
               
           
           
            <label for="exampleDataList" class="form-label mt-2">Password as (Admin or Cashier)</label>
            <div class="col-auto">
                <div class="input-group">
                    <div class="input-group-text phone"><i class="fas fa-unlock-alt"></i></div>
                    <input class="form-control me-2 " name="password" type="password" placeholder="Enter your password" aria-label="Search">
                </div>
                <small class="text-danger"><?php echo form_error("password"); ?></small>
            </div>

            <button class="btn btn-outline-primary mt-3 float-end" type="submit" name="login">Login Now</button>

            </form>
        
        </div>
        <img src="<?= base_url("./images/login_bg2.png")?>" class="rounded" alt="...">
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