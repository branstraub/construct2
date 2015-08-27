


function traerpuntuacion(){

  a = null;
     db_traerpuntuacionJSON(function(data){a = $.parseJSON(data)});
      setTimeout(function(){
        cargarpuntuacion(a);

      },2000);

}


function db_traerpuntuacionJSON(callback){
  $.ajax({
    type: "GET",
    url: "php/get_puntuacion.php",
    data: {tabla:"puntajes"},
    success: callback,
    dataType: "text"
  });
}

function cargarpuntuacion(listaPuntuacion){


  $.each(listaPuntuacion, function(index, puntajes){
    setTimeout(function(){
    
if(puntajes.nombre_user != 'cualquiercosa'){

    $("table tbody").append("<tr>");
    $("table tbody").append("<td>" + puntajes.nombre_user.split('_')[0] + "</td>");
    $("table tbody").append("<td>" + puntajes.puntuacion + "</td>");   
    $("table tbody").append("</tr>");
    }
}
    ,1);
   $(".actions").append("</table>"); 
  });
}


