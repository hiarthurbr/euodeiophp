<!DOCTYPE html>
<html lang="en">

<head>
  <title>Forbidden | ShareWave</title>
  <?php require_once "__tailwind_head.php" ?>
</head>

<body>
  <div class="w-screen h-screen fixed flex items-center backdrop-blur-md z-[999] select-none">
    <div class="flex flex-col items-center w-full">
      <h1 class="font-Montserrat text-4xl font-black text-center w-full text-slate-800">
        Você precisa estar autenticado <wbr>para visualizar esta página
      </h1>
      <p class="font-Inter font-extrabold text-2xl text-slate-700">
        Faça login
        <a href="/gallery/login/index.php" class="text-cyan-400 font-black hover:underline"
          style="text-decoration-thickness: .1rem;">aqui</a>
      </p>
    </div>
  </div>
  <?php require_once '__content.php'; ?>
</body>

</html>