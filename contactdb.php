<?php
//include the connection string
include("conn.php");
if(isset($_REQUEST['submit'])){
	
	// keep the form data in variable  
	$names = mysqli_escape_string($conn, $_REQUEST['names']);
	$email = mysqli_escape_string($conn, $_REQUEST['email']);
	$comment = mysqli_escape_string($conn, $_REQUEST['comment']);
	
	$sql="INSERT INTO feedback (name, email, comment, date_submit) VALUES ('$names','$email', '$comment',now())";  
	$result = mysqli_query($conn, $sql) or die($sql);
	
	if($result){
		$msg = "Thanks $name for your feedback.";
	}
}
?>
<HTML>
<HEAD>
<TITLE> Company Feedback </TITLE>
</HEAD>
<BODY>
<?php
if(isset($msg)){
	// display the thanks msg
	print $msg;
}
?>
</BODY>
</HTML>