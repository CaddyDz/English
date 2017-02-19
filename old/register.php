<div id="Registration" style="width: 900px; float: center; margin: 0px auto 0px auto;">
  <table>
    <tr>
      <td width="50%" valign="top" id="loginTD">
        <h2>Already a member?<br><br> Sign in below!</h2>
        <form action="index.php" name="loginForm" method="POST" onsubmit="return validateLoginForm()">
          <input type="text" name="user_login" size="25" placeholder="Username" required="true"><br><br>
          <input type="password" name="password_login" size="25" placeholder="Password" required="true"><br>
          Keep me logged in :
          <input type="checkbox" name="RememberMe" value="1">
          <input type="submit" class="btn btn-sm" name="Login" value="Login">
        </form>
      </td>
      <td width="30%" valign="top" id="registerTD">
        <h2>Sign Up Below!</h2>
        <form action="index.php" name="Registration" method="POST">
          <input type="text" name="fname" size="25" placeholder="First Name" onKeyup="checkRegister()" onblur="focusRegister()"><span class="glyphicon glyphicon-exclamation-sign hidden" aria-hidden="true" hidden="false"></span><br><br>
          <input type="text" name="lname" size="25" placeholder="Last Name" onKeyup="checkRegister()" onblur="focusRegister()"><br><br>
          <input type="text" name="username" size="25" placeholder="Username" onKeyup="checkRegister()" onblur="focusRegister()"><br><br>
          <input type="text" name="email" size="25" placeholder="Email Address" onKeyup="checkRegister()" onblur="focusRegister()"><br><br>
          <input type="password" name="password" size="25" placeholder="Password" onKeyup="checkRegister()" onblur="focusRegister()"><br><br>
          <input type="password" name="password2" size="25" placeholder="Confirm your password" onKeyup="checkRegister()" onblur="focusRegister()"><br><br>
          <input type="text" name="birthdate" id="datepicker" value="2 Oct 1994" onKeyup="checkRegister()" onblur="focusRegister()"><br><br>
          <div>I am:
            <label class="radio-inline"><input type="radio" name="optradio" value="m">Male</label>
            <label class="radio-inline"><input type="radio" name="optradio" value="f">Female</label>
          </div><br>
          <div class="g-recaptcha" data-sitekey="6Lf68wkUAAAAALBYuP666DRzKu7LQjZ2bXaNeq4M"></div><br>
          <input type="submit" id="register" class="btn btn-sm" name="reg" value="Sign Up!" disabled="disabled">
          <?php function fillFields()
          {
            //TODO: this function is getting executed many times
            echo '<div class="alert alert-danger" role="alert">Please fill in all of the fields</div>';
          } ?>
        </form>
      </td>
    </tr>
  </table>
</div>
<script src="./js/pikaday.js"></script>
<script>
var picker = new Pikaday({
    field: document.getElementById('datepicker'),
    firstDay: 1,
    minDate: new Date(1985, 0, 1),
    maxDate: new Date(2000, 12, 31),
    yearRange: [1985,2000]
});
</script>
