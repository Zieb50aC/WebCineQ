$(document).ready(function(){
    
   
    maxP = inicio();
    
    
    //eventos relacionados con los votos
    $('.ec-stars-wrapper').on("mouseenter", votarHovers); //'pinta' las estrellas 
    $('.ec-stars-wrapper').on("mouseleave", insertaVotos); //activa el hover de las estrellas para poder votar
    $('.ec-stars-wrapper a').on("click", insertaVotosCli);
    
    $('.cancelaVoto').on("click", ocultaAlertaVotos())
    
});
  
function nuevaPregunta()
{
    
    
    
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
    
    return count;
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
       $("#fin").show();       
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