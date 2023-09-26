<main class="pt-12 flex flex-row items-center justify-between">
  <div class="grid max-2xl:grid-cols-3 2xl:grid-cols-6 gap-20 mb-20">
    <?php
    $query = mysqli_query($conexao, "SELECT * FROM post ORDER BY `id` DESC");
    $query_array = mysqli_fetch_all($query);

    // for each index in the array, create a card
    
    foreach ($query_array as $post) {
      $id = $post[0];
      $slug = $post[2];

      $img_query = mysqli_query($conexao, "SELECT * FROM post_img WHERE post_id = $id and i = 0");
      $img_query_array = mysqli_fetch_array($img_query);

      $img = $img_query_array['file_name'];

      echo '<a class="flex flex-col items-center" href="/gallery/gallery/index.php?post=' . $slug . '"><img src="/gallery/gallery/static/' . $img . '" class="aspect-1 max-2xl:w-10/12 2xl:w-10/12 bg-slate-400 bg-opacity-70">';
    }

    ?>
  </div>
</main>