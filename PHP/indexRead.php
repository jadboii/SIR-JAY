<?php
include "config/read.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,800;1,900&family=Teko:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="MainProgStyle.css">
    <link rel="icon" href="pasay-logo-1 (4).png" type="image/png">
    <script src="jquery.js"></script>
    <script src="jquery2.js"></script>
    <title>SC List</title>
</head>
<body>

    <div class="container">

        <nav>
            <div class="brngyLbl">BARANGAY 48, PASAY CITY</div>
                <ul class="navItems">
                    <li id = "db"><a href="indexDashBoard.php">DASHBOARD</li>
                    <li id = "af"><a href="indexApplicForm.php">ADD REC</li>
                    <li id = "sc"><a href="indexRead.php">SENIOR CITIZENS</li>
                </ul>

                <div class="logo">
                    <a href="#"><img src="pasay-logo-1 (4).png" alt="PasayLogo" id="brngyPic"></i></a>
                </div>
        </nav>

        <style>
            @media print{

                table {
			    border-collapse: collapse;
                overflow-x: auto;
                display: block;
                width: 100%;
		        }

                thead{
                    display: table-header-group;
                }
                
                tbody {
                display: table-row-group;
                page-break-inside: avoid;
                }

                tr {
                page-break-inside: avoid;
                page-break-after: auto;
                }

                
                td, th, tr {
			    border: 1px solid black;
                background-color: rgb(56, 61, 74);;
			    padding: 5px;
		        }

                .EditDat{
                    visibility: hidden ;
                }

                .table-bordered{
                    font-size: 11px;
                }

                #LogoutBtn, #db, #af, #sc, #Up, #Del, #EditDat, .floatParent, .btnEdit, .btnDel{
                    visibility: hidden;
                }

                #official-lbl{
                    color: rgba(57, 75, 120, 1);
                    font-size: 30px;
                }

                .tbl-colHeader{
                    color: black;
                    border: 1px solid black;
			        padding: 5px;
                    background-color: rgb(56, 61, 74);
                }
                

                .DataContainer, .DataContainer, .formSection1 * {
                    visibility: visible;
                }

                .DataContainer *{
                    position: absolute;
                    left: 0px;
                    top: 0px;
                }
            }
        </style>


        <div id="DataContainer">
            <div id="official-lbl"><p>SENIOR CITIZENS RECORD</p><br></div>
            <?php if(isset($_GET['success'])) { ?>

                <div class="successMsg" role="alert">
                    <?php echo $_GET['success']; ?>
                </div>

            <?php } ?>

            <?php
            if (mysqli_num_rows($result)){ ?>

            <div class="formSection1">
                <div class="box">
                <table class="table-bordered">
                    <thead>
                        <tr>
                            <th scope = "col" class="tbl-colHeader">ResidentID</th>
                            <th scope = "col" class="tbl-colHeader">LastName</th>
                            <th scope = "col" class="tbl-colHeader">FirstName</th>
                            <th scope = "col" class="tbl-colHeader">MiddleName</th>
                            <th scope = "col" class="tbl-colHeader">Address</th>
                            <th scope = "col" class="tbl-colHeader">Birth Date</th>
                            <th scope = "col" class="tbl-colHeader">Age</th>
                            <th scope = "col" class="tbl-colHeader">SC No.</th>
                            <th scope = "col" class="tbl-colHeader" id ="EditDat">Edit | Delete</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        while($rows = mysqli_fetch_assoc($result)){
                            $i++;
                        ?>
                        <tr>
                            <th scope = "row"><?=$i?></th>
                            <td><?=$rows['LastName']?></td>
                            <td><?php echo $rows['FirstName']?></td>
                            <td><?php echo $rows['MiddleName']?></td>
                            <td><?php echo $rows['Address']?></td>
                            <td><?php echo $rows['BirthDate']?></td>
                            <td><?php echo $rows['Age']?></td>
                            <td><?php echo $rows['SCNum']?></td>
                            <td><a href="UpdRecSection.php?ResidentID=<?=$rows['ResidentID']?>" 
                                class="btnEdit" id="Up">UPDATE</a>

                                <a href="config/delete.php?ResidentID=<?=$rows['ResidentID']?>" 
                                class="btnDel" id="Del">DELETE</a>   
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php } ?>
                </div>
            </div>                    
        </div>
        
<div class="floatParent">
    <div class="rightBtn" onclick="window.print();">
    </div>
</div>

<div class="floatParent2">
    <a href="logout.php">
        <div id="LogoutBtn">
        </div>
    </a>
</div>

</body>
</html>