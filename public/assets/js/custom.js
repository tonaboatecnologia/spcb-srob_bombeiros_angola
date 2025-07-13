$(document).ready(function () {
  function getRoot() {
    return "http://" + document.location.hostname + "/spcb/";
  }
  //++++++++++++++++++++++Zona Usuários++++++++++++++++++++++++
  $(document).on("click", ".page-link", function (e) {
    e.preventDefault();
    idDel = $(this).attr("href");
    // 
    Url = getRoot() + idDel,

      alert(Url)
    $.ajax({
      url: getRoot() + idDel,
      type: "get",
      data: { id: idDel },
      success: function () {
        //$(".retornoTb").html(data);
        window.location.href = idDel;
        e.preventDefault();


        alert(loc);


      },
    });

  });
  //pesquisa dinámica
  $("#searchUsers").keyup(function () {
    var searchUsers = $(this).val();

    var limitUsers = $("#limitUsers").val();
    var orderUsers = $("#orderUsers").val();

    if (searchUsers != "" && limitUsers != "" && orderUsers != "") {

      $.ajax({
        url: getRoot() + "gerenciar-Usuarios/searchUsers/" + searchUsers + "/" + orderUsers + "/" + limitUsers,
        type: "post",
        dataType: "html",
        data: { pesquisa: searchUsers, orderUsers, limitUsers },
        success: function (data) {
          $(".retornoTb").html(data);
          $('.retornoTb').scrollTop($('.retornoTb').prop("scrollHeight"));

        },
      });
    } else {
      $(".retornoTb").html(data);
      $('.retornoTb').scrollTop($('.retornoTb').prop("scrollHeight"));

    }
  });

  //pesquisa com dinámica com submit
  $("#userFormSearch").on("submit", function (event) {
    event.preventDefault();

    var searchUsers = $("#searchUsers").val();
    var limitUsers = $("#limitUsers").val();
    var orderUsers = $("#orderUsers").val();

    if (searchUsers != "" && limitUsers != "" && orderUsers != "") {
      $.ajax({
        url: getRoot() + "gerenciar-Usuarios/searchUsers/" + searchUsers + "/" + orderUsers + "/" + limitUsers,
        type: "post",
        dataType: "html",
        data: { pesquisa: searchUsers, orderUsers, limitUsers },
        success: function (data) {
          $(".retornoTb").html(data);
        },
      });
    } else {
      $(".retornoTb").html(data);
    }


  });

  //deleção de dados

  //deleção singular
  $(document).on("click", ".deleteUsers", function () {
    var idDel = $(this).attr("rel");
    //  alert(idDel);
    var concordo = window.confirm("Deseja Realmente Excluir esses Dados?");
    if (concordo) {
      $.ajax({
        url: getRoot() + "gerenciar-Usuarios/deleteUsers/" + idDel,
        type: "post",
        data: { id: idDel },
        success: function () {
          alert("Usuário Excluido com Sucesso!");
          //alert(data)
          Swal.fire(
            "Operação sucedida!",
            "Dados de Usuário excluidos com sucesso!",
            "success"
          );
          setTimeout(() => { location.reload(); }, 3000);

        },
      });
    } else {
      alert("Usuário não Excluido no Sistema!");

      Swal.fire(
        "Operação Cancelada!",
        "Dados de Usuário não Excluidos do Sistema!",
        "error"
      );
    }
  });

  //esvaziar tabela
  $(document).on("click", "#truncateUsers", function (e) {
    e.preventDefault();
    var idDel = $(this).attr("rel");
    // alert(idDel);
    var concordo = window.confirm(
      "Deseja Realmente Excluir Todos Usuários do Sistema?"
    );
    if (concordo) {
      $.ajax({
        url: getRoot() + "gerenciar-Usuarios/truncateUsers/" + idDel,
        type: "post",
        data: { id: idDel },
        success: function () {
          alert("Todos Usuários Excluidos com Sucesso do Sistema!");
          Swal.fire(
            "Operação sucedida!",
            "Todos dados de Usuários Excluidos com Sucesso do Sistema!",
            "success"
          );

        },
      });
    } else {
      alert("falha! Todos dados de Usuários Não Excluidos do Sistema!!");

      Swal.fire(
        "Operação Cancelada!",
        "Falha! Todos dados de Usuários Não Excluidos do Sistema!!",
        "error"
      );
    }
  });
  //deleção multípla
  $(document).on("click", "#de«leteMltUser", function () {
    var idDel = $(this).attr("rel");
    alert(idDel);
    var concordo = window.confirm("Deseja Realmente Excluir mul esses Dados?");
    if (concordo) {
      $.ajax({
        url: getRoot() + "gerenciar-Usuarios/deleteMultUser/" + idDel,
        type: "post",
        data: { id: idDel },
        success: function (e) {
          e.preventDefault();

          alert("Usuários Excluidos mul com Sucesso!");
          //alert(data)
          Swal.fire(
            "Operação sucedida!",
            "Dados de Usuários mul excluidos com sucesso!",
            "success"
          );
        },
      });
    } else {
      alert("Usuários não  mul Excluido no Sistema!");

      Swal.fire(
        "Operação Cancelada!",
        "Dados de mul Usuários não Excluidos do Sistema!",
        "error"
      );
    }
  });
  $(".deleteMultUser").on("click", function (e) {

    if (confirm("Deseja Realmente apagar esses Dados?")) {
      window.location.href = getRoot() + "gerenciar-Usuarios#!";
      Swal.fire(
        "Usuário Deletado com sucesso!",
        "Operação Sucedida!",
        "success"
      );
      setTimeout(() => { location.reload(); }, 3000);

    } else {
      e.preventDefault();
      Swal.fire("Usuários não deletados!", "Operação Cancelada!", "error");
    }
  });
  //terminar sessão
  $(".sair").on("click", function (e) {
    e.preventDefault();

    const DIRPAGE = " http://" + document.location.hostname + "/spcb/";
    var concordo = window.confirm(
      "Deseja Realmente Terminar a sua Sessão e Sair do Sistema?"
    );
    if (concordo) {
      window.location.href = DIRPAGE + "sair-Sistema";
    } else {
      Swal.fire("Operação Cancelada!", "Logado no Sistema!", "success");
    }
    // Swal.fire({title:'Terminar Sessão!', text:'Deseja Realmente Terminar a sua Sessão e Sair do Sistema?', icon:'warning', showCancelButton: true, confirmButtonColor:'#3885d6', cancelButtonColor:'#d33', confirmButtonText:'Sim, Terminar Sessão!'}).then((result) => { if(result){window.location.href = DIRPAGE+"sair-Sistema"; Swal.fire('Sessão Terminada!', 'Deslogado do Sistema com sucesso!','success');  }else{Swal.fire('Operação Cancelada!', 'Logado no Sistema!','success');}});
  });
  //ediçao usuários
  $(document).on("click", ".editUsers", function () {
    var edit = $(this).attr("rel");

    // alert(edit);
    $("#editUserModal").modal("show");
    $.ajax({
      url: getRoot() + "gerenciar-Usuarios/selectUsers/" + edit,
      type: "post",
      data: { id: edit },
      success: function (data) {
        $("#updateUsers").html(data);

      },
    });
  });

  //relatórios usuários

  //melhor solução geração pdf e excel
  $(document).on("click", ".excelUsers", function () {
    var searchUsers = $("#searchUsers").val();

    //verificar se há algo diferente
    //alert(searchUsers)
    if (searchUsers != "") {
      if (confirm("Deseja Realmente gerar o arquivo Excel com base os Dados da Pesquisa?")) {
        window.location.href = getRoot() + "relatorio-Usuarios/gerarExcel/" + searchUsers;
        Swal.fire(
          "Gerando Arquivo Excel com os Dados Pesquisados!",
          "Operação Sucedida!",
          "success");
        setTimeout(() => { location.reload(); }, 3000);

      } else {
        Swal.fire("Operação Cancelada Nenhuma Dado Pesquisado!", "Necessário Realizar a Pesquisa para gerar o Excel!", "error");
        e.preventDefault();
      }
    } else {
      if (confirm("Deseja Realmente gerar o arquivo Excel com todos dados?")) {

        window.location.href = getRoot() + "relatorio-Usuarios/gerarExcel/" + searchUsers;
        Swal.fire(
          "Gerando Arquivo Excel com todos os Dados!",
          "Operação Sucedida!",
          "success");
      } else {
        Swal.fire("Operação Cancelada", "Necessário Permitir a Operação para gerar o Excel!", "error");
        e.preventDefault();
      }
    }
  });
  $(document).on("click", ".pdfUsers", function () {
    var searchUsers = $("#searchUsers").val();

    //verificar se há algo diferente
    //alert(searchUsers)
    if (searchUsers != "") {
      if (confirm("Deseja Realmente gerar o arquivo PDF com base os Dados da Pesquisa?")) {
        window.location.href = getRoot() + "relatorio-Usuarios/gerarPdf/" + searchUsers;
        Swal.fire(
          "Gerando Arquivo PDF com os Dados Pesquisados!",
          "Operação Sucedida!",
          "success");
        setTimeout(() => { location.reload(); }, 3000);

      } else {
        Swal.fire("Operação Cancelada Nenhuma Dado Pesquisado!", "Necessário Realizar a Pesquisa para gerar o PDF!", "error");
        e.preventDefault();
      }
    } else {
      if (confirm("Deseja Realmente gerar o arquivo PDF com todos dados?")) {

        window.location.href = getRoot() + "relatorio-Usuarios/gerarPdf/" + searchUsers;
        Swal.fire(
          "Gerando Arquivo PDF com todos os Dados!",
          "Operação Sucedida!",
          "success");

      } else {
        Swal.fire("Operação Cancelada", "Necessário Permitir a Operação para gerar o PDF!", "error");
        e.preventDefault();
      }
    }
  });
  //edição de imagem
  $(document).on("click", ".editeImg", function () {
    var edit = $(this).attr("rel");

    // alert(edit);
    $("#editImgModal").modal("show");
    $.ajax({
      url: getRoot() + "gerenciar-Usuarios/selectImg/" + edit,
      type: "post",
      data: { id: edit },
      success: function (data) {
        $("#updateImg").html(data);


      },
    });
  });
  //visualizar details
  $(document).on("click", ".viewUsers", function () {
    var edit = $(this).attr("rel");
    //alert(edit);
    $("#viewUserModal").modal("show");

    $.ajax({
      url: getRoot() + "gerenciar-Usuarios/viewDetailsUsers/" + edit,
      type: "post",
      data: { id: edit },
      success: function (data) {
        $("#detailsUsers").html(data);
      },
    });

    //edição de dados

  });
  //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  //+++++++++++++++++++++++++++++Território Configurações++++++++++++++++++++++++++++

  //++++++++++++++++++++++Zona Veiculos ou Viaturas++++++++++++++++++++++++++++++++++
  //pesquisa dinámica
  $("#searchCars").keyup(function () {
    var searchCars = $(this).val();
    var limitCars = $("#limitCars").val();
    var orderCars = $("#orderCars").val();

    if (searchCars != "" && limitCars != "" && orderCars != "") {
      $.ajax({
        url: getRoot() + "gerenciar-Veiculos/searchCars/" + searchCars + "/" + orderCars + "/" + limitCars,
        type: "post",
        dataType: "html",
        data: { pesquisa: searchCars, orderCars, limitCars },
        success: function (data) {
          $(".returnCars").html(data);
        },
      });
    } else {
      $(".returnCars").html(data);
    }
  });
  //submit
  $("#CarsFormSearch").on("submit", function (event) {
    event.preventDefault();

    var searchCars = $("#searchCars").val();
    var limitCars = $("#limitCars").val();
    var orderCars = $("#orderCars").val();

    if (searchCars != "" && limitCars != "" && orderCars != "") {
      $.ajax({
        url: getRoot() + "gerenciar-Veiculos/searchCars/" + searchCars + "/" + orderCars + "/" + limitCars,
        type: "post",
        dataType: "html",
        data: { pesquisa: searchCars, orderCars, limitCars },
        success: function (data) {
          $(".returnCars").html(data);
        },
      });
    } else {
      $(".returnCars").html(data);
    }


  });

  //melhor solução geração pdf e excel
  $(document).on("click", ".excelCars", function () {
    var searchUsers = $("#searchCars").val();

    //verificar se há algo diferente
    //alert(searchUsers)
    if (searchUsers != "") {
      if (confirm("Deseja Realmente gerar o arquivo Excel com base os Dados da Pesquisa?")) {
        window.location.href = getRoot() + "relatorio-Veiculos/gerarExcel/" + searchUsers;
        Swal.fire(
          "Gerando Arquivo Excel com os Dados Pesquisados!",
          "Operação Sucedida!",
          "success");
      } else {
        Swal.fire("Operação Cancelada Nenhuma Dado Pesquisado!", "Necessário Realizar a Pesquisa para gerar o Excel!", "error");
        e.preventDefault();
      }
    } else {
      if (confirm("Deseja Realmente gerar o arquivo Excel com todos dados?")) {

        window.location.href = getRoot() + "relatorio-Veiculos/gerarExcel/" + searchUsers;
        Swal.fire(
          "Gerando Arquivo Excel com todos os Dados!",
          "Operação Sucedida!",
          "success");

      } else {
        Swal.fire("Operação Cancelada", "Necessário Permitir a Operação para gerar o Excel!", "error");
        e.preventDefault();
      }
    }
  });
  $(document).on("click", ".pdfCars", function () {
    var searchUsers = $("#searchCars").val();

    //verificar se há algo diferente
    //alert(searchUsers)
    if (searchUsers != "") {
      if (confirm("Deseja Realmente gerar o arquivo PDF com base os Dados da Pesquisa?")) {
        window.location.href = getRoot() + "relatorio-Veiculos/gerarPdf/" + searchUsers;
        Swal.fire(
          "Gerando Arquivo PDF com os Dados Pesquisados!",
          "Operação Sucedida!",
          "success");
      } else {
        Swal.fire("Operação Cancelada Nenhuma Dado Pesquisado!", "Necessário Realizar a Pesquisa para gerar o PDF!", "error");
        e.preventDefault();
      }
    } else {
      if (confirm("Deseja Realmente gerar o arquivo PDF com todos dados?")) {

        window.location.href = getRoot() + "relatorio-Veiculos/gerarPdf/" + searchUsers;
        Swal.fire(
          "Gerando Arquivo PDF com todos os Dados!",
          "Operação Sucedida!",
          "success");

      } else {
        Swal.fire("Operação Cancelada", "Necessário Permitir a Operação para gerar o PDF!", "error");
        e.preventDefault();
      }
    }
  });
  //deleção de dados
  //deleção singular
  $(document).on("click", ".deleteCars", function () {
    var idDel = $(this).attr("rel");
    //  alert(idDel);
    var concordo = window.confirm("Deseja Realmente Excluir esses Dados?");
    if (concordo) {
      $.ajax({
        url: getRoot() + "gerenciar-Veiculos/deleteCars/" + idDel,
        type: "post",
        data: { id: idDel },
        success: function () {
          alert("Usuário Excluido com Sucesso!");
          //alert(data)
          Swal.fire(
            "Operação sucedida!",
            "Dados de Usuário excluidos com sucesso!",
            "success"
          );
        },
      });
    } else {
      alert("Usuário não Excluido no Sistema!");

      Swal.fire(
        "Operação Cancelada!",
        "Dados de Usuário não Excluidos do Sistema!",
        "error"
      );
    }
  });
  $(".deleteMultCars").on("click", function (e) {

    if (confirm("Deseja Realmente apagar esses Dados?")) {
      window.location.href = getRoot() + "gerenciar-Veiculos#!";
      Swal.fire(
        "Dados Deletado com sucesso!",
        "Operação Sucedida!",
        "success"
      );
    } else {
      e.preventDefault();
      Swal.fire("Viaturas não deletados!", "Operação Cancelada!", "error");
    }
  });
  //esvaziar tabela
  $(document).on("click", "#truncateCars", function (e) {
    e.preventDefault();
    var idDel = $(this).attr("rel");
    // alert(idDel);
    var concordo = window.confirm(
      "Deseja Realmente Excluir Todos Usuários do Sistema?"
    );
    if (concordo) {
      $.ajax({
        url: getRoot() + "gerenciar-Veiculos/truncateCars/" + idDel,
        type: "post",
        data: { id: idDel },
        success: function () {
          alert("Todos Usuários Excluidos com Sucesso do Sistema!");
          Swal.fire(
            "Operação sucedida!",
            "Todos dados de Usuários Excluidos com Sucesso do Sistema!",
            "success"
          );
        },
      });
    } else {
      alert("falha! Todos dados de Usuários Não Excluidos do Sistema!!");

      Swal.fire(
        "Operação Cancelada!",
        "Falha! Todos dados de Usuários Não Excluidos do Sistema!!",
        "error"
      );
    }
  });

  //ediçao usuários
  $(document).on("click", ".editCars", function () {
    var edit = $(this).attr("rel");

    //alert(edit);
    $("#editCarsModal").modal("show");
    $.ajax({
      url: getRoot() + "gerenciar-Veiculos/selectCars/" + edit,
      type: "post",
      data: { idCars: edit },
      success: function (data) {
        $(".updateCars").html(data);
      },
    });
  });

  //visualizar details
  $(document).on("click", ".viewCars", function () {
    var edit = $(this).attr("rel");
    //alert(edit);
    $("#viewCarsModal").modal("show");
    $.ajax({
      url: getRoot() + "gerenciar-Veiculos/viewdetailsCars /" + edit,
      type: "post",
      data: { id: edit },
      success: function (data) {
        $("#detailsCars ").html(data);
      },
    });

    //edição de dados

  });
  //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

  //++++++++++++++++Relatório final++++++++++++++++
  //ediçao usuários
  $(document).on("click", ".editOcorrnces", function () {
    var edit = $(this).attr("rel");

    alert(edit);
    $("#editOcorrences").modal("show");
    $.ajax({
      url: getRoot() + "visualizar-Ocorrencias/selectOcorrencias/" + edit,
      type: "post",
      data: { idCars: edit },
      success: function (data) {
        $("#updateOcorrencias").html(data);
      },
    });
  });

  //view details
  $(document).on("click", ".viewOcorrences", function () {
    var edit = $(this).attr("rel");
    //alert(edit);
    $("#viewOcorrences").modal("show");

    $.ajax({
      url: getRoot() + "visualizar-Ocorrencias/viewDetailsOcorrencias/" + edit,
      type: "post",
      data: { id: edit },
      success: function (data) {
        $("#detailsOcorrencias").html(data);
      },
    });

    //edição de dados

  });
  $(document).on("click", ".deleteOcorrences", function () {
    var idDel = $(this).attr("rel");
    //  alert(idDel);
    var concordo = window.confirm("Deseja Realmente Excluir esses Dados?");
    if (concordo) {
      $.ajax({
        url: getRoot() + "visualizar-Ocorrencias/deleteOcorrencias/" + idDel,
        type: "post",
        data: { id: idDel },
        success: function () {
          alert("Ocorrência Excluido com Sucesso!");
          //alert(data)
          Swal.fire(
            "Operação sucedida!",
            "Dados de Ocorrência excluidos com sucesso!",
            "success"
          );
        },
      });
    } else {
      alert("Ocorrência não Excluido no Sistema!");

      Swal.fire(
        "Operação Cancelada!",
        "Dados de Ocorrência não Excluidos do Sistema!",
        "error"
      );
    }
  });
  $(".deleteMultOcorrences").on("click", function (e) {

    if (confirm("Deseja Realmente apagar esses Dados?")) {
      window.location.href = getRoot() + "visualizar-Ocorrencias#!";
      Swal.fire(
        "Dados Deletado com sucesso!",
        "Operação Sucedida!",
        "success"
      );
    } else {
      e.preventDefault();
      Swal.fire("Ocorrência não deletados!", "Operação Cancelada!", "error");
    }
  });

  //pesquisa dinámica
  //pesquisa dinámica
  $("#searchOcorrences").keyup(function () {
    // alert("certo")
    var searchOcorrences = $(this).val();
    var dataInicio = $("#dateIniciOcorrences").val();
    var dataFim = $("#dateFimOcorrences").val();
    var limitOcorrences = $("#limitOcorrences").val();
    var orderOcorrences = $("#orderOcorrences").val();

    if (searchOcorrences != "" && dataInicio != "" && dataFim != "" && limitOcorrences != "" && orderOcorrences != "") {

      $.ajax({
        url: getRoot() + "visualizar-Ocorrencias/searchOcorrences/" + searchOcorrences + "/" + dataInicio + "/" + dataFim + "/" + orderOcorrences + "/" + limitOcorrences,
        type: "post",
        dataType: "html",
        data: { pesquisa: searchOcorrences, dataInicio, dataFim, orderOcorrences, limitOcorrences },
        success: function (data) {

          $(".returnTbOcorrences").html(data);
        },
      });
    } else {
      $(".returnTbOcorrences").html(data);
    }
  });

  //pesquisa com dinámica com submit
  $("#OcorrencesFormSearch").on("submit", function (event) {
    event.preventDefault();
    alert("certo")

    var searchOcorrences = $(this).val();
    var dataInicio = $("#dateIniciOcorrences").val();
    var dataFim = $("#dateFimOcorrences").val();
    var limitOcorrences = $("#limitOcorrences").val();
    var orderOcorrences = $("#orderOcorrences").val();

    if (searchOcorrences != "" && dataInicio != "" && dataFim != "" && limitOcorrences != "" && orderOcorrences != "") {

      $.ajax({
        url: getRoot() + "visualizar-Ocorrencias/searchOcorrences/" + searchOcorrences + "/" + dataInicio + "/" + dataFim + "/" + orderOcorrences + "/" + limitOcorrences,
        type: "post",
        dataType: "html",
        data: { pesquisa: searchOcorrences, dataInicio, dataFim, orderOcorrences, limitOcorrences },
        success: function (data) {
          alert("sucess")

          $(".returnTbOcorrences").html(data);
        },
      });
    } else {
      $(".returnTbOcorrences").html(data);
    }


  });

  //relatórios usuários

  //melhor solução geração pdf e excel
  $(document).on("click", "#excelOcorrences", function () {
    var searchOcorrences = $("#searchOcorrences").val();
    var dataInicio = $("#dateIniciOcorrences").val();
    var dataFim = $("#dateFimOcorrences").val();
    var limitOcorrences = $("#limitOcorrences").val();
    var orderOcorrences = $("#orderOcorrences").val();
    //verificar se há algo diferente
    //alert(searchUsers)
    if (searchOcorrences != "" && dataInicio != "" && dataFim != "" && limitOcorrences != "" && orderOcorrences != "") {
      if (confirm("Deseja Realmente gerar o arquivo Excel com base os Dados da Pesquisa?")) {
        window.location.href = getRoot() + "relatorio-Final/gerarExcel/" + searchOcorrences + "/" + dataInicio + "/" + dataFim + "/" + orderOcorrences + "/" + limitOcorrences;
        Swal.fire(
          "Gerando Arquivo Excel com os Dados Pesquisados!",
          "Operação Sucedida!",
          "success");
      } else {
        Swal.fire("Operação Cancelada Nenhuma Dado Pesquisado!", "Necessário Realizar a Pesquisa para gerar o Excel!", "error");
        e.preventDefault();
      }
    } else {
      if (confirm("Deseja Realmente gerar o arquivo Excel com todos dados?")) {

        window.location.href = getRoot() + "relatorio-Final/relatorioFinalExcel";
        Swal.fire(
          "Gerando Arquivo Excel com todos os Dados!",
          "Operação Sucedida!",
          "success");

      } else {
        Swal.fire("Operação Cancelada", "Necessário Permitir a Operação para gerar o Excel!", "error");
        e.preventDefault();
      }
    }
  });
  $(document).on("click", ".pdfOcorrences", function () {
    var searchOcorrences = $("#searchOcorrences").val();
    var dataInicio = $("#dateIniciOcorrences").val();
    var dataFim = $("#dateFimOcorrences").val();
    var limitOcorrences = $("#limitOcorrences").val();
    var orderOcorrences = $("#orderOcorrences").val();

    //verificar se há algo diferente
    //alert(searchUsers)
    if (searchOcorrences != "" && dataInicio != "" && dataFim != "" && limitOcorrences != "" && orderOcorrences != "") {
      if (confirm("Deseja Realmente gerar o arquivo PDF com base os Dados da Pesquisa?")) {
        window.location.href = getRoot() + "relatorio-Final/gerarPdf/" + searchOcorrences + "/" + dataInicio + "/" + dataFim + "/" + orderOcorrences + "/" + limitOcorrences;
        Swal.fire(
          "Gerando Arquivo PDF com os Dados Pesquisados!",
          "Operação Sucedida!",
          "success");
      } else {
        Swal.fire("Operação Cancelada Nenhuma Dado Pesquisado!", "Necessário Realizar a Pesquisa para gerar o PDF!", "error");
        e.preventDefault();
      }
    } else {
      if (confirm("Deseja Realmente gerar o arquivo PDF com todos dados?")) {

        window.location.href = getRoot() + "relatorio-Final/relatorioFinalPdf";
        Swal.fire(
          "Gerando Arquivo PDF com todos os Dados!",
          "Operação Sucedida!",
          "success");

      } else {
        Swal.fire("Operação Cancelada", "Necessário Permitir a Operação para gerar o PDF!", "error");
        e.preventDefault();
      }
    }
  });
  //*+++++++++++++++++++++++++++++++++++++++++++++++



  $(document).on("click", ".highcharts-menu-item", function () {
    alert("olá mundo")
  });

  $(document).on("click", ".deletHorairos", function () {
    var idDel = $(this).attr("rel");
    alert(idDel);
    var concordo = window.confirm("Deseja Realmente Excluir ajax esses Dados?");
    if (concordo) {
      $.ajax({
        url: getRoot() + "gerenciar-Horarios-Viaturas/deleteHorarios/" + idDel,
        type: "post",
        data: { id: idDel },
        success: function () {
          alert("horários Excluido com Sucesso!");
          //alert(data)
          Swal.fire(
            "Operação sucedida!",
            "Dados de Horários excluidos com sucesso!",
            "success"
          );
        },
      });
    } else {
      alert("Usuário não Excluido no Sistema!");

      Swal.fire(
        "Operação Cancelada!",
        "Dados de Usuário não Excluidos do Sistema!",
        "error"
      );
    }
  });



});

//gráficos
// ocorrencias
