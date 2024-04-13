<?php
//include the connection string
include("conn.php");

if(isset($_GET['id'])){
//get the from the query link
	$query_id = mysqli_escape_string($conn, $_GET['id']);
		
	
	//query the table using the value from the query link
	$query  = "SELECT * FROM feedback WHERE id='$query_id'";
	$result = mysqli_query($conn, $query) or die($query);
	
	$info = mysqli_fetch_array($result);
		//assign the result to valriable   
		$data_id = $info['id'];
		$data_name = $info['name'];
		$data_email = $info['email'];
		$data_comment = $info['comment'];
		$data_date = $info['date_submit'];
}
?>
<HTML>
<HEAD>
<TITLE> Company Feedback </TITLE>
</HEAD>
<BODY>
<form method="post" action="feedback_edited.php">
    <table>
<tr><td colspan="2"><b>UPDATE REDCORD</b></td></tr>
     <tr><td><strong> Name</strong></td>
<td>
<input name="names" type="text" id="names" size="30" value="<?php echo $data_name; ?>" />
</td>
    </tr>
    <tr><td><strong>Email</strong></td>
<td>
<input name="email" type="text" id="email" size="30" value="<?php echo $data_email; ?>" />
</td>
    </tr>
    <tr><td></td>
<td>
<textarea name="comment" cols="30" rows="5" id="comment"><?php echo $data_comment; ?></textarea>
</td>
</tr>
     <tr>
<td></td>
<td>
<!-- HIDDEN ELEMENT -->
<input name="sel_id" type="hidden" value="<?php echo $data_id; ?>" />
<input type="submit" name="edit" value="Update" /></td>
     </tr>
     </table>
 </form>
</BODY>
</HTML>