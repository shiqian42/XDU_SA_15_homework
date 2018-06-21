<?php
require_once('../DB_info.php');

$q=$_GET['q'];
 
$link = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if (!$link)
{
    die('Could not connect: ' . mysqli_error($link));
}
 
$sql="SELECT
tool.tool_name,
tool.sub_co,
tool.if_price_over_200,
tool.tool_status,
tool.tool_id
FROM
tool
ORDER BY
tool.tool_status DESC";

mysqli_query($link,"SET NAMES utf8");
 
$rs = mysqli_query($link,$sql);
if(!$rs){die("Valid result!");}

while($row = mysqli_fetch_array($rs))
{
    $id=$row['tool_id'];
    $status=$row['tool_status'];
    $admin=$row['if_price_over_200'];
    echo "<tr>";
    echo "<td>" . $row['tool_name'] . "</td>";
    echo "<td>" . $row['sub_co'] . "</td>";
    echo "<td>" . $row['if_price_over_200'] . "</td>";
    echo "<td>" ; baseOnToolStatusShowButton($id,$status,$admin); echo "</td>";
    echo "</tr>";

}
 
mysqli_close($link);

function baseOnToolStatusShowButton($id,$stat,$admin){
    if($stat=='online'){
        if($admin=='No'){
            echo "<a class='btn btn-primary' href='borrow_a_tool.php?id=$id&admin=$admin'>Withdraw</a>";
        }elseif($admin=='Yes'){
            echo "<a class='btn btn-danger' href='borrow_a_tool.php?id=$id&admin=$admin'>Reserve</a>";
        }else{
            echo "<p class='btn btn-info' >Not Avaliable</a>";
            }
    }else{
        echo "<p class='btn btn-info' >Not Avaliable</a>";
    }
    }

?>