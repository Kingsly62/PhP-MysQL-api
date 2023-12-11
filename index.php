<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <h1>Hello Testing Phase API</h1>
</body>
</html>


<?php 
$con=mysqli_connect("localhost","root","","api_data");
$response= array();
if($con){
    $sql = "select * from data";
    $result = mysqli_query($con,$sql);
    if($result){
        header("Content-Type: JSON");
        $i=0;
        while($row=mysqli_fetch_assoc($result)){
            $response[$i]['id']= $row['id'];
            $response[$i]['name']=$row['name'];
            $response[$i]['age']=$row['age'];
            $response[$i]['email']=$row['email'];
            $i++;
        }
        echo json_encode($response,JSON_PRETTY_PRINT);
    }
}
else{
    echo "Database connection Failed";
}

?>