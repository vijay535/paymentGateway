<?php
@$paymentUrl = $_POST['urlRedirect'];
if($paymentUrl == 'paytm'){
	$amount = $_POST['amount'];
	$qty = $_POST['udf1'];
	$price = $_POST['udf2'];
	echo "<script>window.location='".site_url('Product/paytmDetails?amt='.$amount.'&pr='.$price.'&qt='.$qty)."'</script>";
	exit();
}

$MERCHANT_KEY = "qlgJHAiG";
$SALT = "6KIFp1o35i";
// Merchant Key and Salt as provided by Payu.

$PAYU_BASE_URL = "https://sandboxsecure.payu.in";		// For Sandbox Mode
//$PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
<html>
  <head>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  <style type="text/css">
  	input{padding: 4px 0px; width: 100%;}
  	textarea{width: 100%;}
  	table{width: 700px;
    margin: 0 auto;border: 1px dotted;
    padding: 6px 6px;}
  </style>
  </head>
  <body onload="submitPayuForm()">
    <h2 style="text-align: center;">PayU Form</h2>
    <br/>
    <?php if($formError) { ?>
	
      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php } ?>
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <table>
        <tr>
          <td><b>Mandatory Parameters</b></td>
        </tr>
        <tr>
          <td>First Name: </td>
          <td>
          	<input name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" />
          </td>
          <td>Email: </td>
          <td><input name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" /></td>
        </tr>
        <tr>
          <td>Phone: </td>
          <td><input name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" /></td>
          <td>Product Info: </td>
          <td colspan="3"><textarea name="productinfo"><?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?></textarea></td>
        </tr>

        <tr>
          <td>Quantity: </td>
          <td>
          	<input name="udf1" value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" />
          </td>
          <td>price: </td>
          <td>
          	<input name="udf2" value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2'] ?>" />
          </td>
        </tr>
        <tr>
        	<td>Amount: </td>
	        <td>
	          <input name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" />
	        </td>
        </tr>

        
        
        <tr>
          <td></td>
          <td colspan="3"><input name="surl"  type="hidden" value="http://localhost/CI_PaymentGetway/success.php" size="64" /></td>
        </tr>
        <tr>
          <td> </td>
          <td colspan="3"><input name="furl"  type="hidden" value="http://localhost/CI_PaymentGetway/failure.php" size="64" /></td>
        </tr>

        <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
        </tr>

        <tr>
             </td>
        </tr>
             </tr>
        <tr>
          <?php if(!$hash) { ?>
            <td colspan="4"><input type="submit" value="Submit" style="width: 16%;" /></td>
          <?php } ?>
        </tr>
      </table>
    </form>
  </body>
</html>
