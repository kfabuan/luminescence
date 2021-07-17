
<div style=" background: linear-gradient(135deg, rgba(71,230,255,1) 0%, rgba(30,127,195,1) 26%, rgba(76,37,188,1) 57%, rgba(126,7,192,1) 100%); min-height:15rem;" class="text-white position-relative">

    <div class="p-5">
        <h1 class="text-white"><i class="fa fa-cubes" style="font-size:36px"></i> Cashier's Dashboard <i class="	fa fa-calendar float-end" style="font-size:36px"></i> </h1>
        <p class="text-white-50 fs-5 ">Point of Sales and Inventory Management System for Luminescene Company <button class="float-end btn btn-light"><?=  date("F j, Y - l")?></button></p>
    </div>
</div>
 
 <!-- CARDS -->

<div style="margin-top:3rem; margin-bottom:11rem;">
<div class="d-flex justify-content-evenly pt-3" stlye=" margin-top:9rem;">


<div class="card w-50 text-white mb-3 " style="max-width: 26rem;background: #1E7FC3;">

  <a href="<?= base_url("employee")?>" class=" text-white">


  <div class="card-body text-center ">
  
    <h5 class="card-title text-white-100" style="font-size:26px ">Employee</h5>
    <i class="fa fa-address-card " style="font-size:63px;margin-bottom:3rem;"></i>
  </div>
  
  </a>
  
 
</div>

<div class="card w-50 text-white mb-3" style="max-width: 26rem;background: #4C25BC;">
  
<a  href="<?= base_url("order")?>" class=" text-white">

  <div class="card-body text-center">
    <h5 class="card-title text-white-100" style="font-size:26px">Order Form</h5>
    <i class="fa fa-briefcase " style="font-size:63px;margin-bottom:3rem;"></i>
    
    
  </div>

  </a>
 
</div>

<div class="card w-50 text-white mb-3" style="max-width: 26rem;background: #7E07C0;">
  
<a  href="<?= base_url("product")?>" class=" text-white">

  <div class="card-body text-center">
    <h5 class="card-title text-white-100" style="font-size:26px">Products</h5>
    <i class="fa fa-cube " style="font-size:63px; margin-bottom:3rem;"></i>
  
   
  </div>

  </a>
 
</div>

</div>
</div>
