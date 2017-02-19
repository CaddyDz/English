<?php
  ob_start();
  require_once './inc/header.inc.php';
  if ($username) {
    header("location: home.php");
  } else {
    include 'register.php';
  }
  $buffer = ob_get_contents();
  ob_end_clean();
  $buffer=str_replace("%TITLE%","English Dz",$buffer);
  echo $buffer;
  $reg = @$_POST['reg'];
  // Registration form.
  $fn = strtolower(strip_tags(@$_POST['fname']));
  $ln = strtolower(strip_tags(@$_POST['lname']));
  $un = strtolower(strip_tags(@$_POST['username']));
  $em = strtolower(strip_tags(@$_POST['email']));
  $pswd = strip_tags(@$_POST['password']);
  $pswd2 = strip_tags(@$_POST['password2']);
  $birthdate = strip_tags(substr_replace(substr(@$_POST['birthdate'], 3, strlen(@$_POST['birthdate'])), ',', 7, 0));
  $gender = strip_tags(@$_POST['optradio']);
  $d = date("Y-m-d"); // Year - Month - Day
  if ($reg) {
    // Check if user already exists
    $u_check = $db->query("SELECT username FROM users WHERE username='$un'");
    // Count the amount of rows where username = $un
    $check = $u_check->num_rows;
    // Check whether Email already exists in the database.
      $e_check = $db->query("SELECT email FROM users WHERE email='$em'");
    // Count the numbers of rows returned.
    $email_check = $e_check->num_rows;
    if ($check == 0) {
      if ($email_check == 0) {
        if ($fn&&$ln&&$un&&$em&&$pswd&&$pswd2&&$birthdate&&$gender) {
          // check that password match
          if ($pswd==$pswd2) {
            // check the maximum length of username/first name/last name does not exceed 25 characters
            if (strlen($un)>25||strlen($fn)>25||strlen($ln)>25){
              echo "The maximum limit for username/first name/last name is 25 characters!";
            } else {
              // check the maximum length of password does not exceed 25 characters and it is not less than 5 characters
              if (strlen($pswd)>30||strlen($pswd)<5) {
                echo "Your password must be between 5 and 30 characters long!";
              } else {
                // Hash the passwords before sending them to the database.
                $options = [
                  'cost' => 11 // TODO: Change this number and add a salt for production
                ];
                $pswd = password_hash($pswd, PASSWORD_BCRYPT, $options);
                $username_with_capitalized_first_letter = capitalize($un);
                $query = $db->query("INSERT INTO users VALUES(NULL,'$un','$fn','$ln','$em', '$pswd', '$d', '0', STR_TO_DATE('$birthdate','%M %d,%Y'), '$gender', NULL, NULL, NULL)");
                die("Welcome $username_with_capitalized_first_letter Login to your account to start using the website");
              }
            }
          } else {
            echo "Your passwords don't match!";
          }
        } else {
          // check all of the fields have been filled in
          fillFields();
        }
      }
      else {
        echo "Sorry, but it looks like someone has already used that email!";
      }
    }else {
      echo "Username already taken ...";
    }
  }
  // User Login Code.
  if (isset($_POST["user_login"]) && isset($_POST["password_login"])) {
    $user_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["user_login"]); // filter everything but numbers and letters.
    $password_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password_login"]); // filter everything but numbers and letters.
    $options = [
      'cost' => 11 // TODO: change this for production.
    ];
    $sql = $db->query("SELECT password FROM users WHERE username='$user_login' LIMIT 1") or die($db->error);
    while ($row = mysqli_fetch_array($sql)) {
      $hash = $row['password'];
    }
    if (password_verify($password_login, $hash)) {
      $_SESSION["user_login"] = $user_login;
      redirect("home.php");
      exit();
    }
    else {
      echo "Login incorrect, try again";
      exit();
    }
  }

 include './inc/footer.inc.php';
 ?>
