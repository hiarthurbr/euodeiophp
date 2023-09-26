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
  <?php require_once "auth_user.php" ?>
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
  <main class="pt-12">
    <form class="flex flex-col items-center justify-between gap-6" action="" method="POST"
      enctype="multipart/form-data">
      <div class="flex flex-row items-center justify-between">
        <label for="images"
          class="p-3 px-6 bg-gradient-to-r from-lime-500 to-sky-600 rounded-3xl text-white font-extrabold cursor-pointer select-none">Adicionar
          imagens</label>
        <input type="file" id="images" name="images[]" multiple="multiple" accept="image/*" class="hidden" required>
      </div>
      <div class="mx-48">
        <div id="images-carousel" class="overflow-x-auto flex w-full gap-4 h-fit">
        </div>
      </div>
      <textarea name="description" placeholder="Descrição"
        class="bg-black text-white m-2 p-2 rounded-xl font-Inter font-bold w-3/4" rows="5"><?php
        if (isset($_POST['description']))
          echo $_POST['description'];
        ?></textarea>
      <div class="flex flex-row items-center justify-between gap-12 select-none">
        <div
          class="bg-black px-6 p-3 rounded-full text-white max-w-max font-extrabold flex flex-row items-center justify-between">
          <label for="visible">Visível publicamente</label>
          <div class="relative">
            <input type="checkbox" name="visible" <?php if (isset($_POST['visible']) && $_POST['visible'] == 'on' || !isset($_POST['visible']))
              echo 'checked="true"';
            ?>
              class="ml-4 select-none rounded-full cursor-pointer block">
          </div>
        </div>
        <input type="hidden" name="submit" value="true">
        <button type="submit"
          class="px-6 p-3 bg-gradient-to-r from-lime-500 to-sky-600 text-white font-extrabold font-Montserrat rounded-3xl">Criar
          post</button>
      </div>
      <div>
        <?php
        if (isset($_FILES) && isset($_POST['submit'])) {
          echo '<span class="px-8 p-4 bg-red-600 text-white rounded-3xl font-extrabold select-none">Ocorreu um erro</span>';
          $images = $_FILES['images'];
          $description = $_POST['description'];
          $visible = 1;
          if (isset($_POST['visible']) && $_POST['visible'] == 'on')
            $visible = 1;
          else
            $visible = 0;
          $user_id = $_COOKIE['id'];
          $slug = bin2hex(random_bytes(4));
          mysqli_query($conexao, "INSERT INTO post (slug, user_id, likes, description, visible) VALUES ('$slug', '$user_id', 0, '$description', '$visible')");
          $q = mysqli_query($conexao, "SELECT * FROM post WHERE slug = '$slug' AND user_id = $user_id");
          $q = mysqli_fetch_array($q);
          $post_id = $q['id'];
          foreach ($images['tmp_name'] as $key => $tmp_name) {
            $image_slug = bin2hex(random_bytes(2));
            $size = filesize($tmp_name);
            $is_image = exif_imagetype($tmp_name);
            if ($is_image && $size < 10_000_000 /* 10 Mb */) {
              $file_name = uniqid(time(), true) . "." . strtolower(pathinfo($images['name'][$key], PATHINFO_EXTENSION));
              move_uploaded_file(
                $tmp_name,
                __DIR__ . "/static/" . $file_name
              );
              mysqli_query($conexao, "INSERT INTO post_img (slug, file_name, post_id, i) VALUES ('$image_slug', '$file_name', $post_id, $key)");
            }
          }
          header("Location: /gallery/gallery/index.php?post=$slug");
        }
        ?>
      </div>
      <script>
        function appendFile(theFile) {
          return function (e) {
            document.getElementById("images-carousel").innerHTML += '<img src="' + e.target.result + '" class="aspect-1 w-72 select-none">';
            console.log(e.target.result);
          };
        }
        function handleFileSelect(evt) {
          let files = evt.target.files;
          if (files.length > 10) {
            alert("Você só pode enviar 10 imagens por vez");
          }
          else {
            document.getElementById("images-carousel").innerHTML = "";
            for (const file of files) {
              // Only process image files.
              if (!file.type.match('image.*')) {
                continue;
              }
              let reader = new FileReader();

              // Closure to capture the file information.
              reader.onload = appendFile(file);

              // Read in the image file as a data URL.
              reader.readAsDataURL(file);
            }
          }

        }

        document.getElementById('images').addEventListener('change', handleFileSelect, false);
      </script>
    </form>
  </main>
</body>

</html>