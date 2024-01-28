<!DOCTYPE html>
<html>
  <head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="css/register.css" />
    <style>
      .change{
    font-size:20px;
}
    </style>
  </head>
  <body>
    <h1>Registration Form</h1>
    <p>Please fill out this form with the required information</p>
    <form action="validator.php" method="POST">
    <!-- Name etc -->
      <fieldset>
        <label>Enter Your First Name: <span style="color:red;">*</span><input id="fname" name="fname" type="text" required /></label>
        <label>Enter Your Last Name: <span style="color:red;">*</span><input id="lname" name="lname" type="text" required /></label>
        <label>Enter Your Email: <span style="color:red;">*</span><input id="email" name="email" type="email" required /></label>
        <label>Create a Password: <span style="color:red;">*</span><input id="pass" name="pass" type="password" required /></label>
      </fieldset>
      <!-- Info -->
      <fieldset>
        <legend>Who are you:- </legend>
        <label><input id="school" type="radio" name="info" class="inline" value="school" checked/>School Student</label>
        <label><input id="college" type="radio" name="info" class="inline" value="college" />College Student</label>
        <label><input id="prof" type="radio" name="info" class="inline" value="prof" />Professor</label>
        <label><input id="other" type="radio" name="info" class="inline" value="other"/>Other</label>
      </fieldset>
      <!-- Referrer -->
      <fieldset>
        <label>Input your age (years): <input id="age" type="number" name="age" min="13" max="100" /></label>
        <label>How did you hear about us?
          <select id="referrer" name="referrer">
            <option value="Facebook">Facebook</option>
            <option value="Instagram" selected>Instagram</option>
            <option value="Youtube">Youtube</option>
            <option value="Other">Other</option>
          </select>
        </label>
        <label>Provide a bio: <span style="color:red;">*</span>
          <textarea id="bio" name="bio" rows="5" cols="30" placeholder="Write some words so we can know you..." required></textarea>
        </label>
      </fieldset>
      <label><input id="agree" name="agree" type="checkbox" class="inline" /> I accept the <a href="">terms and conditions</a></label>
      <input type="submit" value="Submit" />
    </form>

    <p>If Already Sign up? <a href="login.php" class="change">Sign In</a></p>
  </body>
</html>
