<style>
table tr th{
    background:#cecece;
}
</style>
<?php 
     include("config.php");
     include("header.php"); 
     if( $_SESSION['id']=="")
     {        
      header('Location: index.php');
     }
    
   


        // find out how many rows are in the table 
$sql = "SELECT COUNT(*) FROM applicants a inner join post b on a.id=b.cand_id where  a.isdelete=0 and b.isdelete=0    ";
$x = mysqli_query($mysqli, $sql) ;
$r = mysqli_fetch_row($x);
$numrows = $r[0];

// number of rows to show per page
$rowsperpage = 20;
// find out total pages
$totalpages = ceil($numrows / $rowsperpage);

// get the current page or set a default
if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
   // cast var as int
   $currentpage = (int) $_GET['currentpage'];
} else {
   // default page num
   $currentpage = 1;
} // end if

// if current page is greater than total pages...
if ($currentpage > $totalpages) {
   // set current page to last page
   $currentpage = $totalpages;
} // end if
// if current page is less than first page...
if ($currentpage < 1) {
   // set current page to first page
   $currentpage = 1;
} // end if

// the offset of the list, based on current page 
$offset = ($currentpage - 1) * $rowsperpage;

// get the info from the db 
$sql = "SELECT a.*,b.postid, b.user,b.id as pid, b.grad as grad1,b.post_grad as pgrad,b.phd as phd1 from applicants a inner join post b on a.id=b.cand_id where  a.isdelete=0 and b.isdelete=0    order by a.id  LIMIT $offset, $rowsperpage";
$result = mysqli_query($mysqli, $sql) ;

 

/******  build the pagination links ******/
// range of num links to show
$range = 3;

$sno=($currentpage*20)-19 ;  
?>

<div class="row"> 
<div class="col-md-12" >
<table class="table table-bordered" width="100%" style="font-size:11px !important;">
<tr>
<th>
#Sl
</th>
<th>
Post Applied for
</th>
<th>
Candidate Name
</th>
<th>
Gender
</th>
<th>
Community
</th>
<th>
Date of Birth
</th>
<th>
Graduation
</th>
<th>
Post Graduation
</th>
<th>
PHD
</th>
<th>
Additional Course
</th>
<th>
Computer Course
</th>
<th>
No of years work Experience
</th>
<th>
Experience in Government Setup
</th>
<th>
Knowledge in Report Writing, File Management, General Administration ,Correspondence etc.
</th>
<th>
knowledge of Ms-Office and other computer skills
</th>
 
<th>
Mobile Number
</th>
<th>
Email
</th>
<th>
Age
</th>
<th style="display:none;">

</th>
</tr>

<?php while($r= mysqli_fetch_array($result)) { ?>
<tr>
<td>
<?php echo $sno; $sno ++; ?>
</td>
<td>
<?php  
switch($r["postid"]){
    case 1 :
        echo "Accounts Officer";
        break;
    case 2 :
        echo "Data Entry / Office Assistant";
        break;
    case 3 :
        echo "District Manager";
        break;
    case 4 :
        echo "Executive Assistant";
        break;
    case 5 :
        echo "Help Desk Executives";
        break;
    case 6 :
        echo "Research Associates";
        break; 
}
 ?>
</td>
<td>
<?php echo  $r["name"]?>
</td>
<td>
<?php  
echo $r["gender"];
   ?>
</td>
<td>
<?php  
echo $r["community"];
   ?>
</td>
<td>
<?php   
echo  $r["dob"] ;
   ?>
</td>
<td>
<?php   
echo  $r["grad1"] ;
   ?>
</td>
<td>
<?php   
echo  $r["pgrad"] ;
   ?>
</td>
<td>
<?php   
echo  $r["phd1"] ;
   ?>
</td>
<td>
<?php   
echo  $r["add_course"] ;
   ?>
</td>
<td>
<?php   
echo  $r["comp_course"] ;
   ?>
</td>
<td>
<?php   
echo $r["exp"];

   ?> 
</td>
<td>
<?php    
if($r["exp_gov"]=="1")
{ 
    echo 'Yes';
}
else
{
    echo 'No';
}
   ?> 
</td>
<td>
<?php   
echo  $r["know_rep"] ;
   ?> 
</td>
<td>
<?php   
echo  $r["know_ms"] ;
   ?> 
</td>
 
<td>
<?php   
echo  $r["mob"] ;
   ?> 
</td>
<td>
<?php   
echo  $r["email"] ;
   ?> 
</td>
<td>
<?php   
echo  $r["curr_age"] ;
   ?> 
</td>
 <td style="display:none;">
 <?php   
 $uid=$_SESSION['id'];
 $pid=$r["pid"];
 if($uid==1)
 {
     echo "<a class='btn btn-xs btn-warning' href='edit.php?id=$pid'>Edit</a>";
 }
   ?> 
 </td>
</tr>
<?php } ?>
</table>
<div> 
</div>
</div></div>
<div class="row">
<div class="col-md-12">
<div  class="pagination">
<?php 
// if not on page 1, don't show back links
if ($currentpage > 1) {
    // show << link to go back to page 1
    echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=1'><<</a> ";
    // get previous page num
    $prevpage = $currentpage - 1;
    // show < link to go back to 1 page
    echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'><</a> ";
 } // end if 
 
 // loop to show links to range of pages around current page
 for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
    // if it's a valid page number...
    if (($x > 0) && ($x <= $totalpages)) {
       // if we're on current page...
       if ($x == $currentpage) {
          // 'highlight' it but don't make a link
          echo "<a class='active'><b>$x</b></a> ";
       // if not current page...
       } else {
          // make it a link
          echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$x'>$x</a> ";
       } // end else
    } // end if 
 } // end for
 
 // if not on last page, show forward and last page links        
 if ($currentpage != $totalpages) {
    // get next page
    $nextpage = $currentpage + 1;
     // echo forward link for next page 
    echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'>></a> ";
    // echo forward link for lastpage
    echo "<a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages'>>></a>";
 } // end if
 /****** end build pagination links ******/  
 ?>

</div>
</div>
</div>


 <?php 
mysqli_close($mysqli);
    include("footer.php");
?>