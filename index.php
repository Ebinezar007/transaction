<?php

$conn = new mysqli("localhost", "root", "", "aaa");

// Check connection
if ($conn->connect_errno) {
  echo "Failed to connect: " . $conn->connect_error;
  exit();
}
$url = explode("/", $_SERVER['REQUEST_URI']);
$user_1 = ($url[2]);
$user_2= ($url[3]);
$amount= ($url[4]);
//$d=($url[5]);
$asign = "SELECT amount FROM farm WHERE firstname='$user_1'";
$asign_1= "SELECT amount FROM farm WHERE firstname='$user_2'";
$query = ($conn->query($asign));
$g = $query->fetch_array();
//print_r($g);

$sub = $g-$amount;
print_r($sub);
$aaa = "UPDATE farm SET amount='$sub' WHERE firstname='$user_1'";
if ($conn->query($aaa) == TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$query_1 = ($conn->query($asign_1));
$g1 = $query_1->fetch_array();
//print_r($g1);
$add = $amount + $g1['amount'];
//print_r($sub);
$aaaa = "UPDATE farm SET amount='$add' WHERE firstname='$user_2'";







//$que = "UPDATE farm SET firstname='$r',lastname='$w', currentdate='$d',amount='$f' WHERE id=1 ";


if ($conn->query($aaaa) == TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
  

//$mydate=getdate(date("U"));
//echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
