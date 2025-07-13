$deleteHorarios = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (!empty($deleteHorarios['deleteHorarios'])) :
  $idHorariosDeleter =  (isset($deleteHorarios['idHorariosDeleter'])) ? $idHorariosDeleter = $_POST['idHorariosDeleter'] : $idHorariosDeleter = [];

endif;