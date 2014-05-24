<?php
require '../vendor/autoload.php';
ORM::configure("mysql:host=localhost;dbname=ssl");
ORM::configure("username", "root");
ORM::configure("password", "root"); 
$app = new \Slim\Slim(array(
    'mode' => 'development',
    'debug' => true,
    'templates.path' => '../app/views/'
    ));
//routes here

$app->get('/hello/:id', function ($id) use ($app) {
	//echo "Hello $id!";
	$app->render('hello.php', array('id' => $id));
	$app = new \Slim\Slim();
$app->get('/fruits/:id', function ($id) {
    //Show fruits identified by $id
$fruits = ORM::for_table('fruits')->find_many();
$app->render('hello.html', array('id' => $id, 'fruits' => $fruits));
{% for fruit in fruits %}
   Fruit: {{fruit.fruitname}} is {{fruit.fruitcolor}}<br />
{% endfor %} 

$app->post('/addfruit', function () use ($app) {
    $fruit = ORM::for_table('fruits')->create();
    $fruit->fruitname = $app->request->post('fruitname');
    $fruit->fruitcolor = $app->request->post('fruitcolor');
    $fruit->save();
    $app->redirect('/hello/'.$app->request->post('fruitname'));
}); 
});


$app->run();
