<?php

namespace App\Controllers;

use Src\Classes\ClassRender;
use App\Models\LoginAdminModel;

class LoginAdminController extends LoginAdminModel
{
    private $validateFields;
    private $renderAdminLayout;
    private $passwordVerify;
    public function __construct()
    {
        $this->renderAdminLayout();
        $this->siginValidateUser();
    }
    public function renderAdminLayout()
    {

        $this->renderAdminLayout = new ClassRender();
        $this->renderAdminLayout->setTitle(" SIGPOL - Tela de Acesso Administrativo");
        $this->renderAdminLayout->setDescription("Acessa o Administrativo do Portal");
        $this->renderAdminLayout->setKeywords("Gestão Populacional, Nacional, portal de denúncias, cadastro de desaparecidos e comentários públicos");
        $this->renderAdminLayout->setAuthor("Candimba Tecnologia");
        $this->renderAdminLayout->setDir("login/");
        $this->renderAdminLayout->RenderLayoutLoginNovaSenhaAdmin();
    }

    public function siginValidateUser()
    {

        global $userFormDatasLogin, $submitUserLogin;
        if (!empty($submitUserLogin)) {
            $this->validateFields = new \Src\Classes\ClassValidate();
            $this->validateFields->validateFields($userFormDatasLogin);
            //$this->validateFields->validateIssetEmail($userFormDatasLogin['userEmailNipLogin'], "login");
            //$this->validateFields->validateEmail($userFormDatasLogin['userEmailNipLogin']);
            //$this->validateFields->validateNiP($userFormDatasLogin['userEmailNipLogin']);
            //$this->validateFields->validateStrongPassword($userFormDatasLogin['userSenhaLogin']);
            $this->passwordVerify =  $this->validateFields->validatePasswordHashDB($userFormDatasLogin['userEmailNipLogin'], $userFormDatasLogin['userSenhaLogin']);
            #$this->validateFields->validateAtiveUser($userFormDatasLogin['userEmailLogin']);
            $this->validateFields->validateAttemptSignIn();
            $validateSignInEnd = $this->validateFields->validateSignInEnd($userFormDatasLogin['userEmailNipLogin']);

            if ($validateSignInEnd['returnType']  === 'success' && $validateSignInEnd['page']  === 'painel-Admin') :
                foreach ($this->validateFields->getMsg() as $success) :
                    $_SESSION['msgUsers'] = "<div class='alert alert-success text-center'>Usuário Logado Com Sucesso.</div>";

                ?>

                    <script>
                        alert("<?php echo $success['messageSuccess']; ?>");
                    </script>
                <?php
                endforeach;
            else :

                foreach ($this->validateFields->getMsg() as $error) {

                    echo     $_SESSION['msgUsers'] = "<div class='alert alert-danger text-center'>" . $error['message'] . "</div>";
                ?>
                    <script>
                        alert("<?php echo $error['message']; ?>");
                    </script>

                <?php

                }
            endif;


            if (!empty(isset($_SESSION['email'])) && $validateSignInEnd['returnType'] === "success") {
                if ($this->passwordVerify) {
                    // Redirecionar para o painel de administração
                    header("Location: " . DIRPAGE . "painel-Admin");
                    exit();
                }
            }

            /* echo "<script>document.getElementById('userFormDatasLogin').addEventListener('submit', function(event) {
        event.preventDefault();
           
                   let response = $json;
                    if (response.returnType === 'success') {
                        window.location.href = response.page;
                    } else {
                        if (response.attempts === true) {
                            $('.form').hide();
                        }
                        $('.resultado').empty();
                    }
        });</script>";*/
            // echo var_dump($user);
        }
    }
}
