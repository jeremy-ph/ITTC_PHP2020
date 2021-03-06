<?php
include __DIR__ . "/../includes/DatabaseConnection.php";
include __DIR__ . "/../includes/DatabaseFunctions.php";

try{
    if(isset($_POST['joketext'])){
        updateJoke($pdo, $_POST['jokeid'], $_POST['joketext'], 1);

        header('location: jokes.php');
    }else{
        $joke = getJoke($pdo, $_GET['id']);

        $title = 'edit joke post';

        ob_start();

        include __DIR__ . "/../templates/editjoke.html.php";

        $output = ob_get_clean();
    }
} catch (PDOException $e) {
    $title = "An error occurred!!";

    $output = 'Database error : ' . $e->getMessage() . "<br> Location file: " . $e->getFile() . "<br> Error line: " . $e->getLine();   
}


include __DIR__ . "/../templates/layout.html.php";
?>