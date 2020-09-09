<?php
    require_once '../classes/usuarios.php';
    $u = new Usuario;
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <title>
            Bora jogar? - Entre ou cadastre-se
        </title>
        <link rel="icon" type="image/png" sizes="32x32" href="https://cdn.discordapp.com/attachments/690023297727201317/720356110313324585/logo3.png">
        <script src="https://kit.fontawesome.com/b087df3b46.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../puplic/login.css">
    </head>
<body>
    <div class="container">
        <div class="content first-content">
            <div class="first-column">
                <h2 class="title title-primary">Bem Vindo</h2>
                <p class="description description-primary">Faça seu login!</p>
                <button id="signin" class="btn btn-primary">ENTRAR</button>
            </div>    
            <div class="second-column">
                <h2 class="title title-second">Crie sua conta</h2>
                <div class="social-media">
                    <ul class="list-social-media">
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-facebook-f"></i>        
                            </li>
                        </a>
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-twitter"></i>
                            </li>
                        </a>
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-google-plus-g"></i>
                            </li>
                        </a>
                    </ul>
                </div>                               <!-- social media -->
                <p class="description description-second">Ou use seu e-mail para se registrar:</p>
               
                <form class="form" method="POST">
                    <label class="label-input" for="">
                        <i class="far fa-user icon-modify"></i>
                        <input type="text" name="nome" required placeholder="Usuario" maxlength="30">
                    </label>
                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" name="email" required placeholder="E-mail" maxlength="50">
                    </label>
                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input id="senha" name="senha" type="password" required placeholder="Senha" minlength="8" maxlength="20">
                    </label>
                    <label class="label-input" for="">
                        <i class="fas fa-check-square icon-modify"></i>
                        <input id="confirma-senha" name="confSenha" type="password" required placeholder="Confirme sua senha">
                    </label>
                    <button type="submit" name="botao-1" class="btn btn-second">Registrar-se</button>        
                </form>
                <?php
                //verificar se clicou no botao
                if(isset($_POST['nome']))
                {
                    $nome = addslashes($_POST['nome']);
                    $email = addslashes($_POST['email']);
                    $senha = addslashes($_POST['senha']);
                    $confirmarSenha = addslashes($_POST['confSenha']);
                    //verificar se esta preenchido
                    if(!empty($nome) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
                    {
                        $u->conectar("projetopuczinha","mysql380.umbler.com","gevert","Testeteste123*");
                        if($u->msgErro == "")//se esta tudo ok
                        {
                            if($senha == $confirmarSenha)
                            {
                                if($u->cadastrar($nome,$email,$senha))
                                {
                                    ?>
                                    <div class="msg-sucesso">
                                        Cadastrado com sucesso! Acesse para entrar!
                                    </div>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <div class="msg-erro">
                                        Email ja cadastrado!
                                    </div>
                                    <?php
                                }
                            }
                            else
                            {
                                ?>
                                <div class="msg-erro2">
                                    As senhas não coincidem!
                                </div>
                                <?php
                            }
                        }
                        else
                        {
                            ?>
                            <div class="msg-erro">
                                <?php echo "Erro: ".$u->msgErro;?>
                            </div>
                            <?php
                        }
                    }else
                    {
                        ?>
                        <div class="msg-erro3">
                            Preencha todos os campos!
                        </div>
                        <?php
                    }
                }
                ?>
            </div>                               <!-- second column -->
        </div>                                   <!-- first content -->
        <div class="content second-content">
            <div class="first-column">
                <h2 class="title title-primary">Olá, player!</h2>
                <p class="description description-primary">Comece sua jornada conosco</p>
                <button id="signup" class="btn btn-primary">Criar Conta</button>
            </div>
            <div class="second-column">
                <h2 class="title title-second">Faça login</h2>
                <div class="social-media">
                    <ul class="list-social-media">
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-facebook-f"></i>        
                            </li>
                        </a>
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-twitter"></i>
                            </li>
                        </a>
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-google-plus-g"></i>
                            </li>
                        </a>
                    </ul>
                </div><!-- social media -->
                <p class="description description-second">Ou use seu e-mail para entrar:</p>
                <form class="form" method="POST" action="">
                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" name="email-login" required placeholder="E-mail">
                    </label>
                
                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" name="senha-login" required placeholder="Senha">
                    </label>
                    <div class="forgot">
                        <a class="password" href="#">Esqueceu sua senha?</a>
                        <button href="" type="submit" name="botao-2" class="btn btn-second">Entrar</button>
                    </div>
                </form>
                <?php
                    //verificar se clicou no botao
               
                    if(isset($_POST['botao-2'])){
                       
                        $email2 = addslashes($_POST['email-login']);
                        $senha2 = addslashes($_POST['senha-login']);


                        if(!empty($email2) && !empty($senha2))
                        {
                            $u->conectar("projeto","localhost","root","");
                            
                            if($u->msgErro == "")
                            {
                                
                                if($u->logar($email2,$senha2))
                                {
                                    echo "<script>window.location.href = 'http://localhost:5000/inicio';</script>";

                                } else {
                                    ?> <div class="msg-erro3">
                                    Email ou senha incorretos!
                                </div>
                                <?php
                                }
                            } else {
                                
                                echo "Erro: ".$u->msgErro;
                            }   
                        } else {
                            
                            echo "Todos os campos são necessários";
                        }    
                    } ?>
            </div><!-- second column -->
        </div><!-- second-content -->
    </div>
    <script src="../puplic/login.js"></script>
</body>
</html>

