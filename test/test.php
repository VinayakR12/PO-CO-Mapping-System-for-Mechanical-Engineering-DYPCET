<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bulma Open Animation</title>
  <!-- Include Bulma CSS CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
  <!-- Custom styles for animation -->
  <style>
    /* Define custom popup styles */
    .popup {
      display: none; /* Initially hide the popup */
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: white;
      border: 1px solid #ccc;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
      animation: fadeIn 0.5s ease forwards; /* Apply custom animation for open */
    }

    /* Custom animation for fade in */
    @keyframes fadeIn {
      0% {
        opacity: 0;
        transform: translate(-50%, -50%) scale(0.8);
      }
      100% {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
      }
    }
  </style>
</head>
<body class="bg-gray-200 flex justify-center items-center h-screen">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">My Website</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link navbar-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link navbar-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link navbar-link" href="#">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link navbar-link" href="#">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

</body>
</html>
