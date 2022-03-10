<?php
    include ('connection.php');
    if(isset($_POST['signup']))
    {
        $signup_sql = "SELECT * FROM user";

        $signup_result = mysqli_query($dbconnection,$signup_sql);
        $flag = false;
            while ($row = mysqli_fetch_assoc($signup_result)){
                if($row['uemail'] == $_POST['uemail'])
                {
                    echo "<script>alert('Email Already Exists... Try Another Email!')</script>";
                    echo "<script>window.location = 'sign_up.php'</script>";
                    !$flag;
                }
                else
                {
                    $flag;
                }
            } // while end

            if(!$flag){ 
                if($_POST['upassword'] == $_POST['upassword-repeat']){
                    include('connection.php');
                    $uname = $_POST['uname'];
                    $uemail = $_POST['uemail'];
                    $upassword = $_POST['upassword'];
                    $uphone = $_POST['uphone'];
                    $ucity = $_POST['ucity'];
                    $uaddress = $_POST['uaddress'];
                   
                    $sql = "INSERT INTO user (uname,uemail,upassword,uphone,ucity,uaddress) VALUES ('$uname','$uemail','$upassword','$uphone','$ucity','$uaddress')";

                     if(mysqli_query($dbconnection,$sql)){
                        echo "<script>
                          alert('Successfully Signed Up. Thanks for your registeration!')
                          </script>";   
                        echo "<script>window.location = 'index.php'</script>";
                     } // check sql            
                } // check password repreat 
                else{
                // check confirm password
                echo "<script>alert('Password does not match. Please Try Again!')</script>";
                
                }
            }// flag end   
        }       
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Baker Bakery Sign-Up Page</title>
  <link rel="stylesheet" type="text/css" href="css files/sign_up.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<!-- navigation bar -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand"><i>Baker Bakery</i></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="home.html">Home</a></li>
        <li><a href="home.html#about">About us</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="shop.html">Shop<span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="shop.html#toast">Toasts</a></li>
                <li><a href="shop.html#bread">Bread</a></li>
                <li><a href="shop.html#pastries">Pastries</a></li>
                <li><a href="shop.html#desserts">Desserts</a></li>
            </ul>
        </li>
        <li><a href="home.html#contact">Contact us</a></li>
        <li><a href="review.html">Review</a></li>
        <li><a href="sign_in.html">Sign-in</a></li>
        <li><a href="search.html">
              <img src="images/search.png" alt="search" style=" width:20px; height: 20px">
        </a></li>
        <li><a href="cart.html">
              <img src="images/cart.png" alt="search" style=" width:20px; height: 20px">
        </a></li>
    </ul>
  </div>
</nav>

<!-- start of sign-in form -->
<div class="register-photo">
    <div class="form-container">
        <div class="image-holder">
        </div>
        <form class="signupform" action="" method="post">
            <h2 class="text-center"><strong>Sign-Up to Baked Bakery</strong></h2>

            <div class="form-group">
              <input class="form-control" type="text" name="uname" placeholder="Username">
            </div>
            <div class="form-group">
              <input class="form-control" type="text" name="uemail" placeholder="Email" required>
            </div>
            <div class="form-group">
              <input class="form-control" type="password" name="upassword" placeholder="Password" required>
            </div>
            <div class="form-group">
              <input class="form-control" type="password" name="upassword-repeat" placeholder="Password (repeat)" required>
            </div>
            <div class="form-group">
              <input class="form-control" type="text" name="uphone" placeholder="Phone No">
            </div>
            <div class="form-group">
              <input class="form-control" type="text" name="ucity" placeholder="City">
            </div>
            <div class="form-group">
              <input class="form-control" type="text" name="uaddress" placeholder="Address">
            </div>
            <div class="form-group">
              <div class="form-check">
                  <label class="form-check-label">
                    <input type="checkbox">Remember Me.
                  </label>
              </div>
            </div>
            <div class="form-group">
              <button class="btn btn-success btn-block" type="submit" name="signup">Sign-Up</button>
            </div> 
            <a class="already" href="sign_in.php">After Sign-UP, Login Now!!</a>
        </form>
    </div>
</div>
<!-- start of contact us -->
<div id="contact">
  <h2>Contact Our Store <hr></h2>
<div class="row">
    <div class="col-sm-4">
        <h3><strong>Have a question?</strong></h3><br>
        <p>We're always here to lend a helping hand.</p><br>
        <p>We also have physical store for you to visit.</p><br>
        <p>Consumer Care Team days are Monday-Friday.</p><br>
        <p>Consumer Care Team times are 7AM - 7PM</p><br>
        <a href="review.html#faq">FAQ</a>
    </div> 
    <div class="col-sm-4">
      <h3><strong>Shop Location</strong></h3><br>
      <p>Address at:</p>
      <p><b>Myanmar, Yangon, BarStreet, Ground Floor, No111</b></p>
      <p>Email us at:</p>
      <p><b>bakerbakery@.gmail.com</b></p>
      <p>Call us at:</p>
      <p><b>+95 9 44131 5589</b></p><br>
    </div> 
    <div class="col-sm-4">
      <h3><strong>Google MAP Location</strong></h3><br>
      <div class="gmap">
      <iframe style="border:black; border-width:2px; border-style:solid;" width="100%" height="240px" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Myanmar%20Yangon%20Barstreet+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" width="100%" height="600" frameborder="0"></iframe></div>
    </div>
</div>
    
</div> <!-- end of contact us -->

<hr class="fhr">
<p style="text-align: center; font-family:Times New Roman; font-size: 16px;">Design and Maintaince by Group-6</p>

</body>
</html>