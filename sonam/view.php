<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<style>
.container{
font-family: Viner Hand ITC;
}
</style>
<body>
<div class="container mt-2">
<div class="page-header">
<h2>Employee List</h2>
</div>
<div class="row">
<div class="col-md-8">
<table class="table">
<thead>
<tr>
<th scope="col">No</th>
<th scope="col">Name</th>
<th scope="col">Addreee</th>
<th scope="col">Salary</th>

</tr>
</thead>
<tbody>

<?php
include 'config.php';
$query="select * from employees"; // Fetch all the data from the table customers
$result=mysqli_query($link,$query);
?>
<?php if ($result->num_rows > 0): ?>
<?php while($array=mysqli_fetch_row($result)): ?>
<tr>
<th scope="row"><?php echo $array[0];?></th>
<td><?php echo $array[1];?></td>
<td><?php echo $array[2];?></td>
<td><?php echo $array[3];?></td>
</tr>
<?php endwhile; ?>
<?php else: ?>
<tr>
<td colspan="3" rowspan="1" headers="">No Data Found</td>
</tr>
<?php endif; ?>
<?php mysqli_free_result($result); ?>
</tbody>
</table>
</div>


<script type="text/javascript">
$(document).ready(function($){
$('body').on('click', '.view', function () {
var name = $(this).data('name');
// ajax
$.ajax({
type:"POST",
url: "getemployees.php",
data: { name: name },
dataType: 'json',
success: function(res){
$('#name').html(res.name);
$('#address').html(res.address);
$('#salary').html(res.salary);
}
});
});
});
</script>
</body>
</html>