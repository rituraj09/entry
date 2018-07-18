<?php 
     include("config.php");
     include("header.php"); 
  
     $rowperpage =20; // Total rows display
 
     $row = 0;
     if(isset($_GET['page'])){
        $row = $_GET['page']-1;
        if($row < 0){
         $row = 0;
        }
       }
 // count total number of rows
 $sql = "SELECT COUNT(1) AS cntrows FROM applicants a inner join post b on a.id=b.cand_id where  a.isdelete=0 and b.isdelete=0 ";
 $result = mysqli_query($mysqli,$sql);
 $fetchresult = mysqli_fetch_array($result);
 $allcount = $fetchresult['cntrows'];
 $limitrow = $row*$rowperpage; 
 $result = mysqli_query($mysqli,"SELECT a.*,b.postid from applicants a inner join post b on a.id=b.cand_id  where  a.isdelete=0 and b.isdelete=0 order by b.postid, name LIMIT $limitrow, $rowperpage");
    

 /////////////
 $sno = $row + 1;
 if(isset($_GET['page'])){
  $sno = (($_GET['page']*$rowperpage)+1) - $rowperpage;
  if($sno <=0) $sno = 1;
 }
     ?>
<div class="row"> 
<div class="col-md-12">
<table class="table table-bordered" style="font-size:11px !important;">
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
Qualification Remarks
</th>
<th>
Working Experience Remarks
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
echo  $r["grad"] ;
   ?>
</td>
<td>
<?php   
echo  $r["post_grad"] ;
   ?>
</td>
<td>
<?php   
echo  $r["post_grad"] ;
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
echo  $r["qual_remarks"] ;
   ?> 
</td>
<td>
<?php   
echo  $r["work_exp"] ;
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
 
</tr>
<?php } ?>
</table>
<div> 
 <!-- Number list (start) -->
 <ul class="pagination">
 
 <?php
 // calculate total pages
 $total_pages = ceil($allcount / $rowperpage);

 $i = 1;$prev = 0;

 // Total number list show
 $numpages = 5;

 // Set previous page number and start page 
 if(isset($_GET['next'])){
  $i = $_GET['next']+1;
  $prev = $_GET['next'] - ($numpages);
 }

 if($prev <= 0) $prev = 1;
 if($i == 0) $i=1;

 // Previous button next page number
 
 $prevnext = 0;
 if(isset($_GET['next'])){
  $prevnext = ($_GET['next'])-($numpages+1);
  if($prevnext < 0){
   $prevnext = 0;
  }
 }
 
 // Previous Button
 echo '<li ><a href="?page='.$prev.'&next='.$prevnext.'">Previous</a></li>';
 
 if($i != 1){
  echo '<li ><a href="?page='.($i-1).'&next='.$_GET['next'].'" '; 
  if( ($i-1) == $_GET['page'] ){
   echo ' class="active" ';
  }
  echo ' >'.($i-1).'</a></li>';
 }
 
 // Number List
 for ($shownum = 0; $i<=$total_pages; $i++,$shownum++) {
  if($i%($numpages+1) == 0){
   break;
  }
 
  if(isset($_GET['next'])){ 
   echo "<li><a href='?page=".$i."&next=".$_GET['next']."'";
  }else{
   echo "<li><a href='?page=".$i."'";
  }
 
  // Active
  if(isset($_GET['page'])){
   if ($i==$_GET['page']) 
    echo " class='active'";
   }
   echo ">".$i."</a></li> ";
  }

  // Set next button
  $next = $i+$rowperpage;
  if(($next*$rowperpage) > $allcount){
   $next = ($next-$rowperpage)*$rowperpage;
  }

  // Next Button
  if( ($next-$rowperpage) < $allcount ){ 
   if($shownum == ($numpages)){
   }else{
    echo '<li ><a href="?page='.$i.'&next='.$i.'">Next</a></li>';
   }
  }
 
  ?>
 </ul>
 <!-- Numbered List (end) -->
</div>
</div></div>
<?php 

mysqli_close($mysqli);
    include("footer.php");
?>