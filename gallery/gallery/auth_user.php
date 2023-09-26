<?php
include_once "../conexao.php";

if (isset($_COOKIE['jwt'])) {
  $jwt = $_COOKIE['jwt'];
  $query = mysqli_query($conexao, "SELECT * FROM session WHERE session_id = '$jwt'");
  $query_array = mysqli_fetch_array($query);
  if (isset($query_array['user_id'])) {
    $user_id = $query_array['user_id'];
    $expires_at = $query_array['expires_at'];
    if ($expires_at < time()) {
      setcookie("jwt", "", time() - 3600, "/");
      mysqli_query($conexao, "DELETE FROM session WHERE session_id = '$jwt'");
      require_once "../forbidden.php";
      die();
    } else {
      $query = mysqli_query($conexao, "SELECT * FROM user WHERE id = '$user_id'");
      $query_array = mysqli_fetch_array($query);
      if (isset($query_array['name'])) {
        $name = $query_array['name'];
        $email = $query_array['email'];
        $id = $query_array['id'];
        $since = $query_array['created_at'];
        // Usuário autenticado, informações adquiridas com sucesso
        setcookie("name", $name, 0, "/");
        setcookie("email", $email, 0, "/");
        setcookie("id", $id, 0, "/");
        setcookie("since", $since, 0, "/");
      }
    }
  } else {
    setcookie("jwt", "", time() - 3600, "/");
    require_once "../forbidden.php";
    die();
  }
} else {
  require_once "../forbidden.php";
  die();
}
?>