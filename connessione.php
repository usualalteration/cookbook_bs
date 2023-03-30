<?php
$servername= "localhost";
$username= "root";
$password= "";
$dbname= "cookbook";

$conn= mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
    die("Connessione non riuscita");
}