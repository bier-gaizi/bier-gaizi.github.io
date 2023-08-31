<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  // 检查用户名和密码是否为空
  if (empty($username) || empty($password)) {
    echo "用户名和密码不能为空";
    exit;
  }

  // 检查是否存在重复的用户名
  $users = file("users.txt");
  foreach ($users as $user) {
    $data = explode(",", $user);
    $savedUsername = trim($data[0]);

    if ($username === $savedUsername) {
      echo "该用户名已被注册，请选择其他用户名";
      exit;
    }
  }

  // 将用户名和密码保存到文件
  $data = $username . "," . $password . "\n";
  file_put_contents("users.txt", $data, FILE_APPEND);

  // 注册成功后跳转回主页
  header("Location: ./index.html");
  die();
}
?>

