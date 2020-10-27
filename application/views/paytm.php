<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Paytm Checkout Page</title>
	<meta name="GENERATOR" content="Evrsoft First Page">
	<style type="text/css">
		input{padding: 4px 0px; width: 100%;}
		textarea{width: 100%;}
		table{width: 700px;
			margin: 0 auto;border: 1px dotted;
			padding: 6px 6px;}
		</style>
	</head>
	<body>
		<h1 style="text-align: center;">Paytm Checkout Page</h1>
		<pre>
		</pre>
		<form method="post" action="http://localhost/ci_paymentgetway/pgRedirect.php">
			<input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
			<input type="hidden" id="CHANNEL_ID" tabindex="4" name="CHANNEL_ID" autocomplete="off" value="WEB">
			<table>
				<tr>
					<td><b>Mandatory Parameters</b></td>
				</tr>
				<tr>
					<td>Order ID: </td>
					<td>
						<input id="ORDER_ID" tabindex="1" maxlength="20" size="20"name="ORDER_ID" autocomplete="off" 
						value="<?php echo  "ORDS" . rand(10000,99999999)?>">
					</td>
					<td>Customer ID: </td>
					<td><input id="CUST_ID" tabindex="2" name="CUST_ID" autocomplete="off" value="CUST001"></td>
				</tr>
				<tr>
					<td>Quantity: </td>
					<td><input type="text" name="TXN_QUANTITY" value="<?php echo $_GET['qt'] ?>"></td>
					<td>Price: </td>
					<td> <input type="text" name="txnPRICE" value="<?php echo $_GET['pr'] ?>"> </td>
				</tr>
				<tr>
					<td>Amount: </td>
					<td>
						<input title="TXN_AMOUNT" tabindex="10"	type="text" name="TXN_AMOUNT" 
						value="<?php echo $_GET['amt'] ?>">
					</td>
				</tr>
				<tr>
					<td colspan="4"><input value="CheckOut" type="submit"	onclick="" style="width: 16%;"></td>
				</tr>
				<tr>
					<td style="color: red;">* - Mandatory Fields</td>
				</tr>

			</table>
			
		</form>
	</body>
	</html>