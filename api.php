<?php
header("Access-Control-Allow-Origin: *");

function a($mysqli, $v)
{
    return $mysqli->real_escape_string($v);
}

$dbHost = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'book';

$mysqli = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
$mysqli->query('SET NAMES "utf8"');
$output = array();

if(!isset($_POST['api']))
{
    $output['error_code'] = 'E1';
    $output['error_detail'] = 'no api parameter';

    echo json_encode($output);
    die();
}

if($_POST['api'] !='API123456')
{
    $output['error_code'] = 'E2';
    $output['error_detail'] = 'API does not exists.';

    echo json_encode($output);
    die();
}

if(!isset($_POST['name']))
{
    $output['error_code'] = 'E3';
    $output['error_detail'] = 'no id parameter';

    echo json_encode($output);
    die();
}

$name = a($mysqli, $_POST['name']);

$book_query = $mysqli->query('SELECT id,name,author,price,isbn FROM book WHERE name = "'. $name .'" LIMIT 1');

echo $mysqli->error;

if($book_query->num_rows <= 0)
{
    $output['error_code'] = 'E5';
    $output['error_detail'] = 'no id and isbn parameter matching in database';

    echo json_encode($output);
    die();
}
else
{
    $obj = $book_query->fetch_object();
    $output['id'] = $obj->id;
    $output['name'] = $obj->name;
    $output['author'] = $obj->author;
    $output['price'] = $obj->price;
    $output['isbn'] = $obj->isbn;
    
    echo json_encode($output);
}

?>