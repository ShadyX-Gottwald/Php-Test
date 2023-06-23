<?php
require_once "Cart.php";

$cart = new Cart();
?>
<div class="">

  <div class="top-branding" style="">
    <p style="float:right">Top </p>

    <!--Show cart-->
    <div>


      <a href="show-cart-items.php" style="margin-bottom: 2px; margin-top: 24px; color: black" class="cart-card">

        <h4 style= "margin-bottom : 0px; display:inline"></h4> total: <?php echo $cart->cart_total() ?></h4>
      </a>

    </div>
  </div>


</div>