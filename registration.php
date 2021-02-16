<?php
$tname = $_POST['tname'];
$fname = $_POST['fname'];
$lname  = $_POST['lname'];
$year  = $_POST['year'];
$cname = $_POST['cname'];
$gender = $_POST['gender'];
$email  = $_POST['email'];
$phone= $_POST['phone'];
$mem1= $_POST['mem1'];
$mem2= $_POST['mem2'];
$mem3= $_POST['mem3'];
$topic= $_POST['topic'];



// Database connection
$conn = new mysqli('localhost','root','','hevents');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
} else {

    $stmt = $conn->prepare("insert into registration(tname,fname,lname,year,cname,gender
,email,phone,mem1,mem2,mem3,topic) values(? ,?, ?, ?, ?, ?, ?,?,?,?,?,?)");
    $stmt->bind_param("ssssssssssss", $tname,$fname, $lname,$year,$cname,$gender
, $email, $phone,$mem1,$mem2,$mem3,$topic);



    $execval = $stmt->execute();
    echo $execval;	
    echo '<script language="javascript">';
    echo 'alert("Successfully Registered.");';
    echo 'alert("Check Your Entries"); location.href="connection.php"';
    echo '</script>';
    
    $stmt->close();
    $conn->close();
}
?>
<br>
<center>