<?php 
 
    include("config.php");
    include("header.php"); 
     $msg="";
        if( $_SESSION['id']=="")
        {        
         header('Location: index.php');
        } 
        $msg="";
        if(isset($_POST['Submit']))
        {
            
            $uid=$_SESSION['id'];
            $p0=$_POST['p0'];
            $p1=$_POST['p1'];
            $p2=$_POST['p2'];
            if($p1==$p2)
            {
                $s=mysqli_query($mysqli, "SELECT  count(1) as cnt from users where pwd='$p0' and id=$uid");
                
                while($str = mysqli_fetch_array($s))
                {
                    if((int)$str["cnt"]<1)
                    { 
                        $msg="<span style='color:red;'>Wrong Old Password!</span>";
                    }
                    else
                    { 
                        
                            $sql = mysqli_query($mysqli, "UPDATE  users set pwd='$p1' where id=$uid");
                            if($sql=="1")
                            {
                                $msg="<span style='color:green;'>Password has changed successfully.</span>";
                            }
                            else
                            {
                                $msg="<span style='color:red;'>Somethings wrong!</span>";
                            }
                         
                    }
                } 
            } 
            else
            {
                $msg="<span style='color:red;'>Password not matching!</span>";
            }

        }
?>

<div class="container"> 
<form method="POST" action="change.php">
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
<?php echo $msg ?>
</div> 
</div>
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
<table class="table table-striped">
<tr>
<th colspan="2">
Change Password
</th>
</tr>
<tr>
<td>
Name:
</td>
<td>
<?php echo $_SESSION['name'] ?>
</td>
</tr>
<tr>
<td>
Old Password
</td>
<td>
    <input type="password" name="p0" required>
</td>
</tr>
<tr>
<td>
New Password
</td>
<td>
    <input type="password" name="p1" required>
</td>
</tr>
<tr>
<td>
Confirm Password
</td>
<td>
    <input type="password" name="p2" required>
</td>
</tr>
<tr>
<td>

</td>
<td>
<input type="submit" name="Submit" value="Change Password">
</td>
</tr>
</table>
</div>
</div>
</form>
</div>
<?php 
mysqli_close($mysqli);
    include("footer.php");
?>