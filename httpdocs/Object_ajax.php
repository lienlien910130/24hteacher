<?php
include_once 'lib/core.php';
$Obj = $_POST["Obj"];

echo "<option value='0'>價錢</option>";
echo "<option value='1'>NT200以下</option>";
echo "<option value='2'>NT201~NT500</option>";
echo "<option value='3'>NT501~NT800</option>";
echo "<option value='4'>NT801~NT1000</option>";
echo "<option value='5'>NT1001以上</option>";

?>