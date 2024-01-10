<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notes App</title>
</head>
<body>
  <?php include 'menu.php' ?>

  <div class="main-content">
    <?php
    if (isset($_GET['page'])) {
      $page = $_GET['page'];

      switch ($page) {
        case 'home':
          include 'home.php';
          break;
        
        case 'notes':
          include 'pages/notes.php';
          break;
        
        case 'about':
          include 'pages/about.php';
          break;
        
        default:
          include 'home.php';
          break;
      }
    } else {
      include 'home.php';
    }
    ?>
  </div>
</body>
</html>