<?php

$conn = mysqli_connect('localhost','root','','calculator');
if(mysqli_connect_errno()){
    echo "<h1>connection failed</h1>" . mysqli_connect_error();
    exit();
}
$data = json_decode(file_get_contents("php://input"), true);
    $output =  " ";


 $sql = "select * from calculator.calci ";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
       $output .= "<tr ><td><input type='checkbox'/></td><td>{$row['title']}</td><td>{$row['calculation']}</td><td>{$row['result']}</td><td><i class='material-icons delete' data-id={$row['id']}> delete </i></td></tr>";
    }}
echo $output;
mysqli_close($conn)


?>