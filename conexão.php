<?php
#dados para conexão

$servidor = '170.75.153.42';
$usuario = 'sadbsi_testes';
$senhaa = '93244269';
$banco = 'sadbsi_testes';

#Executa a conexao com o mysql
$lig = @mysql_connect($servidor, $usuario, $senhaa, $banco) or die('N«ªo foi poss«¿vel conectar! '.mysql_error());

#Seleciona o banco de dados que deseja utilizar
$select = @mysql_select_db($banco);


    if($_REQUEST["acao"] == "cadastrar")
    {
        $sql = "INSERT INTO perfil (nome, tipo, cpf, senha, entrada) VALUES(";
        $sql .= "'".$_REQUEST["nome"]."',";
        $sql .= "'".$_REQUEST["tipo"]."',";
        $sql .= "'".$_REQUEST["cpf"]."',";
        $sql .= "'".md5($_REQUEST["senha"])."',";
        $sql .= "'".$_REQUEST["data"]."'";
        $sql .= ")";
        
        $result = mysql_query($sql);
        
        if(!$result)
        {
            die('Erro:'.mysql_error());
        }
        else
        {
            echo '<h2>Cadastrado com sucesso!</h2><hr>
            
            <a href="javascript:history.back(1)">Voltar</a>';
        }   
    }
?>
