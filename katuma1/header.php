<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Katuma1</title>
</head>
<body>
  <div class="container page-container">
    <div class="header-container">
      <div class="text-end m-3 header-top">
        <a href="./register.php"><img class="user-img" src="./img/icons8-user-100.png" alt="user">Register</a>
        <a href="./login.php"><img class="user-img" src="./img/icons8-user-100.png" alt="user">Login</a>
      </div>
      <div class="header-body">
        <div class="logoImg align-middle">
          <a href="./index.php"><img class="logo" src="https://www.jarviwiki.fi/w/resources/assets/jarvi-meriwiki_logo_fi.png" alt=""></a>
        </div>
        <div class="header-content">
          <div class="slogan">
            <img src="https://www.jarviwiki.fi/w/resources/assets/identifier_message.png" alt="">
          </div>
          <div class="search-container">
            <div class="container-fluid">
              <form class="d-flex" role="search" action="search-result.php" method="post">
                <input class="form-control me-2" type="search" name="submit" placeholder="Search" aria-label="Search">
                <div class="search-icon">
                  <img class="img-search-icon" src="./img/icons8-search-50.png" alt="">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="main-nav">
      <a class="main-nav-text" href="./index.php">Katumajärvi-info</a>
      <a class="main-nav-text" href="./user-report.php">User report</a>
      <a class="main-nav-text" href="./show-report.php">Show Report</a>
      <a class="main-nav-text" href="#">Katumajärvi-info</a>
      <a class="main-nav-text" href="#">Katumajärvi-info</a>
    </div>