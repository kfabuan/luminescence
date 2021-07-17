<body> 
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <img src="<?= base_url("./images/6.png")?>" width="30" height="30" alt="">
    <a class="navbar-brand" href="<?= base_url("dashboard")?>"><b style="color:#3b3b3b;"> LUMINESCENE </b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php if($this->uri->segment(1) == "dashboard"):?> active fw-bold <?php endif ?>" aria-current="page" href="<?= base_url("dashboard")?>">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($this->uri->segment(1) == "product"):?> active fw-bold <?php endif ?>" href="<?= base_url("product")?>">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($this->uri->segment(1) == "order"):?> active fw-bold<?php endif ?>" href="<?= base_url("order")?>">Order</a>
        </li>

        <?php if($this->session->userdata("user_type") == "Admin"):?>
        <li class="nav-item">
          <a class="nav-link <?php if($this->uri->segment(1) == "sales"):?> active fw-bold<?php endif ?>" href="<?= base_url("sales")?>">Sales</a>
        </li>
        <?php endif; ?>
        
        <li class="nav-item">
          <a class="nav-link <?php if($this->uri->segment(1) == "employee"):?> active fw-bold<?php endif ?>" href="<?= base_url("employee")?>">Employee</a>
        </li>
       
          
      </ul>
      <a class=" nav-link" href="<?= base_url("login/logout")?>"> <button class="btn btn-sm btn-outline-danger">Logout</button></a>
    </div>
  </div>
</nav>
