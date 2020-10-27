<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Checkout</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('style.css')?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  
</head>

<body>
  <main>
    <div class="basket">

      <div class="basket-module">
        <label for="promo-code">Enter a promotional code</label>
        <input id="promo-code" type="text" name="promo-code" maxlength="5" class="promo-code-field">
        <button class="promo-code-cta">Apply</button>
      </div>
      <div class="basket-labels">
        <ul>
          <li class="item item-heading">Item</li>
          <li class="price">Price</li>
          <li class="quantity">Quantity</li>
          <li class="subtotal">Subtotal</li>
        </ul>
      </div>
      <div class="basket-product">
      	<form method="post" action="<?php echo site_url('Product/payDetails');?>" onsubmit="return validateForm()">
	        <div class="item">
	          <div class="product-image">
	            <img src="http://placehold.it/120x166" alt="Placholder Image 2" class="product-frame">
	          </div>
	          <div class="product-details">
	            <h1><strong><span class="item-quantity">4</span> x Eliza J</strong> Lace Sleeve Cuff Dress</h1>
	            <p><strong>Navy, Size 18</strong></p>
	            <p>Product Code - 232321939</p>
	            <input type="hidden" name="productinfo" value="Lace Sleeve Cuff Dress">
	          </div>
	        </div>
	        <div class="price">26.00
	        	<input type="hidden" name="udf2" value="26">
	        </div>
	        <div class="quantity">
	          <input type="number" name="udf1" value="3" min="1" class="quantity-field">
	        </div>
	        <div class="subtotal">78.00 
	        	<input type="hidden" name="amount" value="78">
	        </div>
	        
	        <div class="summary-checkout" style="position: relative;">
	        	<div style="position: absolute; top: 99px; display: inline-flex; right: 49px;">
		        	<input type="radio" name="urlRedirect" value="paytm" id="paytm">
		        	<label for="male">Paytm</label>
		        	<input type="radio" name="urlRedirect" value="payumoney" id="Payumoney"> 
		        	<label for="male">Payumoney</label>
	        	</div>
	          <button type="submit" class="checkout-cta">Go to Secure Checkout</button>
	        </div>
        </form>
      </div>

      <div class="basket-product">
      	<form method="post" action="<?php echo site_url('Product/payDetails');?>" onsubmit="return validateForm()">
	        <div class="item">
	          <div class="product-image">
	            <img src="http://placehold.it/120x166" alt="Placholder Image 2" class="product-frame">
	          </div>
	          <div class="product-details">
	            <h1><strong><span class="item-quantity">4</span> x Eliza J</strong> MyTech With Charger M3 Smart Band Fitness Band</h1>
	            <p><strong>Navy, Size 18</strong></p>
	            <p>Product Code - 232321938</p>
	            <input type="hidden" name="productinfo" value="MyTech With Charger M3 Smart Band Fitness Band">
	          </div>
	        </div>
	        <div class="price">200.00
	        	<input type="hidden" name="udf2" value="200">
	        </div>
	        <div class="quantity">
	          <input type="number" name="udf1" value="2" min="1" class="quantity-field">
	        </div>
	        <div class="subtotal">400.00 
	        	<input type="hidden" name="amount" value="400">
	        </div>
	        <div class="summary-checkout" style="position: relative;">
	        	<div style="position: absolute; top: 99px; display: inline-flex; right: 49px;">
		        	<input type="radio" name="urlRedirect" value="paytm" id="paytm">
		        	<label for="male">Paytm</label>
		        	<input type="radio" name="urlRedirect" value="payumoney" id="Payumoney"> 
		        	<label for="male">Payumoney</label>
	        	</div>
	          <button type="submit" class="checkout-cta">Go to Secure Checkout</button>
	        </div>
        </form>
      </div>

     <div class="basket-product">
      	<form method="post" action="<?php echo site_url('Product/payDetails');?>" onsubmit="return validateForm()">
	        <div class="item">
	          <div class="product-image">
	            <img src="http://placehold.it/120x166" alt="Placholder Image 2" class="product-frame">
	          </div>
	          <div class="product-details">
	            <h1><strong><span class="item-quantity">4</span> Men's Watch</strong> Daniel Jubile Men's Steel Chain RB02 </h1>
	            <p><strong>Navy, Size 18</strong></p>
	            <p>Product Code - 232321933</p>
	            <input type="hidden" name="productinfo" value="Daniel Jubile Men's Steel Chain RB02 ">
	          </div>
	        </div>
	        <div class="price">189.00
	        	<input type="hidden" name="udf2" value="189">
	        </div>
	        <div class="quantity">
	          <input type="number" name="udf1" value="1" min="1" class="quantity-field">
	        </div>
	        <div class="subtotal">189.00 
	        	<input type="hidden" name="amount" value="189">
	        </div>
	       <div class="summary-checkout" style="position: relative;">
	        	<div style="position: absolute; top: 99px; display: inline-flex; right: 49px;">
		        	<input type="radio" name="urlRedirect" value="paytm" id="paytm">
		        	<label for="male">Paytm</label>
		        	<input type="radio" name="urlRedirect" value="payumoney" id="Payumoney"> 
		        	<label for="male">Payumoney</label>
	        	</div>
	          <button type="submit" class="checkout-cta">Go to Secure Checkout</button>
	        </div>
        </form>
      </div>
      
    </div>
    
  </main>
  <script type="text/javascript">
  	function validateForm() {
    var radios = document.getElementsByName("urlRedirect");
    var formValid = false;

    var i = 0;
    while (!formValid && i < radios.length) {
        if (radios[i].checked) formValid = true;
        i++;        
    }

    if (!formValid) 
    	alert("Please checked Payment mode option");
    return formValid;
}
  </script>
</body>
</html>