<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        fontFamily: {
          Inter: [ 'Inter', 'sans-serif' ],
          Montserrat: [ 'Montserrat', 'sans-serif' ],
        }
      }
    }
  </script>
  <?php
  include_once "../conexao.php";

  if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pwd'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];

    if (!isset($_POST['navigator_name']) || !isset($_POST['platform'])) {
      echo "Unable to get security features";
    } else {
      $navigator_name = $_POST['navigator_name'];
      $platform = $_POST['platform'];
      $navigator_codename = isset($_POST['navigator_codename']) ? $_POST['navigator_codename'] : null;
      $product = isset($_POST['product']) ? $_POST['product'] : null;
      $language = isset($_POST['language']) ? $_POST['language'] : null;
      $query = mysqli_query($conexao, "SELECT COUNT(*) FROM user WHERE email = '$email'");

      $user_already_exists = false;

      if (mysqli_fetch_array($query)[0] > 0)
        $user_already_exists = true;

      if (!$user_already_exists) {
        $hash_password = password_hash($password, PASSWORD_DEFAULT);

        mysqli_query($conexao, "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$hash_password')");
        $query = mysqli_query($conexao, "SELECT * FROM user WHERE email = '$email'");
        $query_array = mysqli_fetch_array($query);
        if (isset($query_array[0])) {
          $user_id = $query_array[0];
          $expires_at = time() + 259_200; /* 30 days */

          $jwt = bin2hex(random_bytes(64));
          mysqli_query($conexao, "INSERT INTO session (session_id, navigator_name, navigator_codename, platform, product, language, user_id, expires_at) VALUES ('$jwt', '$navigator_name', '$navigator_codename', '$platform', '$product', '$language', '$user_id', '$expires_at')");

          setcookie("jwt", $jwt, $expires_at, "/");
          header('Location: ../gallery/index.php');
        }
      } else {
        echo "User already exists";
      }
    }

  }
  ?>
</head>

<body>
  <header
    class="sticky top-0 w-screen max-md:px-5 md:px-20 max-md:pt-4 md:pt-8 inline-flex select-none items-center justify-between z-[900]">
    <div class="absolute top-0 left-0 w-full h-[175%] backdrop-blur-lg -z-10"
      style="mask-image: linear-gradient(to bottom, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 60%, rgba(255, 255, 255, 0) 100%); -webkit-mask-image: linear-gradient(to bottom, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 60%, rgba(255, 255, 255, 0) 100%);">
    </div>
    <div class="font-Montserrat flex flex-row items-center">
      <span class="font-black max-md:text-xl md:text-4xl">ShareWave</span>
      <span
        class="max-md:text-[0.65rem] md:text-sm font-black md:translate-y-0.5 px-2 p-0.5 rounded-xl max-md:ml-1 md:ml-3 bg-gradient-to-r from-lime-500 to-sky-600 text-white">ALPHA</span>
    </div>
    <div class="flex flex-row max-2xl:w-2/12 2xl:w-1/12 justify-between">
      <a href="/gallery/login/index.php" class="font-bold text-slate-800 max-md:mr-4 hover:underline underline-offset-4"
        style="text-decoration-thickness: .1rem;" draggable="false">Login</a>
      <a href="/gallery/login/create.php"
        class="font-bold text-slate-800 max-md:mr-4 hover:underline underline-offset-4"
        style="text-decoration-thickness: .1rem;" draggable="false">Criar conta</a>
    </div>
  </header>
  <main class="pt-12 flex flex-col items-center w-screen justify-between select-none">
    <form action="" method="POST" class="flex flex-col items-center justify-between gap-12">
      <h1 class="font-Montserrat font-black text-6xl">Criar conta</h1>
      <div>
        <label for="name" class="font-Montserrat font-extrabold text-xl">Nome</label>
        <input type="text" name="name" value="<?php if (isset($_POST['name']))
          echo $_POST['name'] ?>" class="bg-black text-white m-2 p-2 rounded-xl font-Inter font-bold" required>
        </div>
        <div>
          <label for="email" class="font-Montserrat font-extrabold text-xl">Email</label>
          <input type="email" name="email" placeholder="Digite aqui seu email" value="<?php if (isset($_POST['email']))
          echo $_POST['email'] ?>" class="bg-black text-white m-2 p-2 rounded-xl font-Inter font-bold" required>
        </div>
        <div>
          <label for="pwd" class="font-Montserrat font-extrabold text-xl">Senha</label>
          <input type="password" name="pwd" value="<?php if (isset($_POST['pwd']))
          echo $_POST['pwd'] ?>" class="bg-black text-white m-2 p-2 rounded-xl font-Inter font-bold" required>
        </div>
        <div class="flex flex-row items-center justify-between w-full">
          <button type="submit"
            class="bg-gradient-to-r from-lime-500 to-sky-600 text-white font-Montserrat font-extrabold text-2xl p-2 px-6 rounded-3xl">Criar
            conta</button>
          <a href="index.php" class="text-sky-600 hover:text-sky-800 transition-all duration-500 ml-4 font-bold">Já tem
            uma
            conta?</a>
        </div>
        <input type="hidden" name="navigator_codename" id="navigator_codename">
        <input type="hidden" name="navigator_name" id="navigator_name">
        <input type="hidden" name="platform" id="platform">
        <input type="hidden" name="product" id="product">
        <input type="hidden" name="language" id="language">
      </form>
      <script>
          (document.getElementById("navigator_codename") ?? {}).value = navigator.appCodeName;
        (document.getElementById("navigator_name") ?? {}).value = navigator.appName;
        (document.getElementById("platform") ?? {}).value = navigator.platform;
        (document.getElementById("product") ?? {}).value = navigator.product;
        (document.getElementById("language") ?? {}).value = navigator.language;
      </script>
  </body>
  </main>

  </html>