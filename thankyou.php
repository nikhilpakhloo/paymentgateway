<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thank you for purchasing</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#">Gadgets.com</a>

    <!-- Toggler/collapsible Button -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Categories</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <div class="col-md-8">
      <h1 class="text-center">Thank you for Purchasing</h1>
      <?php

      include 'src/instamojo.php';

      $api = new Instamojo\Instamojo('test_e70e341e2efafed535990ee06fc', 'test_7da6387086d26a5b241842a5656', 'https://test.instamojo.com/api/1.1/');
      $payid = $_GET['payment_request_id'];
      try{
        $response = $api->paymentRequestStatus($payid);
        
        
        ?>
        <h2>Payment Details:</h2>
        <table class="table table-bordered">
          <tr>
            <th>Purchased Item:</th>
            <td><?= $response['purpose'];?></td>
          </tr>
          <tr>
            <th>Payment ID:</th>
            <td><?=$response['payments'][0]['payment_id']; ?></td>
          </tr>
          <tr>
            <th>Payee Name:</th>
            <td><?= $response['payments'][0]['buyer_name']?></td>
          </tr>
          <tr>
            <th>Payee Email:</th>
            <td><?= $response['payments'][0]['buyer_email']?></td>
          </tr>
        </table>
        
      
      <?php
      }
      catch(Exception $e){
        print("Error:".$e->getMessage());

      }
      ?>

    </div>
  </div>

</body>

</html>