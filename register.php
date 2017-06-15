<?php
include("classes/Register.class.php");

$register = new Register();
$response = array();

if($_POST)
{
  

  $first_name = strip_tags($_POST['first_name']);
  $last_name = strip_tags($_POST['last_name']); 
  $gender = strip_tags($_POST['gender']);
  $id_country = strip_tags($_POST['country']);
  $email = strip_tags($_POST['email']);
  $phone = strip_tags($_POST['phone']);
  $password = strip_tags($_POST['cpassword']);
  
  if($register->registerUser($first_name,$last_name,$gender,$id_country,$email,$phone,$password)){  
      $response['status'] = 'success';
      $response['message'] = '<span class="glyphicon glyphicon-ok"></span> &nbsp;Bun venit! ati fost inregistrat cu succes';
  } else {
    $response['status'] = 'error'; 
    $response['message'] = '<span class="glyphicon glyphicon-info-sign"></span> &nbsp; inregistrarea nu a putut fi facuta';
  } 
      
  
}    
	echo json_encode($response);
?>  