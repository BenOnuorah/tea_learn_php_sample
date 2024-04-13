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

//loop through the query and print the result
while($info = mysqli_fetch_array($result)){
     $data_id = $info['id'];
     $data_name = $info['name'];
     $data_email = $info['email'];
     $data_comment = $info['comment'];
     $data_date = $info['date_submit'];

           print "   
           NEME: $data_name
           <br />
           EMAIL: $data_email
           <br />
           COMMENT: $data_comment
           <br />
           DATE POST: $data_date
           <hr>
           ";
}
?>
</BODY>
</HTML>