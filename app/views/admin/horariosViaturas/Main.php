<?php


if ($_SESSION['permition'] == "admin" || $_SESSION['permition'] == "operador") :
   global $horarioSearchFormDatas;
   $cHorarios = new App\Models\HorariosViaturasModel;
  $controleHorarios =  $cHorarios->getAllHorarios();
  // $cHorarioSearch = $cHorarios->getSearchHorarios($horarioSearchFormDatas['searchHorarios'] ?? true, $horarioSearchFormDatas['limitHorarios'] ?? true, $horarioSearchFormDatas['orderHorarios'] ?? true);
//$cHorariosLister = $cHorarios->getAllOrderHorarios($horarioSearchFormDatas['orderHorarios'] ?? true, $horarioSearchFormDatas['limitHorarios'] ?? true);

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
                     <legend><i class="icofont icofont-fire-extinguisher"></i>Visualizar Ocorrências</legend>

                  </div>

                  <div class="table-responsive p-30 overflow-x-visible">
                  <div class="form-group row">
                           <div class="col-sm-6">

                              <button type="button" class="btn btn-success" onclick="openVeiculosModal()">Horários <i class="icofont icofont-car"></i></button>
                             <!-- <button rel="<?php  ?>" target="_blank" type="button" class="pdfHorarios btn btn-outline-danger btn-sm waves-effect waves-light text-uppercase ">
                                 Gerar PDF<i class="icofont icofont-file-pdf"></i>
                              </button>

                              <button rel="<?php  ?>" type="button" class="excelHorarios btn btn-outline-success btn-sm waves-effect waves-light text-uppercase ">
                                 Gerar EXCEL<i class="icofont icofont-file-excel"></i>
                              </button>-->
                           </div><br><br>
                  
                     <form action="gerenciar-Horarios-Viaturas" name="OcorrencesFormSearch" method="post">

                        <table class="table-table-responsive-md m-30 overflow-scroll">
                           <thead>
                              <tr>
                              <th>id_horario_deslocamento	
</th>
                                 <th>IpartidaInicioD</th>
                                 <th>saidaDestino	
                                 <th>chegadaDestino</th>
                                
</th>
                                 <th>fimOcorrencia</th>
                                 <th>observacoes</th>
                                
                                 <th>Equipes_Guarnições</th>
                                 <th>bombeiros</th>
                                 <th>matricula_viatura</th>
                               
                                 <th>Data_Criação</th>
                                 <th>Data_Modificação</th>
                              </tr>
                           </thead>
                           <tbody class="returnCars">
<?php
   // Exibe todos os usuários
   if (count($controleHorarios) > 0) :
      foreach ($controleHorarios as $horariosLister) :
      ?>
         <tr class="even" role="row">
            <!--
            <td>
               <button rel="<?php echo $horariosLister['id_horario_deslocamento'] ?>" type="button" class="viewCars btn btn-info btn-sm waves-effect waves-light text-uppercase ">
                  Detalhar <i class="icofont icofont-eye"></i>
               </button>
               <?php if ($_SESSION['permition'] == "admin") : ?>
                  <button rel="<?php echo $horariosLister['id_horario_deslocamento'] ?>" type="button" class="editCars btn btn-warning btn-sm waves-effect waves-light text-uppercase ">
                     Editar <i class="icofont icofont-edit"></i>
                  </button>

                  <button rel="<?php echo $horariosLister['id_horario_deslocamento']; ?>" type="button" class="deletHorairos btn btn-danger btn-sm waves-effect waves-light text-uppercase">
                     Deletar <i class="icofont icofont-trash"></i>

                  </button>
                  <input type="checkbox" name="idHorariosDeleter" id="id" value="<?php echo $horariosLister['id_horario_deslocamento']; ?>">
               <?php endif; ?>
            </td>-->

            <td><?php echo $horariosLister['id_horario_deslocamento']; ?></td>
            <td><?php echo $horariosLister['partidaInicio']; ?></td>
            <td><?php echo $horariosLister['saidaDestino' ]; ?></td>
            <td><?php echo $horariosLister['chegadaDestino' ]; ?></td>
            <td><?php echo $horariosLister['fimOcorrencia']; ?></td>
            <td><?php echo $horariosLister['observacoes']; ?></td>
            <td><?php echo $horariosLister['nome_equipe' ]; ?></td>
            <!--<td><?php echo $horariosLister['nome_bombeiro']; ?></td>-->
            <td><?php echo $horariosLister['matricula_viatura']; ?></td>
           

         </tr>
<?php

      endforeach;
   else :
      echo "<div class='alert alert-danger'><i class='fa fa-database'></i> Nenhum  Dado Cadastrado!</div>";
      $_SESSION['msgCarsDatas'] = "<div class='alert alert-danger'><i class='fa fa-database'></i> Nenhum  Dado Cadastrado!</div>";
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
                           <th>id_horario_deslocamento	
</th>
                                 <th>IpartidaInicioD</th>
                                 <th>saidaDestino	
                                 <th>chegadaDestino</th>
                                
</th>
                                 <th>fimOcorrencia</th>
                                 <th>observacoes</th>
                                
                                 <th>Equipes_Guarnições</th>
                                 <th>matricula_viatura</th>
                               
                                 <th>Data_Criação</th>
                                 <th>Data_Modificação</th>
                           </tfoot>
                        </table>

                        <?php if ($_SESSION['permition'] == "admin" || $_SESSION['permition'] == "operador") : ?>
                           <!--<button id="deleteMultOcorrences" type="submit" class="deleteMultOcorrences btn btn-danger" name="deleteOcorrences" value="multOcorrences"><i class="icofont icofont-car"></i>Deletar Selecionados <i class="icofont icofont-trash"></i></button>
                           <button rel="ocorrencess" id="truncateOcorrences" type="submit" class="truncateOcorrences btn btn-danger" name="truncateOcorrences" value="usuarios">Deletar Todos <i class="icofont icofont-trash"></i></button>-->
                        
                           <?php endif; ?>

                     </form>
                  </div>
               </fieldset>

            </div>


         </div>

      </div>

   </div>



   <!-- Fim do Formulário Unificado -->
   <div id="horariosViaturas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="CarsModalLabel" aria-hidden="true">
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
               <form name="horariosViaturas" id="" action="gerenciar-Horarios-Viaturas" method="post" enctype="multipart/form-data">
                  <fieldset>
                     <legend><i class="icofont icofont-bus-alt-3"></i>Controles de Horários de Viaturas</legend>
                     <div class="card p-10">
                        <!-- <div class="card-body">
                        <div class="form-group row">
                              <label for="tipo-ocorrencia" class="col-sm-3 col-form-label"><i class="icofont icofont-bus-alt-3"></i>Tipo de Deslocamento</label>
                              <div class="col-sm-9">
                                 <select class="form-control" name="chvTipoDesl" maxlength="" id="chvTipoDesl">
                                    <option value="QTE">QTE</option>
                                    <option value="QTS">QTS</option>
                                    <option value="QTC">QTC</option>
                                    <option value="QTR">QTR</option>
                                  Adicione mais opções conforme necessário 
                                 </select>
                              </div>
                           </div>-->
                        <div class="form-group row">
                           <label for="idade" class="col-sm-3 col-form-label"><i class="icofont icofont-time"></i>Data &amp; Hora - Partida-ínício</label>
                           <div class="col-sm-9">
                              <input type="date" class="form-control" name="PartidaInicio" maxlength="" id="chvDataHora" placeholder="Periódo da Ponto de partida">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="idade" class="col-sm-3 col-form-label"><i class="icofont icofont-time"></i>Data &amp; Hora - chegada-destino</label>
                           <div class="col-sm-9">
                              <input type="date" class="form-control" name="chegadaDestino" maxlength="" id="chvDataHora" placeholder="Periódo da Chegada ao Local da Ocorrência">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="idade" class="col-sm-3 col-form-label"><i class="icofont icofont-time"></i>Data &amp; Hora - saída-Destino </label>
                           <div class="col-sm-9">
                              <input type="date" class="form-control" name="saidaDestino" maxlength="" id="chvDataHora" placeholder="Periódo Saída Local da Ocorrência">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="idade" class="col-sm-3 col-form-label"><i class="icofont icofont-time"></i>Data &amp; Hora - Fim-Ocorrência </label>
                           <div class="col-sm-9">
                              <input type="date" class="form-control" name="FimOcorrencia" maxlength="" id="chvDataHora" placeholder="Periódo da Chegada na Corporação (Missão Cumprida)">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="nome" class="col-sm-3 col-form-label"><i class="icofont icofont-fast-delivery"></i>Longitude</label>
                           <div class="col-sm-9">
                              <input type="number" class="form-control" name="chvLongitude" maxlength="" id="chvLongitude" placeholder="Longitude">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="nome" class="col-sm-3 col-form-label"><i class="icofont icofont-line-height"></i>Latitude</label>
                           <div class="col-sm-9">
                              <input type="number" class="form-control" name="chvLatitude" maxlength="" id="chvLatitude" placeholder="Latitude">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="tipo-ocorrencia" class="col-sm-3 col-form-label"><i class="icofont icofont-people"></i>Equipe-guarnição</label>
                           <div class="col-sm-9">
                              <select class="form-control" name="chvGuarnicao">
                                 <?php $equipes = new \App\Models\EquipesAdminModel();
                                 foreach ($equipes->guarnicao() as $guarnicao) :
                                 ?>
                                    <option value="<?php echo $guarnicao['id_equipe']; ?>"> <?php echo $guarnicao['nome_equipe']; ?></option>
                                 <?php
                                 endforeach;

                                 ?>
                                 <!-- Adicione mais opções conforme necessário -->
                              </select>
                           </div>
                        </div>
                        <?php var_dump($guarnicao['id_equipe']); ?>
                     </div>
                     <div class="form-group row">
                        <label for="referencia" class="col-sm-3 col-form-label"><i class="icofont icofont-file-text"></i>observações</label>
                        <div class="col-sm-12">
                           <textarea class="form-control" name="chvObsVitima" maxlength="350" id="chvObsVitima" rows="3" placeholder="Descreva as Observações da Vítima"></textarea>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-sm-12 text-center">
                           <button type="submit" name="horariosVeiculos" value="horariosVeiculos" class="btn btn-primary form-control" style="font-weight: bold;"><i class="icofont icofont-police-car-alt-1"></i> Registrar <i class="icofont icofont-ui-user-group"></i> Horários de Veículos <i class="icofont icofont-fire-extinguisher"></i></button>
                        </div>
                     </div>

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
         $('#horariosViaturas').modal('show');
      }
   </script>

<?php else : ?>

   <?php echo "<script>alert('você não tem acesso a este conteúdo!'); window.location.href='" . DIRPAGE . "painel-Admin';</script>";
   exit;
   ?>
<?php endif;
?>