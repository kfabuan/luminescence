<style> body { background-color: #f5f6fa; } </style>

<div style="  background: linear-gradient(135deg, rgba(71,230,255,1) 0%, rgba(30,127,195,1) 26%, rgba(76,37,188,1) 57%, rgba(126,7,192,1) 100%); min-height:15rem;" class="text-white position-relative">

    <div class="p-5">
        <h1 class="text-white"><i class="fa fa-users" style="font-size:36px"></i> Employees <i class="	fa fa-calendar float-end" style="font-size:36px"></i> </h1>
        <p class="text-white-50 fs-5 ">Point of Sales and Inventory Management System for Luminescene Company <button class="float-end btn btn-light"><?=  date("F j, Y - l")?></button></p>
    </div>

</div>

<!-- PAG ADD NG EMPLOYEE -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?= base_url("employee/create")?>" enctype="multipart/form-data">
          <div class="mb-3">
     
            <label for="recipient-name" class="col-form-label">First name</label>
            <input type="text" class="form-control" id="recipient-name" name="firstname" required>
            <small><?= form_error("firstname") ?></small>
            <label for="recipient-name" class="col-form-label">Middle name</label>
            <input type="text" class="form-control" id="recipient-name" name="middlename" required>
            <label for="recipient-name" class="col-form-label">Last Name</label>
            <input type="text" class="form-control" id="recipient-name" name="lastname" required>
            <label for="recipient-name" class="col-form-label">Username</label>
            <input type="email" class="form-control" id="recipient-name" name="username" required>
            <label for="recipient-name" class="col-form-label">Password</label>
            <input type="password" class="form-control" id="recipient-name" name="password" required>

            <label for="recipient-name" class="col-form-label">Job Position</label>
            <select name="type" id="" class="form-select" aria-label="Default select example">

            <option value="Admin">Admin</option>
            <option value="Cashier">Cashier</option>

            </select>


            <label for="recipient-name" class="col-form-label">Employee Status</label>
            <select name="status" id="" class="form-select" aria-label="Default select example">

            <option value="Active">Active</option>
            <option value="Not Active">Not Active</option>

            </select>
            <label for="recipient-name" class="col-form-label">Profile</label>
            <input type="file" class="form-control" id="recipient-name" name="img" required>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> <i class="fa fa-close" style="font-size:16px"></i>  Close</button>
            <button type="submit" class="btn btn-primary" name="submit">  <i class="fa fa-send" style="font-size:16px"></i> Add Employee</button>
        </div>

        </form>
      </div>
      
    </div>
  </div>
</div>



<!-- PARA MAKITA UNG MGA LIST OF EMPLOYEE NA PWEDENG MAEDIT -->

<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?= base_url("employee/update")?>" enctype="multipart/form-data">
          <div class="mb-3">
            <input type="hidden" class="form-control" id="recipient-name" name="idup" required>

            <label for="recipient-name" class="col-form-label">First name</label>
            <input type="text" class="form-control" id="recipient-name" name="firstnameup" required>
            <label for="recipient-name" class="col-form-label">Middle name</label>
            <input type="text" class="form-control" id="recipient-name" name="middlenameup" required>
            <label for="recipient-name" class="col-form-label">Last Name</label>
            <input type="text" class="form-control" id="recipient-name" name="lastnameup" required>
            <label for="recipient-name" class="col-form-label">Username</label>
            <input type="email" class="form-control" id="recipient-name" name="usernameup" required>
            <label for="recipient-name" class="col-form-label">Password</label>
            <input type="password" class="form-control" id="recipient-name" name="passwordup" required>

            <label for="recipient-name" class="col-form-label">Job Position</label>
            <select name="typeup" id="" class="form-select" aria-label="Default select example">

              <option value="Admin">Admin</option>
              <option value="Cashier">Cashier</option>

            </select>


            <label for="recipient-name" class="col-form-label">Employee Status</label>
            <select name="statusup" id="" class="form-select" aria-label="Default select example">

            <option value="Active">Active</option>
            <option value="Not Active">Not Active</option>

            </select>
           
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> <i class="fa fa-close" style="font-size:16px"></i>  Close</button>
            <button type="submit" class="btn btn-primary" name="submit">  <i class="fa fa-send" style="font-size:16px"></i> Update Employee</button>
        </div>

        </form>
      </div>
      
    </div>
  </div>
</div>

<?php if($this->session->flashdata('status') != ""):?>
<div class="alert alert-success">
  <strong><?php echo $this->session->flashdata('status')?></strong> 
</div>
<?php endif; ?>



<?php if(form_error("username")):?>
 <div class="alert alert-danger">
  <strong><?php echo form_error("username")?></strong> 
</div>
<?php endif; ?>

<?php if ($this->session->flashdata('emp_add_status')){ ?>
    <div class="alert alert-danger" role="alert">
        <p class="fw-bold" style=''><?= $this->session->flashdata('emp_add_status');?></p>
    </div>
 <?php unset($_SESSION['emp_add_status']);} ?>

<!-- PARA MAKITA UNG MGA LIST OF EMPLOYEE -->
<div class="container  border mt-5 shadow p-3 mb-5 bg-body rounded table-responsive">
<table class="table table-light table-hover mt-3">
<thead>
    <tr>
    <div class="p-3">
      <!-- <h3 style="color:#00B0F5;">List of Employees</h3> -->
      <img src="<?= base_url("./images/list2.png")?>" class="img-fluid" width="30%">
      <h5 class="text-black-50 pb-3">List of POS and IMS Employees for Luminescene Company <?php if($this->session->userdata("user_type") == "Admin"):?> <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"> <i class="fa fa-plus" style="font-size:16px"></i>  Add Employee</button>  <?php endif ?></h5>
      <input class="form-control me-2" type="search" id="search" placeholder="Search for Employee" aria-label="Search">
    </div>
    </tr>
  </thead>
  
  <thead>
    <tr>
      <?php if($this->session->userdata("user_type") == "Admin"):?>
      <th scope="col">View</th>
      <?php endif ?>
      <th scope="col">Profile</th>
      <th scope="col">First Name</th>
      <th scope="col">Middle Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Date Added</th>
      <th scope="col">Status</th>
     
      <th scope="col">Job Position</th>
      <?php if($this->session->userdata("user_type") == "Admin"):?>
      <th scope="col">Update</th>
      <th scope="col">Remove</th>
      <?php endif ?>
    </tr>
  </thead>

  <tbody id="tbody">
      <?php foreach($employees as $employee):?>
    <tr>
      <?php if($this->session->userdata("user_type") == "Admin"):?>
      <td><a href="<?= base_url("employee/detail/".$employee->emp_id)?>">View</a></td>
      <?php endif ?>
      <td><img src="<?= base_url("./images/".$employee->emp_image)?>" alt="" class="rounded" width="60"></td>
      <td><?= $employee->fname?></td>
      <td><?= $employee->mname?></td>
      <td><?= $employee->lname?></td>
      <td><?= $employee->date_added?></td>
      <td><?= $employee->emp_status?></td>
      <td><?= $employee->user_type?></td>

      <?php if($this->session->userdata("user_type") == "Admin"):?>
      <td><button name="update" idd=<?= $employee->emp_id ?> class="btn btn-info btn-sm text-white update" data-bs-toggle="modal" data-bs-target="#exampleModal1" data-bs-whatever="@mdo"> <i class="fas fa-user-edit" style="font-size:16px"> </i>&nbsp;Update</button></td>
      <td><a name="delete" idu=<?= $employee->emp_id ?> href="<?= base_url("employee/delete/".$employee->emp_id)?>" class="btn btn-danger btn-sm delete"> <i class="fa fa-trash" style="font-size:16px"></i> Delete </a></td>
      <?php endif ?>

    </tr>
    <?php endforeach; ?> 


   
  </tbody>
</table>
<p><?php echo $links; ?></p>
</div>



<script>
$(".update").on("click",function(){

  var cust_id = $(this).attr("idd");
  
  var base_url ='<?= site_url('employee/retrieve/')?>';

    $.ajax({
      type: 'ajax',
      url:base_url + cust_id,
      async : true,
      data:{cust_id:cust_id},
      type:"POST",
      dataType:'JSON',
      success:function(data){
        
        $('[name="firstnameup"]').val(data.fname);
        $('[name="middlenameup"]').val(data.mname);
        $('[name="lastnameup"]').val(data.lname);
        $('[name="usernameup"]').val(data.uname);
        $('[name="passwordup"]').val(data.passw);
        $('[name="typeup"]').val(data.user_type);
        $('[name="statusup"]').val(data.emp_status);
        $('[name="idup"]').val(data.emp_id);
        
        
        
      }
      
    })

})

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

