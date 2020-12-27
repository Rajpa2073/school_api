
<?php
include 'db.php';
$entered_apikey = $_POST['apikey'];

if ($entered_apikey == $api_key){

//Adding users value 
if($_POST['apivalue'] == "add_user"){
  //adding value
  $username = $_POST['u_name'];
  $fname = $_POST["u_fname"];
  $lname = $_POST["u_lname"];
  $pass = md5($_POST["u_password"]);
  $birthdate = $_POST["u_birthdate"];
  $email = $_POST["u_email"];
  $phone = $_POST["u_phone"];
  $address = $_POST["u_address"];
  $district = $_POST["u_district"];
  $country = $_POST["u_country"];
  $image = $_POST["u_image"];
  $role = $_POST["u_role"];
  //ToDO validation
  $sql ="INSERT INTO users(u_name, u_fname, u_lname, u_password, u_birthdate, u_email, u_phone, u_address, u_district, u_country, u_image, u_role) VALUES ('".$username."','".$fname."','".$lname."','".$pass."','".$birthdate."','".$lname."','".$phone."','".$address."','".$district."','".$country."','".$email."','".$role."');";
  if($connect->query($sql) === TRUE){
    $response['error'] = "false";
    $response['message'] = "New user is added successful";
    print_r(json_encode($response));

  } else {
    $response['error'] = "true";
    $response['message'] = "failed to add user";
    print_r(json_encode($response));
  }
  
}
// get_users 

if($_POST['apivalue'] == 'get_user'){
  $sql = "SELECT * FROM users";
  $queryresult = $connect->query($sql);
  $result = array();

  while($fetchdata = $queryresult-> fetch_assoc()){
    $result[] = $fetchdata;
  }
  print_r(json_encode($result));
}


// delete_user
if($_POST['apivalue']== 'delete_user'){
  $userid = $_POST['userid'];
  $sql = "DELETE FROM users where u_id = '".$userid."' ";
  if($connect->query($sql) === TRUE){
    $response['error'] = "false";
    $response['message'] = " User is Deleted successful";
    print_r(json_encode($response));

  } else {
    $response['error'] = "true";
    $response['message'] = "failed to delete user.";
    print_r(json_encode($response));
  }


}


// Change Password
if($_POST ['apivalue']== "change_password"){
  $userid = $_POST['userid'];
  $newpassword = md5($_POST['newpassword']);
  $sql = "UPDATE users SET u_password = '".$newpassword."' WHERE u_id='".$userid."'";
  if($connect->query($sql) === TRUE){
    $response['error'] = "false";
    $response['message'] = " Password Changed Successfully";
    print_r(json_encode($response));

  } else {
    $response['error'] = "true";
    $response['message'] = "Failed to Change Password.";
    print_r(json_encode($response));
  }
}

// Update users
if($_POST['apivalue'] == "update_user"){
  //adding value
  $userid = $_POST['u_id'];
  $username = $_POST['u_name'];
  $fname = $_POST["u_fname"];
  $lname = $_POST["u_lname"];
  $pass = md5($_POST["u_password"]);
  $birthdate = $_POST["u_birthdate"];
  $email = $_POST["u_email"];
  $phone = $_POST["u_phone"];
  $address = $_POST["u_address"];
  $district = $_POST["u_district"];
  $country = $_POST["u_country"];
  $image = $_POST["u_image"];
  $role = $_POST["u_role"];
  //ToDO validation

  $sql = "UPDATE users SET u_name ='".$username."', u_fname ='".$fname."', u_lname ='".$lname."', u_password='".$pass."',u_birthdate='".$birthdate."', u_email='".$email."', u_phone='".$phone."', u_address='".$address."', u_district='".$district."', u_country='".$country."', u_image='".$image."', u_role='".$role."' WHERE u_id='".$userid."';";
  if($connect->query($sql) === TRUE){
    $response['error'] = "false";
    $response['message'] = "User updated  successful";
    print_r(json_encode($response));

  } else {
    $response['error'] = "true";
    $response['message'] = "failed to update user";
    print_r(json_encode($response));
  }
  
}
//Check Login
if($_POST['apivalue']== 'check_login'){
  $username = $_POST['u_name'];
  $password = md5($_POST['u_password']);


$sql = "SELECT * FROM users where u_name = '".$username."'  AND u_password = '".$password."'";


 $result = $connect->query($sql);

 if($result->num_rows>0){

  $response['error'] = "false";
    $response['message'] = "User is available, Login Successfull";
    print_r(json_encode($response));
   

 }else{

  $response['error'] = "true";
    $response['message'] = "Invalid Login !!! No user found";
    print_r(json_encode($response));


 }


}


else{
  // Invaliid API Value
}
}else{
  // Invallid API KEYY
}
?>