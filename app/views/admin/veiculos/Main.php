<?php

use App\Models;

if ($_SESSION['permition'] == "admin" || $_SESSION['permition'] == "operador") :
   global $veiculos, $veiculosDatas, $marca, $modelo, $cor, $matricula, $ano, $CarsearchFormDatas;

   $viaturas = new Models\ViaturasModel();
   $viaturaSearch = $viaturas->getAllCarsDatas($CarsearchFormDatas['searchCars'] ?? true, $CarsearchFormDatas['limitCars'] ?? true, $CarsearchFormDatas['orderCars'] ?? true);
   $viaturasLister = $viaturas->getListCars($CarsearchFormDatas['orderCars'] ?? true, $CarsearchFormDatas['limitCars'] ?? true);

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
                     <legend><i class="icofont icofont-car-alt-4"></i>Visualizar Veículos</legend>

                  </div>

                  <div class="table-responsive p-30 overflow-x-visible">
                     
                        <form action="gerenciar-Veiculos" id="CarsFormSearch" name="CarsFormSearch" method="post">
                           <div class="form-group row">
                              <div class="col-sm-6">
                                 <button type="button" class="btn btn-success" onclick="openVeiculosModal()">Adicionar viaturas <i class="icofont icofont-car"></i></button>
                                 <button rel="<?php  ?>" target="_blank" type="button" class="pdfCars btn btn-outline-danger btn-sm waves-effect waves-light text-uppercase ">
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


                        </form>
                        <form action="gerenciar-Veiculos" id="CarsFormSearch" name="CarsFormSearch" method="post">

                        <table class="table-table-responsive-md m-30 overflow-scroll">
                           <thead>
                              <tr>
                                 <th>Acões</th>

                                 <th>ID</th>
                                 <th>Marca</th>
                                 <th>Modelo</th>
                                 <th>Cor</th>
                                 <th>Matrícula</th>
                                 <th>Ano</th>
                                 <th>Data_Criação</th>
                                 <th>Data_Modificação</th>
                              </tr>
                           </thead>
                           <tbody class="returnCars">


                              <?php
                              if (!empty($CarsearchFormDatas['searchCars'])) :
                                 if (count($viaturaSearch) > 0) :
                                    //  var_dump($viaturasSearch($CarsearchFormDatas['searchCars'] ?? true, $CarsearchFormDatas['limitCars'] ?? true, $CarsearchFormDatas['orderCars'] ?? true));
                                    // Exibe os resultados da pesquisa
                                    foreach ($viaturaSearch as $veiculoSearch) :
                              ?>
                                       <tr class="even" role="row">
                                          <td>
                                             <button rel="<?php echo $veiculoSearch['id_viatura'] ?>" type="button" class="viewCars btn btn-info btn-sm waves-effect waves-light text-uppercase ">
                                                Detalhar <i class="icofont icofont-eye"></i>
                                             </button>
                                             <?php if ($_SESSION['permition'] == "admin") : ?>
                                                <button rel="<?php echo $veiculoSearch['id_viatura'] ?>" type="button" class="editCars btn btn-warning btn-sm waves-effect waves-light text-uppercase ">
                                                   Editar <i class="icofont icofont-edit"></i>
                                                </button>


                                                <button rel="<?php echo $veiculoSearch['id_viatura']; ?>" type="button" class="deleteCars btn btn-danger btn-sm waves-effect waves-light text-uppercase">
                                                   Deletar <i class="icofont icofont-trash"></i>

                                                </button>

                                                <input type="checkbox" name="idCars[]" id="id" value="<?php echo $veiculoSearch['id_viatura']; ?>">
                                             <?php endif; ?>
                                          </td>

                                          <td><?php echo $veiculoSearch['id_viatura']; ?></td>
                                          <td><?php echo $veiculoSearch['marca']; ?></td>
                                          <td><?php echo $veiculoSearch['modelo']; ?></td>
                                          <td><?php echo $veiculoSearch['cor']; ?></td>
                                          <td><?php echo $veiculoSearch['matricula']; ?></td>
                                          <td><?php echo $veiculoSearch['ano']; ?></td>

                                          <td><?php echo date("d-m-Y H:i:s", strtotime($veiculoSearch['data_criacao'])); ?></td>
                                          <td><?php echo date("d-m-Y H:i:s", strtotime($veiculoSearch['data_modificacao'])); ?></td>

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
                                 if (count($viaturasLister) > 0) :
                                    foreach ($viaturasLister as $veiculosLister) :
                                    ?>
                                       <tr class="even" role="row">
                                          <td>
                                             <button rel="<?php echo $veiculosLister['id_viatura'] ?>" type="button" class="viewCars btn btn-info btn-sm waves-effect waves-light text-uppercase ">
                                                Detalhar <i class="icofont icofont-eye"></i>
                                             </button>
                                             <?php if ($_SESSION['permition'] == "admin") : ?>
                                                <button rel="<?php echo $veiculosLister['id_viatura'] ?>" type="button" class="editCars btn btn-warning btn-sm waves-effect waves-light text-uppercase ">
                                                   Editar <i class="icofont icofont-edit"></i>
                                                </button>

                                                <button rel="<?php echo $veiculosLister['id_viatura']; ?>" type="button" class="deleteCars btn btn-danger btn-sm waves-effect waves-light text-uppercase">
                                                   Deletar <i class="icofont icofont-trash"></i>

                                                </button>
                                                <input type="checkbox" name="idCars[]" id="id" value="<?php echo $veiculosLister['id_viatura']; ?>">
                                             <?php endif; ?>
                                          </td>

                                          <td><?php echo $veiculosLister['id_viatura']; ?></td>
                                          <td><?php echo $veiculosLister['marca']; ?></td>
                                          <td><?php echo $veiculosLister['modelo']; ?></td>
                                          <td><?php echo $veiculosLister['cor']; ?></td>
                                          <td><?php echo $veiculosLister['matricula']; ?></td>
                                          <td><?php echo $veiculosLister['ano']; ?></td>
                                          <td><?php echo date("d-m-Y H:i:s", strtotime($veiculosLister['data_criacao'])); ?></td>
                                          <td><?php if(!empty($veiculosLister['data_modificacao'])): echo date("d-m-Y H:i:s", strtotime($veiculosLister['data_modificacao'])); else: echo $veiculosLister['data_modificacao'] = null; endif; ?></td>

                                       </tr>
                              <?php

                                    endforeach;
                                 else :
                                    echo "<div class='alert alert-danger'><i class='fa fa-database'></i> Nenhum  Dado Cadastrado!</div>";
                                    $_SESSION['msgCarsDatas'] = "<div class='alert alert-danger'><i class='fa fa-database'></i> Nenhum  Dado Cadastrado!</div>";
                                 endif;
                              endif;

                              if (!empty($CarsearchFormDatas['searchCars'])) {
                                 // Exibe a mensagem de pesquisa
                                 echo "<div class='alert alert-info'>Exibindo resultados da pesquisa para: " . htmlspecialchars($CarsearchFormDatas['searchCars']) . "</div>";
                              }
                              // Limpar mensagens de erro da sessão após exibição
                              if (isset($_SESSION['msgCarsDatas'])) :
                                 echo $_SESSION['msgCarsDatas'];
                                 unset($_SESSION['msgCarsDatas']);
                              endif;
                              ?>
                           </tbody>
                           <tfoot>
                              <th>Acões</th>
                              <th>ID</th>
                              <th>Marca</th>
                              <th>Modelo</th>
                              <th>Cor</th>
                              <th>Matrícula</th>
                              <th>Ano</th>
                              <th>Data_Criação</th>
                              <th>Data_Modificação</th>

                           </tfoot>
                        </table>

                        <?php if ($_SESSION['permition'] == "admin" || $_SESSION['permition'] == "operador") : ?>
                           <button id="deleteMultCars" type="submit" class="deleteMultCars btn btn-danger" name="deleteCars" value="multCars"><i class="icofont icofont-car"></i>Deletar Selecionados <i class="icofont icofont-trash"></i></button>
                           <!--<button rel="viaturas" id="truncateCars" type="submit" class="truncateCars btn btn-danger" name="truncateCars" value="Veiculos">Deletar Todos <i class="icofont icofont-trash"></i></button>-->
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
   <div id="veiculos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="CarsModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="CarsModalLabel">Cadastro de Veículos</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <!-- Formulário de cadastro de usuário aqui -->
               <form name="veiculosForm" action="gerenciar-Veiculos" method="post" enctype="multipart/form-data">
                  <fieldset>
                     <legend>
                        <i class="icofont icofont-car-alt-4"></i> Veículos
                     </legend>
                     <div class="card p-10">
                        <div class="card-body">
                           <div class="form-group row">
                              <div class="col-sm-9">

                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="guarnicao" class="col-sm-3 col-form-label"><i class="icofont icofont-numbered"></i>Marca</label>
                              <div class="col-sm-9">
                                 <!--<input type="text" name="marca" class="form-control" id="guarnicao" maxlength="45" placeholder="Marca">-->
                                 <select class="form-control" name="marca" maxlength="" id="cor">
                                    <option value="TOYOTA">TOYOTA</option>
                                    <option value="HUNDAY">HUNDAY</option>
                                    <option value="SUZUKI">SUZUKI</option>
                                    <option value="KIA">KIA</option>
                                    <option value="NISSAN">NISSAN</option>
                                    <option value="RENAULT">RENAULT</option>
                                    <option value="MERCEDES">MERCEDES</option>
                                    <!-- Adicione mais opções conforme necessário -->
                                 </select>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="guarnicao" class="col-sm-3 col-form-label"><i class="icofont icofont-car-alt-1"></i>Modelo</label>
                              <div class="col-sm-9">
                                 <input type="text" name="modelo" value="<?php echo $modelo; ?>" class="form-control" id="guarnicao" maxlength="45" placeholder="Modelo">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="guarnicao" class="col-sm-3 col-form-label"><i class="icofont icofont-color-picker"></i>Cor</label>
                              <div class="col-sm-9">
                                 <!-- <input type="text" name="cor" class="form-control" id="guarnicao" maxlength="20" placeholder="cor">-->
                                 <select class="form-control" name="cor" maxlength="" id="cor">
                                    <option value="Vermelho-Preto-Amarelo">Vermelho-Preto-Amarelo</option>
                                    <option value="Preto-Vermelho-Amarelo">Preto-Vermelho-Amarelo</option>
                                    <option value="Vermelho-Amarelo">Vermelho-Amarelo</option>
                                    <option value="Preto-Vermelho">Preto-Vermelho</option>
                                    <!-- Adicione mais opções conforme necessário -->
                                 </select>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="guarnicao" class="col-sm-3 col-form-label"><i class="icofont icofont-caret-down"></i>Matrícula</label>
                              <div class="col-sm-9">
                                 <!-- <input type="text" name="matricula" class="form-control" id="guarnicao" maxlength="14" placeholder="matricula"> -->
                                 <select class="form-control" name="matricula" maxlength="" id="veiculos">
                                    <option value="Veiculos-ALFA/<?php echo DATE . rand(100, 1000); ?>">Veiculos-ALFA/2024/<?php echo DATE . rand(100, 1000); ?></option>
                                    <option value="Veiculos-BETA/<?php echo DATE . rand(100, 1000); ?>">Veiculos-BETA/2024/<?php echo DATE . rand(100, 1000); ?></option>
                                    <option value="Veiculos-OMEGA/<?php echo DATE . rand(100, 1000); ?>">Veiculos-ÓMEGA/2024/<?php echo DATE . rand(100, 1000); ?></option>
                                    <option value="Veiculos-ZEUS/<?php echo DATE . rand(100, 1000); ?>">Veiculos-ZEUS/2024/<?php echo DATE . rand(100, 1000); ?></option>
                                    <option value="Veiculos-ATHENAS/<?php echo DATE . rand(100, 1000); ?>">Veiculos-ATHENAS/2024/<?php echo DATE . rand(100, 1000); ?></option>
                                    <option value="Veiculos-NORTE/<?php echo DATE . rand(100, 1000); ?>">Veiculos-NORTE/2024/<?php echo DATE . rand(100, 1000); ?></option>
                                    <option value="Veiculos-SUL/<?php echo DATE . rand(100, 1000); ?>">Veiculos-SUL/2024/<?php echo DATE . rand(100, 1000); ?></option>
                                    <option value="Veiculos-ESTE/<?php echo DATE . rand(100, 1000); ?>">Veiculos-NORDESTE/2024/<?php echo DATE . rand(100, 1000); ?></option>
                                    <option value="Veiculos-OESTE/<?php echo DATE . rand(100, 1000); ?>">Veiculos-SUDESTE/2024/<?php echo DATE . rand(100, 1000); ?></option>
                                    <!-- Adicione mais opções conforme necessário -->
                                 </select>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="guarnicao" class="col-sm-3 col-form-label"><i class="icofont icofont-time"></i>Ano</label>
                              <div class="col-sm-9">
                                 <!-- <input type="text" name="ano" class="form-control" id="ano" maxlength="4" placeholder="digite o Ano da Viatura ou Selecione"><br>-->
                                 <select class="form-control" name="ano" maxlength="" id="cor">
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>

                                    <!-- Adicione mais opções conforme necessário -->
                                 </select>
                              </div>
                           </div>

                        </div>
                        <div class="form-group row">
                           <div class="col-sm-12 text-center">
                              <button type="submit" name="veiculos" value="veiculos" class="btn btn-primary form-control" style="font-weight: bold;"><i class="icofont icofont-police-car-alt-1"></i> Registrar <i class="icofont icofont-car"></i> Veículos <i class="icofont icofont-fire-extinguisher"></i></button>
                           </div>
                        </div>
                     </div>
                     <!-- Adicione mais campos conforme necessário -->

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
   <div id="editCarsModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="userModalLabel">Edição de Usuário<i class="icofont icofont-edit"></i></h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div id="" class="updateCars modal-body">

            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
               <button type="submit" name="submitUser" value="submitUser" class="btn btn-primary">Salvar</button>
            </div>
         </div>
      </div>
   </div>
   <!-- Modal de detalhes de veiculos -->
   <div id="viewCarsModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="userModalLabel">Detalhes de Usuário <i class="icofont icofont-eye"></i></h5>
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
               <button type="submit" name="submitUser" value="submitUser" class="btn btn-primary">Salvar</button>
            </div>
         </div>
      </div>
   </div>
   <script>
      // Função para abrir o modal de cadastro de usuário
      function openVeiculosModal() {
         $('#veiculos').modal('show');
      }
   </script>

   <!-- Botão para abrir o modal de cadastro de usuário -->

<?php else : ?>

   <?php echo "<script>alert('você não tem acesso a este conteúdo!'); window.location.href='" . DIRPAGE . "painel-Admin';</script>";
   exit;
   ?>
<?php endif;
?>