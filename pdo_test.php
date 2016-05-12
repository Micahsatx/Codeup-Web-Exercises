<?php
// test file that is running the main part of the code.  does NOT contain sensative information
require ('db_credentials.php');
require ('db_connect.php');

$users =  [
    ['email' => 'jason@codeup.com', 'name' => 'Jason Straughan'],
    ['email' => 'zach@codeup.com', 'name' => 'Zach Gulde'],
    ['email' => 'luis@codeup.com', 'name' => 'Luis Lopez'],
];



foreach($users as $user) {
    echo '-----------------------------------------------' . PHP_EOL;
    $query = 'INSERT INTO users (name) VALUES ("' . $user['name'] . '", "' . $user['email'] . '")';
    var_dump($query);
    // $dbc->exec($query);
    // var_dump($dbc->lastInsertId());
};





