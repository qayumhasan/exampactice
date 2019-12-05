<?php
include 'lib/database.php';

$db = new Database;
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php
$query = "SELECT * FROM test";
$result = $db->select($query);
if ($result) {
	$i = 0;
	while ($row = $result->fetch_assoc()) {
		$i++;

		?>
      <th scope="row">1</th>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['email']; ?></td>

    </tr>
<?php }}?>
  </tbody>
</table>

<hr><hr><hr>

  <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$fname = $_POST['fname'];
	$email = $_POST['email'];
}

$query = "INSERT INTO test(name,email) VALUES ('$fname','$email')";
$result = $db->insert($query);

?>

<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" class="form-control" name = "fname">

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="text" class="form-control" name="email">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


<hr><hr><hr>

<?php
$query = "SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
FROM Orders
INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID";
$result = $db->select($query);
$row = $result->fetch_assoc();
echo $row['CustomerName'];
echo $row['OrderDate'];

?>

