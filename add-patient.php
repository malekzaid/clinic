<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
if (isset($_POST['submit'])) {
    require("connection.php");
    extract($_POST);
    $gender == 'Male' ? $g = 'M' : $g = 'F';
    $query = "insert into patient(name,email,city,phone,gender,dob,bloodgroup) values('$name','$email','$city','$contact','$gender','$dob','$blood' )";
    echo $query;
    $result = $conn->query($query);
    if ($result) {
        $id = mysqli_insert_id($conn);
        $query2 = "insert into appointments(p_id,doc_id,complaint) values($id,3,'$complain')";
        $result2 = $conn->query($query2);
        if ($result2) {
            $id = mysqli_insert_id($conn);
            $query3 = "insert into token(ap_id,status) values($id,0)";
            $result3 = $conn->query($query3);
            if ($result3) {
                header("Location: printcard.php?id=$id&name=$name&gender=$gender&dob=$dob&contact=$contact&blood=$blood");
            }
        }
    }
}
?>