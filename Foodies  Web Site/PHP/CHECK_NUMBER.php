<?php
require 'ESTABLISH_CONNECTION.php';

if($_GET['REQUEST']=="CHECK_NUMBER")
{
  $NUMBER=$_GET['NUMBER'];
  $PASSWORD=$_GET['PASSWORD'];

  $QUERY= "SELECT CUS_NUMBER,CUS_PASSWORD FROM CUSTOMER WHERE CUS_NUMBER='$NUMBER' AND CUS_PASSWORD='$PASSWORD';";
  $RESULT=mysqli_query($conn,$QUERY);

  if(mysqli_num_rows($RESULT)>0)
  {
    echo "OK";
  }
}




else if($_GET['REQUEST']=="CHECK_AMOUNT")
{
  $ID=$_GET['ID'];

  $QUERY= "SELECT REC_PRICE FROM RECEIPE WHERE REC_ID='$ID';";
  $RESULT=mysqli_query($conn,$QUERY);
  $ROW=mysqli_fetch_assoc($RESULT);

  $BILL=$ROW['REC_PRICE'];
  echo "$BILL";
}
