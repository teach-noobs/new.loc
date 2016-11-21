<?php
include_once "config.php";
//session_start();
$action = "action_";
$controller = "";
$params = [];   //параметры из урла. экшн и контроллер
$q = isset($_GET['q']) ? $_GET['q'] : '';

//массив с параметрами
$info = explode("/", $q);

//добавляем в массив параметров элементы из урла
foreach ($info as $v) {
    if ($v !== '') {
        $params[] = $v;
    }
}
if (empty($params)) {
    $params = null;
}
$action .= isset($params[1]) ? $params[1] : 'index';

//same as up
//if (isset($params[1])) {
//    $action .= $params[1];
//
//} else {
//    $action .= 'index';
//}

switch ($params[0]) {
    case 'user':
        $controller = "C_User";
        break;
    default:
        $controller = "C_Controller";
        break;
}

$c = new $controller();
$c->Go($action, $params);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Сайт</title>
</head>
<body>
<div>
    <?php
    var_dump($params);
    ?>
</div>
<form action="/user/reg" method="post">
    <input type="text" name="login" placeholder="Логин">
    <input type="password" name="pass" placeholder="pass">
    <button type="submit">Регистрация</button>
</form>

</body>
</html>
