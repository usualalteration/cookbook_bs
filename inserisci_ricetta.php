<?php
    require "connessione.php";

    $recipe_name = mysqli_real_escape_string($conn, $_POST["recipe_name"]);
    $ingredients = mysqli_real_escape_string($conn, $_POST["ingredients"]);
    $method = mysqli_real_escape_string($conn, $_POST["method"]);
    $filename = $_FILES["photo"]["name"];
    $photo_file = addslashes($filename);

    if (empty($recipe_name)) {
        echo "Inserisci il nome della ricetta";
        exit();
    }

    $photo_content = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
    $photo_base64 = base64_encode($photo_content);

    $sql = "INSERT INTO recipes (recipe_name, photo, ingredients, method)
            VALUES ('$recipe_name', '$photo_base64', '$ingredients', '$method')";

    mysqli_query($conn, $sql);
    mysqli_close($conn);
    
    header('Location: index.php');
    exit;

?>

