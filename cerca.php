<form method="post" action="cerca.php">
    <input type="text" name="text" /><br/>
    <input type="submit" value="search"/>
</form>

<h2 class="header">Risultati della tua ricerca</h2>

<?php
    $servername= "localhost";
    $username= "root";
    $password= "";
    $dbname= "cookbook";

    $conn= mysqli_connect($servername,$username,$password,$dbname);

    if(!$conn){
        die("Connessione non riuscita");
    }

    if(isset($_POST["text"])){
        $search_text = mysqli_real_escape_string($conn, $_POST["text"]);

        $sql_search = "SELECT * FROM recipes WHERE recipe_name LIKE '%$search_text%'";

        $result = mysqli_query($conn,$sql_search);

        while ($row = mysqli_fetch_assoc($result)){
            echo "<table>";
            echo "<tr>";
            echo "<td>".$row["recipe_name"]."</td>";
            echo "<td><img src='data:image/jpeg;base64,".base64_encode($row['photo'])."' width='150' height='150'></td>";
            echo "<td>".$row["ingredients"]."</td>";
            echo "<td>".$row["method"]."</td>";
            echo "</tr>";
            echo "</table>";
        }
    }
    mysqli_close($conn);
?>
