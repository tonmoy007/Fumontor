<div id="cd-shadow-layer"></div>

<div id="cd-cart">
<h1 class="cart-logo">Fumontor  &nbsp;&nbsp;&nbsp;<i class="fa fa-shopping-cart"></i></h1>
  <a id="dismiss-cart"  class="pull-right"></a>
  <div id="cart-form">
      <h2>Cart</h2>

    <ul class="cd-cart-items">
      <?php 
          $total=0;
          if(count($cartItem)>0){
        foreach ($cartItem as $item) {
            $total+=((int)$item['quantity']*(int)$item['price']);
          ?>
          <li>
          <div>
            <span class="cd-qty"><?php echo $item['quantity']?> x</span> 
            <?php echo $item['title'] ?>
          </div>
          <div class="cd-price">৳ <?php echo $item['price']?></div>
          <a href="javascript::void(0)" class="cd-item-remove cd-img-replace" data-pID="<?php echo $item['product_id']?>" >Remove</a>
          </li>

       <?php }?>
           </ul> <!-- cd-cart-items -->

    <div class="cd-cart-total">
      <p>Subtotal <span>৳ <label class="total"><?php echo $total;?></label></span></p>

    </div> <!-- cd-cart-total -->

    <a href="#0" class=" checkout btn btn-danger btn-wide">Proceed to Checkout</a>
    
    <p class="cd-go-to-cart"><a href="#0">Go to cart page</a></p>
  </div>
  </div> <!-- cd-cart -->
       <?php }else{
  echo '<div class=" cart-empty alert alert-info "> No items in the cart </div></ul></div></div>'    ;
}
      ?>
     


