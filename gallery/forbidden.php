<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forbidden | ShareWave</title>
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