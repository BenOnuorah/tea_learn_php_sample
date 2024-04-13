<HTML>
<HEAD>
<TITLE> Company Feedback </TITLE>
</HEAD>
<BODY>
<b>FEEDBACK LIST</b>
<br />
<br />
<?php
//include the connection string
include("conn.php");

//query the table
$query  = "SELECT * FROM feedback";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));	

//the table header
print "
<table width=\"50%\" border=1>
<tr>
<td>NAME</td>
<td>EMAIL</td>
<td>COMMENT</td>
<td>DATE POST</td>
</tr>
";

//loop through the query and print the result
while($info = mysqli_fetch_array($result)){
     $data_id = $info['id'];
     $data_name = $info['name'];
     $data_email = $info['email'];
     $data_comment = $info['comment'];
     $data_date = $info['date_submit'];

           print "
           <tr>
               <td> $data_name </td>
               <td> $data_email </td>
               <td> $data_comment </td>
               <td> $data_date </td>
           </tr>
           ";
}
print "</table>";
?>
</BODY>
</HTML>