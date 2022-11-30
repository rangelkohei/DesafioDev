<?php
    include 'database.php';
    
    //var_dump($_POST);

    $cep = $_POST['cepDB'];
    $local = $_POST['localidade'];
    $bairro = $_POST['bairro'];
    $logra = $_POST['logradouro'];
    $ddd = $_POST['ddd'];
    $uf = $_POST['uf'];
    $ibge = $_POST['ibge'];
    $comple = $_POST['complem'];

    $sql = "INSERT INTO ceps(cep,logradouro,bairro,localidade,uf,ibge,ddd,complemento) VALUES('$cep','$logra','$bairro','$local','$uf','$ibge','$ddd','$comple')";

    if(mysqli_query($conn,$sql)){
        echo '<script> alert("Consulta de CEP cadastrada no Banco de dados!") </script>;';
        echo "<script> window.location='../Index.html' </script>";
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    //mysqli_close($conn);
?>