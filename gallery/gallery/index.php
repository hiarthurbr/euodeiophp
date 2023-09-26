<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
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
  <?php require_once "auth_user.php" ?>
</head>

<body>
  <header
    class="sticky top-0 w-screen max-md:px-5 md:px-20 max-md:pt-4 md:pt-8 inline-flex select-none items-center justify-between z-[900]">
    <div class="absolute top-0 left-0 w-full h-[175%] backdrop-blur-lg -z-10"
      style="mask-image: linear-gradient(to bottom, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 60%, rgba(255, 255, 255, 0) 100%); -webkit-mask-image: linear-gradient(to bottom, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 60%, rgba(255, 255, 255, 0) 100%);">
    </div>
    <div class="font-Montserrat flex flex-row items-center">
      <a href="/gallery/gallery/index.php" class="font-black max-md:text-xl md:text-4xl">ShareWave</a>
      <span
        class="max-md:text-[0.65rem] md:text-sm font-black md:translate-y-0.5 px-2 p-0.5 rounded-xl max-md:ml-1 md:ml-3 bg-gradient-to-r from-lime-500 to-sky-600 text-white">ALPHA</span>
    </div>
    <div class="flex flex-row max-2xl:w-4/12 2xl:w-3/12 justify-between items-center">
      <a class="pl-2 pr-4 bg-gradient-to-r from-lime-500 to-sky-600 text-white fill-white rounded-3xl flex flex-row items-center justify-between"
        href="/gallery/gallery/create.php" draggable="false">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="w-12 p-1">
          <path d="M435-434H179v-91h256v-258h91v258h256v91H526v255h-91v-255Z" />
        </svg>
        <span class="font-extrabold font-Montserrat hover:underline underline-offset-2"
          style="text-decoration-thickness: .175rem;">Criar
          post</span>
      </a>
      <a href="/gallery/login/index.php" class="font-bold text-slate-800 max-md:mr-4 hover:underline underline-offset-4"
        style="text-decoration-thickness: .1rem;" draggable="false">Login</a>
      <a href="/gallery/login/create.php"
        class="font-bold text-slate-800 max-md:mr-4 hover:underline underline-offset-4"
        style="text-decoration-thickness: .1rem;" draggable="false">Criar conta</a>
    </div>
  </header>
  <?php
  if (isset($_GET['post'])) {
    require_once "post.php";
  } else {
    require_once "grid.php";
  }
  ?>
</body>

</html>