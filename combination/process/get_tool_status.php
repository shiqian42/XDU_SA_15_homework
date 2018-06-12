<?php
require_once('../DB_info.php');

$q=$_GET['q'];
$department=$_GET['department'];
//echo $department;
//echo $q;
//$q = isset($_GET['q']) ? intval($_GET['q']) : '';
 
//if(empty($q)) {
//    echo 'No value got.';
//    exit;
//}
 
$link = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if (!$link)
{
    die('Could not connect: ' . mysqli_error($link));
}
 
$sql="SELECT
tool.tool_type,
tool.tool_name,
tool.if_price_over_200,
tool.sub_co
FROM
tool
WHERE
tool.tool_name = '$q'
and tool_type = '$department'";

mysqli_query($link,"SET NAMES utf8");
 
$rs = mysqli_query($link,$sql);
if(!$rs){die("Valid result!");}

while($row = mysqli_fetch_array($rs))
{
    echo "<tr>";
    echo "<td>" . $row['tool_type'] . "</td>";
    echo "<td>" . $row['tool_name'] . "</td>";
    echo "<td>" . $row['if_price_over_200'] . "</td>";
    echo "<td>" . $row['sub_co'] . "</td>";
    echo "</tr>";

}
 
mysqli_close($link);
?>