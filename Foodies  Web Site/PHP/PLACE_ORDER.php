<?php
require 'ESTABLISH_CONNECTION.php';
if($_GET['REQUEST']=="PLACE_ORDER")
{
  $ID=$_GET['ID'];
  $NUM=$_GET['NUM'];
  $DATE=$_GET['DATE'];
  $TIME=$_GET['TIME'];

  $QUERY= "SELECT CUS_NUMBER,CUS_ID FROM CUSTOMER WHERE CUS_NUMBER='$NUM';";
  $RESULT=mysqli_query($conn,$QUERY);
  $ROW=mysqli_fetch_assoc($RESULT);
  $CUS_ID=$ROW['CUS_ID'];
  $QUERY_2= "INSERT INTO ORDERS VALUES(NULL,$CUS_ID,$ID,'$DATE','$TIME');";

  if($RESULT_2=mysqli_query($conn,$QUERY_2))
  {
    echo "ORDER PLACED SUCCESSFULLY :)";
  }
}
