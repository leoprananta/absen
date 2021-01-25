asdfasdf

<?php 

$date1 = "07:30:00";

$date2 = "07:00:00";
echo "<br/>";
echo strtotime($date1);
echo "<br/>";
echo strtotime($date2);
echo "<br/>";
echo $date2>$date1;
echo "<br/>";
echo strtotime($date2)-strtotime($date1);
echo "<br/>";

?>