<?php
include("includes/db.php");
session_start();
if(!isset($_SESSION['admin_email']))
{
   echo "<script>window.open('login.php','_self')</script>";
}

else
{

?>

<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
   <title></title>
   <link rel="stylesheet" type="text/css" href="styles/style.css" media="all">
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css" integrity="sha384-dNpIIXE8U05kAbPhy3G1cz+yZmTzA6CY8Vg/u2L9xRnHjJiAK76m2BIEaSEV+/aU" crossorigin="anonymous">
<style type="text/css">
      .panel-box {
    display: table;
    table-layout: fixed;
    width: 100%;
    height: 100%;
    text-align: center;
    border: medium none;
}
   
.panel-box .panel-icon {
    display: table-cell;
    padding: 29px;
    width: 1%;
    vertical-align: top;
    border-radius: 0px;
    text-align: center;
   border-bottom: 1px solid #fcfcfc;
   border-top: 1px solid #fcfcfc;
   border-right: 1px solid #fcfcfc;
}
   
   .dashboard-stats .stat-icon {
    line-height: 65px;
}
   

   .bg-success {
    background-color: #A3C86D !important;
    color: #FFF !important;
}
   
   .success-text {
    color: #82b33a;
}
   
   .bg-danger {
    background-color: #FF7857 !important;
    color: #FFF !important;
}
   
   .danger-text {
    color: #d15b3d;
}
   
   
   .bg-lovender {
    background-color: #8075C4 !important;
    color: #FFF !important;
}
   
   
   .lovender-text {
    color: #6a5fb1;
}
   
   

   .bg-info {
    background-color: #7ACBEE !important;
    color: #FFF !important;
}
   
   .info-text {
    color: #3ca0cb;
}
   
   
   
   
   .size-h1 {
    font-size: 20px;
}
   
   .panel-icon p.text {
    font-weight: bold;
    font-size: 14px;
    text-align: center;
}
   
   
   
    .panel-icon i {
    text-align: center;
}
   
   
    .panel-icon i {
    text-align: center;
}
   
   
    .text-large {
    font-size: 50px;
}


    .text-large {
    font-size: 50px;
}
   
</style>


</head>
<body>
<div class="wrapper">

   <a href="index.php"><div class="header"></div></a>
   
   <div class="right">

      <h2 style="color: gold; text-align: center;">Manage Content</h2>

      <a href="index.php">Dashboard</a>
      <a href="index.php?insert_product">Insert Product</a>
      <a href="index.php?view_products">View All Products</a>
      <a href="index.php?insert_cat">Insert New Category</a>
      <a href="index.php?view_cats">View All Category</a>
      <a href="index.php?insert_brand">Insert New Brand</a>
      <a href="index.php?view_brands">View All Brands</a>
      <a href="index.php?view_customers">View Customers</a>
      <a href="index.php?view_orders">View Orders</a>
      <a href="index.php?view_payments">View Payments</a>
      <a href="logout.php">Admin Logout</a>
   </div>

   <div class="left">

     <div class="row dashboard-stats">
                        <a href="index.php?view_customers">
                        <div class="col-md-3 col-sm-6">
                            <section class="panel panel-box">
                                <div class="panel-left panel-icon bg-success">
                                    <i class="fa fa-dollar text-large stat-icon success-text"></i>
                                </div>
                                <?php
                                  $sql1="select * from customers";
                                  $run1=mysqli_query($con,$sql1);
                                  $count1=mysqli_num_rows($run1);
                                ?>
                                <div class="panel-right panel-icon bg-reverse">
                                    <p class="size-h1 no-margin countdown_first"><?php echo $count1; ?></p>
                                    <p class="text-muted no-margin text"><span>Total Customers</span></p>
                                </div>
                            </section>
                        </div>\
                        </a>

                     <a href="index.php?view_orders">
                        <div class="col-md-3 col-sm-6">
                            <section class="panel panel-box">
                                <div class="panel-left panel-icon bg-danger">
                                    <i class="fa fa-shopping-cart text-large stat-icon danger-text"></i>
                                </div>
                                <?php
                                  $sql2="select * from customer_orders where order_status='Pending'";
                                  $run2=mysqli_query($con,$sql2);
                                  $count2=mysqli_num_rows($run2);
                                ?>
                                <div class="panel-right panel-icon bg-reverse">
                                    <p class="size-h1 no-margin countdown_second"><?php echo $count2; ?></p>
                                    <p class="text-muted no-margin text"><span>Pending Orders</span></p>
                                </div>
                            </section>
                            
                        </div>
                     </a>


                     <a href="index.php?view_products">
                        <div class="col-md-3 col-sm-6">
                            <section class="panel panel-box">
                                <div class="panel-left panel-icon bg-lovender">
                                    <i class="fa fa-rocket text-large stat-icon lovender-text"></i>
                                </div>
                                <?php
                                  $sql3="select * from products";
                                  $run3=mysqli_query($con,$sql3);
                                  $count3=mysqli_num_rows($run3);
                                ?>
                                <div class="panel-right panel-icon bg-reverse">
                                    <p class="size-h1 no-margin countdown_third"><?php echo $count3;?><span class="size-h3"></span></p>
                                    <p class="text-muted no-margin text"><span>Products</span></p>
                                </div>
                            </section>
                        </div>
                     </a>

                        <a href="index.php?view_brands">
                        <div class="col-md-3 col-sm-6">
                            <section class="panel panel-box">
                                <div class="panel-left panel-icon bg-info">
                                    <i class="fa fa-users text-large stat-icon info-text"></i>
                                </div>
                                <?php
                                  $sql4="select * from brands";
                                  $run4=mysqli_query($con,$sql4);
                                  $count4=mysqli_num_rows($run4);
                                ?>
                                <div class="panel-right panel-icon bg-reverse">
                                    <p class="size-h1 no-margin countdown_fourth"><?php echo $count4;?></p>
                                    <p class="text-muted no-margin text"><span>Total Brands</span></p>
                                </div>
                            </section>
                        </div>    
                    </div>
                 </a>


<!--       <h2 style="color: red; text-align: center; padding: 20px;"><?php echo @$_GET['logged_in'];  ?></h2> -->
      <?php
   
         if(isset($_GET['insert_product']))
         {
            include("insert_product.php");
         }

         if(isset($_GET['view_products']))
         {
            include("view_products.php");
         }

         if(isset($_GET['edit_pro']))
         {
            include("edit_pro.php");
         }

         if(isset($_GET['insert_cat']))
         {
            include("insert_cat.php");
         }

         if(isset($_GET['view_cats']))
         {
            include("view_cats.php");
         }

         if(isset($_GET['edit_cat']))
         {
            include("edit_cat.php");
         }

         if(isset($_GET['insert_brand']))
         {
            include("insert_brand.php");
         }

         if(isset($_GET['view_brands']))
         {
            include("view_brands.php");
         }

          if(isset($_GET['edit_brand']))
         {
            include("edit_brand.php");
         }

          if(isset($_GET['view_customers']))
         {
            include("view_customers.php");
         }

         if(isset($_GET['view_orders']))
         {
            include("view_orders.php");
         }

          if(isset($_GET['view_payments']))
         {
            include("view_payments.php");
         }

      ?>
   </div>

</div>
</body>
</html>
<?php } ?>

<!-- <script type="text/javascript">
    $(function() {
   

      function countUp(count) {
      var div_by = 100,
         speed = Math.round(count / div_by),
         $display = $('.countdown_first'),
         run_count = 1,
         int_speed = 24;
      var int = setInterval(function () {
         if (run_count < div_by) {
            $display.text(speed * run_count);
            run_count++;
         } else if (parseInt($display.text()) < count) {
            var curr_count = parseInt($display.text()) + 1;
            $display.text(curr_count);
         } else {
            clearInterval(int);
         }
      }, int_speed);
   }
   countUp(6791);

function countUp2(count) {
    var div_by = 100,
        speed = Math.round(count / div_by),
        $display = $('.countdown_second'),
        run_count = 1,
        int_speed = 24;
    var int = setInterval(function () {
        if (run_count < div_by) {
            $display.text(speed * run_count);
            run_count++;
        } else if (parseInt($display.text()) < count) {
            var curr_count = parseInt($display.text()) + 1;
            $display.text(curr_count);
        } else {
            clearInterval(int);
        }
    }, int_speed);
}
countUp2(555);

function countUp3(count) {
    var div_by = 100,
        speed = Math.round(count / div_by),
        $display = $('.countdown_fourth'),
        run_count = 1,
        int_speed = 24;
    var int = setInterval(function () {
        if (run_count < div_by) {
            $display.text(speed * run_count);
            run_count++;
        } else if (parseInt($display.text()) < count) {
            var curr_count = parseInt($display.text()) + 1;
            $display.text(curr_count);
        } else {
            clearInterval(int);
        }
    }, int_speed);
}
countUp3(999);
         
         });
</script> -->