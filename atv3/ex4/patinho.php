<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patinhos</title>
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
      background:#6BD0FC;
      overflow:hidden;
    }

    .container{
      width: 100%;
      padding-left: 40%;
      padding-top: 8%;
      position: absolute;
      transform: translate(-12rem, 0);
    }
    .sol{
      position:absolute;
      width:231px;
      height:231px;
      border-radius:100%;
      background:#ffe5aa;
      box-shadow:0 0 50px #FFf;
      margin:30px 271px;
      animation:brilla 3s alternate infinite;
    }
    .c1,.c2,.c3,.c4, .c5, .c6, .c7{
      position:absolute;
      border-radius:700px 700px 5000px 700px;
      background:#12546b;
      transform:rotate(45deg);
      overflow:hidden;
      }
    .c1{
      width:132px;
      height:132px;
      margin:330px -12px;}
    .c2{
      width:172px;
      height:172px;
      margin:271px 70px
    }
    .c3{
      width:231px;
      height:231px;
      margin:231px 132px
      }
    .c4{
      width:251px;
      height:350px;
      margin:132px 231px
      }
    .c5{
      width:231px;
      height:231px;
      margin:251px 450px
      }
    .c6{
      width:192px;
      height:192px;
      margin:271px 560px
      }
    .c7{
      width:152px;
      height:152px;
      margin:300px 670px
      }
    .hill{
      position:absolute;
      width:800px;
      height:90px;
      background:#12546b;
      margin:360px 0
    }
    .circ1,.circ2,.circ3{
      position:absolute;
      border-radius:100%;
      background:#12495b;
      }
    .circ1{
      width:70px;
      height:60px;
      margin:-12px 9px
    }
    .circ2{
      width:90px;
      height:70px;
      margin:-9px 7px
    }
    .circ3{
      width:121px;
      height:70px;
      margin:-9px 7px
    }
    .circ4,.circ5, .circ6, .circ7{
      position:absolute;
      border-radius:100%;
      background:#12495b;
      transform:rotate(90deg);
      }
    .circ4{
      width:121px;
      height:192px;
      margin:-75px 55px;
    }
    .circ5{
      width:50px;
      height:70px;
      margin:-21px 30px
    }
    .circ6{
      width:70px;
      height:90px;
      margin:-40px 30px
    }
    .circ7{
      width:70px;
      height:90px;
      margin:-40px 30px
    }
    .h1,.h2,.h3,.h4,.h5, .h6{
      position:absolute;
      width: 231px;
      height:121px;
      border-radius:231px 231px 0 0;
      background:#54b7d8;
      }
    .h1{margin:400px -30px}
    .h2{margin:412px 121px}
    .h3{margin:400px 251px}
    .h4{margin:409px 370px}
    .h5{margin:421px 500px}
    .h6{margin:400px 630px}
    .hill3{
      position:absolute;
      width:800px;
      height:90px;
      background:white;
      margin:512px 0
    }
    .hl1,.hl2,.hl3,.hl4,.hl5, .hl6{
      position:absolute;
      width: 231px;
      height:121px;
      border-radius:231px 231px 0 0;
      background:#9dd5ea;
      }
    .hl1{margin:450px -30px}
    .hl2{margin:470px 121px}
    .hl3{margin:450px 251px}
    .hl4{margin:440px 370px}
    .hl5{margin:450px 500px}
    .hl6{margin:470px 630px}
    .c12{
      position:absolute;
      width:50px;
      height:50px;
      border-radius:100%;
      border-right:7px solid #eaeaea;
      margin:121px 90px;
      transform:rotate(-21deg)
    }
    .c12::before{
      content:"";
      position:absolute;
      width:50px;
      height:50px;
      border-radius:100%;
      border-right:7px solid #eaeaea;
      margin:30px 50px;
      transform:rotate(-70deg)
    }
    .c21{
      position:absolute;
      width:50px;
      height:50px;
      border-radius:100%;
      border-left:7px solid #eaeaea;
      margin:121px 30px;
      transform:rotate(0deg)
    }
    .c21::before{
      content:"";
      position:absolute;
      width:50px;
      height:50px;
      border-radius:100%;
      border-right:7px solid #eaeaea;
      margin:7px -73px;
      transform:rotate(-93deg)
    }

    .center {
      position: absolute;
      text-align: center;
      align-items: center;
      justify-content: center;
      top: 4rem;
      left: 50%;
      transform: translate(-50%, 0%);
      padding-bottom: 4rem;
    }

    .title {
      font-size: 4rem;
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
        $po = (int) $_POST['x'];

        while ($p > 0) {
          $patinho = "";
          for ($i = 0; $i < $p; $i++) {
            $patinho .= "🦆";
          }

          if ($p == 1) echo "$patinho foi passear<br>";
          else echo "$patinho foram passear<br>";
          echo "
          Além das montanhas<br>
          Para brincar<br>
          A mamãe gritou: Quá, quá, quá, quá<br>";
          $p--;
          
          $patinho = "";
          for ($i = 0; $i < $p; $i++) {
            $patinho .= "🦆";
          }

          if ($p == 1) echo "Mas só $patinho voltou de lá.<br><br><br>";
          elseif ($p == 0) echo "Mas nenhum 🦆 voltou de lá.<br><br><br>";
          else echo "Mas só $patinho voltaram de lá.<br><br><br>";
        }

        $patinho = "";
        for ($i = 0; $i < $po; $i++) {
          $patinho .= "🦆";
        }
        
        echo "
        A mamãe patinha foi procurar<br>
        Além das montanhas<br>
        Na beira do mar<br>
        A mamãe gritou: Quá, quá, quá, quá<br>
        E os $patinho voltaram de lá.
        ";
      ?>
    </div>
  </main>
  <footer class="bg">
    <div class="container">
      <div class="sol"></div>
      <div class="cerros">
          <div class="c1"><div class="circ1"></div></div>
          <div class="c2"><div class="circ2"></div></div>
          <div class="c3"><div class="circ3"></div></div>
          <div class="c4"><div class="circ4"></div></div>
          <div class="c5"><div class="circ5"></div></div>
          <div class="c6"><div class="circ6"></div></div>
          <div class="c7"><div class="circ7"></div></div>
        </div>
      <div class="hill"></div>
      <div class="hills">
        <div class="h1"></div>
        <div class="h2"></div>
        <div class="h3"></div>
        <div class="h4"></div>
        <div class="h5"></div>
        <div class="h6"></div>
      </div>
      <div class="hills7">
        <div class="hl1"></div>
        <div class="hl2"></div>
        <div class="hl3"></div>
        <div class="hl4"></div>
        <div class="hl5"></div>
        <div class="hl6"></div>
      </div>
    </div>
  </footer>
</body>
</html>