<?php
if($_POST['SUBMIT']=="REGISTER")
{
  $CUS_FIRST_NAME = test_input($_POST['CUS_FIRST_NAME']);
  $CUS_MIDDLE_NAME = test_input($_POST['CUS_MIDDLE_NAME']);
  $CUS_LAST_NAME = test_input($_POST['CUS_LAST_NAME']);
  $CUS_NUMBER = test_input($_POST['CUS_NUMBER']);
  $CUS_EMAIL = test_input($_POST['CUS_EMAIL']);
  $CUS_ADDRESS = test_input($_POST['CUS_ADDRESS']);
  $CUS_PASSWORD = test_input($_POST['CUS_PASSWORD']);

  $QUERY= "INSERT INTO CUSTOMER VALUES(NULL,'$CUS_FIRST_NAME','$CUS_MIDDLE_NAME','$CUS_LAST_NAME','$CUS_NUMBER','$CUS_EMAIL','$CUS_ADDRESS','$CUS_PASSWORD');";

  if($RESULT=mysqli_query($conn,$QUERY))
  {
    echo "<script>alert('ACCOUNT CREATED SUCCESSFULLY!')</script>";
  }
}
