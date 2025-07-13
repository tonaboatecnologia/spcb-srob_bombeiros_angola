<?php

use App\Models\UsuariosAdminModel;
use App\Models\EquipesAdminModel;
use App\Models\ViaturasModel;

if ($_SESSION['permition'] == "admin" || $_SESSION['permition'] == "coordenador") :
     global $integrantes, $nomEquipe, $veiculos, $equipes, $lastEquipeId, $lastSolicitante;
     $guanicoes = new \App\Models\EquipesAdminModel();
$fichaCentral = new \App\Models\FichaCentralAdminModel();
  $guarnicao=$guanicoes->lastEquipeId();
  $solicitante=$fichaCentral->lastSolicitanteId();

//var_dump($lastEquipeId, $lastSolicitante);



    
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

                        <div class="card-text">

                            <legend><i class="icofont icofont-team-alt"></i>Visualizar Equipes</legend>

                            
                        </div>

                        <div class="table-responsive">
                            <form action="gerenciar-Veiculos" name="CarsFormSearch" method="post">
                              
                                <!--form de persquisa-->
                                <form action="gerenciar-Usuarios" name="CarsFormSearch" method="post">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <button type="button" class="btn btn-success" onclick="openEquipesModal()">Adicionar Equipes <i class="icofont icofont-car"></i></button>
                                           <!-- <button rel="<?php  ?>" target="_blank" type="button" class="pdfCars btn btn-outline-danger btn-sm waves-effect waves-light text-uppercase ">
                                                Gerar PDF<i class="icofont icofont-file-pdf"></i>
                                            </button>

                                            <button rel="<?php  ?>" type="button" class="excelCars btn btn-outline-success btn-sm waves-effect waves-light text-uppercase ">
                                                Gerar EXCEL<i class="icofont icofont-file-excel"></i>
                                            </button>
                                        </div><br><br>
                                        <label for="" class="col-sm-2 col-form-label"><i class="icofont icofont-Cars"></i>Pesquisar Veículos</label>
                                        <div class="col-sm-6">
                                            <input type="search" class="form-control" value="<?php ?>" name="searchCars" id="searchCars" placeholder="Pesquisar Veículos">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4 text-center">
                                                <button type="submit" name="submitSearchCars" value="submitSearchCars" class="btn btn-primary form-control" style="font-weight: bold;"><i class="icofont icofont-police-car-alt-1"></i> Pesquisar<i class="icofont icofont-ui-Cars-group"></i> Veículos <i class="icofont icofont-fire-extinguisher"></i></button>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="ordenar" class="col-sm-2 col-form-label"><i class="icofont icofont-listing-box"></i>Ordenar Por</label>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="orderCars" id="orderCars">
                                                    <option value="matricula">Matricula</option>
                                                    <option value="modelo">Modelo</option>
                                                    <option value="marca">Marca</option>
                                                    <option value="Ano">Ano</option>
                                                    <option value="cor">Cor</option>
                                                </select>
                                            </div>
                                            <label for="listar" class="col-sm-2 col-form-label"><i class="icofont icofont-icofont-listing-number"></i>Listar Por</label>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="limitCars" id="limitCars">
                                                    <option value="10">10</option>
                                                    <option value="15">15</option>
                                                    <option value="25">25</option>
                                                    <option value="30">30</option>
                                                    <option value="50">50</option>
                                                </select>
                                            </div>
                                        </div>
-->

                                </form>
                               <!-- <table class="table-responsive-md m-30 overflow-scroll">
                                    <thead>
                                        <tr>
                                            <th>Acões</th>
                                            <th>Id</th>
                                            <th>Integrantes</th>
                                            <th>Veículo</th>
                                            <th>Data Criação</th>
                                        </tr>
                                    </thead>
                                 
                                </table>-->
                                <?php if ($_SESSION['permition'] == "admin" || $_SESSION['permition'] == "operador") : ?>
                                   <!-- <button id="deleteMultCars" type="submit" class="deleteMultCars btn btn-danger" name="deleteCars" value="multCars"><i class="icofont icofont-car"></i>Deletar Selecionados <i class="icofont icofont-trash"></i></button>
                                    <button rel="viaturas" id="truncateCars" type="submit" class="truncateCars btn btn-danger" name="truncateCars" value="usuarios">Deletar Todos <i class="icofont icofont-trash"></i></button>-->
                                <?php endif; ?>

                            </form>
                        </div>
                    </fieldset>
                </div>
            </div>

        </div>

    </div>


    <!-- Fim do Formulário Unificado -->

    <!-- Modal de cadastro de veiculos -->
    <div id="equipes" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="CarsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CarsModalLabel">Cadastro de Veículos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="equipes" id="" action="gerenciar-Equipes" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <legend><i class="icofont icofont-bus-alt-3"></i>Gestão de Equipes</legend>
                            <div class="card p-10">
                                <div class="card-body">
                                    <input type="hidden" name="lastEquipeId" value="<?php if(!empty($guarnicao['id_equipe'])): echo $guarnicao['id_equipe']; endif;?>">;
                                    <input type="hidden" name="lastSolicitante" value="<?php if(!empty($solicitante['id_solicitante'])): echo $solicitante['id_solicitante']; endif;?>">;
                                    
                                    <div class="form-group row">
                                        <label for="tipo-ocorrencia" class="col-sm-3 col-form-label"><i class="icofont icofont-people"></i>Integrantes</label>

                                        <div class="col-sm-9">

                                            <select style="height: 65vh;" class="form-control" multiple name="integrantes[]" maxlength="integrantes" id="">
                                                <?php $integrantes = new UsuariosAdminModel();
                                                foreach ($integrantes->integrantes() as $bombeiros) :

                                                ?>


                                                    <option value="<?php if (!empty($bombeiros['nome'])) : echo $bombeiros['nome'];
                                                                    endif; ?>">

                                                        <?php if (!empty($bombeiros['nome'])) : echo $bombeiros['nome'];
                                                        endif; ?>

                                                    </option>
                                                <?php
                                                endforeach;

                                                ?>
                                                <!-- Adicione mais opções conforme necessário -->
                                            </select>

                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label for="tipo-ocorrencia" class="col-sm-3 col-form-label"><i class="icofont icofont-car"></i>Veículos</label>
                                        <div class="col-sm-9">

                                            <select style="height: 25vh;" class="form-control" multiple name="veiculos[]" maxlength="" id="veiculos">

                                                <?php $viaturas = new ViaturasModel();
                                                foreach ($viaturas->veiculos() as $veiculos) :
                                                ?>

                                                    <option value="<?php if (!empty($veiculos['matricula'])) : echo $veiculos['matricula'];
                                                                    endif; ?>">

                                                        <?php if (!empty($veiculos['matricula'])) : echo $veiculos['matricula'];
                                                        endif; ?></option>
                                                <?php
                                                endforeach;

                                                ?>
                                                <!--  
                                            <option value="Veiculos-ALFA/<?php echo DATE . rand(100, 1000); ?>">Veiculos-ALFA/2024/<?php echo DATE . rand(100, 1000); ?></option>
                                                <option value="Veiculos-BETA/<?php echo DATE . rand(100, 1000); ?>">Veiculos-BETA/2024/<?php echo DATE . rand(100, 1000); ?></option>
                                                <option value="Veiculos-OMEGA/<?php echo DATE . rand(100, 1000); ?>">Veiculos-ÓMEGA/2024/<?php echo DATE . rand(100, 1000); ?></option>
                                                <option value="Veiculos-ZEUS/<?php echo DATE . rand(100, 1000); ?>">Veiculos-ZEUS/2024/<?php echo DATE . rand(100, 1000); ?></option>
                                                <option value="Veiculos-ATHENAS/<?php echo DATE . rand(100, 1000); ?>">Veiculos-ATHENAS/2024/<?php echo DATE . rand(100, 1000); ?></option>
                                                <option value="Veiculos-NORTE/<?php echo DATE . rand(100, 1000); ?>">Veiculos-NORTE/2024/<?php echo DATE . rand(100, 1000); ?></option>
                                                <option value="Veiculos-SUL/<?php echo DATE . rand(100, 1000); ?>">Veiculos-SUL/2024/<?php echo DATE . rand(100, 1000); ?></option>
                                                <option value="Veiculos-ESTE/<?php echo DATE . rand(100, 1000); ?>">Veiculos-NORDESTE/2024/<?php echo DATE . rand(100, 1000); ?></option>
                                                <option value="Veiculos-OESTE/<?php echo DATE . rand(100, 1000); ?>">Veiculos-SUDESTE/2024/<?php echo DATE . rand(100, 1000); ?></option>
                                                 Adicione mais opções conforme necessário -->
                                            </select>
                                            <!-- <label class="checkbox-inline"><input type="checkbox" id="integrantes" name="integrantes[]" value="Ricardo Massunguui"> Ricardo Massunguui </label>
                                            <label class="checkbox-inline"><input type="checkbox" id="integrantes" name="integrantes[]" value="Sanda Ndombaxi"> Sanda Ndombaxi</label>
                                            <label class="checkbox-inline"><input type="checkbox" id="integrantes" name="integrantes[]" value="Rita Cassequel"> Rita Cassequel</label>
                                            <label class="checkbox-inline"><input type="checkbox" id="integrantes" name="integrantes[]" value="Sandra Piedade"> Sandra Piedade</label>
                                            <label class="checkbox-inline"><input type="checkbox" id="integrantes" name="integrantes[]" value="Rubem Marcos"> Rubem Marcos</label>
                                            <label class="checkbox-inline"><input type="checkbox" id="integrantes" name="integrantes[]" value="Sebastião Garcia"> Sebastião Garcia</label>
                                            <label class="checkbox-inline"><input type="checkbox" id="integrantes" name="integrantes[]" value="Afonso dos Santos"> Afonso dos Santos</label>
                                            <label class="checkbox-inline"><input type="checkbox" id="integrantes" name="integrantes[]" value="vanda sérgio"> vanda sérgio</label>
                                            <label class="checkbox-inline"><input type="checkbox" id="integrantes" name="integrantes[]" value="Limar da silva"> Limar da silva</label>
                                                -->
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tipo-ocorrencia" class="col-sm-3 col-form-label"><i class="icofont icofont-team-alt"></i>Equipe-guarnição</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="nomEquipe">
                                                <option value="Equipe-guarnição-ALFA/<?php echo DATE . rand(100, 1000) ?>">Equipe-guarnição-ALFA/<?php echo DATE . rand(100, 1000) ?></option>
                                                <option value="Equipe-guarnição-BETA/<?php echo DATE . rand(100, 1000) ?>">Equipe-guarnição-BETA/<?php echo DATE . rand(100, 1000) ?></option>
                                                <option value="Equipe-guarnição-ÔMEGA/<?php echo DATE . rand(100, 1000) ?>">Equipe-guarnição-ÔMEGA/<?php echo DATE . rand(100, 1000) ?></option>
                                                <option value="Equipe-guarnição-NORTE/<?php echo DATE . rand(100, 1000) ?>">Equipe-guarnição-NORTE/<?php echo DATE . rand(100, 1000) ?></option>
                                                <option value="Equipe-guarnição-SUL/<?php echo DATE . rand(100, 1000) ?>">Equipe-guarnição-SUL/<?php echo DATE . rand(100, 1000) ?></option>
                                                <option value="Equipe-guarnição-ESTE/<?php echo DATE . rand(100, 1000) ?>">Equipe-guarnição-ESTE/<?php echo DATE . rand(100, 1000) ?></option>
                                                <option value="Equipe-guarnição-OESTE/<?php echo DATE . rand(100, 1000) ?>">Equipe-guarnição-OESTE/<?php echo DATE . rand(100, 1000) ?></option>
                                                <!-- Adicione mais opções conforme necessário -->
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 text-center">
                                        <button type="submit" name="equipes" value="equipes" class="btn btn-primary form-control" style="font-weight: bold;"><i class="icofont icofont-police-car-alt-1"></i> Registrar <i class="icofont icofont-ui-Car-group"></i> Horários de Veículos <i class="icofont icofont-fire-extinguisher"></i></button>
                                    </div>
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

    <!-- Modal de edição de viaturas -->
    <div id="editCarModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="CarModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CarModalLabel">Edição de Usuário<i class="icofont icofont-edit"></i></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="updateCars" class=" modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" name="submitCar" value="submitCar" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de detalhes de viaturas -->
    <div id="viewCarModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="CarModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CarModalLabel">Detalhes de Usuário <i class="icofont icofont-eye"></i></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="detailsCars" class="basic-form">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" name="submitCar" value="submitCar" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Função para abrir o modal de cadastro de usuário
        function openEquipesModal() {
            $('#equipes').modal('show');
        }
    </script>
<?php else : ?>

    <?php echo DATE . "<script>alert('você não tem acesso a este conteúdo!'); window.location.href='" . DIRPAGE . "painel-Admin';</script>";
    exit;
    ?>
<?php endif;
?>