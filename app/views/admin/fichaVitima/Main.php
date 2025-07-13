<?php

use App\Models\FichaVitimaAdminModel;

if ($_SESSION['permition'] == "admin" || $_SESSION['permition'] == "coordenador") : ?>
   <div class="row">
      <div class="col-lg-12">

         <div class="card" style="background-color: #f9f9f9; padding: 20px; ">
            <div class="card-header" style="background-color: #39444E; color: #fff; margin-bottom: 40px;">
               <h5 class="card-header-text" style="font-family: 'Arial', sans-serif; font-weight: bold;"><i class="icofont icofont-fire"></i> Registro de Ocorrência de Bombeiros - Ficha Vítimas
               </h5>
            </div>

            <div class="card-body">
               <div class="card-text">
                  <?php ?>
               </div>

               <?php global $vitimaDatas, $situacaoVitimaDatas, $situacaoVitima, $nomeSolicitante, $endereco,
                  $nomePaciente,
                  $idadePaciente,
                  $genero,
                  $biPaciente,
                  $contacto,
                  $relato;
               // $fichaVitimaDatas = filter_input_array(INPUT_POST, FILTER_DEFAULT);
               //  var_dump($situacaoVitimaDatas, $vitimaDatas);

               ?>
               <form name="vitimaForm" id="vitimaForm" action="gerenciar-FichaVitima" method="post" enctype="multipart/form-data">
                  <!-- Dados Básicos do Paciente -->
                  <fieldset style="border: 2px solid #39444E; border-radius: 10px; padding: 15px; margin-bottom: 20px;">
                     <legend style="background-color: #39444E; color: #fff; padding: 5px 10px; border-radius: 5px;">
                        <i class="icofont icofont-user"></i> Dados Básicos do Paciente
                     </legend>
                     <!-- paciente -->

                     <div class="form-group row">
                        <label for="nomePaciente" class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">Nome do Paciente</label>
                        <div class="col-sm-9">
                           <input type="text" name="nomePaciente" class="form-control" id="nomePaciente" value="<?php echo $nomePaciente; ?>" maxlength="45" placeholder="Nome do Paciente">
                        </div>
                     </div>

                     <div class="form-group row">
                        <label for="Idade" class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">Idade</label>
                        <div class="col-sm-9">
                           <input type="date" name="idadePaciente" class="form-control" id="Idade">
                        </div>
                     </div>

                     <div class="form-group row">
                        <label class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">Genêro</label>
                        <div class="col-sm-9">
                           <label class="custom-control custom-radio">
                              <input id="Masculino" name="genero" type="radio" value="Masculino" class="custom-control-input" checked>
                              <span class="custom-control-indicator"></span>
                              <span class="custom-control-description">Masculino</span>
                           </label>
                           <label class="custom-control custom-radio">
                              <input id="Feminino" name="genero" type="radio" value="Feminino" class="custom-control-input">
                              <span class="custom-control-indicator"></span>
                              <span class="custom-control-description">Feminino</span>
                           </label>
                        </div>
                     </div>

                     <!--
 <div class="form-group row">
                     <label for="Socorrido" class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">Socorrido</label>
                     <div class="col-sm-9">
                        <select name="Socorrido" class="form-control" id="Socorrido">
                           <option value="Paciente">Paciente</option>
                           <option value="Responsavél">Responsavél</option>
                                                  </select>
                     </div>
                  </div>-->

                     <div class="form-group row">
                        <label for="cidade" class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">Endereço:</label>
                        <div class="col-sm-9">
                           <input type="text" name="endereco" class="form-control" id="endereco" maxlength="75" value="<?php echo $endereco;  ?>" placeholder="Endereço da Residência (bairro, rua, distrito)">
                        </div>
                     </div>

                     <div class="form-group row">
                        <label for="Bilhete-de-identificação" class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">Bilhete de Identicação</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control" name="biPaciente" id="biPaciente" maxlength="14" value="<?php echo $biPaciente; ?>" placeholder="Bilhete de Identicação (00002222333LA023)">
                        </div>
                     </div>
                     <!--
                  <div class="form-group row">
                     <label for="Número" class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">Número</label>
                     <div class="col-sm-9">
                        <input type="number" class="form-control" name="numero" id="" placeholder="Número">
                     </div>
                  </div>

                  <div class="form-group row">
                     <label for="complemento" class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;"> Complemento</label>
                     <div class="col-sm-9">
                        <input type="text" class="form-control" name="Complemento" id="" placeholder="Complemento">
                     </div>
                  </div>-->

                     <div class="form-group row">
                        <label for="contato" class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">Contato Telefónico</label>
                        <div class="col-sm-9">
                           <input type="tel" name="contacto" class="form-control" id="contato" maxlength="9" value="<?php echo $contacto; ?>" placeholder="Contato telefónico (999-222-111)">
                        </div>
                     </div>

                     <!-- Breve Histórico da Ocorrência -->
                     <fieldset style="border: 2px solid #39444E; border-radius: 10px; padding: 15px; margin-bottom: 20px;">
                        <legend style="background-color: #39444E; color: #fff; padding: 5px 10px; border-radius: 5px;">
                           <i class="icofont icofont-pencil-alt-1"></i> Breve Histórico da Ocorrência
                        </legend>
                        <div class="form-group row">
                           <div class="col-sm-12">
                              <textarea class="form-control" name="relato" id="relato" value="<?php echo  $relato; ?>" maxlength="350" rows="3" placeholder="Breve Histórico da Ocorrência"></textarea>
                           </div>
                        </div>
                     </fieldset>
                     <!-- Botão de submit -->
                     <div class="form-group row">
                        <div class="col-sm-12 text-center">
                           <button type="submit" name="vitima" value="vitima" class="btn btn-primary form-control" style="font-weight: bold;"><i class="icofont icofont-ui-user-group"></i>Registrar Vítima <i class="icofont icofont-nurse-alt"></i></button>
                        </div>
                     </div>
                     <!-- Adicione mais campos conforme necessário, como endereço, etc. -->
                  </fieldset>
               </form>
               <!--Situaçao da vítima-->
               <form name="situacaoVitimaForm" id="situacaoVitimaForm" action="gerenciar-FichaVitima" method="post" enctype="multipart/form-data">



                  <!-- Situação do vitíma na Ocorrência -->
                  <fieldset style="border: 2px solid #39444E; border-radius: 10px; padding: 15px; margin-bottom: 20px;">
                     <legend style="background-color: #39444E; color: #fff; padding: 5px 10px; border-radius: 5px;">
                        <i class="icofont icofont-heart"></i> Situação da Vítima na Ocorrência
                     </legend>

                     <!-- Fieldset para Informar o Local de Lesão/Fratura/Queimadura na Vítima -->
                     <fieldset style="border: 2px solid #39444E; border-radius: 10px; padding: 15px; margin-bottom: 20px;">
                        <legend style="background-color: #39444E; color: #fff; padding: 5px 10px; border-radius: 5px;">
                           <i class="icofont icofont-nurse"></i> Local de Lesão/Fratura/Queimadura na Vítima
                        </legend>
                        <div class="form-group row">
                           <label for="local-lesao" class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">Local Lesão</label>
                           <div class="col-sm-9">
                              <label for="local-lesao" class="f-bold">Local lesão:</label><br>
                              <label class="checkbox-inline"><input type="checkbox" id="lesao" name="lesao[]" value="cabeça">cabeça </label>
                              <label class="checkbox-inline"><input type="checkbox" id="lesao" name="lesao[]" value="ombro">ombro</label>
                              <label class="checkbox-inline"><input type="checkbox" id="lesao" name="lesao[]" value="peito">peito</label>
                              <label class="checkbox-inline"><input type="checkbox" id="lesao" name="lesao[]" value="mão">mão</label>
                              <label class="checkbox-inline"><input type="checkbox" id="lesao" name="lesao[]" value="braço/anti-braço">braço &amp; anti-braço</label>
                              <label class="checkbox-inline"><input type="checkbox" id="lesao" name="lesao[]" value="abdomén">abdomén</label>
                              <label class="checkbox-inline"><input type="checkbox" id="lesao" name="lesao[]" value="vertebras">vertebras</label>
                              <label class="checkbox-inline"><input type="checkbox" id="lesao" name="lesao[]" value="costas">costas</label>
                              <label class="checkbox-inline"><input type="checkbox" id="lesao" name="lesao[]" value="coxa">coxa</label>
                              <label class="checkbox-inline"><input type="checkbox" id="lesao" name="lesao[]" value="perna">perna</label>
                              <label class="checkbox-inline"><input type="checkbox" id="lesao" name="lesao[]" value="pé">pé</label>
                              <label class="checkbox-inline"><input type="checkbox" id="lesao" name="lesao[]" value="olhos">olhos </label>
                              <label class="checkbox-inline"><input type="checkbox" id="lesao" name="lesao[]" value="boca/dente">boca &amp; dente</label>
                              <label class="checkbox-inline"><input type="checkbox" id="lesao" name="lesao[]" value="coluna/costas">coluna</label>
                              <label class="checkbox-inline"><input type="checkbox" id="lesao" name="lesao[]" value="outros">outros</label>

                              <textarea class="form-control" name="lesao[]" id="lesao" maxlength="350" rows="3" placeholder="Especifica o local da lesão"></textarea>


                           </div>
                        </div>

                        <div class="form-group row">
                           <label for="local-fratura" class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">Local Fratura</label>
                           <div class="col-sm-9">

                              <label class="checkbox-inline"><input type="checkbox" id="fratura" name="fratura[]" value="cabeça">cabeça </label>
                              <label class="checkbox-inline"><input type="checkbox" id="fratura" name="fratura[]" value="ombro">ombro</label>
                              <label class="checkbox-inline"><input type="checkbox" id="fratura" name="fratura[]" value="peito">peito</label>
                              <label class="checkbox-inline"><input type="checkbox" id="fratura" name="fratura[]" value="mão">mão</label>
                              <label class="checkbox-inline"><input type="checkbox" id="fratura" name="fratura[]" value="braço/anti-braço">braço &amp; anti-braço</label>
                              <label class="checkbox-inline"><input type="checkbox" id="fratura" name="fratura[]" value="abdomén">abdomén</label>
                              <label class="checkbox-inline"><input type="checkbox" id="fratura" name="fratura[]" value="vertebras">vertebras</label>
                              <label class="checkbox-inline"><input type="checkbox" id="fratura" name="fratura[]" value="costas">costas</label>
                              <label class="checkbox-inline"><input type="checkbox" id="fratura" name="fratura[]" value="coxa">coxa</label>
                              <label class="checkbox-inline"><input type="checkbox" id="fratura" name="fratura[]" value="perna">perna</label>
                              <label class="checkbox-inline"><input type="checkbox" id="fratura" name="fratura[]" value="pé">pé</label>
                              <label class="checkbox-inline"><input type="checkbox" id="fratura" name="fratura[]" value="olhos">olhos </label>
                              <label class="checkbox-inline"><input type="checkbox" id="fratura" name="fratura[]" value="boca/dente">boca &amp; dente</label>
                              <label class="checkbox-inline"><input type="checkbox" id="fratura" name="fratura[]" value="coluna/costas">coluna</label>
                              <label class="checkbox-inline"><input type="checkbox" id="fratura" name="fratura[]" value="outros">outros</label>

                              <textarea class="form-control" name="fratura[]" id="fratura" maxlength="350" rows="3" placeholder="Especifica o local da Fratura (cabeça, perna, vertebras)"></textarea>




                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="local-queimadura" class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">Local Queimadura</label>

                           <div class="col-sm-9">
                              <label for="local-queimadura" class="f-bold"> Queimadura:</label><br>
                              <label class="checkbox-inline"><input type="checkbox" id="queimadura" name="queimadura[]" value="cabeça">cabeça </label>
                              <label class="checkbox-inline"><input type="checkbox" id="queimadura" name="queimadura[]" value="ombro">ombro</label>
                              <label class="checkbox-inline"><input type="checkbox" id="queimadura" name="queimadura[]" value="peito">peito</label>
                              <label class="checkbox-inline"><input type="checkbox" id="queimadura" name="queimadura[]" value="mão">mão</label>
                              <label class="checkbox-inline"><input type="checkbox" id="queimadura" name="queimadura[]" value="braço/anti-braço">braço &amp; anti-braço</label>
                              <label class="checkbox-inline"><input type="checkbox" id="queimadura" name="queimadura[]" value="abdomén">abdomén</label>
                              <label class="checkbox-inline"><input type="checkbox" id="queimadura" name="queimadura[]" value="vertebras">vertebras</label>
                              <label class="checkbox-inline"><input type="checkbox" id="queimadura" name="queimadura[]" value="costas">costas</label>
                              <label class="checkbox-inline"><input type="checkbox" id="queimadura" name="queimadura[]" value="coxa">coxa</label>
                              <label class="checkbox-inline"><input type="checkbox" id="queimadura" name="queimadura[]" value="perna">perna</label>
                              <label class="checkbox-inline"><input type="checkbox" id="queimadura" name="queimadura[]" value="pé">pé</label>
                              <label class="checkbox-inline"><input type="checkbox" id="queimadura" name="queimadura[]" value="olhos">olhos </label>
                              <label class="checkbox-inline"><input type="checkbox" id="queimadura" name="queimadura[]" value="boca/dente">boca &amp; dente</label>
                              <label class="checkbox-inline"><input type="checkbox" id="queimadura" name="queimadura[]" value="coluna/costas">coluna</label>
                              <label class="checkbox-inline"><input type="checkbox" id="queimadura" name="queimadura[]" value="outros">outros</label>

                              <textarea class="form-control" name="queimadura[]" id="queimadura" maxlength="350" rows="3" placeholder="Especifica o local da Queimadura (cabeça, pescoço, perna)"></textarea>

                           </div>

                        </div>


                        <!-- Adicione mais campos conforme necessário, como detalhes adicionais da ocorrência -->
                     </fieldset>
                     <legend style="background-color: #39444E; color: #fff; padding: 5px 10px; border-radius: 5px;">
                        <i class="icofont icofont-nurse"></i> Diagnósticos extras da Vítima
                     </legend>

                     <div class="form-group row">
                        <label class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">Estado Febril</label>
                        <div class="col-sm-9">
                           <label class="custom-control custom-radio">
                              <input id="estado-febril-sim" name="estadoFebril" value="Sim" type="radio" checked class="custom-control-input">
                              <span class="custom-control-indicator"></span>
                              <span class="custom-control-description">Sim</span>
                           </label>
                           <label class="custom-control custom-radio">
                              <input id="estado-febril-nao" name="estadoFebril" value="Não" type="radio" class="custom-control-input">
                              <span class="custom-control-indicator"></span>
                              <span class="custom-control-description">Não</span>
                           </label>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">Estado Consciente</label>
                        <div class="col-sm-9">
                           <label class="custom-control custom-radio">
                              <input id="estado-febril-sim" name="estadoConsciente" value="Sim" type="radio" checked class="custom-control-input">
                              <span class="custom-control-indicator"></span>
                              <span class="custom-control-description">Sim</span>
                           </label>
                           <label class="custom-control custom-radio">
                              <input id="estado-febril-nao" name="estadoConsciente" value="Não" type="radio" class="custom-control-input">
                              <span class="custom-control-indicator"></span>
                              <span class="custom-control-description">Não</span>
                           </label>
                        </div>
                     </div>

                     <div class="form-group row">
                        <label class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">Estado Orientado</label>
                        <div class="col-sm-9">
                           <label class="custom-control custom-radio">
                              <input id="estado-febril-sim" name="estadOrientado" value="Sim" type="radio" checked class="custom-control-input">
                              <span class="custom-control-indicator"></span>
                              <span class="custom-control-description">Sim</span>
                           </label>
                           <label class="custom-control custom-radio">
                              <input id="estado-febril-nao" name="estadOrientado" value="Não" type="radio" class="custom-control-input">
                              <span class="custom-control-indicator"></span>
                              <span class="custom-control-description">Não</span>
                           </label>
                        </div>
                     </div>


                     <div class="form-group row">
                        <label class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">local do óbito</label>
                        <div class="col-sm-9">
                           <label class="custom-control custom-radio">
                              <input id="estado-febril-sim" name="localObito" value="Em Casa" type="radio" checked class="custom-control-input">
                              <span class="custom-control-indicator"></span>
                              <span class="custom-control-description">Em Casa</span>
                           </label>
                           <label class="custom-control custom-radio">
                              <input id="estado-febril-nao" name="localObito" value="No Hospital" type="radio" class="custom-control-input">
                              <span class="custom-control-indicator"></span>
                              <span class="custom-control-description">no Hospital</span>
                           </label>
                           <label class="custom-control custom-radio">
                              <input id="estado-febril-nao" name="localObito" value="outros" type="radio" class="custom-control-input">
                              <span class="custom-control-indicator"></span>
                              <span class="custom-control-description">outros</span>
                           </label>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">Medida Pupilar</label>
                        <div class="col-sm-9">
                           <label for="medidaPupilarEsquerda" class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">Esquerda</label>
                           <div class="col-sm-9">
                              <input type="number" class="form-control" name="medidaPupilarEsq" id="edidaPupilarEsq" placeholder="Medida Pupilar esquerda">
                           </div><br><br>
                           <label for="medidaPupilarDireita" class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">Direita</label>
                           <div class="col-sm-9">
                              <input type="number" class="form-control" name="medidaPupilarDir" id="medidaPupilarDir" placeholder="Medida Pupilar Direita">
                           </div>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">Saturação de Oxigénio</label>
                        <div class="col-sm-9">
                           <label for="Saturação de Oxigénio" class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">SO: </label>
                           <div class="col-sm-9">
                              <input type="number" class="form-control" name="satOxigenio" id="" placeholder="Saturação de Oxigénio">
                           </div>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">Batimentos por Minutos</label>
                        <div class="col-sm-9">
                           <label for="Saturação de Oxigénio" class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">BPMs</label>
                           <div class="col-sm-9">
                              <input type="number" class="form-control" name="bpms" id="bpms" placeholder="Batimentos por Minutos">
                           </div>
                        </div>
                     </div>

                     <div class="form-group row">
                        <label class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">Pressão Arterial</label>
                        <div class="col-sm-9">
                           <label for="Pressão Arterial" class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">PA: </label>
                           <div class="col-sm-9">
                              <input type="text" class="form-control" name="pressArterial" id="pa" placeholder="Pressão Arterial">
                           </div>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">Temperatura Corporal</label>
                        <div class="col-sm-9">
                           <label for="Pressão Arterial" class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">TC: </label>
                           <div class="col-sm-9">
                              <input type="text" class="form-control" name="temperatura" id="temperatura" placeholder="Temperatura Corporal">
                           </div>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="valor Total da escala Glasgow" class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">valor Total da escala Glasgow</label>
                        <div class="col-sm-9">
                           <input type="number" name="escalaGlasgow" class="form-control" id="mResVerbal" placeholder="valor Total da escala Glasgow">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">Quantidades de Vítimas</label>
                        <div class="col-sm-9">
                           <label for="Quantidades de Vítimas" class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">Quantidades de Vítimas: </label>
                           <div class="col-sm-9">
                              <input type="number" class="form-control" name="quantVitimas" id="quantVitimas" placeholder="Quantidades de Vítimas">
                           </div>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="local-queimadura" class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">Imobilizações Efetuadas</label>

                        <div class="col-sm-9">

                           <label for="local-queimadura" class="f-bold">Imobilizações Efetuadas:</label><br>
                           <label class="checkbox-inline"><input type="checkbox" id="queimadura" name="imobilizacoes[]" value="Marca rápida ">Marca rápida </label>
                           <label class="checkbox-inline"><input type="checkbox" id="queimadura" name="imobilizacoes[]" value="marca cÔncava">marca cÔncava</label>
                           <label class="checkbox-inline"><input type="checkbox" id="queimadura" name="imobilizacoes[]" value="imobilização cervical">imobilização cervical</label>
                           <label class="checkbox-inline"><input type="checkbox" id="queimadura" name="imobilizacoes[]" value="Inflação">Inflação</label>
                           <label class="checkbox-inline"><input type="checkbox" id="queimadura" name="imobilizacoes[]" value="Vâcuo">Vâcuo &amp;</label>
                           <label class="checkbox-inline"><input type="checkbox" id="queimadura" name="imobilizacoes[]" value="auto imobilização">auto imobilização</label>
                           <label class="checkbox-inline"><input type="checkbox" id="queimadura" name="imobilizacoes[]" value="Tração de Fêmur">Tração de Fêmur</label>

                           <textarea class="form-control" name="imobilizacoes[]" id="imobilizacoes" maxlength="350" rows="3" placeholder="Específicas as imobilizacões Efetuadas"></textarea>

                        </div>

                     </div>
                     <div class="form-group row">
                        <label for="local-queimadura" class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">Procedimentos Realizados</label>

                        <div class="col-sm-9">
                           <textarea class="form-control" name="procedimentos[]" id="procedimentos" rows="3" maxlength="350" placeholder="Específicas os procedimentos Realizados"></textarea>

                           <label for="local-queimadura" class="f-bold">Procedimentos Realizados:</label><br>
                           <label class="checkbox-inline"><input type="checkbox" id="queimadura" name="procedimentos[]" value="avaliçãoo inicial">avaliçãoo inicial </label>
                           <label class="checkbox-inline"><input type="checkbox" id="queimadura" name="procedimentos[]" value="avaliação dirigida">avaliação dirigida</label>
                           <label class="checkbox-inline"><input type="checkbox" id="queimadura" name="procedimentos[]" value="avaliação Detalhada">avaliação Detalhada</label>
                           <label class="checkbox-inline"><input type="checkbox" id="queimadura" name="procedimentos[]" value="Respiração Artifial">Respiração Artifial</label>
                           <label class="checkbox-inline"><input type="checkbox" id="queimadura" name="procedimentos[]" value="curativo Simples"> curativo Simples </label>
                           <label class="checkbox-inline"><input type="checkbox" id="queimadura" name="procedimentos[]" value="curativo oclusivo"> curativo oclusivo</label>
                           <label class="checkbox-inline"><input type="checkbox" id="queimadura" name="procedimentos[]" value="curativo compressivo"> curativo compressivo</label>
                           <label class="checkbox-inline"><input type="checkbox" id="queimadura" name="procedimentos[]" value="curativo Empalamento"> curativo Empalamento</label>


                        </div>
                        <div class="form-group row">
                           <label for="usou cinto de segurança" class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">Usou Cinto de Segurança?</label>
                           <div class="col-sm-9">
                              <label class="custom-control custom-radio">
                                 <input id="estado-febril-sim" name="cintoSeg" type="radio" value="Sim" checked class="custom-control-input">
                                 <span class="custom-control-indicator"></span>
                                 <span class="custom-control-description">Sim</span>
                              </label>
                              <label class="custom-control custom-radio">
                                 <input id="cintoSeg" name="cintoSeg" type="radio" value="Não" class="custom-control-input">
                                 <span class="custom-control-indicator"></span>
                                 <span class="custom-control-description">Não</span>
                              </label>
                           </div>
                        </div>

                        <div class="form-group row">
                           <label class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">Usou Capacete</label>
                           <div class="col-sm-9">
                              <label class="custom-control custom-radio">
                                 <input id="Capacete" name="capacete" type="radio" value="Sim" checked class="custom-control-input">
                                 <span class="custom-control-indicator"></span>
                                 <span class="custom-control-description">Sim</span>
                              </label>
                              <label class="custom-control custom-radio">
                                 <input id="Capacete" name="capacete" type="radio" value="Não" class="custom-control-input">
                                 <span class="custom-control-indicator"></span>
                                 <span class="custom-control-description">Não</span>
                              </label>
                           </div>
                        </div>

                        <div class="form-group row">
                           <label class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">Houve óbito?</label>
                           <div class="col-sm-9">
                              <label class="custom-control custom-radio">
                                 <input id="obito" name="obito" type="radio" value="Sim" checked class="custom-control-input">
                                 <span class="custom-control-indicator"></span>
                                 <span class="custom-control-description">Sim</span>
                              </label>
                              <label class="custom-control custom-radio">
                                 <input id="obito" name="obito" type="radio" value="Não" class="custom-control-input">
                                 <span class="custom-control-indicator"></span>
                                 <span class="custom-control-description">Não</span>
                              </label>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="Socorrido" class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">Melhor resposta Verbal</label>
                           <div class="col-sm-9">
                              <select name="mrVerbal" class="form-control" id="Socorrido">
                                 <option value="Normal">Normal</option>
                                 <option value="Confusa">Confusa</option>
                                 <option value="Incompreensível">Incompreensível</option>
                                 <option value="Sem Resposta">Sem Resposta</option>
                              </select>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="Socorrido" class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">Melhor resposta Motora</label>
                           <div class="col-sm-9">
                              <select name="mrMotora" id="mrMotora" class="form-control">

                                 <option value="Obedece Comandos">Obedece Comandos</option>
                                 <option value="Localiza Dor">Localiza Dor</option>
                                 <option value="Flexão Descerebral">Flexão Descerebral</option>
                                 <option value="Extensão Descerebral">Extensão Descerebral</option>
                                 <option value="Sem Resposta">Sem Resposta</option>
                              </select>

                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="aberturaOcular" class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">Abertura Ocular: </label>
                           <div class="col-sm-9">
                              <select name="aberturaOcular" class="form-control" id="aberturaOcular">
                                 <option value="Espontânea">Espontânea</option>
                                 <option value="Ao Estímulo Verbal">Ao Estímulo Verbal</option>
                                 <option value="Ao Estímulo Doloroso">Ao Estímulo Doloroso</option>
                                 <option value="Sem Resposta">Sem Resposta</option>
                              </select>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="aberturaOcular" class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">Escala CIPE: </label>
                           <div class="col-sm-9">
                              <select name="escalaCipe" class="form-control" id="aberturaOcular">
                                 <option value="Estável">Estável</option>
                                 <option value="Agravamento">Agravamento</option>
                                 <option value="Melhora">Melhora</option>
                                 <option value="Instável">Instável</option>
                              </select>
                           </div>
                        </div>
                        <legend style="background-color: #39444E; color: #fff; padding: 5px 10px; border-radius: 5px;">
                           <i class="icofont icofont-ambulance"></i> Transferências do Destino Final do Pacientes
                        </legend>
                        <div class="form-group row">
                           <label for="receptorPaciente" class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;">Responsavél Recepção</label>
                           <div class="col-sm-9">
                              <input type="text" name="receptorPaciente" class="form-control" id="nomePaciente" maxlength="45" placeholder="Responsavél Recepção">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-sm-3 col-form-label" style="font-weight: bold; padding-top: 5px;"><i class="icofont icofont-hospital"></i>Local Transferência</label>
                           <div class="col-sm-9">
                              <label class="custom-control custom-radio">
                                 <input id="estado-febril-sim" name="localTransferencia" value="Em casa(Residência Vitíma)" type="radio" checked class="custom-control-input">
                                 <span class="custom-control-indicator"></span>
                                 <span class="custom-control-description">Em casa(Residência Vitíma)</span>
                              </label>
                              <label class="custom-control custom-radio">
                                 <input id="estado-febril-sim" name="localTransferencia" value="Hospital(centro Médico)" type="radio" checked class="custom-control-input">
                                 <span class="custom-control-indicator"></span>
                                 <span class="custom-control-description">Hospital(centro Médico)</span>
                              </label>
                              <label class="custom-control custom-radio">
                                 <input id="estado-febril-nao" name="localTransferencia" value="Morgas(casas Mortuárias)" type="radio" class="custom-control-input">
                                 <span class="custom-control-indicator"></span>
                                 <span class="custom-control-description">Morgas(casas Mortuárias)</span>
                              </label>
                           </div>
                        </div>

                        <div class="form-group row">
                           <?php
                           $vitimaId = new FichaVitimaAdminModel();
                           ?>
                           <div class="col-sm-9">
                              <input type="hidden" name="vitimaId" value="<?php foreach ($vitimaId->vitimaId() as $idPaciente) : if (!empty($idPaciente['id_dados_basicos'])) : echo $idPaciente['id_dados_basicos'];
                                                                              endif;
                                                                           endforeach; ?>" class="form-control" id="guarnicao">
                           </div>
                        </div>
                        <!-- <div class="form-group row">
                         <label for="Melhor resposta Verbal" class="col-sm-3 col-form-label"
                            style="font-weight: bold; padding-top: 5px;">Melhor resposta Verbal</label>
                         <div class="col-sm-9">
                            <input type="text" class="form-control" id="mResVerbal"
                               placeholder="Melhor resposta Verbal">
                         </div>
                      </div>
    
                      <div class="form-group row">
                         <label for="guarnicao" class="col-sm-3 col-form-label"
                            style="font-weight: bold; padding-top: 5px;">Abertura Ocular</label>
                         <div class="col-sm-9">
                            <input type="text" class="form-control" id="guarnicao"
                               placeholder="Nome da Guarnição">
                         </div>
                      </div>
    
                      <div class="form-group row">
                         <label for="guarnicao" class="col-sm-3 col-form-label"
                            style="font-weight: bold; padding-top: 5px;">Guarnição</label>
                         <div class="col-sm-9">
                            <input type="text" class="form-control" id="guarnicao"
                               placeholder="Nome da Guarnição">
                         </div>
                      </div>-->

                        <!-- Adicione mais campos conforme necessário, como pressão arterial, etc. -->
                        <!-- Botão de submit -->
                        <div class="form-group row">
                           <div class="col-sm-12 text-center">
                              <button type="submit" name="situacaoVitima" value="situacaoVitima" class="btn btn-primary form-control" style="font-weight: bold;"><i class="icofont icofont-ui-user-group"></i>Registrar Situação Vítima <i class="icofont icofont-nurse-alt"></i></button>
                           </div>
                        </div>
                  </fieldset>



               </form>

            </div>
         </div>
      </div>
   </div>
<?php else : ?>

   <?php echo "<script>alert('você não tem acesso a este conteúdo!'); window.location.href='" . DIRPAGE . "painel-Admin';</script>";
   exit;
   ?>
   <?php endif;
   ?>#estduo