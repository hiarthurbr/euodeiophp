<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mariana</title>
  <style>
    body {
      font-family: Inter, system-ui, Avenir, Helvetica, Arial, sans-serif;
      user-select: none;
      -moz-user-select: none;
      -webkit-user-select: none;
    }

    .bg {
      z-index: -999;
      top:0;
      left:0;
      right:0;
      bottom:0;
      position: fixed;
      width:100%;
      height:100%;
      padding-top: 4rem;
      background: #ffb048;
      overflow:hidden;
    }

    .container{
      right: 45rem;
      bottom: 4rem;
      position: absolute;
    }

    .center {
      position: absolute;
      text-align: center;
      align-items: center;
      justify-content: center;
      margin: 0;
      padding: 0;
      max-width: 40rem;
      top: 4rem;
      left: 50%;
      transform: translate(-50%, 0%);
      padding-bottom: 4rem;
    }

    p {
      font-size: 1rem;
      padding: 0;
      margin: 0;
      font-weight: 700;
      color: #fff;
    }

    .round-input {
      border-radius: 10px;
      border: 1px solid #ccc;
      padding: 10px;
      margin: 10px; 
    }

    .pretty-button {
      border-radius: 10px;
      border: 1px solid #ccc;
      padding: 10px;
      margin: 10px;
    }

    .pretty-button:hover {
      background-color: #ccc;
      cursor: pointer;
    }

    .box {
      --tw-backdrop-blur: blur(8px);
      backdrop-filter: blur(20px);
      border-radius: 4rem;
      padding: 2rem;
      padding-left: 4rem;
      padding-right: 4rem;
      background-color: #00000080;
      color: #fff;
      font-weight: 700;
    }
  </style>
</head>
<body>
  <main class="center">
    <div class="box">
      <?php
        $p = (int) $_POST['x'];
        
        $acc = "";

        for ($i = 1; $i <= $p; $i++) {
          echo "<div>";
          echo "<p>Mariana conta $i</p>";
          echo "<p>Mariana conta $i</p>";
          
          if ($acc == "") $acc = "É 1, ";
          else $acc = "$acc é $i, ";

          echo "<p>$acc</><br>";
          echo "<p>É Ana Viva Mariana, Viva Mariana</p><br><br>";
          echo "</div>";
        }
      ?>
    </div>
  </main>
  <footer class="bg">
    <img src="https://media.tenor.com/y1qPa1DUU5sAAAAi/nope-no-way.gif" class="container">
  </footer>
</body>
</html>