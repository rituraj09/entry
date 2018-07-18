<html>
<head>
<title>
MSIP
</title> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <style> 
.textmand{
    color:red;
}
.navbar-laravel {
  background-color: #fff;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
}
.navbar {
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    border-radius: 0;
} 
.divscroll{
        overflow: auto;
        overflow-y: hidden; 
        -ms-overflow-y: hidden;
    }
    .pagination {
    display: inline-block;
}

.pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
    border: 1px solid #ddd;
}

.pagination a.active {
    background-color: #999;
    color: white;
    border: 1px solid #999;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
</style>
<script>

function validation(){
   
    
    if (confirm("Are you sure to Save the Record!!")) {
        return true;
    }
    else {
        return false;
    }
}
</script>
</head>
<body>
<nav class="navbar navbar-inverse"  >
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">MSIP</a>
    </div> 
    <?php 
session_start();
    $uid ="";
if(isset($_SESSION['id']))
{
    $uid = $_SESSION['id'];
    if( $uid!= "")
    {
    ?>
        <ul class="nav navbar-nav"> 
        <li ><a href="add.php">Add Candidate Info</a></li> 
        <li ><a href="add1.php">Registered Candidate Info</a></li> 
        <li ><a href="view.php">View</a></li>  
        </ul> 
        <ul class="nav navbar-nav navbar-right">
        <li class="active">
        <a href="change.php"> <?php
 if($uid!="")
 { 
 echo "Hi,".$_SESSION['name']  ;
 }  
 ?></a>
        </li>
        <li  style="float:right"><a href="logout.php">Logout</a></li> 
</ul>
    
<?php }
 }
 else
 {?>
    <ul class="nav navbar-nav"> 
        <li ><a href="index.php">Login</a></li>   
        </ul>  
<?php  } 

?>
  </div>
</nav> 
 
  