<?php
if(isset($_POST['submit']))
{
    require("connection.php");
    extract($_POST);

    $query="insert into patient(name,email,city,phone,gender,dob,bloodgroup) values('$name','$email','$city','$contact','$gender','$dob','$blood' )";
    $result = $conn->query($query);
    if($result){
        $id=mysqli_insert_id($conn);
        $query2="insert into appointments(p_id,doc_id,complaint) values($id,3,'$complain')";
        $result2 = $conn->query($query2);
        if($result){
        header("Location: printcard.php?id=$id&name=$name&gender=$gender&dob=$dob&contact=$contact&blood=$blood");
        }
    }
}
?>