<?php 

session_start();
$_SESSION['name']=""; 
$_SESSION['id']=""; 
session_destroy();
include("config.php");
include("header.php"); 
$msg="";
if(isset($_POST["Submit"]))
{
    $phn=$_POST["phn"];
    $pwd=$_POST["pwd"];
    $sql = mysqli_query($mysqli, "SELECT * from users where phn='$phn' and pwd='$pwd' and isact=1 ");    
    if(mysqli_num_rows($sql) >0)
    {
        while($str = mysqli_fetch_array($sql))
        {
            session_start();  
            $_SESSION['name']=$str["name"];
            $_SESSION['id'] = $str["id"]; 
            header('Location: add.php');

        }
    }
    else
    {
        $msg="<span style='color:red'>Invalid Phone number or Password</span>";
    }
}
?>

<div class="container"> 
<form method="POST" action="index.php">
<div class="col-md-4"></div>
<div class="col-md-8">
<?php echo $msg ?>
</div>
<div class="col-md-4"></div>
<div class="col-md-4">
<table class="table table-striped">
<tr>
<th colspan="2">
Login
</th>
</tr>
<tr>
<td>
Phone No.
</td>
<td>
<input type="text" name="phn" >
</td>
</tr>
<tr>
<td>
Password
</td>
<td> 
<input type="password" name="pwd" >
</td>
</tr>
<tr>
<td>
</td>
<td>
<input type="submit" name="Submit" value="Login">
</td>
</tr>
</table>
</div>
</form>
</div>
<?php 
include("footer.php");

?>