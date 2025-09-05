<?php

    $servername = "localhost"; 
    $username   = "root";      
    $password   = "@Plast..2024";          
    $dbname     = "senai_banco";  

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    } else {
        echo "Conexão feita com sucesso!";
    }
// 
?>
