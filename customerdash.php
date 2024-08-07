<!DOCTYPE>
<html>
<head>
    <title> Vertical Menu </title>
    <meta name ="viewport" content ="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src ="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src ="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css files/admindashboard.css">

</head>
<body>
  <div class='dashboard'>
    <div class="dashboard-nav">
        <header><a href="#!" class="menu-toggle">
            <i>
            <img src="images/menu.png" style="width:20px; height: 20px;"></i>
                <span>BAKER BAKERY</span></a>
        </header>

        <nav class="dashboard-nav-list">
            <a href="admindashboard.php" class="dashboard-nav-item active">
                <i><img src="images/dashboard.png" style="width:30px; height:30px"></i>
                DASHBOARD </a>

            <a href="admin_review.php" class="dashboard-nav-item">
                <i><img src="images/review.png" style="width:30px; height:30px"></i>
                 REVIEWS </a>

            <a href="products.php" class="dashboard-nav-item">
                <i class="fas fa-cogs">
                    <img src="images/product.png" style="width:30px; height:30px">
                </i> PRODUCTS </a>

            <a href="customers.php" class="dashboard-nav-item"><i class="fas fa-user">
                <img src="images/customer.png" style="width:30px; height:30px">
            </i> CUSTOMERS </a>

            <a href="order.php" class="dashboard-nav-item"><i class="fas fa-user">
                <img src="images/order.png" style="width:30px; height:30px">
            </i> ORDERS </a>

            <a href="admin.php" class="dashboard-nav-item"><i class="fas fa-user">
                <img src="images/admin.png" style="width:30px; height:30px">
            </i> ADMIN </a>

            <a href="admin_payment.php" class="dashboard-nav-item"><i class="fas fa-user">
                <img src="images/payment.png" style="width:30px; height:30px">
            </i> PAYMENT </a>

            <div class="nav-item-divider"></div>
            <a href="index.php" class="dashboard-nav-item">
            <i>
                <img src="images/logout.png" style="width:30px; height:30px">
            </i> LOGOUT </a>
        </nav>
    </div>

    <div class='dashboard-app'>
        <header class='dashboard-toolbar'>
            <a href="#" class="menu-toggle">
            <img src="images/menu.png" style="width:20px; height: 20px;"> <span style="font-size: 20px; color: black; padding-left: 50px;">Admin</span>
            </a>
        </header>
        <div class='dashboard-content'>
            <div class='container'>
                <div class='card'>
                    <div class='card-header'>
                        <h1>Admin Panel</h1>
                    </div>

                    <div class='card-body'>
                        
                    <div class="card-body text-center">
                            <h5 class="card-title m-b-0">Customer Order Chart</h5>
                        </div>
                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>
                         
                <!-- <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Order Count</th>
                                <th scope="col">Total Amount</th>
                                
                            </tr>
                        </thead>
                        <tbody class="customtable"> -->
                        <script type="text/javascript">
                        window.onload = function () {

                        var chart = new CanvasJS.Chart("chartContainer", {
	                    theme: "light1", // "light2", "dark1", "dark2"
	                    animationEnabled: true, // change to true		
	                   
	                    data: [
	                    {
		                // Change type to "bar", "area", "spline", "pie",etc.
		                type: "column",
		                dataPoints: [

                            <?php
                        $counter=1;
                        include "connection.php";
                        $viewquery = "SELECT * from user";
                        foreach ($dbconnection->query($viewquery) as $row) {
                            $name = $row['uname'];
                            $uid = $row['uid'];
                            $oqty = 0;
                            $toam = 0;
                            $viewquery1 = "SELECT * from orders where uid='$uid'";
                            foreach ($dbconnection->query($viewquery1) as $row) {
                                $UID = $row['uid'];
                                if($UID == $uid){
                                    
                                }
                            }
                            $viewquery2 = "SELECT * from payment where uid='$uid'";
                            foreach ($dbconnection->query($viewquery2) as $row) {
                                $UID = $row['uid'];
                                $am = $row['amount'];
                                $rm = $row['remark'];
                                
                                if($UID == $uid){
                                    if($rm == "Confirm"){
                                        $toam = $toam + $am;
                                        $oqty++;
                                    }
                                }
                                
                                
                            }
                            echo"{ label: '$name',  y: $oqty, x: $toam},";
                            // echo"<tr>";
                            // echo"<td> $name </td>";
                            // echo"<td> $oqty </td>";
                            // echo"<td> $toam </td>";
                            // echo" </tr>";
                        }
                        ?>

			                // { label: "apple",  y: 10  },
			                // { label: "orange", y: 15  },
			                // { label: "banana", y: 25  },
			                // { label: "mango",  y: 30  },
			                // { label: "grape",  y: 28  }
		                
                        ]
	                }
	                ]
                });
                chart.render();

                }
                </script>

                        

                                                              
                        <!-- </tbody>
                    </table>
                </div> -->
                        
                    </div>
                </div>
            </div>
        </div>
        <footer class="bg-light text-center text-lg-start">
            <!-- Copyright -->
            
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
              © 2022 Copyright:
              <a class="text-dark" href="https://mdbootstrap.com/">Designed and Developed by Group 6</a>
            </div>
            <!-- Copyright -->
        </footer>
    </div>
</div>  
<script type="text/javascript">
    const mobileScreen = window.matchMedia("(max-width: 990px )");
$(document).ready(function () {
    $(".dashboard-nav-dropdown-toggle").click(function () {
        $(this).closest(".dashboard-nav-dropdown")
            .toggleClass("show")
            .find(".dashboard-nav-dropdown")
            .removeClass("show");
        $(this).parent()
            .siblings()
            .removeClass("show");
    });
    $(".menu-toggle").click(function () {
        if (mobileScreen.matches) {
            $(".dashboard-nav").toggleClass("mobile-show");
        } else {
            $(".dashboard").toggleClass("dashboard-compact");
        }
    });
});
</script>


</body>
</html>