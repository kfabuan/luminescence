<style> body { background-color: #f5f6fa; } </style>

<!-- INTRO -->

<div style=" background: linear-gradient(135deg, rgba(71,230,255,1) 0%, rgba(30,127,195,1) 26%, rgba(76,37,188,1) 57%, rgba(126,7,192,1) 100%); min-height:15rem;" class="text-white position-relative">

    <div class="p-5" style="margin-left:13rem;">
        <h1 class="text-white"><i class="fa fa-cubes" style="font-size:36px"></i> Dashboard <i class="	fa fa-calendar float-end" style="font-size:36px"></i> </h1>
        <p class="text-white-50 fs-5">Point of Sales and Inventory Management System for Luminescence Company<button class="float-end btn btn-light"><?= date("F j, Y - l")?></button></p>
    </div>

  <div class="container position-absolute top-100 start-50 translate-middle" style="margin-top:12rem;">
    <div class="d-flex justify-content-evenly mt-5 text-dark">

<div class="card w-50 shadow p-3 mb-6 bg-body rounded animate__animated animate__fadeInUp" style="max-width: 25rem;">
  
  <div class="card-body \">
    <h5 class="card-title text-center" style="color:#00B0F5;">Welcome to POS and IMS Admin!</h5>
    <p class="card-text text-center">A software that will automates the transaction process and tracking important sales data. It also include an electronic cash register and software to coordinate data collected from daily purchases.</p>
   
  </div>

  <img src="./images/bg3.png" class="rounded" alt="...">
 
</div>

<div class="card w-50  shadow p-3 mb-6 bg-body rounded animate__animated animate__fadeInUp " style="max-width: 25rem;">
  
  <div class="card-body">
    <h5 class="card-title text-center " style="color:#00B0F5;">Feature of this Application</h5>
    <p class="card-text text-center">Allows users to add and update data in the succeeding transactions including purchasing orders, recording of products, retrieving the records and interpreting  sales reports with data visualization.</p>
   
  </div>
  <img src="./images/bg1.png" class="rounded" alt="...">
</div>

<div class="card w-50  shadow p-3 mb-6 bg-body rounded animate__animated animate__fadeInUp" style="max-width: 25rem;">
  
  <div class="card-body">
    <h5 class="card-title text-center" style="color:#00B0F5;">What is the purpose of POS and IMS?</h5>
    <p class="card-text text-center font-italic">Place where a customer executes the payment for goods or services  at your business. Serves as the central component for your business; it’s the hub where everything like sales, inventory and product management merges.</p>
   
  </div>
  <img src="./images/bg2.png" class="rounded" alt="...">
</div>

</div>
</div>
    
</div>

<!-- CARDS -->

<div style="margin-top:33rem;">
<div class="d-flex justify-content-evenly pt-3" stlye=" margin-top:9rem;">

<div class="card w-50 text-white mb-3 " style="max-width: 20rem;background: #47E6FF;">
  
  <div class="card-body ">
    <h5 class="card-title text-white-50">Products <i class="fa fa-address-card float-end" style="font-size:36px"></i></h5>
    <h5 class="card-text"></h5>
    <a href="<?= base_url("product")?>" class="btn btn-light">View More > </a>
  </div>
 
</div>

<div class="card w-50 text-white mb-3" style="max-width: 20rem;background: #1E7FC3;">
  
  <div class="card-body">
    <h5 class="card-title text-white-50">Order <i class="fa fa-briefcase float-end" style="font-size:36px"></i></h5>
    <h5 class="card-text"></h5>
    <a href="<?= base_url("order")?>" class="btn btn-light" href="category.php">View More > </a>
  </div>
 
</div>

<div class="card w-50 text-white mb-3" style="max-width: 20rem;background: #4C25BC;">
  
  <div class="card-body">
    <h5 class="card-title text-white-50">Sales <i class="fa fa-cube float-end" style="font-size:36px"></i></h5>
    <h5 class="card-text"></h5>
    <a  href="<?= base_url("sales")?>" class="btn btn-light">View More > </a>
  </div>
 
</div>

<div class="card w-50 text-white mb-3" style="max-width: 20rem;background: #7E07C0;">
  
  <div class="card-body">
    <h5 class="card-title text-white-50">Employee  <i class="fa fa-users float-end" style="font-size:36px"></i></h5>
    <h5 class="card-text"></h5>
    <a href="<?= base_url("employee")?>"class="btn btn-light">View More > </a >
  </div>
 
</div>

</div>
</div>


<!-- Bar Chart -->

<div class="d-flex justify-content-center">
<div class="chart-container shadow-lg bg-body rounded" style="position: relative; height:40vh; width:70vw; margin-bottom:20rem;margin-top:2rem;">
<canvas id="myChart" style="background-color:white;padding:2rem"></canvas>

</div>
</div>

<script>
  var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',
    // The data for our dataset
    data: {
        labels: ['Floor', 'Grand(center)', 'Pendant(single)', 'Suspension(hanging)', 'Table', 'Wall'],
        datasets: [
          {
            label: ["In Demand Product Categories "],
            // backgroundColor: ['#1E7FC3','#1E7FC3','#1E7FC3','#1E7FC3','#1E7FC3','#1E7FC3'],
            // borderColor: ['rgb(9, 132, 227)','rgb(255, 99, 132)','rgb(46, 204, 113)','rgb(255, 99, 132)'],
            backgroundColor: ['#A2DBFA','#A2DBFA','#A2DBFA','#A2DBFA','#A2DBFA','#A2DBFA'],
            // backgroundColor: ['#A2DBFA','#BEAEE2','#C0FEFC','#7ab2ff','#0A81AB','#39A2DB'],

            borderColor: ['#1CA7EC','#1CA7EC','#1CA7EC','#1CA7EC','#1CA7EC','#1CA7EC'],
            // borderColor: ['#7BD5F5','#787FF6','#4ADEDE','#1CA7EC','#1F2F98','#1E7FC3'],

            borderWidth: 1.5,
            data: [<?= $floor?>,<?= $grand?>,<?= $pendant?>,<?= $pendant?>,<?= $table?>,<?= $wall?>]
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
</script>



</body>
</html>