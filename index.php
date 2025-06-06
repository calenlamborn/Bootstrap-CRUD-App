<?php
require 'database.php';
require 'vendor/autoload.php';
$router = new AltoRouter();
$router->setBasePath("/products");

$database = new Database("localhost", "user_read", "W/IL2/3c8Vh(xTA3", "products");

$title = "Home";
$templates = new League\Plates\Engine('templates', 'php');
$templates->registerFunction('url', function ($name, $params = []) use ($router) {
    return $router->generate($name, $params);
});

// Products Routes
$router->map('GET', '/', function () use ($database, $templates) {
    echo $templates->render("home", ["products" => $database->GetProducts()]);
}, 'home');

$router->map('GET', '/products/add', function () use ($templates) {
    echo $templates->render('productadd');
}, 'productadd');

$router->map('POST', '/products/add', function () use ($database, $router) {
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $database->CreateProduct($name, $desc, $price);
    header('Location: ' . $router->generate('home'));
});

$router->map('GET', '/products/[i:id]', function ($id) use ($database, $templates) {
    echo $templates->render("productdetail", ["product" => $database->GetProductDetail($id)]);
}, 'productdetail');

$router->map('GET', '/products/update/[i:id]', function ($id) use ($database, $templates) {
    $productDetails = $database->GetProductDetail($id);
    echo $templates->render("productupdate", ["product" => $productDetails]);
}, 'productupdate');

$router->map('POST', '/products/update', function () use ($database, $router) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $database->UpdateProduct($id, $name, $desc, $price);
    header('Location: ' . $router->generate('home'));
}, 'updateproduct');

$router->map('GET', '/products/delete/[i:id]', function ($id) use ($database, $templates) {
    $productDetails = $database->GetProductDetail($id);
    echo $templates->render('productdelete', ['product' => $productDetails]);
}, 'productdelete');

$router->map('POST', '/products/delete', function () use ($database, $router) {
    $id = $_POST['id'];
    $database->DeleteProduct($id);
    header('Location: ' . $router->generate('home'));
}, 'deleteproduct');

// Users Routes
$router->map('GET', '/users', function () use ($database, $templates) {
    echo $templates->render("users", ["users" => $database->GetUsers()]);
}, 'users');

$router->map('GET', '/users/[i:id]', function ($id) use ($database, $templates) {
    echo $templates->render("userdetail", ["user" => $database->GetUserDetail($id)]);
}, 'userdetail');

$router->map('GET', '/users/add', function () use ($templates) {
    echo $templates->render('useradd');
}, 'useraddform');

$router->map('POST', '/users/add', function () use ($database, $router) {
    $name = $_POST['name'];
    $database->CreateUser($name);
    header('Location: ' . $router->generate('home'));
}, 'useradd');

$router->map('GET', '/users/update/[i:id]', function ($id) use ($database, $templates) {
    $userDetails = $database->GetUserDetail($id);
    echo $templates->render("userupdate", ["user" => $userDetails]);
}, 'userupdate');

$router->map('POST', '/users/update', function () use ($database, $router) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $database->UpdateUser($id, $name);
    header('Location: ' . $router->generate('users'));
}, 'updateuser');

$router->map('GET', '/users/delete/[i:id]', function ($id) use ($database, $templates) {
    $userDetails = $database->GetUserDetail($id);
    echo $templates->render('userdelete', ['user' => $userDetails]);
}, 'userdelete');

$router->map('POST', '/users/delete', function () use ($database, $router) {
    $id = $_POST['id'];
    $database->DeleteUser($id);
    header('Location: ' . $router->generate('users'));
}, 'deleteuser');

// Order Related Routes
$router->map('GET', '/users/orders/[:id]', function ($id) use ($database, $templates) {
    echo $templates->render("usersorders", ["orders" => $database->GetOrdersForUser($id)]);
}, 'usersorders');

$router->map('GET', '/orders/[i:id]', function ($id) use ($database, $templates) {
    $order = $database->GetOrderDetail($id);
    $orderItems = $database->GetOrderItems($id);
    echo $templates->render("orderdetail", ["order" => $order, "orderItems" => $orderItems]);
}, 'orderdetail');

$match = $router->match();

if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    echo $templates->render('notfound');
}
?>
