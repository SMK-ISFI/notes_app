<!DOCTYPE html>
<html lang="en">
<head>
    <title>Notes App</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <div class="container">
    <h1>Login</h1>

    <form action="login_proses.php" method="POST">

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
      </div>

      <button type="submit" name="login">Login</button>
    </form>
  </div>
</body>
</html>