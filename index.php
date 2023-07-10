<?php include("component/header.php"); ?>

  <div class="container" id="homePageContainer">
    <h1>Secret Diary</h1>
    <p>Secure your thoughts permanently and securely</p>
    <div id=''> <?php echo $error ?></div>
        <!-- SIGN UP -->
        <form method="post" id="signup">
          <p>Sign up now to save your thoughts</p>
          <fieldset class="form-group mb-3">
              <input type="email" name="email" placeholder="Email" class="form-control" />
          </fieldset>
          <fieldset class="form-group mb-3">
              <input type="password" name="password" placeholder="Password" class="form-control" />
          </fieldset>
          <fieldset class="checkbox">
            <label>
                <input type="checkbox" name="stayLoggedIn" value="1" id="" />
                Stay Logged in
            </label>
          </fieldset>
          <fieldset class="form-group my-3">
              <input type="hidden" name="signUp" value='1'>
              <input type="submit" name="submit" value="Sign Up" class="btn btn-success" />
          </fieldset>
          <a href="#" class="showHideForm">Login</a>
        </form>

        <!-- SIGN IN -->
        <form method="post" id="login">
          <p>Login using your username and password</p>
          <fieldset class="form-group mb-3">
              <input type="email" name="email" placeholder="Email" id="" class="form-control" />
          </fieldset>
          <fieldset class="form-group mb-3">
              <input type="password" name="password" placeholder="Password" class="form-control" />
          </fieldset>
          <fieldset class="checkbox">
            <label>
              <input type="checkbox" name="stayLoggedIn" value="1" id="" />
              Stay Logged in
            </label>
          </fieldset>
          <fieldset class="form-group my-3">
              <input type="hidden" name="logIn" value='0'>
              <input type="submit" name="submit" value="Log In" class="btn btn-success" />
          </fieldset>
          <a href="#" class="showHideForm">Sign up</a>
        </form>
  </div>

<?php include('component/footer.php'); ?>