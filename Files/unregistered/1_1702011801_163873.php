<?php session_start();$id=1;$rand=163873;$date=1702011801;require('../../Main/conf.php');
$sql_q  =   mysqli_query($db,"SELECT `title` , `text` FROM `non_reg` WHERE `id` = '$id' AND `datetime` = '$date' AND `signature` = '$rand'");
if(mysqli_affected_rows($db) == true){
while($sql = mysqli_fetch_assoc($sql_q)){
$title = $sql['title'];
$text = $sql['text'];
}
if(isset($_SESSION['non_reg'])){
$_SESSION['id'] = $id;
$_SESSION['date'] = $date;
$_SESSION['rand'] = $rand;
echo "<a href='../functions/non_reg_edit.php'>
Edit ?
</a>";
}
require('../../Base/html/view/container.php');
}
dbc();
?>
