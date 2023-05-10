<?php 

if (isset($_GET['ResidentID'])){
    include "db_conn.php";

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $ResidentID = validate($_GET['ResidentID']);

    $sql = "SELECT * FROM tblscinfo WHERE ResidentID=$ResidentID";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result)){
        $row = mysqli_fetch_assoc($result);
    }else{
        header("Location: indexRead.php");
    }
        
}else if(isset($_POST['update'])){
    include "db_conn.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $LastName = validate($_POST['LastName']);
    $FirstName = validate($_POST['FirstName']);
    $MiddleName = validate($_POST['MiddleName']);
    $Address= validate($_POST['Address']);
    $BirthDate = validate($_POST['BirthDate']);
    $Age = validate($_POST['Age']);
    $SCNum = validate($_POST['SCNum']);
    $ResidentID = validate($_POST['ResidentID']);

    if (empty($LastName)){
        header("Location: ../UpdRecSection.php?ResidentID=$ResidentID&error=Last Name is required");
    }

    else if(empty($FirstName)){
        header("Location: ../UpdRecSection.php?ResidentID=$ResidentID&error=First Name is required");
    }

    else if(empty($MiddleName)){
        header("Location: ../UpdRecSection.php?ResidentID=$ResidentID&error=Middle Name is required");
    }

    else if(empty($Address)){
        header("Location: ../UpdRecSection.php?ResidentID=$ResidentID&error=Address is required");
    }

    else if(empty($BirthDate)){
        header("Location: ../UpdRecSection.php?ResidentID=$ResidentID&error=Birth date is required");
    }

    else if(empty($Age)){
        header("Location: ../indexApplicForm.php?error=SC Number is required&$user_data");
    }

    else if(empty($SCNum)){
        header("Location: ../UpdRecSection.php?ResidentID=$ResidentID&error=SC Number is required");
    }
    
    else{
        $sql = "UPDATE tblscinfo

                SET LastName = '$LastName',
                    FirstName = '$FirstName',
                    MiddleName = '$MiddleName',
                    Address = '$Address',
                    BirthDate = '$BirthDate',
                    Age = '$Age',
                    SCNum = '$SCNum'

                WHERE ResidentID = $ResidentID";
            $result = mysqli_query($conn, $sql);

        if($result){
            header("Location: ../indexRead.php?success=Succesfully Updated"); 
        }else{
            header("Location: ../UpdRecSection.php?ResidentID=$ResidentID&error=Unknown Error Occured&$user_data");
        }
    }
}else{
    header("Location: indexRead.php");
}