$(document).ready(function(){
    
   
    maxP = inicio();
    console.log("maxP: ", maxP);
    
    //eventos relacionados con los votos
    $('.ec-stars-wrapper').on("mouseenter", votarHovers); //'pinta' las estrellas 
    $('.ec-stars-wrapper').on("mouseleave", insertaVotos); //activa el hover de las estrellas para poder votar
    $('.ec-stars-wrapper a').on("click", insertaVotosCli);
    
    $('.cancelaVoto').on("click", ocultaAlertaVotos())
    
});

//ENVIA LA RESPUESTA AL SERVIDOR Y RECIBE SI TRUE/FALSE
function enviaPregunta(num, idPreg, idPP, idUser, idOponente)
{
   // var _token = $('input[name="_token"]').val();
    
    console.log("num ", num);
    console.log("idPreg ", idPreg);   
    $numPre = "pregunta" + num;
    
   // if(typeoff $("input[name='" + $numPre + "']:checked") != 'undefined'){
        $valor = $("input[name='"+$numPre + "']:checked").attr("id");
    //}
   // else{
    //    $valor = "noData";
    //}
    
    $ur = $("#0").attr('ur');
    
    $.ajaxSetup(
    {
        headers:
        {
            'X-CSRF-Token': $('input[name="_token"]').val()
        }
    });
    
    $.ajax({
        data: {"idUsuario" : idUser
             , "idOponente" : idOponente
             , "idPregunta" : idPreg
             , "respuesta"  : $valor
             , "idPP" : idPP
                //, _token : _token
              },
        type: "POST",
        dataType: "json",
        url: $ur,
    })
     .done(function( data, textStatus, jqXHR ) {
         if ( console && console.log ) {
             console.log( "La solicitud se ha completado correctamente." );
             console.log("result: ", data.result );
             console.log("finJuego: ", data.finJuego );
             console.log("finPartida: ", data.finPartida );
             console.log("numPregPartida: ", data.numPregPartida );
             console.log("PartidaIdJ1: ", data.PartidaIdJ1 );
             console.log("idUsuario: ", data.idUsuario );
             
             if(data.result == false)
             {
                 $("#modalKo" + num + "").modal("show");
             }
             else
             {
                 $("#modalOk" + num + "").modal("show");
             }
             /*if(data.finJuego && !data.finPartida)
             {
                 $("#finJuego").modal("show");
             }*/
         }
     })
     .fail(function( jqXHR, textStatus, errorThrown ) {
         if ( console && console.log ) {
             console.log( "La solicitud a fallado: " +  textStatus);
             console.log( "errorThrown: ", errorThrown);
             console.log( "jqXHR: ", jqXHR);
         }
    });
    
}

//estado de inicio de los diferentes elementos
function inicio()
{
    var count = 0;
     $("#preguntas").children().each(function(){
                      
        if( $(this).attr('id') != 'preg0')
        {
            $(this).hide();
        }
         count++;
    });
    
    
    $("#fin").hide();
    ocultaAlertaVotos();
    insertaVotos();
    
    return count/3;
}

//evento siguiente pregunta
function next($i){
    
    if($i<(maxP-1))
    {
        $("#preg"+$i).hide();
        $y = $i+1;
        $("#preg"+$y).show();
    }
    else
    {
       $("#finJuego").modal("show");      
    }
          
}

function timer(){
    $(".digits").countdown({
        image: "img/digits.png",
        format: "ss",
        //endTime: new Date(2013, 12, 2),
        
        stepTime: 60,
        // startTime and format MUST follow the same format.
        // also you cannot specify a format unordered (e.g. hh:ss:mm is wrong)
        //format: "dd:hh:mm:ss",
        //startTime: "01:12:32:55",
        startTime: "55",
        digitImages: 6,//6
        digitWidth: 67,//67
        digitHeight: 90,//90
        timerEnd: function(){
            alert("fin")
        },
        //image: "digits.png",
        continuous: false,
        start: true
    });
    
}

function insertaVotos(){
        
        $total = $('.ec-stars-wrapper').attr('puntuacion');
        //console.log($total);
        
        $('[vota]').each(function(){
            if($(this).attr('vota') <= $total){
                $(this).addClass('star_color');
            }
        });
        
    }
    
function votarHovers(){
    console.log("entra en hover")
    $('[vota]').each(function(){
        if($(this).attr('vota') <= $total){
            $(this).removeClass('star_color');
        }
    });
}
function insertaVotosCli (){
        
        $('#textoVoto').empty();
        $num = $(this).attr("vota");
        
        $('#votar').attr('value', $num);
        $('#textoVoto').prepend("Deseas votar con " + $num + " estrellas?");
        $('#alerta').modal('toggle');
        
    }
function ocultaAlertaVotos (){
        
        $('#textoVoto').text("");
    }