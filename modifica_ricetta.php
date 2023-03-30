<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <?php
            require "connessione.php";

            if(isset($_GET['submit'])) {
                $recipe_name = $_GET['recipe_name'];
                $ingredients = $_GET['ingredients'];
                $method = $_GET['method'];
                $recipe_id = $_GET['recipe_id'];
                $photo="";

                if(isset($_FILES['photo'])) {
                    $file_name = $_FILES['photo']['name'];
                    $file_tmp = $_FILES['photo']['tmp_name'];
                    $file_ext = strtolower(end(explode('.',$file_name)));
                    $extensions = array("jpeg","jpg","png");

                    if(in_array($file_ext,$extensions) === false){
                        $errors[] = "Estensione del file non consentita, scegliere un file JPEG o PNG.";
                    }

                    if(empty($errors)) {
                        move_uploaded_file($file_tmp, "images/" . $file_name);
                        $photo = "images/" . $file_name;
                    }
                }

                if(!empty($recipe_name) && !empty($ingredients) && !empty($method)) {
                    $sql = "UPDATE recipes SET recipe_name='$recipe_name', ingredients='$ingredients', method='$method'";
                    if(!empty($photo)) {
                        $sql .= ", photo='$photo'";
                    }
                    $sql .= " WHERE id='$recipe_id'";

                    if(mysqli_query($conn, $sql)) {

                        echo "Dati della ricetta aggiornati con successo!";
                    }
                    
                    else
                    {
                        echo "Errore nell'aggiornamento dei dati della ricetta: " . mysqli_error($conn);
                    }
                }
                
                else
                {
                    echo "Per favore, inserisci tutti i campi obbligatori.";
                }
            }

            mysqli_close($conn);
            header('Location: index.php');
        ?>


    </body>
</html>