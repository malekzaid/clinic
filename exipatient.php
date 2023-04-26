<?php
if(isset($_POST['submit']))
{
    require("connection.php");
    extract($_POST);

    $query="select name from patient where id= $id";
    $result = $conn->query($query);
    $data= $result->fetch_assoc();
    if(!empty($data)){
        $query2="insert into appointments(p_id,doc_id,complaint) values($id,3,'$complain')";
        $result2 = $conn->query($query2);
        if($result){
        header("Location: index.php");
        }
    }
    else{
        print_r( $data);
    }
}
else{
    header("Location: index.php");
}
?>