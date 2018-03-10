<?php
require('db.php');
include("auth.php");
$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
    $trn_date = date("Y-m-d H:i:s");
    $title =$_REQUEST['title'];
    $paste = $_REQUEST['paste'];
    $submittedby = $_SESSION["username"];
    $ins_query="insert into new_record
    (trn_date,title,paste) values
    ('$trn_date','$title','$paste')";
    mysqli_query($con,$ins_query);
    
    $status = "New Paste Added Successfully.
    </br></br> <a href='view.php'>View Added Paste </a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add New Paste</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> 
| <a href="view.php">View Pastes</a> 
| <a href="logout.php">Logout</a></p>
<div>
<h1>Add New Paste</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="title" placeholder="Title" required /></p>
<p><input type="text" name="paste" placeholder="Enter your text" required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>