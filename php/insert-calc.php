<?php

$conn = mysqli_connect('localhost','root','','calculator');
if(mysqli_connect_errno()){
    echo "<h1>connection failed</h1>" . mysqli_connect_error();
    exit();
}
$data = json_decode(file_get_contents("php://input"), true);
$name = mysqli_real_escape_string($conn,$data['title']);
$calculation = mysqli_real_escape_string($conn,$data['calculation']);
$calc_result = mysqli_real_escape_string($conn,$data['result']);

if(!empty($name) && !empty($calculation)&& !empty($calc_result)){

    $sql = "select title from calculator.calci where title = '{$name}' ";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        echo "Duplicate title not allowed";
    }
    else{
    $sql1 = "INSERT into calculator.calci (title,calculation,result) values ('{$name}','{$calculation}',{$calc_result})";
    $result1 = mysqli_query($conn,$sql1);
if($result1){
    
    echo "success";
}else{
    echo "failed";
}
    }
}else{
    echo 'Empty feild are not allowed';
}
mysqli_close($conn);


?>