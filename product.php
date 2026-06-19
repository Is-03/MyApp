<?php
include "db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Products</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
    .row.content {height: auto;}

    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }

    .card {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: center;
      margin-bottom: 15px;
      border-radius: 8px;
      background: #fff;
    }

    .card img {
      width: 100%;
      height: 120px;
      object-fit: cover;
    }

    .card button {
      width: 100%;
    }

    @media screen and (max-width: 767px) {
      .row.content {height: auto;}
    }
  </style>
</head>

<body>

<!-- NAVBAR (mobile) -->
<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">POS</a>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="sales.php">Today's Sales</a></li>
        <li class="active"><a href="product.php">Products</a></li>
        <li><a href="stock.php">Low Stock</a></li>
        <li><a href="revenue.php">Revenue</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">

    <!-- SIDEBAR -->
    <div class="col-sm-3 sidenav hidden-xs">
      <h2>POS System</h2>

      <ul class="nav nav-pills nav-stacked">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="sales.php">Today's Sales</a></li>
        <li class="active"><a href="product.php">Products</a></li>
        <li><a href="stock.php">Low Stock</a></li>
        <li><a href="revenue.php">Revenue</a></li>
      </ul>
    </div>

    <!-- MAIN CONTENT -->
    <div class="col-sm-9">

      <div class="well">
        <h4>Products</h4>
        <p>Select items to add into cart</p>
      </div>

      <div class="row">

        <?php
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
        ?>

        <!-- PRODUCT CARD -->
        <div class="col-md-2 col-sm-4 col-xs-6">

          <div class="card">

            <img src="<?php echo $row['image']; ?>" alt="product">

            <h5><?php echo $row['name']; ?></h5>

            <p>RM <?php echo $row['price']; ?></p>

            <button class="btn btn-primary btn-sm">
              Add to Cart
            </button>

          </div>

        </div>

        <?php
            }
        } else {
            echo "<p>No products found</p>";
        }
        ?>

      </div>

      <!-- PAYMENT BUTTON -->
      <div class="text-center" style="margin-top:20px;">
        <button class="btn btn-success btn-lg">
          Proceed to Payment
        </button>
      </div>

    </div>
  </div>
</div>

</body>
</html>