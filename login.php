<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  // 检查用户名和密码是否为空
  if (empty($username) || empty($password)) {
    echo "用户名和密码不能为空";
    exit;
  }

  // 检查用户名和密码是否正确
  $users = file("users.txt");
  foreach ($users as $user) {
    $data = explode(",", $user);
    $savedUsername = trim($data[0]);
    $savedPassword = trim($data[1]);

    if ($username === $savedUsername && $password === $savedPassword) {
      // 登录成功后跳转到主页
      header("Location: ./index.html");
      die();
    }
  }

  // 登录失败，跳转回登录页面
  header("Location: login.html");
  die();
}
?>
