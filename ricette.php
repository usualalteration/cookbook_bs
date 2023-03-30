<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">   
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Titolo</th>
                    <th>Foto</th>
                    <th>Ingredienti</th>
                    <th>Preparazione</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require "connessione.php";
                $sql = "SELECT * FROM recipes";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>" . $row['recipe_name'] . "</td>";
                    echo "<td><img src='data:image/jpeg;base64,".base64_encode($row['photo'])."' width='150' height='150' class='img-thumbnail img-fluid'></td>";
                    echo "<td>" . $row['ingredients'] . "</td>";
                    echo "<td>" . $row['method'] . "</td>";
                    echo "<td>";
                    echo "<a href='modifica.html'>Modifica</a>" . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </body>
</html>

