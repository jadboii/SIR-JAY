<?php

    $connect = mysqli_connect("localhost", "root", "", "seniorcitizens");
    $output = '';
    $order = $_POST["order"];
    if($order=='asc')
    {
        $order=='desc';
    }else{
        $order=='desc';
    }
    $query = "SELECT * FROM tblscinfo ORDER BY ".$_POST["colName"]." ".$_POST["order"]."";
    $result= mysqli_query($connect, $query);
    $output .= '
    <table class="table-bordered">
                    <thead>
                        <tr>
                            <th scope = "col" class="tbl-colHeader"><a class="tbl-colHeader" id ="id" data-order="'.$order.'" href="#">ResidentID</a></th>
                            <th scope = "col" class="tbl-colHeader"><a  class="tbl-colHeader" id ="lName" data-order="'.$order.'" href="#">LastName</a></th>
                            <th scope = "col" class="tbl-colHeader"><a  class="tbl-colHeader" id ="fName" data-order="'.$order.'" href="#">FirstName</a></th>
                            <th scope = "col" class="tbl-colHeader"><a class="tbl-colHeader" id ="mName" data-order="'.$order.'" href="#">MiddleName</a></th>
                            <th scope = "col" class="tbl-colHeader"><a class="tbl-colHeader" id ="address" data-order="'.$order.'" href="#">Address</a></th>
                            <th scope = "col" class="tbl-colHeader"><a class="tbl-colHeader" id ="bdate" data-order="'.$order.'" href="#">Birth Date</a></th>
                            <th scope = "col" class="tbl-colHeader"><a class="tbl-colHeader" id ="age" data-order="'.$order.'" href="#">Age</a></th>
                            <th scope = "col" class="tbl-colHeader"><a class="tbl-colHeader" id ="scnum" data-order="'.$order.'" href="#">SC No.</a></th>
                            <th scope = "col" class="tbl-colHeader" id ="EditDat">Edit | Delete</th>
                        </tr>
    '; 
    while($row = mysqli_fetch_array($result))
    {
        $output .= '
        <tr>
        
            <td>' . $row["id"] . '</td>
            <td>' . $row["lName"] . '</td>
            <td>' . $row["fName"] . '</td>
            <td>' . $row["mName"] . '</td>
            <td>' . $row["address"] . '</td>
            <td>' . $row["bdate"] . '</td>
            <td>' . $row["age"] . '</td>
            <td>' . $row["scnum"] . '</td>

        </tr>
        ';
    }
    $output .= '</table>';
    echo $output;
