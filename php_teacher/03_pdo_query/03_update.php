<?php
try{
    $pdo = new PDO('mysql:host=localhost;dbname=ijdb;charset=utf8','ijdbuser','mypassword');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'UPDATE joke SET 
            jokedate="2020-03-10" WHERE 
            joketext LIKE "%hello%"';

    $affectedRows = $pdo->exec($sql); // <= Returns the number of rows processed by exec method.(처리된 row 갯수 반환)

    $output = 'Updated row: ' . $affectedRows . ' ea.';
}catch(PDOException $e){
    $output = "Database error!! <br> " . 
    $e->getMessage() . "<br> Location file: " . 
    $e->getFile() . "<br> Error line: " . 
    $e->getLine();
}

include __DIR__ . '/output.html.php';
?>