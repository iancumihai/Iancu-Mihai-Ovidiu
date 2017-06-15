<?php
  include('classes/Country.class.php');

  $country = new Country();
  $country = $country->getAllCountry();
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
</head>
<body>

<div class="container">

  <!-- Modal -->
  <div class="modal show" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sign Up</h4>
        </div>
        <div id="errorDiv"></div>
        <div class="modal-body">
          <form class="form-horizontal" id="register_form">
            <div class="form-group">
              <label class="control-label col-sm-4" for="first_name">First Name</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="first_name" placeholder="Enter First Name...">
                  <span class="help-block" id="error"></span>
                </div>
                
            </div>
            <div class="form-group">
              <label class="control-label col-sm-4" for="last_name">Last Name</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name...">
                  <span class="help-block" id="error"></span>
                </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-4" for="date_of_birth">Date of Birth</label>
                <div class="col-sm-8">
                  <input type="date" class="form-control" name="date_of_birth" placeholder="Enter Date...">
                  <span class="help-block" id="error"></span>
                </div>
            </div>

             <div class="form-group">
              <label class="control-label col-sm-4" for="gender">Gender</label>
                <div class="col-sm-8">
                  <label class="radio-inline"><input type="radio" name="gender" value="Male">Male</label>
                  <label class="radio-inline"><input type="radio" name="gender" value="Female">Female</label>
                  <span class="help-block" id="error"></span>
                </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-4" for="country">Country</label>
                <div class="col-sm-8">
                <select  class="form-control" name="country" id="select" oninvalid="SelectInvalid(this);" oninput="SelectInvalid(this);" required="required" >
                  <option value="">Select country</option>
                  <?php
                    foreach($country as $row){ 
                      echo '<option value="'.$row['id_country'].'">'.$row['name'].'</option>';
                    }
                  ?>
                </select>
                <span class="help-block" id="error"></span>
                </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-4" for="email">E-mail</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" name="email" placeholder="Enter E-mail...">
                  <span class="help-block" id="error"></span>
                </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-4" for="phone">Phone</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="phone" placeholder="Enter Phone...">
                  <span class="help-block" id="error"></span>
                </div>
            </div>    

            <div class="form-group">
              <label class="control-label col-sm-4" for="password">Password</label>
              <div class="col-sm-8">          
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter password...">
                <span class="help-block" id="error"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-4" for="cpassword">Confirm password</label>
              <div class="col-sm-8">          
                <input type="password" class="form-control" name="cpassword" placeholder="Enter password...">
                <span class="help-block" id="error"></span>
              </div>
            </div>

            <div class="form-group">        
              <div class="col-sm-offset-4 col-sm-8">
                <div class="checkbox">
                  <label><input type="checkbox" name="remember">I agree to the Terms of Use</label>
                  <span class="help-block" id="error"></span>
                </div>
              </div>
            </div>
  
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
           <button type="submit" class="btn btn-info" id="btn-signup">Register</button>
        </div>
          </form>
          <script src="js/register_validation.js"></script>
      </div>
      
    </div>
  </div>
  
</div>

</body>
</html>