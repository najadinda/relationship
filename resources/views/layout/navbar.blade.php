<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <style>
        .navbar{
            z-index: 100; 
            height: 75px;
            background-color:grey;
        }
        .nav-link.active {
            border-bottom: 3.5px solid white;
            margin-bottom: 0; 
        }
    </style>
</head>
<body>
    <header>
    <nav class="navbar-expand-sm navbar-light p-3">        
    <ul class="nav nav-tabs mx-auto justify-content-center">
      <li class="nav-item">
        <a class="nav-link fs-5 {{ (isset($title) && $title === "student") ? 'active' : '' }}" href="/">student</a>
      </li>
      <li class="nav-item">
        <a class="nav-link fs-5 {{ (isset($title) && $title === "post") ? 'active' : '' }}" href="/post">post</a>
      </li>
      <li class="nav-item">
        <a class="nav-link fs-5 {{ (isset($title) && $title === "hobbies") ? 'active' : '' }}" href="">hobbies</a>
      </li>
    </ul>
  </nav> 
    </header>
</body>
</html>