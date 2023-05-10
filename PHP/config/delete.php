<?php
if(isset($_GET['ResidentID'])){
    include "db_conn.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $ResidentID = validate($_GET['ResidentID']);

    $sql = "DELETE FROM tblscinfo
            WHERE ResidentID = $ResidentID";
            $result = mysqli_query($conn, $sql);

        if($result){
            header("Location: ../indexRead.php?success=Succesfully Deleted"); 
        }else{
            header("Location: ../indexRead.php?error=Unknown Error Occured&$user_data");
        }
}else{
    header("Location: indexRead.php");
}