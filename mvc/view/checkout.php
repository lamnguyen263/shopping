<?php require_once "./mvc/view/include/header.php"; ?>

<head>
<link rel="stylesheet" type="text/css" href="http://localhost:8080/shopping/public/css/checkout.css">
</head>

<div class="row checkout_row">
  <div class="col-75">
    <div class="container checkout_container">
      <form action="http://localhost:8080/shopping/Checkout/Sold/" method="POST">
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname" class="checkout_label"><i class="fa fa-user"></i> Full Name <span class="require-icon">*</span></label>
            <input type="text" class="checkout_text" id="fname" name="name" placeholder="Nguyễn Hoàng Sơn Lâm">
            <label for="adr" class="checkout_label"><i class="fa fa-address-card-o"></i> Address <span class="require-icon">*</span></label>
            <input type="text" class="checkout_text" id="adr" name="address" placeholder="227 Hoàng Quốc Việt, P. An Bình, Q. Ninh Kiều">
            <label for="city" class="checkout_label"><i class="fa fa-institution"></i> City <span class="require-icon">*</span></label>
            <input type="text" class="checkout_text" id="city" name="city" placeholder="Cần Thơ">
            <label for="telephone" class="checkout_label"><i class="fa fa-phone"></i> Telephone <span class="require-icon">*</span></label>
            <input type="text" class="checkout_text" id="telephone" name="phone" placeholder="0762188521">
          </div>

        </div>
        <input type="submit" id="btn-checkout" name="checkout" value="Continue to checkout" class="btn">
      </form>
    </div>
  </div>
</div>

<?php require_once "./mvc/view/include/footer.php" ?>