<?php
session_start();
require_once './classes/conexao.php';
require_once './classes/login.php';

if (isset($_POST['Entrar'])):

    $login = filter_input(INPUT_POST, "login", FILTER_SANITIZE_MAGIC_QUOTES);
    $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_MAGIC_QUOTES);
    $f = new Login;
    $f->setLogin($login);
    $f->setSenha(md5($senha));
    
    if ($f->logar()):
        header('Location: logado.php');
    else:
         $erro ="Erro ao logar!";
    endif;
endif;   ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Sistema de Apoio a Dependência">
  <title>SAD - Sistema de Apoio à Dependencia</title>
  <script>
            //MASCARAMENTO
            function formatar(mascara, documento) {
                var i = documento.value.length;
                var saida = mascara.substring(0, 1);
                var texto = mascara.substring(i)
                if (texto.substring(0, 1) != saida) {
                    documento.value += texto.substring(0, 1);
                }
            }
   </script>
  <!-- Bootstrap core CSS -->
  <link href="./css/bootstrap.css" rel="stylesheet">
  <link href="./css/style.css" rel="stylesheet">
  
   <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>

  <nav class="navbar navbar-default" role="navigation">
    <div class="container">
      <div class="navbar-header">
       <img src="img/Sad_logo.png" border="0"  width="200" height="90"/><!-- ALTERADO-> <a href="#" class="navbar-brand">Alterar</a> -->
      </div>
    </div>
  </nav>

  <div class="wrapper" role="main">
    <div class="container">
      <div class="row">
        <div id="apresentacao" class="col-xs-12 col-sm-8 col-md-9">
          <h3><p><marquee BEHAVIOR="ALTERNATE" direction="right" widht="100" height="90" scrollamount="10" ><font size="3" COLOR="#A9A9A9">SAD - Sistema Acadêmico</font></marquee></p></h3>
        </div>
        
        <div id="form_login" class="col-xs-12 col-sm-4 col-md-3">
          <form method="post" action="" class="form signin" role="form">
            <h2 class="form-signin-heading">Login</h2>
            <div class="input-group">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-user"></span>
              </span>
              <input class="form-control" type="login" id="input_login" placeholder="Login" name="login" maxlength="14" onkeypress="formatar('###.###.###-##', this);" required="" />
            </div>

            <div class="input-group">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-lock"></span>
              </span>
              <input class="form-control" type="password" id="input_senha" name="senha" maxlength="11" placeholder="Senha" required="">
            </div>
            
            <br />

            <button class="btn btn-primary pull-left"  name="Entrar" type="submit" value="Entrar" >Entrar</button>
            <p><a href="cadastro.php">Cadastre-se</a>
          </form>
          <?php echo isset($erro) ? $erro : ''; ?>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-3 col-md-6">
          <h5><p>Sad - Sistema de Apoio à Dependência<br />Fone: (61) 0000-0000 Fax: (61) 0000-0000<br />Taguatinga-DF</p></h5>
        </div>

        <div id="logoFooter" class="col-xs-12 col-sm-6 col-md-6 col-md-offset-6 col-md-3">
          <img src="img/Sad_logo.png" border="0"  width="130" height="110"/>
        </div>
      </div>
    </div>
  </footer>

  <div class="copyright">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p><span class="glyphicon glyphicon-copyright-mark"></span> Todos os Direitos Reservados</p>
        </div>
      </div>
    </div>
  </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="js/bootstrap.js"></script>
  </body>
</html>
