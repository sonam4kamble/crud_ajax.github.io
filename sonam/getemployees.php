<?php
include "config.php";
$name = $_POST['name'];
$query="SELECT * from employees WHERE name = '" . $name . "'";
$result = mysqli_query($link,$query);
$cust = mysqli_fetch_array($result);
if($cust) {
echo json_encode($cust);
} else {
echo "Error: " . $sql . "" . mysqli_error($link);
}
?>