<?php 
    include("config.php");
    include("header.php");
    if( $_SESSION['id']=="")
    {        
     header('Location: index.php');
    }
    $msg="";
    $candid="";
    $phd="";
    $post = "";
    $name =   "";
    $gender = "";
    $comm =   ""; 
    $grad =   "";
    $postgrad =  "";
    $db="";
    $expfrm="";
    $expto="";
    $addcourse = "";
    $compcourse =   "" ;
    $exp =   "";
    $govtexp =  "";
    $rep =   "";
    $compskill =   "";
    $qualexp =  "" ;
    $workexp =  "" ;
    $mob =  "";
    $email =   ""; 
    $dob =  "";
    $isok = "";
    $age="";
    $result="0";
    $isval="0";
    $uid=$_SESSION['id'];

    $rs=mysqli_query($mysqli,"SELECT id, concat(name,' -',mob) as info from  applicants where isdelete=0 group by name, mob, email order by name");
    
    if(isset($_GET['name']))
    {  
        $candid= $_GET['name']; 
        $sr=mysqli_query($mysqli,"SELECT name, gender,a.phd, community, dob, a.grad, a.post_grad, add_course, comp_course, exp, exp_gov, know_rep, know_ms, qual_remarks, work_exp, mob, email, curr_age, b.postid from  applicants a inner join post b on  a.id=b.cand_id where a.id=$candid  and a.isdelete=0 and b.isdelete=0");
        $isval="1";
        while($r= mysqli_fetch_array($sr)) {   
            $gender =  $r["gender"]; 
            $comm =   strtolower($r["community"]);  
            $grad =    $r["grad"]; 
            $phd= strtoupper($r["phd"]);
            $postgrad =   $r["post_grad"]; 
            $db= $r["dob"];  
            $addcourse =  $r["add_course"]; 
            $compcourse =    $r["comp_course"];  
            $exp =   $r["exp"];;
            $govtexp =  $r["exp_gov"];;
            $rep =   $r["know_rep"]; 
            $compskill =  $r["know_ms"]; 
            $qualexp =   $r["qual_remarks"];  
            $workexp =   $r["work_exp"]; 
            $mob = $r["mob"] ;
            $email =   $r["email"];  
            $age= $r["curr_age"];  
        }
       
    }
    if(isset($_POST['Submit']))
    {
        $isval="1";
        $ip= $_SERVER['SERVER_ADDR'];
        $post =  $_POST['postapp'];
        $candid =   $_POST['candid'] ; 
        $phd=$_POST["phd"];
        $gender =   $_POST['gender'] ;
        $comm =   strtolower($_POST['comm']);  
        $db=$_POST['dob']; 
        $grad =   strtoupper($_POST['grad']) ;
        $postgrad =   strtoupper($_POST['postgrad']) ;
        $addcourse =   strtoupper($_POST['addcourse']) ;
        $compcourse =   strtoupper($_POST['compcourse'] ); 
        
        $exp =   $_POST['exp']  ; 
        $govtexp =   $_POST['govtexp'] ;
        $rep =   $_POST['rep'] ;
        $compskill =   $_POST['compskill'] ;
        $qualexp =   strtoupper($_POST['qualexp']) ;
        $workexp =   strtoupper($_POST['workexp']) ;
        $mob =   $_POST['mob'] ;
        $email =   strtolower($_POST['email']);  
        $age=  $_POST['age'];    
       
        $s = "SELECT count(1) as cnt from applicants a inner join post b on a.id = b.cand_id where postid =$post and a.id=$candid  and a.isdelete=0 and b.isdelete=0";
        $sql=mysqli_query($mysqli,$s);
        while($str = mysqli_fetch_array($sql))
        {
            if((int)$str["cnt"]<1)
            { 
                $result = mysqli_query($mysqli,"INSERT INTO post (cand_id , postid,grad,post_grad,phd,  macip,user) value ($candid, $post,'$grad','$postgrad','$phd','$ip',$uid)");
                $isok = "1";
            }
            else
            { 
                $isok = "0";
                $msg="<span style='color:red'>Candidate record  for this post is already in the database.</span>";
            }
        } 
        if($isok=="1")
        { 
            if($result=="1")
            {
                $msg="<span style='color:green'>Record Successfully Saved.</span>";
                $post = "";
                $name =   "";
                $gender = "";
                $comm =   ""; 
                $grad =   "";
                $postgrad =  "";
                $db="";
                $expfrm="";
                $phd="";
                $expto="";
                $addcourse = "";
                $compcourse =   "" ;
                $exp =   "";
                $govtexp =  "";
                $rep =   "";
                $compskill =   "";
                $qualexp =  "" ;
                $workexp =  "" ;
                $mob =  "";
                $email =   ""; 
                $dob =  "";
                $isok = "";
                $age="";
                $candid="";
                $result="0";
            }
            else
            {
                $msg="<span style='color:red'>Somthings went wrong!</span>";
            }
        }
    } 
?>

<div class="container"> 
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<h3>Registered Candidate applied for different Post</h3>
</div>
</div>
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<p><b><?php echo $msg ?></b></p>
</div>
</div>

<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<table class="table table-striped" width="100%" style="font-size:12px !important;">
<form action="add1.php" method="GET"  name="form1"  >
<tr>
<th width="40%">
    Candidate Name<span class="textmand">*</span>
</th>
<td width="40%"> 
<select name="name" required   class="form-control" >
    <option value="">--Select--</option>
<?php while($r= mysqli_fetch_array($rs)) { ?>
    <option value="<?php echo $r["id"]; ?>" <?php if( $r["id"]==$candid)  echo 'selected';    ?> > <?php echo  $r["info"]; ?></option>
  
<?php } ?>
</td>
 <td>
 <input type="submit" name="Search" value="Find Details" class="btn btn-primary btn-sm">
 </td>
</tr>
</form>
<form action="add1.php" method="POST"  name="form2"   onsubmit="return validation()">
<?php if($isval=="1")
{?>
<tr>
<th>
Gender<span class="textmand">*</span>
</th>
<td>
<select id="gender" name="gender"  required class="form-control"  >
    <option value="">--Select--</option>
    <option value="M" <?php if($gender=='M') echo 'selected' ?>>Male</option>
    <option value="F"<?php if($gender=='F') echo 'selected' ?>>Female</option> 
    </select>
    <input type="hidden" name="candid" value="<?php echo $candid   ?>">
</td>
 <td></td>
</tr>
<tr>
<th>
Community<span class="textmand" required>*</span>
</th>
<td>
<!--<input type="text" name="comm" value="<?php echo $comm ?>" class="form-control" >-->
<select id="comm" name="comm"  required  class="form-control" >
    <option value="">--Select--</option>
    <option value="Khasi" <?php if($comm=='khasi') echo 'selected' ?>>Khasi</option>
    <option value="Jaintia" <?php if($comm=='jaintia') echo 'selected' ?>>Jaintia</option> 
    <option value="Garo" <?php if($comm=='garo') echo 'selected' ?>>Garo</option> 
    <option value="Napali" <?php if($comm=='nepali') echo 'selected' ?>>Napali</option> 
    <option value="Assamese" <?php if($comm=='assamese') echo 'selected' ?>>Assamese</option> 
    <option value="Bengali" <?php if($comm=='bengali') echo 'selected' ?>>Bengali</option> 
    <option value="Pnar" <?php if($comm=='pnargaro') echo 'selected' ?>>Pnar</option> 
    <option value="Others" <?php if($comm=='others') echo 'selected' ?>>Others</option> 
    </select>
</td>
 <td></td>
</tr>
<tr>
<th>
Date of Birth<span class="textmand">*</span>
</th>
<td>
<div class='input-group date' class='datetimepicker1'>
<input type="text" name="dob" id="dob" autocomplete="off" class="form-control datepicker"  onblur="age()" placeholder="yyyy-mm-dd" value="<?php echo $db ?>" required
onblur="ValidateDate(this, event.keyCode)" onkeydown="return DateFormat(this, event.keyCode)" maxlength="10" onfocus="this.select();">
<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
</div>
</td>
 <td>  </td>
</tr>
<tr>
<th>
Graduation<span class="textmand">*</span>
</th>
<td> 
<input type="text" name="grad" value="<?php echo $grad ?>" required class="form-control" >
</td>
 <td></td>
</tr>
<tr>
<th>
Post Graduation<span class="textmand">*</span>
</th>
<td>
<input type="text" name="postgrad" value="<?php echo $postgrad ?>" required class="form-control" >
</td>
 <td></td>
</tr>
<tr>
<th>
PHD<span class="textmand">*</span>
</th>
<td>
<select id="phd" name="phd"  required  class="form-control" >
    <option value="">--Select--</option>
    <option value="YES" <?php if($phd=='YES') echo 'selected' ?>>Yes</option>
    <option value="NO" <?php if($phd=='NO') echo 'selected' ?>>No</option> 
    </select> 
</td>
 <td></td>
</tr>
<tr>
<th>
Additional Course<span class="textmand">*</span>
</th>
<td> 
<input type="text" name="addcourse" value="<?php echo $addcourse ?>" required class="form-control" >
</td>
 <td></td>
</tr>
<tr>
<th>
Computer Course<span class="textmand">*</span>
</th>
<td>
<input type="text" name="compcourse" value="<?php echo $compcourse ?>" required class="form-control" >
</td>
 <td></td>
</tr>
  
<tr>
<th>
No of years work Experience   
</th>
<td> 
<input type="text" name="exp" value="<?php echo $exp ?>" required class="form-control" >
 
</td>
 <td></td>
</tr>
<tr>
<th>
Experience in Government Setup  <span class="textmand">*</span>

</th>
<td> 
<select id="govtexp" name="govtexp"  required  class="form-control" >
    <option value="">--Select--</option>
    <option value="1" <?php if($govtexp=='1') echo 'selected' ?>>Yes</option>
    <option value="2" <?php if($govtexp=='2') echo 'selected' ?>>No</option> 
    </select>
</td>
 <td></td>
</tr>
<tr>
<th>
Knowledge in Report Writing, File Management, General Administration ,Correspondence etc.  <span class="textmand">*</span>
</th>
<td>
<select id="rep" name="rep"  required  class="form-control" >
    <option value="">--Select--</option>
    <option value="Yes" <?php if($rep=='Yes') echo 'selected' ?>>Yes</option>
    <option value="No" <?php if($rep=='No') echo 'selected' ?>>No</option> 
    </select>
</td>
 <td></td>
</tr>
<tr>
<th>
knowledge of Ms-Office and other computer skills <span class="textmand">*</span>
</th>
<td>
    <select id="compskill" name="compskill"  required  class="form-control" >
    <option value="">--Select--</option>
    <option value="Yes" <?php if($compskill=='Yes') echo 'selected' ?>>Yes</option>
    <option value="No" <?php if($compskill=='No') echo 'selected' ?>>No</option> 
    </select>
</td>
 <td></td>
</tr>
<tr style="display:none;">
<th >
Qualification Remarks
</th>
<td>
<input type="text" name="qualexp" value="<?php echo $qualexp ?>"  class="form-control" >
</td>
 <td></td>
</tr>
<tr style="display:none;">
<th  >
Working Experience Remarks </th>
<td>
<input type="text" name="workexp" value="<?php echo $workexp ?>"  class="form-control" >
</td>
 <td></td>
</tr>
<tr>
<th>
Mobile Number<span class="textmand">*</span>
</th>
<td>
<input type="text" name="mob" id="mob" maxlength="10"  value="<?php echo $mob ?>" required class="form-control" >
</td>
 <td></td>
</tr>
<tr>
<th>
Email <span class="textmand">*</span>
</th>
<td>
<input type="text" name="email" id="email" value="<?php echo $email ?>" required class="form-control" >
</td>
 <td></td>
</tr>
<tr>
<th>
Age 
</th>
<td>
<input type="text" name="age" id="age" value="<?php echo $age ?>" required class="form-control" >
</td>
 <td></td>
</tr>
<tr>
<th width="40%">
    Post Applied For:<span class="textmand">*</span>
</th>
<td  width="40%">
    <select name="postapp" required   class="form-control" >
    <option value="">--Select--</option>
    <option value="1" <?php if($post=='1') echo 'selected' ?>>Accounts officer</option>
    <option value="2" <?php if($post=='2') echo 'selected' ?>>Data Entry</option>
    <option value="3" <?php if($post=='3') echo 'selected' ?>>District Manager</option>
    <option value="4" <?php if($post=='4') echo 'selected' ?>>Executive Assistant</option>
    <option value="5" <?php if($post=='5') echo 'selected' ?>>Help Desk</option>
    <option value="6" <?php if($post=='6') echo 'selected' ?>>Research</option>
    </select>
</td>
 <td></td>
</tr>
<tr>
<td></td>
<td>
<input type="submit" name="Submit" value="Save" class="btn btn-info"  >
</td>
 <td></td>
</tr>
<?php } ?>

</form>
</table>

</div>
</div>

</div>

<?php 
mysqli_close($mysqli);
    include("footer.php");
?>