<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
    <link rel="stylesheet" href="../CSS/button.css">
    <!-- CSS BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<div class="forum_user">

    <form action="" method="get">

        <h2 class="tittle-1">REGISTROS ARMAZENADOS</h2>
        <fieldset class="fieldset">
            <conteiner class="conteiner">
                
                <div class="input-group">

                    <form action="" method="get">

                        <input  value="<?php if(isset($_GET['pesquisa'])) echo $_GET['pesquisa']?>" name="pesquisa" type="search" id="form1" class="form-control" placeholder="Pesquisar por CEP, Complemento, Bairro, Cidade, Estado"/>
                            <button type="submit" class="btn btn-primary">
                                <!--ICONE LUPA DE PESQUISA-->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg>
                                <!---->
                            </button>
                    </form>
                
                </div>

                <br><br>

                    <div id="divCons">

                        <!-- BARRA DE PESQUISA -->
                        <?php
                            include ('database.php'); //INCLUE CONEXÃO COM DB

                            if(!empty($_GET['pesquisa'])){              //VERIFICA SE O GET PESQUISA ESTA RECEBENDO ALGUM VALOR QUE NAO SEJA VAZIO
                                //A BARRA DE PESQUISA ESTA PREENCHIDA
                                $pesq = $_GET['pesquisa'];              //PEGA O VALOR DA PESQUISA VIA GET
                                
                                $sql = "SELECT * FROM ceps WHERE cep LIKE '%$pesq%' OR complemento LIKE '%$pesq%' OR bairro LIKE '%$pesq%' OR localidade LIKE '%$pesq%' OR uf LIKE '%%$pesq'";              //SQL VAI SER UM SELECT Q BUSQUE NO BANCO DE DADOS UM VALOR PARECIDO COM OQ VEIO DO GET PESQUISA  


                            }else{ 
                                //A BARRA DE PESQUISA ESTA VAZIA
                                $sql = "SELECT * FROM ceps ORDER BY id";        //SQL VAI SER UM SELECT ORDENADO POR ID DO BANCO DE DADOS
                            } 

                             $result = $conn->query($sql);                      //$RESULT É A VARIAVEL DE IMPLEMENTAÇÃO DO $SQL 
                        ?>
                                
                            
                            <table class="table">

                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">CEP</th>
                                        <th scope="col">UF</th>
                                        <th scope="col">LOCAL</th>
                                        <th scope="col">BAIRRO</th>
                                        <th scope="col">COMPLEMENTO</th>
                                        <th scope="col">LOGRADOURO</th>
                                        <th scope="col">IBGE</th>
                                        <th scope="col">DDD</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        while($user_data = mysqli_fetch_assoc($result))
                                        {
                                            echo "<tr>";
                                            echo "<td>".$user_data['id']."</td>";
                                            echo "<td>".$user_data['cep']."</td>";
                                            echo "<td>".$user_data['uf']."</td>";
                                            echo "<td>".$user_data['localidade']."</td>";
                                            echo "<td>".$user_data['bairro']."</td>";
                                            echo "<td>".$user_data['complemento']."</td>";
                                            echo "<td>".$user_data['logradouro']."</td>";
                                            echo "<td>".$user_data['ibge']."</td>";
                                            echo "<td>".$user_data['ddd']."</td>";
                                        }
                                    ?>
                                </tbody>

                            </table>
                </div>
            </conteiner>
        </fieldset>
    </form>
 
    <a href="../Index.html"><button class="btn-system" align="center">VOLTAR</button></a>

    <br><br>
    <div class="container text-center">
        <small>Infelizmente não consegui realizar a etapa de Listar por ordem crescente e decrescente do desafio, mas inclui uma barra de pesquisa...</small>
    </div>

</div>
</body>
</html>