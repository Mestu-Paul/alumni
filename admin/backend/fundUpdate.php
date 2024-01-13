<?php

include_once '../../conn.php';

$db = connect();

if (session_status() !== PHP_SESSION_ACTIVE)
  session_start();

$id = $_GET["id"] ;
$type = $_GET["type"] ;

if($type==0 || $type==1){
  $sql = "SELECT * FROM fund_collection WHERE id=:id";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(":id",$id);
  $stmt->execute();
  $fund = $stmt->fetch(PDO::FETCH_ASSOC);

  $sql = "SELECT * FROM total_fund WHERE id=1";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $total = $stmt->fetch(PDO::FETCH_ASSOC);
  $total['total'] += ($type==0?-$fund['amount']:$fund['amount']);

  $sql = "UPDATE fund_collection SET valid=:valid WHERE id=:id;
          UPDATE total_fund SET total=:total WHERE id=1";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(":id",$id);
  $stmt->bindParam(":valid",$type);
  $stmt->bindParam(":total",$total['total']);
}
else{
  $sql = "DELETE FROM fund_collection WHERE id=:id";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(":id",$id);
}
$stmt->execute();

$_SESSION['message'] = "Operation success";
$db = null;
header("Location: ../frontend/fund.php");
?>