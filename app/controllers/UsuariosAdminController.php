<?php

namespace App\Controllers;

use Src\Classes\ClassRender;

use App\Models\UsuariosAdminModel;

class UsuariosAdminController extends UsuariosAdminModel
{

    private $validateFields;
    private $renderAdminLayout;
    private $userModel;
    use \Src\Traits\TraitUrlParser;

    public function __construct()
    {
        $this->validateFields = new \Src\Classes\ClassValidate();

        if (count($this->parseUrl()) == 1) :  $this->renderAdminLayout();
        endif;


        $this->editeUsers();
        $this->editeImg();
        $this->signupUsers();
        $this->deleteMultUser();
    }


    public function renderAdminLayout()
    {
        $this->renderAdminLayout = new ClassRender();
        $this->renderAdminLayout->setTitle("SROB - GERENCIAR USUÁRIOS");
        $this->renderAdminLayout->setDescription("Gestão de Usuários");
        $this->renderAdminLayout->setKeywords("Sistema de gestão e controle de Registro de ocorrências de Bombeiros");
        $this->renderAdminLayout->setAuthor(" - Instituto Médio Politécnico Industrial ALda Lara");
        $this->renderAdminLayout->setDir("usuarios");
        $this->renderAdminLayout->setWelcomeTitle("Painel de Gestão dos Usuários");
        $this->renderAdminLayout->setWelcomeDesc("Painel Responsavél por Gerenciar todos os Usuários Cadastrados no Sistema");
        $this->renderAdminLayout->renderLayoutAdmin();
    }
    //cadastrar usuários
    public function signupUsers()
    {

        global $userCreateDatas, $userFormDatas2, $userFormDatas, $userFormDatas3, $emailNip;
        if (!empty($userCreateDatas['submitUser']) && $userCreateDatas['submitUser'] == 'cadastrar') :
            #validação de campos de usuários
            $this->validateFields->ValidateFields($userFormDatas);
            // $this->validateFields->validateIssetEmail($emailNip);
            $this->validateFields->validateDate($userFormDatas['userDataNasc']);
            $this->validateFields->validateEmail($userFormDatas['userEmail']);
            $this->validateFields->validateConfSenha($userFormDatas['userSenha'], $userFormDatas['userConfSenha']);
            $this->validateFields->validateStrongPassword($userFormDatas['userSenha']);
            $this->validateFields->validateNIP($userFormDatas['userNip']);
            $this->validateFields->validateEmailNip($userFormDatas['userEmail'], $userFormDatas['userNip']);
            //    $this->validateFields->validateUserFileDatas($userFormDatas2['userPhoto']['name'], $userFormDatas2['userPhoto']['tmp_name'], $userFormDatas2['userPhoto']['size'], $userFormDatas2['userPhoto']['error'], $userFormDatas2['path']);
            /*$validateFields->validateDate($userFormDatas2['userDataNasc']);
            $this->validateFields->validatePhoneNumber($userFormDatas2['userTelefone']);
            $this->validateFields->validateNIF($userFormDatas2['userNi$userNip']);
            $this->validateFields->validateNIP($userFormDatas2['userNip']);
            $this->validateFields->validateEmail($userFormDatas2['userEmail']);
            $this->validateFields->validateDate($userFormDatas2['userDataNasc']);
            $this->validateFields->validateIssetEmail($userFormDatas2['userEmail']);
            $this->validateFields->validateConfSenha($userFormDatas2['userSenha'], $userFormDatas2['userConfSenha']);
            $this->validateFields->validateStrongPassword($userFormDatas2['userSenha']);*/

       
            $validateSignupEnd =  $this->validateFields->validateSignupEnd($userFormDatas3['userPhoto']['name'], $userFormDatas3['userPhoto']['tmp_name'], $userFormDatas3['userPhoto']['size'], $userFormDatas3['userPhoto']['error'], $userFormDatas3['path'], $userFormDatas, $userFormDatas2, $userFormDatas3);
           /* var_dump($userFormDatas);
            var_dump($userFormDatas2);
            var_dump($userFormDatas3);
          
            var_dump($validateSignupEnd);*/

           

            if ($validateSignupEnd['returnType']  === 'msgSuccess' && $validateSignupEnd['returnInfo']  === NULL) :

                foreach ($this->validateFields->getMsgSucess() as $success) :
                    $_SESSION['msgUserDatas'] = "<div class='alert alert-success text-center'>" . $success['messageSuccess'] . "</div>";

?>
                    <script>
                        alert("<?php echo $success['messageSuccess']; ?>");
                    </script>
                <?php
                endforeach;


            else :

                foreach ($this->validateFields->getMsg() as $error) :

                    echo $_SESSION['msgUserDatas'] = "<div class='alert alert-danger text-center'>" . $error['message'] . "</div>";
                ?>
                    <script>
                        alert("<?php echo $error['message']; ?>");
                    </script>

                <?php


                endforeach;
            endif;
        endif;
    }
    //Deleção singular
    public function deleteUsers($Id)
    {
        $this->validateFields->validateDeleteUser($Id);
    }
    //Deleção multípla de usuários
    public function deleteMultUser()
    {
        global $idUsers, $deleteUsers;
        if (!empty($idUsers) && !empty($deleteUsers) && $deleteUsers['deleteUsers'] == 'multUsers') :
            if ($this->validateFields->validateDeleteMultUser($idUsers)) :


                foreach ($this->validateFields->getMsgSucess() as $success) :
                ?>
                    <script>
                        alert("<?php echo $success['messageSuccess']; ?>");
                    </script>
                <?php
                    $_SESSION['msgUserDatas'] = "<div class='alert alert-success text-center'>Dados do usuário Editado Com Sucesso!.</div>";

                endforeach;

            else :
                foreach ($this->validateFields->getMsg() as $error) :

                ?>
                    <script>
                        alert("<?php echo $error['message']; ?>");
                    </script>

                <?php
                    echo $_SESSION['msgUserDatas'] = "<div class='alert alert-danger text-center'>" . $error['message'] . "</div>";

                endforeach;

            endif;

        endif;
    }

    //paginação

    public function pagination($pagina_atual, $limitResult){
        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
        $Limite_resultado = $limitResult;
        $inicio  = ($Limite_resultado * $pagina)  - $Limite_resultado;
     //   var_dump($inicio, $Limite_resultado, $pagina);
    }

    //pesquisa Dinámica
    public function searchUsers($search, $order, $limit)

    
    
    {

        global $Limite_resultado, $inicio;


        $userLister = $this->getListUsers($order ?? true, $inicio ?? true, $Limite_resultado ?? true) ?? true;
        $userSearch = $this->getAllUserDatas($search ?? true, $inicio ?? true, $Limite_resultado ?? true, $order ?? true) ?? true;
      
        if (!empty($search)) {
            // Exibe a mensagem de pesquisa
            echo "<tr>
                <td>
                    <div class='alert alert-info'>Exibindo resultados da pesquisa para: " . htmlspecialchars($search) . "</div>
                </td>
            </tr>";
        }
        if (!empty($search)) :

            if (count($userSearch) > 0) :

                foreach ($userSearch as $listSearch) :


                ?>
            

                        <tr class="row" role="row">
                            <td>
                                <button rel="<?php echo $listSearch['id_bombeiro'] ?>" type="button" class="viewUsers btn btn-info btn-sm waves-effect waves-light text-uppercase ">
                                    Detalhar <i class="icofont icofont-eye"></i>
                                </button>
                                <?php if ($_SESSION['permition'] == "admin") : ?>
                                    <button rel="<?php echo $listSearch['id_bombeiro'] ?>" type="button" class="editUsers btn btn-warning btn-sm waves-effect waves-light text-uppercase ">
                                        Editar <i class="icofont icofont-edit"></i>
                                    </button>
                                    <button rel="<?php echo $listSearch['id_bombeiro'] ?>" type="button" class="editeImg btn btn-primary btn-sm waves-effect waves-light text-uppercase ">
                                        Editar Imagem<i class="icofont icofont-picture"></i>
                                    </button>
                                    <button rel="<?php echo $listSearch['id_bombeiro']; ?>" type="button" class="deleteUsers btn btn-danger btn-sm waves-effect waves-light text-uppercase">
                                        Deletar <i class="icofont icofont-trash"></i>
                                    </button>
                                    <input type="checkbox" name="idUsers[]" id="id" value="<?php echo $listSearch['id_bombeiro']; ?>">
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="round-img">
                                    <?php
                                    if ((!empty($listSearch['foto'])) and (!empty($listSearch['path']))) :
                                    ?>
                                        <a href=""><img width="35" src="<?php echo $listSearch['path']; ?>" alt="<?php echo $listSearch['nome']; ?>"></a>
                                    <?php
                                    else :
                                    ?>
                                        <a href=""><img width="35" src="<?php echo  DIRADMINUPLOADS . 'default.png'; ?>" alt="<?php echo $listSearch['nome']; ?>"></a>
                                    <?php
                                    endif; ?>
                                </div>
                            </td>
                            <td><?php echo $listSearch['id_bombeiro']; ?></td>
                                                            <td><?php echo $listSearch['nome']; ?></td>
                                                            <td><?php echo $listSearch['nip']; ?></td>
                                                            <td><?php echo $listSearch['email']; ?></td>
                                                            <td><?php echo $listSearch['idade']; ?></td>
                                                           <!-- <td><?php //echo $listSearch['senha']; ?></td>-->
                                                            <td class="sorting_1"><?php echo $listSearch['patente']; ?></td>
                                                            <td class="sorting_1"><?php echo $listSearch['cargo']; ?></td>
                                                            <td class="sorting_1"><?php echo $listSearch['permissao']; ?></td>
                                                            <td><?php echo $listSearch['status']; ?></td>
                                                            <td><?php echo date("d-m-Y H:i:s", strtotime($listSearch['data_creation'])); ?></td>
                                                            <td><?php echo $listSearch['data_modified'] ?></td>
                        </tr>
                    <?php
                endforeach;


            else :
                echo "<tr>
                    <td>
                        <div class='alert alert-danger'><i class='fa fa-database'></i> Nenhum  Dado Cadastrado!</div>
                    </td>
                </tr>";
                $_SESSION['msgUserDatas'] = "<tr>
                    <td>
                        <div class='alert alert-danger'><i class='fa fa-database'></i> Nenhum  Dado Cadastrado!</div>
                    </td>
                </tr>";

            endif;
        else :
            // Exibe todos os usuários
            if (count($userLister) > 0) :
                foreach ($userLister as $listUsers) :
                    ?>
                        <tr class="even" role="row">
                            <td>
                                <button rel="<?php echo $listUsers['id_bombeiro'] ?>" type="button" class="viewUsers btn btn-info btn-sm waves-effect waves-light text-uppercase ">
                                    Detalhar <i class="icofont icofont-eye"></i>
                                </button>
                                <?php if ($_SESSION['permition'] == "admin") : ?>
                                    <button rel="<?php echo $listUsers['id_bombeiro'] ?>" type="button" class="editUsers btn btn-warning btn-sm waves-effect waves-light text-uppercase ">
                                        Editar <i class="icofont icofont-edit"></i>
                                    </button>
                                    <button rel="<?php echo $listUsers['id_bombeiro'] ?>" type="button" class="editeImg btn btn-primary btn-sm waves-effect waves-light text-uppercase ">
                                        Editar Imagem<i class="icofont icofont-picture"></i>
                                    </button>
                                    <button rel="<?php echo $listUsers['id_bombeiro']; ?>" type="button" class="deleteUsers btn btn-danger btn-sm waves-effect waves-light text-uppercase">
                                        Deletar <i class="icofont icofont-trash"></i>
                                    </button>
                                    <input type="checkbox" name="idUsers[]" id="id" value="<?php echo $listUsers['id_bombeiro']; ?>">
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="round-img">
                                    <?php
                                    if ((!empty($listUsers['foto'])) and (!empty($listUsers['path']))) :
                                    ?>
                                        <a href=""><img width="35" src="<?php echo $listUsers['path']; ?>" alt="<?php echo $listUsers['nome']; ?>"></a>
                                    <?php
                                    else :
                                    ?>
                                        <a href=""><img width="35" src="<?php echo  DIRADMINUPLOADS . 'default.png'; ?>" alt="<?php echo $listUsers['nome']; ?>"></a>
                                    <?php
                                    endif; ?>
                                </div>
                            </td>
                            <td><?php echo $listUsers['id_bombeiro']; ?></td>
                                                            <td><?php echo $listUsers['nome']; ?></td>
                                                            <td><?php echo $listUsers['nip']; ?></td>
                                                            <td><?php echo $listUsers['email']; ?></td>
                                                            <td><?php echo $listUsers['idade']; ?></td>
                                                          <!--  <td><?php //echo $listUsers['senha']; ?></td>-->
                                                            <td class="sorting_1"><?php echo $listUsers['patente']; ?></td>
                                                            <td><?php echo $listUsers['cargo']; ?></td>
                                                            <td><?php echo $listUsers['permissao']; ?></td>
                                                            <td><?php echo $listUsers['status']; ?></td>
                                                            <td><?php echo date("d-m-Y H:i:s", strtotime($listUsers['data_creation'])); ?></td>
                                                            <td><?php echo $listUsers['data_modified'] ?></td>


            <?php


                endforeach;
            else :
                echo "<tr>
                    <td>
                        <div class='alert alert-danger'><i class='fa fa-database'></i> Nenhum  Dado Cadastrado!</div>
                    </td>
                </tr>";
                $_SESSION['msgUserDatas'] = "<tr>
                    <td>
                        <div class='alert alert-danger'><i class='fa fa-database'></i> Nenhum  Dado Cadastrado!</div>
                    </td>
                </tr>";



            endif;


        endif;


        // Limpar mensagens de erro da sessão após exibição
        if (isset($_SESSION['msgUserDatas'])) :
            echo $_SESSION['msgUserDatas'];
            unset($_SESSION['msgUserDatas']);
        endif;
        //endif;



    }

    //selecionar dados para edição
    public function selectImg($id)
    {

        global $userSearchFormDatas, $idUpdateUsers, $oldImgUser,  $userCustomFileName, $userPhoto;
        //var_dump($idUpdateUsers, $oldImgUser);
        foreach ($this->getFindUsers($id) as $listUsers) :

            ?>
            <form name="userForm" id="userForm" action="gerenciar-Usuarios" method="post" enctype="multipart/form-data">

                <fieldset>
                    <legend>
                        <i class="icofont icofont-ui-user"></i> Dados Usuários
                    </legend>
                    <div class="card p-10">
                        <div class="card-body">
                            <input type="hidden" name="oldImgUser" id="oldImgUser" value="<?php echo $listUsers['foto']; ?>">

                            <input type="hidden" name="idUpdateUsers" id="idUpdateUsers" value="<?php echo $listUsers['id_bombeiro'];
                                                                                                ?>">

                            <div class="form-group row">
                                <label for="<?php echo $listUsers['nome']; ?>" class="col-sm-3 col-form-label"><i class="icofont icofont-picture"></i>Foto de Perfil Atual</label>

                                <div class="col-sm-9">
                                    <?php

                                    if ((!empty($listUsers['foto'])) && (!empty($listUsers['path']))) :

                                    ?>
                                        <a href=""><img width="150" height="150" style="border: 1px solid black;" src="<?php echo $listUsers['path']; ?>" class="img-circle" alt="<?php echo $listUsers['nome']; ?>"></a>

                                    <?php
                                    else :
                                    ?>
                                        <a href=""><img width="150" height="150" style="border: 1px solid black; " src="<?php echo  DIRADMINUPLOADS . 'default.png'; ?>" class="img-circle" alt="<?php echo $listUsers['nome']; ?>"></a>

                                    <?php
                                    endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="<?php echo $listUsers['nome']; ?>" class="col-sm-3 col-form-label"><i class="icofont icofont-picture"></i>Selecione Nova Foto</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" value="<?php  ?>" name="userPhoto" id="userPhoto" placeholder="Imagem de Perfil">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 text-center">
                                    <button type="submit" name="submitUser" value="editarImg" class="btn btn-primary form-control" style="font-weight: bold;"><i class="icofont icofont-police-car-alt-1"></i> Editar <i class="icofont icofont-ui-user-group"></i> Foto de Usuários <i class="icofont icofont-fire-extinguisher"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- Adicione mais campos conforme necessário -->
                    </div>
                </fieldset>
            </form>
        <?php

        endforeach;
    }
    //selecionar dados para edição
    public function selectUsers($id)
    {

        global $userSearchFormDatas, $idUpdateUsers, $oldImgUser, $userName, $userEmail, $userNip, $userDataNasc, $userCargo, $userPatente, $userSenha, $userConfSenha, $userPermissao, $userStatus, $userCustomFileName;

        foreach ($this->getFindUsers($id) as $listUsers) :
        ?>
            <form name="userForm" id="userForm" action="gerenciar-Usuarios" method="post" enctype="multipart/form-data">

                <fieldset>
                    <legend>
                        <i class="icofont icofont-ui-user"></i> Dados Usuários
                    </legend>
                    <div class="card p-10">
                        <div class="card-body">

                            <input type="hidden" name="idUpdateUsers" id="idUpdateUsers" value="<?php echo $listUsers['id_bombeiro'];
                                                                                                ?>">

                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label"><i class="icofont icofont-user"></i>Nome</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="userName" id="userName" value="<?php if (isset($userName)) : echo $userName;
                                                                                                                    elseif (isset($listUsers['nome'])) :  echo $listUsers['nome'];
                                                                                                                    endif; ?>" maxlength="45" placeholder="Nome">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label"><i class="icofont icofont-id-card"></i>NIP</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="userNip" id="userNip" value="<?php if (isset($userNip)) : echo $userNip;
                                                                                                                elseif (isset($listUsers['nip'])) :  echo $listUsers['nip'];
                                                                                                                endif; ?>" maxlength="9" placeholder="NIP">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label"><i class="icofont icofont-email"></i>Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="userEmail" id="userEmail" value="<?php if (isset($userEmail)) : echo $userEmail;
                                                                                                                    elseif (isset($listUsers['email'])) :  echo $listUsers['email'];
                                                                                                                    endif; ?>" maxlength="80" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label"><i class="icofont icofont-user"></i>Data Nascimento</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="userDataNasc" id="userDataNasc" value="<?php if (isset($userDataNasc)) : echo $userDataNasc;
                                                                                                                            elseif (isset($listUsers['idade'])) :  echo $listUsers['idade'];
                                                                                                                            endif;; ?>" maxlength="45" placeholder="Data Nascimento">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label"><i class="icofont icofont-ui-password"></i>Senha</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="userSenha" id="userConfSenha" value="<?php if (isset($userSenha)) : echo $userSenha;
                                                                                                                            elseif (isset($listUsers['senha'])) :  echo $listUsers['senha'];
                                                                                                                            endif;; ?>" maxlength="45" placeholder="Insira sua Senha">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label"><i class="icofont icofont-ui-password"></i>Confirmar Senha</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="userConfSenha" id="userConfSenha" value="<?php if (isset($userConfSenha)) : echo $userConfSenha;
                                                                                                                                elseif (isset($listUsers['senha'])) :  echo $listUsers['senha'];
                                                                                                                                endif; ?>" maxlength="45" placeholder="Confirmar Senha">
                                </div>
                            </div>
                            <?php if ($_SESSION['permition'] == "admin") : ?>

                                <div class="form-group row">
                                    <label for="genero" class="col-sm-3 col-form-label"><i class="icofont icofont-police-badge"></i>Patente</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="userPatente" id="userPatente">
                                            <option value="Iº Agente">Iº Agente</option>
                                            <option value="IIº Agente">IIº Agente</option>
                                            <option value="IIIº Agente">IIIº Agente</option>
                                            <option value="Iº Sargento">Iº Sargento</option>
                                            <option value="IIº Sargento">IIº Sargento</option>
                                            <option value="IIIº sargento">IIIº sargento</option>
                                            <option value="sub-tendente">sub-tendente</option>
                                            <option value="tendente">tendente</option>
                                            <option value="superitendente">superitendente</option>
                                            <option value="Iº comissário">Iº comissário</option>
                                            <option value="sub-comissário">sub-comissário</option>
                                            <option value="comissário-chefe">comissário-chefe</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="genero" class="col-sm-3 col-form-label"><i class="icofont icofont-police-cap"></i>Cargo</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="userCargo" id="userCargo">
                                            <option value="Comandante">Comandante</option>
                                            <option value="Gerente de Operações">Gerente de Operações</option>
                                            <option value="Coordenador de Equipes">Coordenador de Equipes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Permissao" class="col-sm-3 col-form-label"><i class="icofont icofont-support"></i>Permissão</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="userPermissao" id="userPermissao">
                                            <option value="admin">Administrador</option>
                                            <option value="operador">Operador</option>
                                            <option value="coordenador">Coordenador</option>


                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><i class="icofont icofont-radio-active"></i>Estado</label>
                                    <div class="col-sm-9">

                                        <label class="custom-control custom-radio">
                                            <input id="Masculino" name="userStatus" value="Ativo" type="radio" checked class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Ativo</span>
                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input id="Feminino" name="userStatus" value="Inativo" type="radio" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Inativo</span>
                                        </label>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="form-group row">
                                <div class="col-sm-12 text-center">
                                    <button type="submit" name="submitUser" value="editar" class="btn btn-primary form-control" style="font-weight: bold;"><i class="icofont icofont-police-car-alt-1"></i> Editar <i class="icofont icofont-ui-user-group"></i> Usuários <i class="icofont icofont-fire-extinguisher"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- Adicione mais campos conforme necessário -->
                    </div>
                </fieldset>
            </form>
            <?php

        endforeach;
    }
    //editar dados de usuários
    public function editeUsers()
    {
        global $userFormDatas, $userFormDatas2;
        if (!empty($userFormDatas2) && $userFormDatas2['submitUser'] == 'editar') :

            $validateUpdateUsers =   $this->validateFields->validateUpdateUsers($userFormDatas, $userFormDatas2);
            var_dump($validateUpdateUsers);

            if ($validateUpdateUsers === TRUE) :

                foreach ($this->validateFields->getMsgSucess() as $success) :
            ?>
                    <script>
                        alert("<?php echo $success['messageSuccess']; ?>");
                    </script>
                <?php
                    $_SESSION['msgUserDatas'] = "<div class='alert alert-success text-center'>" . $success['messageSuccess'] . "</div>";

                endforeach;

            else :
                foreach ($this->validateFields->getMsg() as $error) :

                ?>
                    <script>
                        alert("<?php echo $error['message']; ?>");
                    </script>

                <?php
                    echo $_SESSION['msgUserDatas'] = "<div class='alert alert-danger text-center'>" . $error['message'] . "</div>";

                endforeach;

            endif;
        endif;
    }
    //editar Imagem Usuárioss
    public function editeImg()
    {
        global  $userFormDatas2, $userDatasImg;
        if (!empty($userFormDatas2['submitUser']) && $userFormDatas2['submitUser'] == 'editarImg') :
            
            //var_dump($userDatasImg);
            $validateUpdateUsers =   $this->validateFields->validateUpdateImg($userDatasImg['userPhoto']['name'], $userDatasImg['userPhoto']['tmp_name'], $userDatasImg['userPhoto']['size'], $userDatasImg['userPhoto']['error'], $userFormDatas2['path'], $userDatasImg);
            // var_dump($validateUpdateUsers);

            if ($validateUpdateUsers === TRUE) :

                foreach ($this->validateFields->getMsgSucess() as $success) :
                ?>
                    <script>
                        alert("<?php echo $success['messageSuccess']; ?>");
                    </script>
                <?php
                    $_SESSION['msgUserDatas'] = "<div class='alert alert-success text-center'>" . $success['messageSuccess'] . "</div>";

                endforeach;

            else :
                foreach ($this->validateFields->getMsg() as $error) :

                ?>
                    <script>
                        alert("<?php echo $error['message']; ?>");
                    </script>

            <?php
                    echo $_SESSION['msgUserDatas'] = "<div class='alert alert-danger text-center'>" . $error['message'] . "</div>";

                endforeach;

            endif;
        endif;
    }
    //visualizar Detalhes de usuários
    public function viewDetailsUsers($id)
    {

        foreach ($this->getFindUsers($id) as $findUsers) :
            ?>
            <dt class="col-sm-3">FotoPerfil</dt>
            <dd class="col-sm-9"><span id="FotoPerfil">
                    <?php

                    if ((!empty($findUsers['foto'])) and (!empty($findUsers['path']))) :

                    ?>
                        <img width="150" height="150" style="border: 1px solid black; " src="<?php echo $findUsers['path'] ?? true; ?> " class="img-circle" alt="<?php echo $findUsers['nome']; ?>">


                    <?php
                    else :
                    ?>
                        <a href=""><img width="150" height="150" style="border: 1px solid black; " src="<?php echo  DIRADMINUPLOADS . $findUsers['foto']; ?>" class="img-circle" alt="<?php echo $findUsers['nome']; ?>"></a>

                    <?php
                    endif; ?>
                </span>

            </dd>

            <dt class="col-sm-3">ID</dt>
            <dd class="col-sm-9"><span id="idUsuario"><?php echo $findUsers['id_bombeiro'] ?></span></dd>
            <dt class="col-sm-3">Nome</dt>
            <dd class="col-sm-9"><span id="Nome"><?php echo $findUsers['nome'] ?></span></dd>

            <dt class="col-sm-3">Email</dt>
            <dd class="col-sm-9"><span id="Email"><?php echo $findUsers['email']; ?></span></dd>

            <dt class="col-sm-3">NIP</dt>
            <dd class="col-sm-9"><span id="NIP"><?php echo $findUsers['nip'] ?></span></dd>

            <dt class="col-sm-3">Nascimento</dt>
            <dd class="col-sm-9"><span id="Nascimento"><?php echo $findUsers['idade'] ?></span></dd>

            <dt class="col-sm-3">Cargo</dt>
            <dd class="col-sm-9"><span id="cargo"><?php echo $findUsers['cargo'] ?></span></dd>
            <dt class="col-sm-3">Patente</dt>
            <dd class="col-sm-9"><span id="patente"><?php echo $findUsers['patente'] ?></span></dd>

            <dt class="col-sm-3">Permissão</dt>
            <dd class="col-sm-9"><span id="Permissao"><?php echo $findUsers['permissao'] ?></span></dd>

            <dt class="col-sm-3">Status</dt>
            <dd class="col-sm-9"><span id="Status"><?php echo $findUsers['status'] ?></span></dd>


            <dt class="col-sm-3">Patente</dt>
            <dd class="col-sm-9"><span id="patente"><?php echo $findUsers['patente'] ?></span></dd>
            <dt class="col-sm-3">DataCreation</dt>
            <dd class="col-sm-9"><span id="DataCreation"><?php echo $findUsers['data_creation'] ?></span></dd>

            <dt class="col-sm-3">DataModification</dt>
            <dd class="col-sm-9"><span id="DataModification"><?php echo $findUsers['data_modified'] ?></span></dd>

        <?php
        endforeach;
    }
}
    /*
    public function truncateUsers($tableName){
        $this->validateFields->validateTruncateUsers($tableName);
    }*/