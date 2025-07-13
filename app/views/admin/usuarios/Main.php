<?php

use App\Models;

if ($_SESSION['permition'] == "admin" || $_SESSION['permition'] == "operador" || $_SESSION['permition'] == "coordenador") : ?>
    <!-- 1-3-block row start -->
    <?php

    global $hashSenha, $idUpdate, $searchUsers, $userSearchFormDatas, $userCreateDatas, $userFormDatas, $userFormDatas2, $userName, $userEmail, $userNip, $userDataNasc, $userCargo, $userPatente, $userSenha, $userConfSenha, $userPermissao, $userStatus, $userCustomFileName;
    //var_dump($userSearchFormDatas, $searchUsers, $userFormDatas, $userCreateDatas, $userFormDatas2, $hashSenha) 
    $users = new Models\UsuariosAdminModel();

    global $Limite_resultado, $inicio, $pagina;
   // var_dump($Limite_resultado, $inicio, $pagina);
    $userCount = $users->usuariosTotal();
    $userDatas = $users->getEmail($_SESSION['email']);
    $userSearch = $users->getAllUserDatas($userSearchFormDatas['searchUsers'] ?? true, $inicio ?? true, $Limite_resultado ?? true, $userSearchFormDatas['orderUsers'] ?? true);
    $userLister = $users->getListUsers($userSearchFormDatas['orderUsers'] ?? true, $inicio ?? true, $Limite_resultado ?? true);


    ?>
    <div class="row">

        <!-- Formulário Unificado -->
        <div class="col-lg-12">
            <div class="card" style="background-color: #f9f9f9; padding: 20px; ">
                <div class="card-header" style="background-color: #39444E; color: #fff; margin-bottom: 40px;">
                    <h5 class="card-header-text" style="font-family: 'Arial', sans-serif; font-weight: bold;"><i class="icofont icofont-fire-truck"></i> Registro de Ocorrência de Bombeiros <i class="icofont icofont-fire-extinguisher-alt"></i></h5>
                </div>
                <div class="card-body">

                    <fieldset>
                        <h5 class="card-text">
                            <legend><i class="icofont icofont-user"></i> Perfil Usuário</legend>
                        </h5>
                        <div class="col-lg-12">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body text-center">
                                </div>
                            </div>
                            <div class="card">
                                <?php
                                if (count($userDatas) > 0) :
                                    foreach ($userDatas as $user) : extract($user); ?>

                                        <fieldset>
                                            <div class="user-block-2">
                                                <img width="200" height="200" class="img-circle" src="<?php echo $path; ?>" alt="">
                                                <h6><?php echo $nome; ?></h6>
                                            </div>
                                            <div class="card-block">
                                                <div class="user-block-2-activities">
                                                    <div class="user-block-2-active">
                                                        <h5 class="card-text">
                                                            <legend><i class="ti-user"></i> Dados Pessoais</legend>
                                                        </h5>
                                                        <hr>
                                                        <!-- Informações adicionais -->
                                                        <!-- NIP e email -->
                                                        <p class="card-text"><i class="ti-user"></i><strong>Nome:</strong> <?php echo $nome; ?></p>
                                                        <p class="card-text"><i class="ti-credit-card"></i><strong>NIP:</strong><?php echo $nip; ?></p>
                                                        <p class="card-text"><i class="ti-email"></i><strong>Email:</strong> <?php echo $email; ?></p>
                                                        <p class="card-text"><i class="ti-agenda"></i><strong>Nascimento:</strong> <?php echo $idade; ?></p>
                                                        <p class="card-text"><i class="ti-id-badge"></i><strong>Patente:</strong> <?php echo $patente; ?></p>
                                                        <p class="card-text"><i class="ti-clipboard"></i><strong>Cargo:</strong> <?php echo $cargo; ?></p>
                                                        <p class="card-text"><i class="ti-key"></i><strong>Permissão:</strong> <?php echo $permissao; ?></p>
                                                        <p class="card-text"><i class="ti-stats-up"></i><strong>Estado:</strong> <?php echo $status; ?></p>
                                                        <!-- Data de criação e modificação -->
                                                        <p class="card-text"><i class="ti-calendar"></i><strong>Criado em:</strong><?php echo $data_creation; ?></p>
                                                        <p class="card-text"><i class="ti-time"></i><strong>Modificado em:</strong><?php echo $data_modified; ?></p>
                                                    </div>
                                                </div>



                                                <?php if ($_SESSION['permition'] == "admin" || $_SESSION['permition'] == "operador" || $_SESSION['permition'] == "coordenador") : ?>
                                                    <div class="text-center">
                                                        <!-- <button rel="<?php echo $id_bombeiro ?>" type="button" class="pdfUsers btn btn-dark btn-sm waves-effect waves-light text-uppercase ">
                                                            Gerar PDF <i class="icofont icofont-file-pdf"></i>
                                                        </button>
                                                        <a rel="relatorio-Usuarios" href="relatorio-Usuarios/getRelatorio" target="_blank"  type="button" class="pdfUsers btn btn-outline-danger btn-sm waves-effect waves-light text-uppercase ">Gerar PDF <i class="icofont icofont-file-pdf"></i></a>
                                                        <a rel="relatorio-Usuarios" href="relatorio-Usuarios" target="_blank"  type="button" class="exelUsers btn btn-outline-success btn-sm waves-effect waves-light text-uppercase ">Gerar EXCEL <i class="icofont icofont-file-excel"></i></a>

                                                         <button rel="<?php echo $id_bombeiro ?>" type="button" class="excelUsers btn btn-outline-success btn-sm waves-effect waves-light text-uppercase ">
                                                            Gerar EXCEL <i class="icofont icofont-file-excel"></i>
                                                        </button>
                                                    <a rel="relatorio-Usuarios" href="relatorio-Usuarios?pesquisarUsuarios=<?php if (isset($searchUsers)) : echo $searchUsers;
                                                                                                                            endif; ?>" target="_blank"  type="button" class="pdfUsers btn btn-outline-danger btn-sm waves-effect waves-light text-uppercase ">Gerar PDF <i class="icofont icofont-file-pdf"></i></a>                                             
                                                    -->
                                                        <button rel="<?php echo $id_bombeiro ?>" target="_blank" type="button" class="pdfUsers btn btn-outline-danger btn-sm waves-effect waves-light text-uppercase ">
                                                            Gerar PDF<i class="icofont icofont-file-pdf"></i>
                                                        </button>

                                                        <button rel="<?php echo $id_bombeiro ?>" type="button" class="excelUsers btn btn-outline-success btn-sm waves-effect waves-light text-uppercase ">
                                                            Gerar EXCEL<i class="icofont icofont-file-excel"></i>
                                                        </button>

                                                        <button rel="<?php echo $id_bombeiro ?>" type="button" class="viewUsers btn btn-info btn-sm waves-effect waves-light text-uppercase ">
                                                            Detalhar <i class="icofont icofont-eye"></i>
                                                        </button>
                                                        <button rel="<?php echo $id_bombeiro; ?>" type="button" class="editUsers btn btn-warning btn-sm waves-effect waves-light text-uppercase">
                                                            Editar <i class="icofont icofont-edit"></i>
                                                        </button>
                                                        <button rel="<?php echo $id_bombeiro; ?>" type="button" class="editeImg btn btn-primary btn-sm waves-effect waves-light text-uppercase ">
                                                            Editar Imagem <i class="icofont icofont-picture"></i>
                                                        </button>
                                                        <button rel="<?php echo $id_bombeiro; ?>" type="button" class="deleteUsers btn btn-danger btn-sm waves-effect waves-light text-uppercase">
                                                            Deletar <i class="icofont icofont-trash"></i>

                                                        </button>
                                                        <!-- <a rel="<?php echo $id_bombeiro; ?>" href="<?php echo DIRPAGE . "gerenciar-Usuarios?idDel={$userList['id_bombeiro']}"; ?>" type="button" class="deleteUsers btn btn-danger btn-sm">Deletar<i class="icofont icofont-ui-delete"></i></a>-->

                                                    <?php endif; ?>
                                                    <?php if ($_SESSION['permition'] == "admin") : ?>

                                                        <button rel="<?php echo $id_bombeiro; ?>" type="button" class="signUpUsers btn btn-success btn-sm waves-effect waves-light text-uppercase" onclick="openUserModal()">Adicionar Usuários <i class="icofont icofont-plus"></i></button>
                                                        <!--<button rel="<?php echo $id_bombeiro; ?>" type="button" class="signUpUsersImg btn btn-secundary btn-sm waves-effect waves-light text-uppercase" onclick="openUserImgModal()">Adicionar Foto Perfil <i class="icofont icofont-file-image"></i></button>-->

                                                    <?php endif; ?>

                                                    </div>
                                            </div>
                                        </fieldset>
<!-- Modal trigger button -->
<button
    type="button"
    class="btn btn-primary btn-lg"
    data-bs-toggle="modal"
    data-bs-target="#modalId"
>
    Launch
</button>

<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div
    class="modal fade"
    id="modalId"
    tabindex="-1"
    data-bs-backdrop="static"
    data-bs-keyboard="false"
    
    role="dialog"
    aria-labelledby="modalTitleId"
    aria-hidden="true"
>
    <div
        class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
        role="document"
    >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Modal title
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">Body</div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal"
                >
                    Close
                </button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Optional: Place to the bottom of scripts -->
<script>
    const myModal = new bootstrap.Modal(
        document.getElementById("modalId"),
        options,
    );
</script>

                                <?php
                                    endforeach;

                                else :

                                    echo "<div class='alert alert-danger'><i class='fa fa-database'></i> Nenhum  Dado Cadastrado!</div>";

                                endif; ?>
                            </div>


                        </div>
                    </fieldset>


                    <?php if ($_SESSION['permition'] == "admin") : ?>

                        <fieldset>
                            <h5 class="card-text">
                                <legend><i class="icofont icofont-users"></i>Visualizar Usuários</legend>
                            </h5>
                            <div class="table-responsive p-20 ">

                                <form action="gerenciar-Usuarios" id="userFormSearch" name="userFormSearch" method="post">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label"><i class="icofont icofont-user"></i>Pesquisar Usuários</label>
                                        <div class="col-sm-6">
                                            <input type="search" class="form-control" value="<?php ?>" name="searchUsers" id="searchUsers" placeholder="Pesquisar Usuários">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4 text-center">
                                                <button type="submit" name="submitSearchUsers" value="submitSearchUsers" class="btn btn-primary form-control" style="font-weight: bold;"><i class="icofont icofont-police-car-alt-1"></i> Pesquisar<i class="icofont icofont-ui-user-group"></i> Usuários <i class="icofont icofont-fire-extinguisher"></i></button>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="ordenar" class="col-sm-2 col-form-label"><i class="icofont icofont-listing-box"></i>Ordenar Por</label>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="orderUsers" id="orderUsers">
                                                    <option value="id_bombeiro">ID</option>
                                                    <option value="nip">NIP</option>
                                                    <option value="email">EMAIL</option>
                                                    <option value="patente">PATENTE</option>
                                                </select>
                                            </div>
                                            <label for="listar" class="col-sm-2 col-form-label"><i class="icofont icofont-icofont-listing-number"></i>Listar Por</label>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="limitUsers" id="limitUsers">
                                                    <option value="6">6</option>
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                </select>
                                            </div>
                                        </div>
                                </form>
                                <form name="formDeleteUser" id="FormDeleteUser" action="gerenciar-Usuarios" method="post">

                                    <table class="table-responsive-sm table-hover b-solid p-10 m-20 overflow-y-visible  scroll-list">
                                        <thead>
                                            <tr class="p-10 m-10" style='background-color: #39444E; color:#fff; padding: 10px;'>
                                                <th class="table-hover b-solid p-10">acções</th>
                                                <th class="table-hover b-solid p-10">Foto</th>
                                                <th class="table-hover b-solid p-10">Id</th>
                                                <th class="table-hover b-solid p-10">Nome</th>
                                                <th class="table-hover b-solid p-10">Nip</th>
                                                <th class="table-hover b-solid p-10">Email</th>
                                                <th class="table-hover b-solid p-10">Idade</th>
                                                <!--  <th class="table-hover b-solid p-10">Senha</th>-->
                                                <th class="table-hover b-solid p-10">Patente</th>
                                                <th class="table-hover b-solid p-10">Cargo</th>
                                                <th class="table-hover b-solid p-10">Permissão</th>
                                                <th class="table-hover b-solid p-10">Estado</th>
                                                <th class="table-hover b-solid p-10">DataCriação</th>
                                                <th class="table-hover b-solid p-10">DataModificação</th>
                                            </tr>
                                        </thead>
                                        <tbody class="retornoTb b-solid">
                                            <?php
                                            if (!empty($userSearchFormDatas['searchUsers'])) :
                                                if (count($userSearch) > 0) :
                                                    //  var_dump($userSearch($userSearchFormDatas['searchUsers'] ?? true, $userSearchFormDatas['limitUsers'] ?? true, $userSearchFormDatas['orderUsers'] ?? true));
                                                    // Exibe os resultados da pesquisa
                                                    foreach ($userSearch as $listSearch) :
                                            ?>
                                                        <tr class="b-solid table-light p-10 m-10" class="even" role="row">
                                                            <td>
                                                                <button rel="<?php echo $listSearch['id_bombeiro'] ?>" type="button" class="viewUsers btn btn-info btn-sm waves-effect waves-light text-uppercase ">
                                                                    Detalhar <i class="icofont icofont-eye"></i>
                                                                </button>
                                                                <?php if ($_SESSION['permition'] == "admin") : ?>
                                                                    <button rel="<?php echo $listSearch['id_bombeiro'] ?>" type="button" class="editUsers btn btn-warning btn-sm waves-effect waves-light text-uppercase ">
                                                                        Editar <i class="icofont icofont-edit"></i>
                                                                    </button>
                                                                    <button rel="<?php echo $listSearch['id_bombeiro'] ?>" type="button" class="editeImg btn btn-primary btn-sm waves-effect waves-light text-uppercase ">
                                                                        Editar <i class="icofont icofont-picture"></i>
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
                                                            <!-- <td><?php //echo $listSearch['senha']; 
                                                                        ?></td>-->
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
                                                    echo "<div class='alert alert-danger text-center'><i class='fa fa-database'></i> Nenhum Dados Encontrado!</div>";
                                                    $_SESSION['msgUserDatas'] = "<div class='alert alert-outline-primary alert-dismissible fade show text-center'><span><i class='mdi mdi-alert'></i></span><button type='button' class='close h-100' data-dismiss='alert' aria-label='Close'><span><i class='mdi mdi-close'></i></span>
                                                            </button><strong>Alerta!</strong><span class=text-danger> Nenhum Dados Encontrado! </span></div>";
                                                endif;
                                            else :
                                                // Exibe todos os usuários
                                                if (count($userLister) > 0) :
                                                    foreach ($userLister as $listUsers) :
                                                    ?>
                                                        <tr class="b-solid table-light p-10 m-10" class="even" role="row">
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
                                                            <!--  <td><?php //echo $listUsers['senha']; 
                                                                        ?></td>-->
                                                            <td class="sorting_1"><?php echo $listUsers['patente']; ?></td>
                                                            <td><?php echo $listUsers['cargo']; ?></td>
                                                            <td><?php echo $listUsers['permissao']; ?></td>
                                                            <td><?php echo $listUsers['status']; ?></td>
                                                            <td><?php echo date("d-m-Y H:i:s", strtotime($listUsers['data_creation'])); ?></td>
                                                            <td><?php echo $listUsers['data_modified'] ?></td>
                                                        </tr>
                                                    <?php
                                                    endforeach;
                                                    //verificar a página anterior e posterior
                                                    $previous = $pagina - 1;
                                                    $next = $pagina + 1;
                                                    //contar a qunatidade  de registro de no BD&raquo;
                                                    $userPage =   ceil($userCount['total_usuarios'] / $Limite_resultado);
                                                    var_dump($userCount['total_usuarios']);
                                                    var_dump($userPage);
                                                    ?>
                                                    <nav class="text-center " aria-label="Previous">
                                                        <ul class="pagination">
                                                            <!--previous-->

                                                            <li class="page-item">
                                                                <?php if ($previous != 0) : ?>
                                                                    <a class="page-link" href="gerenciar-Usuarios?userPages=<?php echo $previous; ?>#!" aria-label="Previous">
                                                                        <span aria-hidden="true">&laquo;</span>
                                                                    </a>
                                                                <?php else : ?>
                                                                    <a class="page-link" href="#" aria-label="Previous">
                                                                        <span aria-hidden="true">&laquo;</span>
                                                                    </a>
                                                                <?php endif; ?>
                                                            </li>
                                                            <?php
                                                            for ($i = 1; $i < $userPage + 1; $i++) : ?>


                                                                <li class="page-item"><a class="page-link" href="gerenciar-Usuarios?userPages=<?php echo $i; ?>#!"><?php echo $i; ?></a></li>


                                                            <?php endfor; ?>
                                                            <!--next-->
                                                            <li class="page-item">
                                                                <?php if ($next <= $userPage) : ?>
                                                                    <a class="page-link" href="gerenciar-Usuarios?userPages=<?php echo $next; ?>#!" aria-label="Next">
                                                                        <span aria-hidden="true">&raquo;</span>
                                                                    </a>
                                                                <?php else : ?>
                                                                    <a class="page-link" href="#" aria-label="Next">
                                                                        <span aria-hidden="true">&raquo;</span>
                                                                    </a>
                                                                <?php endif; ?>
                                                            </li>


                                                        </ul>
                                                    </nav>
                                            <?php
                                                else :
                                                    echo "<div class='alert alert-danger'><i class='fa fa-database'></i> Nenhum  Dado Cadastrado!</div>";
                                                    $_SESSION['msgUserDatas'] = "<div class='alert alert-danger'><i class='fa fa-database'></i> Nenhum  Dado Cadastrado!</div>";
                                                endif;
                                            endif;
                                            if (!empty($userSearchFormDatas['searchUsers'])) {
                                                // Exibe a mensagem de pesquisa
                                                echo "<div class='alert alert-info'>Exibindo resultados da pesquisa para: " . htmlspecialchars($userSearchFormDatas['searchUsers']) . "</div>";
                                            }
                                            // Limpar mensagens de erro da sessão após exibição
                                            if (isset($_SESSION['msgUserDatas'])) :
                                                echo $_SESSION['msgUserDatas'];
                                                unset($_SESSION['msgUserDatas']);
                                            endif;
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="p-10 m-10" style='background-color: #39444E; color:#fff; padding: 10px;'>
                                                <th class="table-hover b-solid p-10">acções</th>
                                                <th class="table-hover b-solid p-10">Foto</th>
                                                <th class="table-hover b-solid p-10">Id</th>
                                                <th class="table-hover b-solid p-10">Nome</th>
                                                <th class="table-hover b-solid p-10">Nip</th>
                                                <th class="table-hover b-solid p-10">Email</th>
                                                <th class="table-hover b-solid p-10">Idade</th>
                                                <!--  <th class="table-hover b-solid p-10">Senha</th>-->
                                                <th class="table-hover b-solid p-10">Patente</th>
                                                <th class="table-hover b-solid p-10">Cargo</th>
                                                <th class="table-hover b-solid p-10">Permissão</th>
                                                <th class="table-hover b-solid p-10">Estado</th>
                                                <th class="table-hover b-solid p-10">DataCriação</th>
                                                <th class="table-hover b-solid p-10">DataModificação</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <?php if ($_SESSION['permition'] == "admin") : ?>

                                        <button id="deleteMultUser" type="submit" class="deleteMultUser btn btn-danger" name="deleteUsers" value="multUsers">Deletar Selecionados <i class="icofont icofont-trash"></i></button>
                                        <!--<button rel="usuarios" id="truncateUsers" type="submit" class="truncateUsers btn btn-danger" name="truncateUsers" value="usuarios">Deletar Todos <i class="icofont icofont-trash"></i></button>-->
                                    <?php endif; ?>
                                </form>
                            </div>
                        </fieldset>
                    <?php endif; ?>

                </div>

            </div>
        </div>

        <!-- Modal de edição de imagens de  usuário -->
        <div id="editImgModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="userModalLabel">Edição de Usuário<i class="icofont icofont-picture"></i></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="updateImg" class=" modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" name="submitUser" value="submitUser" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="editUserModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="userModalLabel">Edição de Usuário<i class="icofont icofont-edit"></i></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="updateUsers" class=" modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" name="submitUser" value="submitUser" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal de detalhes de usuários -->
        <div id="viewUserModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="userModalLabel">Detalhes de Usuário <i class="icofont icofont-eye"></i></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="detailsUsers" class="basic-form">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" name="submitUser" value="submitUser" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal de cadastro de usuário -->
        <div id="signupUsers" class="modal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="userModalLabel">Cadastro de Usuário <i class="icofont icofont-plus"></i></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="userForm" id="userForm" action="gerenciar-Usuarios" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="lastIdUser" value="">
                            <fieldset>
                                <legend>
                                    <i class="icofont icofont-ui-user"></i> Dados Usuários
                                </legend>
                                <div class="card p-10">
                                    <div class="card-body">

                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label"><i class="icofont icofont-user"></i>Nome</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="userName" id="userName" value="<?php echo $userName; ?>" maxlength="45" placeholder="Nome">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label"><i class="icofont icofont-id-card"></i>NIP</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="userNip" id="userNip" value="<?php echo $userNip ?>" maxlength="9" placeholder="NIP">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label"><i class="icofont icofont-email"></i>Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" name="userEmail" id="userEmail" value="<?php echo $userEmail; ?>" maxlength="80" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label"><i class="icofont icofont-user"></i>Data Nascimento</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" name="userDataNasc" id="userDataNasc" value="<?php echo $userDataNasc; ?>" maxlength="45" placeholder="Data Nascimento">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label"><i class="icofont icofont-ui-password"></i>Senha</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" name="userSenha" id="userConfSenha" value="<?php echo $userSenha; ?>" maxlength="45" placeholder="Insira sua Senha">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label"><i class="icofont icofont-ui-password"></i>Confirmar Senha</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" name="userConfSenha" id="userConfSenha" value="<?php echo $userConfSenha; ?>" maxlength="45" placeholder="Confirmar Senha">
                                            </div>
                                        </div>
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
                                                    <option value="coordenador">Coordenador</option>
                                                    <option value="operador">Operador</option>
                                                    <option value="admin">Administrador</option>


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
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label"><i class="icofont icofont-user"></i>Foto de Perfil</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" value="<?php echo $userCustomFileName; ?>" name="userPhoto" id="userPhoto" placeholder="Imagem de Perfil">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 text-center">
                                                <button type="submit" name="submitUser" value="cadastrar" class="btn btn-primary form-control" style="font-weight: bold;"><i class="icofont icofont-police-car-alt-1"></i> Registrar <i class="icofont icofont-ui-user-group"></i> Usuários <i class="icofont icofont-fire-extinguisher"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Adicione mais campos conforme necessário -->
                                </div>
                            </fieldset>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

                        <button type="submit"  name="submitUser" value="cadastrar" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal de cadastro de imagem do usuário -->
        <div id="signupUserImg" class="modal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="userModalLabel">Cadastro de Usuário <i class="icofont icofont-plus"></i></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="userForm" id="userForm" action="gerenciar-Usuarios" method="post" enctype="multipart/form-data">

                            <fieldset>
                                <legend>
                                    <i class="icofont icofont-ui-user"></i> Dados Usuários
                                </legend>
                                <div class="card p-10">
                                    <div class="card-body">

                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label"><i class="icofont icofont-user"></i>Foto de Perfil</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" value="<?php echo $userCustomFileName; ?>" name="userPhoto" id="userPhoto" placeholder="Imagem de Perfil">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 text-center">
                                                <button type="submit" name="submitUser" value="cadastrarImg" class="btn btn-primary form-control" style="font-weight: bold;"><i class="icofont icofont-police-car-alt-1"></i> Registrar <i class="icofont icofont-ui-user-group"></i> Usuários <i class="icofont icofont-fire-extinguisher"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Adicione mais campos conforme necessário -->
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

                        <button type="button" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </div>
        </div>


        <script>
            // Função para abrir o modal de cadastro de usuário
            function openUserModal() {
                $('#signupUsers').modal('show');

            }

            function openUserImgModal() {

                $('#signupUserImg').modal('show');

            }
        </script>
    <?php else : ?>

        <?php echo "<script>alert('você não tem acesso a este conteúdo!'); window.location.href='" . DIRPAGE . "painel-Admin';</script>";
        exit;
        ?>
    <?php endif;
    ?>