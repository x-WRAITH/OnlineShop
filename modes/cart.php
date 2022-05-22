<!--#####################//
//     WCode(Wraith)     //
//      GramySe.pl       //
//######################-->
<?php
session_start();
if(isset($_POST['save'])){
	foreach($_POST['indexes'] as $key){
		$_SESSION['quantity_array'][$key] = $_POST['qty_'.$key];
	}
}
if(isset($_GET['action'])){
	if($_GET['action']=="removeitem"){
		//remove the id from our cart array
		$key = array_search($_GET['id'], $_SESSION['cart_array']);	
		unset($_SESSION['cart_array'][$key]);
		unset($_SESSION['quantity_array'][$_GET['index']]);
		//rearrange array after unset
		$_SESSION['quantity_array'] = array_values($_SESSION['quantity_array']);
		header("Location: ../index.php?mode=modes/cart");
	}
	if($_GET['action']=="clear"){
		unset($_SESSION['cart_array']);
		header("Location: ../index.php?mode=modes/cart");
	}
}
?>
<div class="products">
    <div class="titleandsearch">
        <h1>Cart <?php echo count($_SESSION['cart_array']); ?></h1>
    </div>
    <div class="cards">
    <form method="POST">
		<style>
			#cart table, #cart td, #cart th {  
  				text-align: left;
			}
			#cart table {
				border-collapse: collapse;
  				width: 100%;
			}
			#cart th, #cart td {
				padding: 15px;
  				text-align: left;
			}
		</style>
    <table id="cart">
			<input type="submit" style="all: none;" name="save" value="Save Changes"/>
			<a href="modes/cart.php?action=clear">Clear Cart</a>
				<thead>
					<th></th>
					<th colspan="0">Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Subtotal</th>
				</thead>
				<tbody>
					<?php
						$total = 0;
						if(!empty($_SESSION['cart_array'])){
						//create array of initail qty which is 1
 						$index = 0;
 						if(!isset($_SESSION['quantity_array'])){
 							$_SESSION['quantity_array'] = array_fill(0, count($_SESSION['cart_array']), 1);
 						}
						$result = $connect->query("SELECT * FROM products WHERE id IN (".implode(',',$_SESSION['cart_array']).")");
							while($row = $result->fetch_object()){
								?>
								<tr>
									<td>
										<a href="modes/cart.php?action=removeitem&id=<?php echo $row->id; ?>&index=<?php echo $index; ?>"><i class="fas fa-ban"></i></a>
									</td>
									<td><?php echo $row->name; ?></td>
									<td><?php echo $row->price; ?></td>
									<input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
									<td><input type="number" max="<?php echo $row->amount; ?>" value="<?php echo $_SESSION['quantity_array'][$index]; ?>" name="qty_<?php echo $index; ?>"></td>
									<td><?php echo ($_SESSION['quantity_array'][$index]*$row->price); ?></td>
								</tr>
								<?php
                                $total += ($_SESSION['quantity_array'][$index]*$row->price);
								$index ++;
							}
						}
						else{
							?>
							<tr>
								<td colspan="4" class="text-center">No Item in Cart</td>
							</tr>
							<?php
						}

					?>
				</tbody>
			</table>
            </form>

    </div>
    <div class="copyright">
        <h2 id="total">Total price: <?php echo $total . "$"; ?></h2>
    </div>
</div>