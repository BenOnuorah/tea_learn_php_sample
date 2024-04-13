<?php
//include the connection string
include("conn.php");
if(isset($_REQUEST['edit'])){
	
	// keep the form data in variable  
	$names = mysqli_escape_string($conn, $_POST['names']);
	$email = mysqli_escape_string($conn, $_POST['email']);
	$comment = mysqli_escape_string($conn, $_POST['comment']);
	$id=mysqli_escape_string($conn, $_POST['sel_id']);
	
	$sql="UPDATE feedback SET 
			name='$names', 
           	email='$email',
           	comment='$comment'  
           	WHERE id= '$id'"; 
	$result = mysqli_query($conn, $sql) or die($sql);
	
	if($result){
		$msg = "Record Successfully Updated";
	}
}
?>
<HTML>
<HEAD>
<TITLE> Company Feedback </TITLE>
</HEAD>
<BODY>
<p><a href="feedback_table_paginate_update.php">Return</a></p>
<?php
if(isset($msg)){
	// display the thanks msg
	print $msg;
}
?>
</BODY>
</HTML>