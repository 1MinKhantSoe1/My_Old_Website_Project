<?php 
session_start(); 

include('ConnectForFooddb.php');

include('HeaderForOrderReport.php');

if(isset($_POST['btnConfirm'])) 
{
	$txtOrderID=$_POST['txtOrderID'];

	$query=mysqli_query("SELECT * FROM order_food WHERE OrderID='$txtOrderID'");

	while($row=mysqli_fetch_array($query)) 
	{
		$OrderID=$row['OrderID'];
		$Quantity=$row['Quantity1'];

		$Update="UPDATE order1
				 SET Quantity1=Quantity1 + '$Quantity'
				 WHERE OrderID='$OrderID'
				 ";
		$ret=mysqli_query($connectfooddb,$Update);
	}

	// $UpdateStatus="UPDATE purchaseorder
	// 		 	   SET Status='Confirmed'
	// 		 	   WHERE PurchaseOrderID='$txtOrderID'
	// 		 	   ";

	// $ret=mysql_query($UpdateStatus);

	if($ret) 
	{
		echo "<script>window.alert('Order is successfully Confirmed')</script>";
		echo "<script>window.location='OrderList.php'</script>";
	}
	else
	{
		echo "<p>Something wrong in Purchase_Order :" . mysql_error() . "</p>";
	}

}

//Single-----------------------------------------------------------------
$OrderID=$_GET['OrderID'];
$query1="SELECT o.*,c.CustomerID,c.UserName,p.PaymentMethod
		 FROM order1 o, customer c , payment p
		 WHERE o.OrderID='$OrderID'
		 AND o.CustomerID=c.CustomerID
		 AND o.OrderID=p.OrderID
		 ";
$result1=mysqli_query($connectfooddb,$query1);
$row1=mysqli_fetch_array($result1);
//Single-----------------------------------------------------------------

//Repeat-----------------------------------------------------------------
$query2="SELECT o.*,of.*,f.FoodID,f.FoodName,f.Price
		 FROM order1 o, order_food of, food f 
		 WHERE o.OrderID='$OrderID'
		 AND o.OrderID=of.OrderID
		 AND f.FoodID=of.FoodID
		 ";
$result2=mysqli_query($connectfooddb,$query2);
$count=mysqli_num_rows($result2);
//Repeat-----------------------------------------------------------------
?>

 <script>
	$(document).ready( function () {
		$('#tableid').DataTable();
	} );
</script>


<section class="section-table cid-riZXhxTY2u" id="table1-3">
    		<form action="#" method="post" >
<fieldset>
<legend>Order_ID : <?php echo $OrderID ?> </legend>

<table id="tableid" class="display">
<tr>
	<td>
		OrderID : <b><?php echo $row1['OrderID'] ?></b>
	</td>
	<td>
		ReportDate : <b><?php echo date('Y-m-d') ?></b>
	</td>
</tr>
<tr>
	<td>
		CustomerName : <b><?php echo $row1['UserName'] ?></b>
	</td>
	<td>
		PO_Date : <b><?php echo $row1['OrderDate'] ?></b>
	</td>
</tr>
<tr>
	<?php 

			$AS=$row1['AddressStatus'];
			$NS=$row1['NewAddress'];

			if ($AS == '') 
			{
				echo "<td>
						Order Address :	<b> $NS </b>
					</td>";
			}

			else
			{
				echo "<td>
						Order Address : <b> $AS </b>
					</td>";
			}
	 ?>
	<!-- <td>
		Order Address : <b><?php echo $row1['AddressStatus'] ?></b>
	</td> -->
	<td>
		Payment Method : <b><?php echo $row1['PaymentMethod'] ?></b>
	</td>
</tr>
</table>

<table id="tableid" class="display">
<tr>
	<th>FoodName</th>
	<th>Price <small>(MMK)</small></th>
	<th>Quantity <small>(pcs)</small></th>
	<th>Sub-Total  <small>(MMK)</small></th>
</tr>
<?php  
for($i=0;$i<$count;$i++) 
{ 
	$row2=mysqli_fetch_array($result2);
	$p=$row2['Price'];
	$q=$row2['Quantity1'];

	$TotalAmount=$q*$p;

	echo "<tr>";
	echo "<td>" . $row2['FoodName'] . "</td>";
	echo "<td>" . $p . "</td>";
	echo "<td>" . $row2['Quantity1'] . "</td>";
	echo "<td>" . $TotalAmount."</td>";
	echo "</tr>";
}
?>
<tr>
	<td colspan="4" align="right">
	TotalAmount : <b><?php echo $row1['TotalAmount'] ?></b> MMK 
	<!-- <br/>
	VAT (5%) : <b><?php echo $row1['TaxAmount'] ?></b> MMK 
	<br/>
	GrandTotal : <b><?php echo $row1['GrandTotal'] ?></b> MMK 
	</td> -->
</tr>
<tr>
	<td colspan="4" align="right">
	<input type="hidden" name="txtOrderID" value="<?php echo $OrderID ?>" />
	<!-- <?php  
	if ($row1['Status'] === "Pending") 
	{
		echo "<input type='submit' name='btnConfirm' value='Confirm PurchaseOrder'/>";
	}
	else
	{
		echo "<input type='submit' name='btnConfirm' value='Confirm PurchaseOrder' disabled/>";
	}
	?> -->
	|

	<script>var pfHeaderImgUrl = '';var pfHeaderTagline = 'Order%20Report';var pfdisableClickToDel = 0;var pfHideImages = 0;var pfImageDisplayStyle = 'right';var pfDisablePDF = 0;var pfDisableEmail = 0;var pfDisablePrint = 0;var pfCustomCSS = '';var pfBtVersion='1';(function(){var js, pf;pf = document.createElement('script');pf.type = 'text/javascript';if('https:' == document.location.protocol){js='https://pf-cdn.printfriendly.com/ssl/main.js'}else{js='http://cdn.printfriendly.com/printfriendly.js'}pf.src=js;document.getElementsByTagName('head')[0].appendChild(pf)})();</script>

	<a href="http://www.printfriendly.com" style="color:#6D9F00;text-decoration:none;" class="printfriendly" onClick="window.print();return false;" title="Printer Friendly and PDF"><img style="border:none;-webkit-box-shadow:none;box-shadow:none;" src="http://cdn.printfriendly.com/button-print-grnw20.png" alt="Print Friendly and PDF"/></a>
	
	</td>
</tr>
</table>
<hr/>


</fieldset>
</form>
</section>
<br>
<br>
<br>
<?php
include ('footerforAdminList.php');
?>