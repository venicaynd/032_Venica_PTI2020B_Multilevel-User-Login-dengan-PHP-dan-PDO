<?php
session_start();
include('koneksi.php');
error_reporting(0);
if($_SESSION['nama_lengkap'])
{
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="robots" content="noindex, nofollow">
<title>Login Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

</head>
<body>
<div class="container">
<div> </div>
<div class="  d-flex flex-row align-items-center justify-content-between">
<div class="">
<a href="logout.php"><button type="button" class="btn btn-sm btn-primary"><i class="fas fa-plus" ></i>Logout
</button></a>
</div>
</div>
<div> </div>
<div class="row ">
<table id="" class="table table-bordered">
<thead>
<tr>
<th class="text-center">No</th>
<th>User Name</th>
<th>Login Time</th>
</tr>
</thead>
<tbody>
<?php
$id=$_SESSION['id'];
$query=mysqli_query($koneksi,"SELECT * from userlog where  userId='$id'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
<tr>
<td><?php echo $cnt;?></td>
<td><?php echo $row['username'];?></td>
<td><?php echo $row['loginTime'];?></td>
</tr>
<?php $cnt=$cnt+1;
} ?>
</tbody>
</table>
</div>
</div>
</body>
<?php
} else{
header('location:logout.php');
}
?>

