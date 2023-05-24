<?php

$conn = mysqli_connect('localhost','root','','calculator');
if(mysqli_connect_errno()){
    echo "<h1>connection failed</h1>" . mysqli_connect_error();
    exit();
}
$data = json_decode(file_get_contents("php://input"), true);
$id = $_POST['id'];


$sql = "delete from calculator.calci where id = {$id}";
$result = mysqli_query($conn,$sql);
if($result){
    echo 'success';
}else{
    echo 'failed';
}

mysqli_close($conn)


?>