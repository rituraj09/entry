<?php 
 
    include("config.php");
    include("header.php"); 
     
        if( $_SESSION['id']=="")
        {        
         header('Location: index.php');
        }
     
    $msg="";
    $post = "";
    $phd="";
    $name =   "";
    $gender = "";
    $com="";
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
    $result="0";
    $ok = "0";
    $uid=$_SESSION['id'];
    if(isset($_POST['Submit']))
    {
        $ip= $_SERVER['SERVER_ADDR'];
        $post =  $_POST['postapp'];
        $name =   strtoupper($_POST['name']) ;
        $gender =   $_POST['gender'] ;
        $com =    $_POST['comm']  ;
        $comm =   strtoupper($_POST['comm']) ;
        $db=$_POST['dob'];
        $dob =  $_POST['dob'];
        $grad =   strtoupper($_POST['grad']) ;
        $postgrad =   strtoupper($_POST['postgrad']) ;
        $addcourse =   strtoupper($_POST['addcourse']) ;
        $compcourse =   strtoupper($_POST['compcourse'] );
        $phd=strtoupper($_POST['phd'] );
        $expfrm=$_POST['expfrm'];
        $expto=$_POST['expto'];
        
        $exp =   $_POST['exp'] ;
        $govtexp =   $_POST['govtexp'] ;
        $rep =   $_POST['rep'] ;
        $compskill =   $_POST['compskill'] ;
        $qualexp =   strtoupper($_POST['qualexp']) ;
        $workexp =   strtoupper($_POST['workexp']) ;
        $mob =   $_POST['mob'] ;
        $email =   strtolower($_POST['email']);  
        $d1 = $_POST['dob']; 
        function ageCalculator($d1,$d2){
            if(empty($d1) || empty($d2)){ 
                return 0;
            }
            else
            {
                $fdate = new DateTime($d1);
                $today   = new DateTime($d2);
                $age = $fdate->diff($today)->y;
                return $age;
            }
        }
      
        $age= ageCalculator($d1,'2018-06-26');
        
        $s = "SELECT count(1) as cnt from applicants a inner join post b on a.id = b.cand_id where b.postid =$post and name='$name' and (mob='$mob' or email='$email') and a.isdelete=0 and b.isdelete=0";
        $sql=mysqli_query($mysqli,$s);
        if(mysqli_num_rows($sql) >0)
        {
            while($str = mysqli_fetch_array($sql))
            {
                if((int)$str["cnt"]<1)
                { 
                    $isok = "1";
                }
                else
                { 
                    $isok = "0";
                    $msg="<span style='color:red'>Candidate record  for this post is already in the database.</span>";
                }
            }
        }
        if($isok=="1")
        {
            $sql = mysqli_query($mysqli,"SELECT id from applicants where name='$name' and (mob='$mob' or email='$email') and isdelete=0");
            if(mysqli_num_rows($sql) >0)
            {
                while($r= mysqli_fetch_array($sql)) {
                    $id=$r["id"];
                } 
                $sql1 = mysqli_query($mysqli,"INSERT INTO post (cand_id , postid,,grad,post_grad,phd,  macip) value ($id, $post,'$grad','$postgrad','$phd','$ip')");
                $ok="1";  
                
            
            }             
            else
            { 
                $sql="INSERT INTO applicants(name , gender, community, dob, grad, post_grad, add_course, comp_course, exp, exp_gov, know_rep, know_ms, qual_remarks, work_exp, mob, email, curr_age,phd ) value(
                    '$name','$gender','$comm','$dob','$grad','$postgrad','$addcourse','$compcourse','$exp',$govtexp,'$rep','$compskill','$qualexp','$workexp','$mob' ,'$email',$age ,'$phd'
                    )";
                    $result=mysqli_query($mysqli,$sql);
                    if($result=="1")
                    {
                        $lid= $mysqli->insert_id;
                        $sql1 = mysqli_query($mysqli,"INSERT INTO post (cand_id , postid,grad,post_grad,phd,  macip,user) value ($lid, $post,'$grad','$postgrad','$phd','$ip',$uid)");
                        $ok="1";
                    } 
            }
  
        if( $ok=="1"){
              $msg="<span style='color:green'>Record Successfully Saved.</span>";
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
                $com="";
                $isok = "";
                $result="0"; 
                $phd="";
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
<h3>Add Candidate Information</h3>
</div>
</div>
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<p><b><?php echo $msg ?></b></p>
</div>
</div>
<form action="add.php" method="POST"  name="form1" onsubmit="return validation()">
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<table class="table table-striped" width="100%" style="font-size:12px !important;">
<tr>
<th width="40%">
    Post Applied For:<span class="textmand">*</span>
</th>
<td  width="40%">
    <select name="postapp" required   class="form-control" >
    <option value="">--Select--</option>
    <option value="1" <?php if($post=='1') echo 'selected' ?>>Accounts officer</option>
    <option value="2" <?php if($post=='2') echo 'selected' ?>>Data Entry/ Office Assistant</option>
    <option value="3" <?php if($post=='3') echo 'selected' ?>>District Manager</option>
    <option value="4" <?php if($post=='4') echo 'selected' ?>>Executive Assistant</option>
    <option value="5" <?php if($post=='5') echo 'selected' ?>>Help Desk Executives</option>
    <option value="6" <?php if($post=='6') echo 'selected' ?>>Research Associates</option>
    </select>
</td>
 <td></td>
</tr>
<tr>
<th>
    Candidate Name<span class="textmand">*</span>
</th>
<td>
<input type="text" name="name"  value="<?php echo $name ?>" required class="form-control" >
</td>
 <td></td>
</tr>
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
<input type="text" name="dob" autocomplete="off" id="dob" class="form-control datepicker"   placeholder="yyyy-mm-dd" value="<?php echo $dob ?>" required
onblur="ValidateDate(this, event.keyCode); age()" onkeydown="return DateFormat(this, event.keyCode)" maxlength="10" onfocus="this.select();">
<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
</div>
</td>
 <td>
<span id="age"></span></td>
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
Experience From 
</th>
<td>
<div class='input-group date' class='datetimepicker1'>
<input type="text" name="expfrm" id="expfrm" autocomplete="off"   class="form-control"   placeholder="yyyy-mm-dd" value="<?php echo $expfrm ?>"
onblur="ValidateDate(this, event.keyCode); exprr()" onkeydown="return DateFormat(this, event.keyCode)" maxlength="10"  onfocus="this.select();">
<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
</div>
</td>
 <td></td>
</tr>
<tr>
<th>
Experience To
</th>
<td>
<div class='input-group date' class='datetimepicker1'>
<input type="text" name="expto" id="expto" autocomplete="off"   class="form-control"  placeholder="yyyy-mm-dd" value="<?php echo $expto ?>"
onblur="ValidateDate(this, event.keyCode); exprr()" onkeydown="return DateFormat(this, event.keyCode)" maxlength="10"  onfocus="this.select();">
<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
</div>
</td>
 <td></td>
</tr>
<tr>
<th>
No of years work Experience  <span class="textmand">*</span> 
</th>
<td>  
 <input type="text" name="exp" id="exp" required value="<?php echo $exp ?>" class="form-control">
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
<th>
Qualification Remarks 
</th>
<td>
<input type="text" name="qualexp" value="<?php echo $qualexp ?>"  class="form-control" >
</td>
 <td></td>
</tr>
<tr style="display:none;">
<th>
Working Experience Remarks  
</th>
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
<td></td>
<td>
<input type="submit" name="Submit" value="Save" class="btn btn-info"  >
</td>
 <td></td>
</tr>
</table>
</div>
</div>
</div>
</form>


<?php 
mysqli_close($mysqli);
    include("footer.php");
?>