<?php
$slug = $_GET['post'];
$post_query = mysqli_query($conexao, "SELECT * FROM post WHERE slug = '$slug'");
$post = mysqli_fetch_array($post_query);
$user_id = $post['user_id'];
$post_id = $post['id'];
$post_imgs_query = mysqli_query($conexao, "SELECT * FROM post_img WHERE post_id = $post_id ORDER BY `i` ASC");
$post_imgs = mysqli_fetch_all($post_imgs_query);
if (isset($_POST['post_id']) && isset($_POST['post_slug'])) {
  $jwt = $_COOKIE['jwt'];
  $session_query = mysqli_query($conexao, "SELECT * FROM session WHERE session_id = '$jwt'");
  $session = mysqli_fetch_array($session_query);
  $session_user_id = $session['user_id'];
  if ($session_user_id == $user_id) {
    $_post_id = $_POST['post_id'];
    $_post_slug = $_POST['post_slug'];
    mysqli_query($conexao, "DELETE FROM post WHERE id = $_post_id AND slug = '$_post_slug'");
    mysqli_query($conexao, "DELETE FROM post_img WHERE post_id = $_post_id");
    foreach ($post_imgs as $img) {
      unlink(__DIR__ . "/static/" . $img[2]);
    }
    header("Location: /gallery/gallery/index.php");
  }
} else {
  $creator_query = mysqli_query($conexao, "SELECT * FROM user WHERE id = $user_id");
  $creator = mysqli_fetch_array($creator_query);
}
?>
<main class="py-12 flex flex-col items-center justify-between max-w-2xl ml-auto mr-auto select-none">
  <div class="relative max-2xl:w-8/12 2xl:w-10/12">
    <div class="flex flex-col items-center p-4">
      <?php
      $size = count($post_imgs);
      foreach ($post_imgs as $i => $img) {
        echo '<div class="hidden relative aspect-1" data-slide><div class="text-white bg-slate-600 backdrop-blur-sm bg-opacity-30 px-3 p-0.5 rounded-3xl absolute top-0 right-2 m-2 font-bold">' . ($i + 1) . ' / ' . $size . '</div><img src="/gallery/gallery/static/' . $img[2] . '" class="bg-slate-400 bg-opacity-70 rounded-xl align-middle"></div>';
      }
      ?>
    </div>
    <button
      class="bg-slate-400 rounded-full bg-opacity-0 hover:bg-opacity-20 backdrop-blur-none hover:backdrop-blur-sm fill-white transition-all duration-500 absolute top-1/2 -translate-y-1/2 left-6"
      onclick="plusSlides(-1)">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="aspect-1 w-12 -translate-x-0.5">
        <path d="M560-240 320-480l240-240 56 56-184 184 184 184-56 56Z" />
      </svg>
    </button>
    <button
      class="bg-slate-400 rounded-full bg-opacity-0 hover:bg-opacity-20 backdrop-blur-none hover:backdrop-blur-sm fill-white transition-all duration-500 absolute top-1/2 -translate-y-1/2 right-6"
      onclick="plusSlides(1)">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="aspect-1 w-12 translate-x-0.5">
        <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z" />
      </svg>
    </button>
    <div class="text-center absolute bottom-6 left-1/2 -translate-x-1/2">
      <?php
      foreach ($post_imgs as $i => $img) {
        echo '<span class="cursor-pointer h-4 w-4 mx-0.5 bg-slate-500 bg-opacity-10 backdrop-blur-md inline-block rounded-full hover:bg-opacity-30 transition-all duration-500" onclick="currentSlide(' . ($i + 1) . ')" data-dot></span>';
      }
      ?>
    </div>
  </div>
  <div class="grid grid-flow-row grid-cols-2 mb-3 justify-between items-center w-full">
    <p class="font-medium w-full">Publicado por
      <span class="font-black">
        <?php echo $creator['name']; ?>
      </span>
    </p>
    <form action="" method="POST" class="justify-items-end mr-4 <?php if ($_COOKIE['id'] == $user_id)
      echo 'grid';
    else
      echo 'hidden'; ?>">
      <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
      <input type="hidden" name="post_slug" value="<?php echo $post['slug']; ?>">
      <button type="submit">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
          class="fill-white aspect-1 h-10 bg-red-600 p-2 rounded-full justify-self-end">
          <path
            d="M253-99q-38.212 0-65.106-26.6Q161-152.2 161-190v-552h-58v-91h228v-47h297v47h228v91h-58v552q0 37.175-27.206 64.088Q743.588-99 706-99H253Zm453-643H253v552h453v-552ZM357-268h74v-398h-74v398Zm173 0h75v-398h-75v398ZM253-742v552-552Z" />
        </svg>
      </button>
    </form>
  </div>
  <p class="px-4 py-3 bg-black text-white text-left w-full font-bold rounded-xl min-h-[10rem] select-text">
    <?php echo $post['description']; ?>
  </p>
  <script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      let i;
      let slides = Array.from(document.querySelectorAll("div[data-slide]"));
      let dots = Array.from(document.querySelectorAll("span[data-dot]"));
      if (n > slides.length) { slideIndex = 1 }
      if (n < 1) { slideIndex = slides.length }
      for (i = 0; i < slides.length; i++) {
        slides[ i ].classList.add("hidden");
      }
      for (i = 0; i < dots.length; i++) {
        dots[ i ].classList.remove("bg-opacity-40")
        dots[ i ].classList.add("bg-opacity-10");
      }
      slides[ slideIndex - 1 ].classList.remove("hidden");
      dots[ slideIndex - 1 ].classList.add("bg-opacity-40");
    }
  </script>
</main>