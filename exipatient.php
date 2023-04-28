<?php
if(isset($_POST['submit']))
{
    require("connection.php");
    extract($_POST);

    $query="select * from appointments where id= $id";
    $result = $conn->query($query);
    $data= $result->fetch_assoc();
    if(!empty($data)){
        $query2="insert into token(ap_id,status) values($id,'pending')";
        $result2 = $conn->query($query2);    
        header("Location: index.php");
    }
    else{
        print_r( $data);
    }
}
else{
    header("Location: index.php");
}
?>