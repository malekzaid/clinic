<?php
if (isset($_POST['submit'])) {
    require("connection.php");
    extract($_POST);

    $query = "select * from patient where id= $id";
    $result = $conn->query($query);
    $data = $result->fetch_assoc();
    if (!empty($data)) {
        $query2 = "insert into appointments(p_id,doc_id,complaint) values($id,3,'$complain')";
        $result2 = $conn->query($query2);
        if ($result2) {
            $id = mysqli_insert_id($conn);
            $query3 = "insert into token(ap_id,status) values($id,0)";
            $result3 = $conn->query($query3);
            if ($result3) {
                header("Location: index.php");
            }
        }
    } else {
        print_r($data);
    }
} else {
    header("Location: index.php");
}
?>