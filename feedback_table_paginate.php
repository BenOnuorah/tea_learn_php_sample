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



// how many rows to show per page
$rowsPerPage = 3;

// by default we show first page
$pageNum = 1;

// if $_GET['page'] defined, use it as page number
if(isset($_GET['page']))
{
     $pageNum = $_GET['page'];
}

// counting the offset
$offset = ($pageNum - 1) * $rowsPerPage;

//query the table
$query  = "SELECT * FROM feedback ORDER BY id DESC LIMIT $offset, $rowsPerPage";
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


// how many rows we have in database
$query   = "SELECT COUNT(id) AS numrows FROM feedback";
$result  = mysqli_query($conn, $query) or die(mysqli_error($conn));	
$row     = mysqli_fetch_array($result);
$numrows = $row['numrows'];

 

// how many pages we have when using paging?
$maxPage = ceil($numrows/$rowsPerPage);

// print the link to access each page
$self = $_SERVER['PHP_SELF'];
$nav = '';
for($page = 1; $page <= $maxPage; $page++)
{
     if ($page == $pageNum)
     {
           $nav .= " $page ";   // no need to create a link to current page
     }
     else
     {
           $nav .= " <a href=\"$self?page=$page\">$page</a> ";
     }         
}

// creating previous and next link
// plus the link to go straight to
// the first and last page

if ($pageNum > 1)
{
     $page = $pageNum - 1;
     $prev = " <a href=\"$self?page=$page\">[Prev]</a> ";
    
     $first = " <a href=\"$self?page=1\"> [First Page]</a> ";
}
else
{
     $prev  = '&nbsp;'; // we're on page one, don't print previous link
     $first = '&nbsp;'; // nor the first page link
}

if ($pageNum < $maxPage)
{
     $page = $pageNum + 1;
     $next = " <a href=\"$self?page=$page\">[Next]</a> ";
     $last = " <a href=\"$self?page=$maxPage\">[Last Page]</a> ";
}
else
{
     $next = '&nbsp;'; // we're on the last page, don't print next link
     $last = '&nbsp;'; // nor the last page link
}

// print the navigation link
print $first . $prev . $nav . $next . $last;
?>
</BODY>
</HTML>