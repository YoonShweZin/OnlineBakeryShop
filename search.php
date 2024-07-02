<?php
include('connection.php');
include('header.php');
$qty = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Baker Bakery Searching Page</title>
  <link rel="stylesheet" type="text/css" href="css files/search.css">
</head>

<body>

  <!-- start of searching  -->
  <!-- bread menu -> shop page -->
  <div class="startshopp">
    <div class="container">
      <h2 id="bread" style="font-weight: bold; text-align:center;">Search Product of Baker Bakery</h2>
      <hr>

      <!--   start filter and sort-->
      <div id="myBtnContainer" class="col-sm-8">
        <button class="btn active" onclick="filterSelection('shall')"> Show all</button>
        <button class="btn" onclick="filterSelection('bestsell')"> Best Seller</button>
        <button class="btn" onclick="filterSelection('moexp')"> Most Expensive </button>
        <button class="btn" onclick="filterSelection('lsexp')"> Least Expensive </button>
        <button class="btn" onclick="filterSelection('atz')"> Alphabet A to Z</button>
        <button class="btn" onclick="filterSelection('zta')"> Alphabet Z to A</button>
      </div>
      <!-- end of filter and sort -->

      <!-- start search -->
      <!-- <div class="col-sm-4">
        <form class="sea" method="post">
          <input type="text" id="search" name="search" placeholder="Search..">
        </form>
        <div id="id_suggesstions"> -->
          <!-- result show area -->
        <!-- </div>
      </div> -->
      <!-- <script>
        $(document).ready(function() {
          // when any character press on the input field keyup function call
          $("#search").keyup(function() {
            $.ajax({
              type: "POST", // here used post method
              url: "searchcode.php", //php file where retrive the post value and fetch all the matched item from database
              data: 'searchterm=' + $(this).val(), //send data or search term to searchcode file to process
              beforeSend: function() {
                // show loader icon
                $("#search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 175px");
              },
              success: function(data) {
                // get the output from database on success
                $("#id_suggesstions").show(); //show the suggestions
                $("#id_suggesstions").html(data); //append data in the box for selection
                $("#search").css("background", "#FFF");
              }
            });
          });
        });
        // call this function after select one of these suggestion for hide the suggestion box and select the value
        function selectname(selected_value) {
          $("#search").val(selected_value);
          $("#id_suggesstions").hide();
        }
      </script> -->


      <!-- end of searching -->
      <div class="filterDiv shall">
        <?php
        $product = "SELECT * FROM product";
        $product_result = mysqli_query($dbconnection, $product);
        if (!empty($product_result)) {
          while ($col = mysqli_fetch_array($product_result)) {
        ?>
            <div class="card" style="width:200px;">
              <img class="card-img-top" src="Products/<?php echo $col['image'] ?>" alt="shop products" style="width:100%;height:200px">
              <div class="card-body" style="height:130px">
                <h4 class="cardtitle"><b><?php echo $col['pname'] ?></b></h4>
                <p style="color:#6b5756;"><?php echo $col['pprice'] ?>Ks</p>
                <form action="search.php" method="post">
                  <input type="hidden" name="id" value="<?php echo $col['pid'] ?>">
                  <input type="submit" name="ac" data-text="Add To Cart" value="Add To Cart" class="btn btn-primary">
                  <input type='hidden' style='width:40px; height:20px;' name='qty' value=<?php echo $qty ?>>
                </form>

              </div>
            </div>
        <?php
          }
        }
        ?>
      </div>

      <div class="filterDiv bestsell">
        <?php
        $product = "SELECT pid, SUM(qty) AS TotalQuantity FROM `order_line` GROUP BY pid ORDER BY SUM(qty) DESC LIMIT 5";
        $product_result = mysqli_query($dbconnection, $product);
        if (!empty($product_result)) {
          while ($col = mysqli_fetch_array($product_result)) {
            $pid = $col['pid'];
            $product1 = "SELECT * FROM product WHERE pid='$pid'";
            foreach ($dbconnection->query($product1) as $col)
            {
        ?>
            <div class="card" style="width:200px;">
              <img class="card-img-top" src="Products/<?php echo $col['image'] ?>" alt="shop products" style="width:100%;height:200px">
              <div class="card-body" style="height:130px">
                <h4 class="cardtitle"><b><?php echo $col['pname'] ?></b></h4>
                <p style="color:#6b5756;"><?php echo $col['pprice'] ?>Ks</p>
                <form action="search.php" method="post">
                  <input type="hidden" name="id" value="<?php echo $col['pid'] ?>">
                  <input type="submit" name="ac" data-text="Add To Cart" value="Add To Cart" class="btn btn-primary">
                  <input type='hidden' style='width:40px; height:20px;' name='qty' value=<?php echo $qty ?>>
                </form>

              </div>
            </div>
        <?php
            }
          }
        }
        ?>
      </div>

      <div class="filterDiv moexp">
        <?php
        $product = "SELECT * FROM product WHERE pprice > 5000;";
        $product_result = mysqli_query($dbconnection, $product);
        if (!empty($product_result)) {
          while ($col = mysqli_fetch_array($product_result)) {
        ?>
            <div class="card" style="width:200px;">
              <img class="card-img-top" src="Products/<?php echo $col['image'] ?>" alt="shop products" style="width:100%;height:200px">
              <div class="card-body" style="height:130px">
                <h4 class="cardtitle"><b><?php echo $col['pname'] ?></b></h4>
                <p style="color:#6b5756;"><?php echo $col['pprice'] ?>Ks</p>
                <form action="search.php" method="post">
                  <input type="hidden" name="id" value="<?php echo $col['pid'] ?>">
                  <input type="submit" name="ac" data-text="Add To Cart" value="Add To Cart" class="btn btn-primary">
                  <input type='hidden' style='width:40px; height:20px;' name='qty' value=<?php echo $qty ?>>
                </form>
              </div>
            </div>
        <?php
          }
        }
        ?>
      </div>

      <div class="filterDiv lsexp">
        <?php
        $product = "SELECT * FROM product WHERE pprice < 2000;";
        $product_result = mysqli_query($dbconnection, $product);
        if (!empty($product_result)) {
          while ($col = mysqli_fetch_array($product_result)) {
        ?>
            <div class="card" style="width:200px;">
              <img class="card-img-top" src="Products/<?php echo $col['image'] ?>" alt="shop products" style="width:100%;height:200px">
              <div class="card-body" style="height:130px">
                <h4 class="cardtitle"><b><?php echo $col['pname'] ?></b></h4>
                <p style="color:#6b5756;"><?php echo $col['pprice'] ?>Ks</p>
                <form action="search.php" method="post">
                  <input type="hidden" name="id" value="<?php echo $col['pid'] ?>">
                  <input type="submit" name="ac" data-text="Add To Cart" value="Add To Cart" class="btn btn-primary">
                  <input type='hidden' style='width:40px; height:20px;' name='qty' value=<?php echo $qty ?>>
                </form>

              </div>
            </div>
        <?php
          }
        }
        ?>
      </div>

      <div class="filterDiv atz">
        <?php
        $product = "SELECT * FROM product ORDER BY pname ASC";
        $product_result = mysqli_query($dbconnection, $product);
        if (!empty($product_result)) {
          while ($col = mysqli_fetch_array($product_result)) {
        ?>
            <div class="card" style="width:200px;">
              <img class="card-img-top" src="Products/<?php echo $col['image'] ?>" alt="shop products" style="width:100%;height:200px">
              <div class="card-body" style="height:130px">
                <h4 class="cardtitle"><b><?php echo $col['pname'] ?></b></h4>
                <p style="color:#6b5756;"><?php echo $col['pprice'] ?>Ks</p>
                <form action="search.php" method="post">
                  <input type="hidden" name="id" value="<?php echo $col['pid'] ?>">
                  <input type="submit" name="ac" data-text="Add To Cart" value="Add To Cart" class="btn btn-primary">
                  <input type='hidden' style='width:40px; height:20px;' name='qty' value=<?php echo $qty ?>>
                </form>

              </div>
            </div>
        <?php
          }
        }
        ?>
      </div>

      <div class="filterDiv zta">
        <?php
        $product = "SELECT * FROM product ORDER BY pname DESC";
        $product_result = mysqli_query($dbconnection, $product);
        if (!empty($product_result)) {
          while ($col = mysqli_fetch_array($product_result)) {
        ?>
            <div class="card" style="width:200px;">
              <img class="card-img-top" src="Products/<?php echo $col['image'] ?>" alt="shop products" style="width:100%;height:200px">
              <div class="card-body" style="height:170px">
                <h4 class="cardtitle"><b><?php echo $col['pname'] ?></b></h4>
                <p style="color:#6b5756;"><?php echo $col['pprice'] ?>Ks</p>
                <form action="search.php" method="post">
                  <input type="hidden" name="id" value="<?php echo $col['pid'] ?>">
                  <input type="submit" name="ac" data-text="Add To Cart" value="Add To Cart" class="btn btn-primary">
                  <input type='hidden' style='width:40px; height:20px;' name='qty' value=<?php echo $qty ?>>
                </form>
              </div>
            </div>
        <?php
          }
        }
        ?>
      </div>

    </div>
  </div> <!--  end of startshopp bread -->
  <script>
    filterSelection("all")

    function filterSelection(c) {
      var x, i;
      x = document.getElementsByClassName("filterDiv");
      // if (c == "all") c = "";
      for (i = 0; i < x.length; i++) {
        w3RemoveClass(x[i], "show");
        if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
      }
    }

    function w3AddClass(element, name) {
      var i, arr1, arr2;
      arr1 = element.className.split(" ");
      arr2 = name.split(" ");
      for (i = 0; i < arr2.length; i++) {
        if (arr1.indexOf(arr2[i]) == -1) {
          element.className += " " + arr2[i];
        }
      }
    }

    function w3RemoveClass(element, name) {
      var i, arr1, arr2;
      arr1 = element.className.split(" ");
      arr2 = name.split(" ");
      for (i = 0; i < arr2.length; i++) {
        while (arr1.indexOf(arr2[i]) > -1) {
          arr1.splice(arr1.indexOf(arr2[i]), 1);
        }
      }
      element.className = arr1.join(" ");
    }

    // Add active class to the current button (highlight it)
    var btnContainer = document.getElementById("myBtnContainer");
    var btns = btnContainer.getElementsByClassName("btn");
    for (var i = 0; i < btns.length; i++) {
      btns[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
      });
    }
  </script>
  <!-- start of contact us -->
  <div id="contact">
    <h2>Contact Our Store
      <hr>
    </h2>
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
          <iframe style="border:black; border-width:2px; border-style:solid;" width="100%" height="240px" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Myanmar%20Yangon%20Barstreet+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" width="100%" height="600" frameborder="0"></iframe>
        </div>
      </div>
    </div>

  </div> <!-- end of contact us -->

  <hr class="fhr">
  <p style="text-align: center; font-family:Times New Roman; font-size: 16px;">Design and Maintaince by Group-6</p>

</body>

</html>

<!-- code for dropdown filter -->