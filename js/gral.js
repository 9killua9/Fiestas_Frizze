/* @author: Leandro Salar, Marcelo Salar. @version: 0.1;  */

/* Declaracion de variables
============================ */
$url     = 'http://www.reiatsu.com.ar/clientes/frizze/facebook/fiestas_frizze/php/ajax.php';
$urlFbk  = 'php/facebook/ajax.php';
$nImagen = 0;

/* Inicio del doc  
=================== */
$(document).ready(function(){
    /* clase .nada hace que no se envien datos ni funcionen clicks 
==================================================================== */    
    cargaLoadDelSite("modulo/inicio.php?h=0"); 
});

/* Comienzo de las funciones 
=================================================================== */

function cargaLoadDelSite(mod)
{
    $("#cuerpoCargaContenido").fadeOut(300,function(){
        $(this).load(mod).stop().fadeIn('slow');
    });
}

function cargaFuncionesEvAc(id)
{   
    $("form[name=guardaAsociado] input[name=id]").val(id);
    $data = 'h=traeInfo&id='+id;
    lmPost($url,$data,"traeInfo");
    /* Carga los datos de los textos */
    /*$data = 'h=traeFotos';
    lmPost($urlFbk,$data,"traeFotos");*/
    cargaHome();

    $("form[name=guardaAsociado]").submit(function(a){
        a.preventDefault();
        // creamos nuestra regla con expresiones regulares.
        var filter = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
        
        if($("form[name=guardaAsociado] input[name=email]").val() != '' )
            if( validar_email($("form[name=guardaAsociado] input[name=email]").val()) )
            {                
                $data = 'h=cargaEmail&'+$("form[name=guardaAsociado]").serialize();
                lmPost($url,$data,"cargaEmail");
            }
            else
            {   
                $(".campoAvisoEmailVacio, .campoAvisoEmailIncorrecto").hide();
                $(".asociateAlEvento").append('<div class="floatLeft campoAvisoEmailIncorrecto"><p class="floatLeft">Su Email es incorrecto</p></div>');
            }                    
        else
        {
            $(".campoAvisoEmailIncorrecto, .campoAvisoEmailVacio").hide();
            $(".asociateAlEvento").append('<div class="floatLeft campoAvisoEmailVacio"><p class="floatLeft">Complete el campo email</p></div>');
        }        
    }).click(function(){
        $(".campoAvisoEmailVacio, .campoAvisoEmailIncorrecto").hide();
    });
    
}
function cargaFuncionesEvPas(id)
{
    $data = 'h=traeInfo&id='+id;
    lmPost($url,$data,"traeInfoPas");
    cargaHome();
}
function muestraEvento(id, cual)
{
   cargaLoadDelSite("modulo/"+cual+"?id="+id);
}
function cargaInicio()
{   
    $("form[name=cargaInicio]").submit(function(a){
            a.preventDefault();
            provContDonde($("select[name=cambiaProvincia]").val(),0);

    });
    
    $(".logo").click(function(){
       cargaLoadDelSite("modulo/inicio.php?h=0"); 
    });
}
function buscaPorMes(mes)
{
    var tam=35;
    $(".mesesDelAno").animate({height:tam},500,function(){});   

    $data = 'h=cargaEventosHomeMes&mes='+mes;
    lmPost($url,$data,"cargaEventosHome");    
}
function cargaHome()
{
    $('.volverEventos').click(function(){
        cargaLoadDelSite("modulo/home.php");
    });
}

function homeSeccion()
{
    $data = 'h=cargaEventosHome';
    lmPost($url,$data,"cargaEventosHome");

    cargaInicio();
    slideHrizontal();
    sectorMeses();

    $("form[name=buscadorFrizze]").submit(function(a){a.preventDefault();});
    $(".buscadorImagen").click(function(){

       if($("form[name=buscadorFrizze] input[name=buscar]").val() != '' && $("form[name=buscadorFrizze] input[name=buscar]").val().length >= 1)
       {

            $buscar = $("form[name=buscadorFrizze] input[name=buscar]").val();
            cargaLoadDelSite("modulo/buscador.php?buscar="+$buscar);
       }
       else
       {    
            $("form[name=buscadorFrizze] input[name=buscar]").attr('placeholder','Ingrese evento');
       }

    });
    
}

function sectorMeses(){
    $(".flechaDespliega").click(function(){        
         height = parseInt($(".mesesDelAno").height());
        if(height != 35)
            var tam=35;
        else
            var tam=431;
        $(".mesesDelAno").animate({height:tam},500,function(){});   
    });
}

function buscadorSeccion()
{
    $("form[name=buscadorFrizze]").submit(function(a){
        a.preventDefault();
        return false;
    });  
    $(".buscadorImagen").click(function(){

       if($("form[name=buscadorFrizze] input[name=buscar]").val() != '' && $("form[name=buscadorFrizze] input[name=buscar]").val().length >= 1)
       {

            $buscar = $("form[name=buscadorFrizze] input[name=buscar]").val();
            buscadorDeDatos($buscar);
       }
       else
       {    
            $("form[name=buscadorFrizze] input[name=buscar]").attr('placeholder','Ingrese evento');
       }

    });
}
function buscadorDeDatos(buscar)
{
    $data = 'h=traeInfoParaElBuscador&buscar='+buscar;
    lmPost($url,$data,"traeInfoParaElBuscador");
}
function cargaHome()
{
    $('.volverEventos').click(function(){
        cargaLoadDelSite("modulo/home.php");
    });
}

 function validar_email(valor)
{
    // creamos nuestra regla con expresiones regulares.
    var filter = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
    // utilizamos test para comprobar si el parametro valor cumple la regla
    if(filter.test(valor))
        return true;
    else
        return false;
}


function provCont(id,p)
{
    switch(id)
    {
        case 0:
            //Buenos aires
            prov = "Buenos Aires";
        break;
        case 3:
            prov = "Cordoba";
        break;
        case 2:
            prov = "Entre Rios";
        break;
        case 12:
            prov = "Jujuy";
        break;
        case 16:
            prov = "Mendoza";
        break;
        case 17:
            prov = "Neuquen";
        break;
        case 10:
            prov = "Salta";
        break;
        case 15:
            prov = "San Juan";
        break;
        case 20:
            prov = "Santa Cruz";
        break;
        case 4:
            prov = "Santa Fe";
        break;
        case 9:
            prov = "Santiago del Estero";
        break;
        case 11:
            prov = "Tucuman";
        break;
        case 12:
            prov = "Jujuy";
        break;
        case 8:
            prov = "Catamarca";
        break;
        case 14:
            prov = "Chaco";
        break;
        case 13:
            prov = "Formosa";
        break;
        case 5:
            prov = "Corrientes";
        break;
        case 6:
            prov = "Misiones";
        break;
        case 7:
            prov = "La Rioja";
        break;
        case 1:
            prov = "San Luis";
        break;
        case 23:
            prov = "La Pampa";
        break;
        case 18:
            prov = "Rio Negro";
        break;
        case 21:
            prov = "Tierra del Fuego";
        break;
        case 19:
            prov = "Chubut";
        break;
        default:
            prov = "no disponible";
        break;
    }
    console.log(prov);
    $("#muestraProv").html(prov)
}

function provContDonde(id,p)
{
    switch(id)
    {
        case 0:
            //Buenos aires
            prov = "Buenos Aires";
        break;
        case 3:
            prov = "Cordoba";
        break;
        case 2:
            prov = "Entre Rios";
        break;
        case 12:
            prov = "Jujuy";
        break;
        case 16:
            prov = "Mendoza";
        break;
        case 17:
            prov = "Neuquen";
        break;
        case 10:
            prov = "Salta";
        break;
        case 15:
            prov = "San Juan";
        break;
        case 20:
            prov = "Santa Cruz";
        break;
        case 4:
            prov = "Santa Fe";
        break;
        case 9:
            prov = "Santiago del Estero";
        break;
        case 11:
            prov = "Tucuman";
        break;
        case 12:
            prov = "Jujuy";
        break;
        case 8:
            prov = "Catamarca";
        break;
        case 14:
            prov = "Chaco";
        break;
        case 13:
            prov = "Formosa";
        break;
        case 5:
            prov = "Corrientes";
        break;
        case 6:
            prov = "Misiones";
        break;
        case 7:
            prov = "La Rioja";
        break;
        case 1:
            prov = "San Luis";
        break;
        case 23:
            prov = "La Pampa";
        break;
        case 18:
            prov = "Rio Negro";
        break;
        case 21:
            prov = "Tierra del Fuego";
        break;
        case 19:
            prov = "Chubut";
        break;
        default:
            prov = "no disponible";
        break;
    }

    $data = 'h=donde&donde='+prov;
    lmPost($url,$data,"donde");
}

function slideHrizontal()
{
/*  SLIDE  VERTICAL */
    // efecto sombra vertical derecho
    $(".conFlechaBottom").hover(function(){
        $(".sombraFlechaHomeBottom").css({"background-image": "url(template/home/sombre_bottom.png)", 'opacity':'0'}).fadeTo(1000,0.8);   
    },function(){
        $(".sombraFlechaHomeBottom").css({"background-image": "none", 'opacity': '1'});
    });
    // efecto sombra vertical derecho
    $(".conFlechaTop").hover(function(){
        $(".sombraFlechaHomeTop").css({"background-image": "url(template/home/sombre_top.png)", 'opacity':'0'}).fadeTo(1000,0.8);
    },function(){
        $(".sombraFlechaHomeTop").css({"background-image": "none", 'opacity': '1'});
    });

    //  funcionamiento despues de hacer click
    $(".conFlechaBottom").click(function(){    
        mTop    = parseInt($(".slideContenedorDesliza").css('margin-top'));
        height  = parseInt($(".slideContenedorDesliza").height()) 
        cant = $(".W257X112").length;
        if(cant >  4)
            toques = Math.floor(cant/4);
        else
            toques = 0;

        console.log(mTop)
        cToques = parseInt($("#toques").html());

        if(cToques > 1)
        {
            $(".slideContenedorDesliza").animate({marginTop:'-='+230},'slow',function(){});
            $("#toques").html(cToques-1);
        }
        else
            $(".slideContenedorDesliza").animate({marginTop:'-'+230*toques},'slow',function(){});
    });    
    //  funcionamiento despues de hacer click
    $(".conFlechaTop").click(function(){
        mTop = parseInt($(".slideContenedorDesliza").css('margin-top'));        
        cant = $(".W257X112").length;
        toques = Math.floor(cant/4);
        cToques = parseInt($("#toques").html());

        if(mTop <   0)
            $(".slideContenedorDesliza").stop().animate({marginTop:'+='+230},'slow',function(){
                $("#toques").html(cToques+1);       
                if(mTop >=   0)
                    $(".slideContenedorDesliza").stop().animate({marginTop:0},'slow',function(){});
            });
        else
        {
            $("#toques").html(toques);
            $(".slideContenedorDesliza").stop().animate({marginTop:0},'slow',function(){});
        }
    });    
/*  FIN DEL  SLIDE  VERTICAL */

/*  SLIDE HORIZONTAL */
    // efecto sombra vertical izquierdo
    $(".selectoFlechaVerticalIzquierda").hover(function(){
        $(".sombraVerticalIzquierda").css({"background-image": "url(template/home/sombra_vertical_izquierda.png)",opacity:0}).fadeTo(1000,0.8);   
    },function(){
        $(".sombraVerticalIzquierda").css({"background-image": "none", 'opacity': '1'});
    });
    // efecto sombra vertical derecha
    $(".selectoFlechaVerticalDerecha").hover(function(){
        $(".sombraVerticalDerecha").css({"background-image": "url(template/home/sombra_vertical_derecha.png)",opacity:0}).fadeTo(1000,0.8);
    },function(){
        $(".sombraVerticalDerecha").css({"background-image": "none", 'opacity': '1'});
    });

    //  funcionamiento despues de hacer click
    $(".selectoFlechaVerticalIzquierda").click(function(){
        mTopH    = parseInt($(".slideW100").css('margin-left'));    // tamaño del margen left
        cantidad = $(".cajitaEventoBoliche").length;                // cantidad de bloques que hay
        toquesHor = Math.floor(cantidad/3);                         // el numero llega lo redonde convirtiendolo en un numero entero y lo divide en tres      
         console.log(cToquesHor)
        cToquesHor = parseInt($("#toquesHor").html());              // esto guarda un div con contenido numero 3
            if(cToquesHor > 1)
            {
                $(".slideW100").animate({marginLeft:'-='+800},'slow',function(){
                    /*if(cToquesHor < 1)*/
                         
                });
                $("#toquesHor").html(cToquesHor-1);   
            }
            else
                $(".slideW100").animate({marginLeft:'-'+800*(toquesHor-1)},'slow',function(){});
    });
    $(".selectoFlechaVerticalDerecha").click(function(){
        mTopH    = parseInt($(".slideW100").css('margin-left'));
        cantidad = $(".cajitaEventoBoliche").length;
        toquesHor = Math.floor(cantidad/3);
        cToquesHor = parseInt($("#toquesHor").html());
        if(mTopH < 0)
        {
            $(".slideW100").stop().animate({marginLeft:'+='+800},'slow',function(){});
            $("#toquesHor").html(toquesHor);
            if(mTopH >= 0)
                $(".slideW100").stop().animate({marginLeft:0},'slow',function(){
                    if(mTopH < 0)
                        $(".slideW100").stop().animate({marginLeft:0},'fast',function(){});

                    console.log(mTop);
                });
        }
        else
            $(".toquesHor").html(toquesHor);
            $(".slideW100").stop().animate({marginLeft:0},'slow',function(){});
        });
}
/* Funciones de el framework para leer los resultados del ajax
=================================================================== */
function termina(xq,v)
{
    /**
     * xq -> corresponde al caso del switch
     * v -> resultado en array que envia el ajax
     */
    if( xq == "traeFotos" )
    {
        
        $i = 0;
        $ht ='';

        if(v != null)
        {
            for($i=0; $i < v['cantidad']; $i++)
            {
                $ht += '<div class="floatLeft muestraImagenes overflowHidden seisSieteSeisOcho cursorPointer"> <img src="'+v['img'][$i]['source']+'" /></div>';
            }
            
            $(".muestraDireccion a").attr("href","http://www.facebook.com/"+v['album']);
            $("#cargaFotelis").html($ht);
        }
    }
    else if( xq == "cargaEventosHome" )
    {
        $i                  = 0;
        $j                  = 0;
        $b                  = 0;
        $ht                 = '';
        $htv                = '';
        fechaEventoActual   = '';

        if(v != null)
        {
            for($i=0; $i < v['vueltas']; $i++)
            {
                fechaEventoActual   = v[$i]['fecha'].split(".");
                var mes             = parseInt(fechaEventoActual[1]);
                var dia             = parseInt(fechaEventoActual[0]);
                if(mes >= v['compara_mes'])
                {
                    if (v[$i]['id_galeria'] != "-")
                    {
                        $verGaleria = v[$i]['id_galeria'];
                        $esty       = 'style="color:#ffffff;"'; 
                    }
                    else
                    {
                        $verGaleria = "#";
                        $esty       = 'style="text-decoration: line-through !important; color:#999999;"';
                    }

                    if(mes == v['compara_mes'] && dia > v['compara_dia'])
                    {
                        $ht += '<div class="floatLeft W257X112" id="'+v[$i]['id']+'">\
                                <div class="floatLeft overflowHidden contenedorImagenMini miniImagenFiesta">\
                                    <img src="'+v[$i]['imagen']+'" class="floatLeft" />\
                                </div>\
                                <div class="floatLeft w180">\
                                    <p class="floatLeft diaDeLaSemanaFiesta futura w100">'+v[$i]['fecha']+'</p>\
                                    <p class="floatLeft nombreDelBoliche futura w100">'+v[$i]['titulo']+'</p>\
                                    <p class="floatLeft direccionDelBoliche futura">'+v[$i]['dir_boliche']+'</p>\
                                    <div class="clearBoth"></div>\
                                    <p class="floatLeft provinciaDelBoliche futura">'+v[$i]['barrio']+'</p>\
                                </div>\
                            </div>';
                            $j++;
                    }
                    else if( mes > v['compara_mes'] )
                    {
                        $ht += '<div class="floatLeft W257X112" id="'+v[$i]['id']+'">\
                                <div class="floatLeft overflowHidden contenedorImagenMini miniImagenFiesta">\
                                    <img src="'+v[$i]['imagen']+'" class="floatLeft" />\
                                </div>\
                                <div class="floatLeft w180">\
                                    <p class="floatLeft diaDeLaSemanaFiesta futura w100">'+v[$i]['fecha']+'</p>\
                                    <p class="floatLeft nombreDelBoliche futura w100">'+v[$i]['titulo']+'</p>\
                                    <p class="floatLeft direccionDelBoliche futura">'+v[$i]['dir_boliche']+'</p>\
                                    <div class="clearBoth"></div>\
                                    <p class="floatLeft provinciaDelBoliche futura">'+v[$i]['barrio']+'</p>\
                                </div>\
                            </div>';
                            $j++;
                    }
                    else
                    {
                        $htv += '<div class="floatLeft cajitaEventoBoliche" id="'+v[$i]['id']+'">\
                                    <div class="floatLeft overflowHidden clickReemplazlocajitaEventoBoliche contenedorImagenMini imagenBoliche">\
                                        <img src="'+v[$i]['imagen']+'" class="floatLeft" />\
                                    </div><div class="clearBoth"></div>\
                                    <div class="floatLeft futura nombreBoliche clickReemplazlocajitaEventoBoliche">'+v[$i]['titulo']+'</div>\
                                    <div class="floatLeft futura fechaBoliche clickReemplazlocajitaEventoBoliche">'+v[$i]['fecha']+'</div>\
                                    <div class="clearBoth"></div><div class="floatLeft verGaleria"><a href="'+$verGaleria+'" '+$esty+' target="_blank">VER GALERIA</a></div> \
                                </div>';
                                $b++;

                    } //Si el evento que compara es de este mes pero ya paso
                }
                else
                {
                    $htv += '<div class="floatLeft cajitaEventoBoliche" id="'+v[$i]['id']+'">\
                                    <div class="floatLeft overflowHidden clickReemplazlocajitaEventoBoliche contenedorImagenMini imagenBoliche">\
                                        <img src="'+v[$i]['imagen']+'" class="floatLeft" />\
                                    </div><div class="clearBoth"></div>\
                                    <div class="floatLeft futura nombreBoliche clickReemplazlocajitaEventoBoliche">'+v[$i]['titulo']+'</div>\
                                    <div class="floatLeft futura fechaBoliche clickReemplazlocajitaEventoBoliche">'+v[$i]['fecha']+'</div>\
                                    <div class="clearBoth"></div><div class="floatLeft verGaleria"><a href="'+$verGaleria+'" '+$esty+' target="_blank">VER GALERIA</a></div> \
                                </div>';
                                $b++;
                } //Si el evento que compara es del mes pasado

            } // termina bucle
            
            // toques Verticales
            va = Math.floor($j / 4);
            $("#toques").html(va);

            // toques Hotizontales
            va = Math.floor($b / 3);
            $("#toquesHor").html(va);

            $("#cargaBoliViejos").html($htv);
            $("#cargaBoliNuevos").html($ht);
            
            $(".clickReemplazlocajitaEventoBoliche").click(function(){
                id = $(this).parent().attr("id");
                muestraEvento(id,'eventospasados.php');
            });

            $(".W257X112").click(function(){
                id = $(this).attr("id");
                muestraEvento(id,'eventosactivos.php');
            });
        }   
    }
    else if( xq == "traeInfo" )
    {
        if(v != null)
        {
            $("#imgBol").attr("src",v[0]['imagen']+'?v=1');
            $("#textoBol").html(v[0]['texto']);
            $("#tituBol").html(v[0]['titulo']);
            $("#fechaBol").html(v[0]['fecha']);
            $("#dirBol,#address").html(v[0]['dir_boliche']);
            initialize();
            codeAddress(v[0]['dir_boliche']);
        }
    }
    else if( xq == "traeInfoPas" )
    {
        if(v != null)
        {
            if(v[0]['fotos'] != null && v[0]['fotos'] != "" && v[0]['fotos'] != undefined)
                var $im = '<img src="'+v[0]['fotos']+'" class="fotoFacebook" style="width:280px; height:auto; border-radius:12px;margin-top:-27px;"/>'
            else
                var $im = 'Proximamente';

            if(v[0]['id_galeria'] != "" && v[0]['id_galeria'] != null && v[0]['id_galeria'] != undefined)
                $que = v[0]['id_galeria'];
            else
                que = "#";
            $("#imgBol").attr("src",v[0]['imagen']+'?v=1');
            $("#textoBol").html(v[0]['texto']);
            $("#tituBol").html(v[0]['titulo']);
            $("#fechaBol").html(v[0]['fecha']);
            $("#dirBol,#address").html(v[0]['dir_boliche']);
            $(".eve").attr("href",$que);
            $("#cargaFotelis").html($im);
        }   
    }
    else if( xq == "traeInfoParaElBuscador" )
    {
        if(v != null)
        {
            $i                  = 0;
        $j                  = 0;
        $b                  = 0;
        $ht                 = '';
        $htv                = '';
        fechaEventoActual   = '';

            for($i=0; $i < v['vueltas']; $i++)
            {
                fechaEventoActual   = v[$i]['fecha'].split(".");
                var mes             = parseInt(fechaEventoActual[1]);
                var dia             = parseInt(fechaEventoActual[0]);
                if(mes >= v['compara_mes'])
                {
                    if(mes == v['compara_mes'] && dia > v['compara_dia'])
                    {
                        $ht += '<div class="floatLeft W257X112 repEstilo" id="'+v[$i]['id']+'">\
                                <div class="floatLeft overflowHidden contenedorImagenMini miniImagenFiesta">\
                                    <img src="'+v[$i]['imagen']+'" class="floatLeft" />\
                                </div>\
                                <div class="floatLeft w180">\
                                    <p class="floatLeft diaDeLaSemanaFiesta futura w100">'+v[$i]['fecha']+'</p>\
                                    <p class="floatLeft nombreDelBoliche futura w100">'+v[$i]['titulo']+'</p>\
                                    <p class="floatLeft direccionDelBoliche futura">'+v[$i]['dir_boliche']+'</p>\
                                    <div class="clearBoth"></div>\
                                    <p class="floatLeft provinciaDelBoliche futura">'+v[$i]['barrio']+'</p>\
                                </div>\
                            </div>';
                            $j++;
                    }
                    else if( mes > v['compara_mes'] )
                    {
                        $ht += '<div class="floatLeft W257X112 repEstilo" id="'+v[$i]['id']+'">\
                                <div class="floatLeft overflowHidden contenedorImagenMini miniImagenFiesta">\
                                    <img src="'+v[$i]['imagen']+'" class="floatLeft" />\
                                </div>\
                                <div class="floatLeft w180">\
                                    <p class="floatLeft diaDeLaSemanaFiesta futura w100">'+v[$i]['fecha']+'</p>\
                                    <p class="floatLeft nombreDelBoliche futura w100">'+v[$i]['titulo']+'</p>\
                                    <p class="floatLeft direccionDelBoliche futura">'+v[$i]['dir_boliche']+'</p>\
                                    <div class="clearBoth"></div>\
                                    <p class="floatLeft provinciaDelBoliche futura">'+v[$i]['barrio']+'</p>\
                                </div>\
                            </div>';
                            $j++;
                    }
                    else
                    {
                        $htv += '<div class="floatLeft W257X112 repEstilo" id="'+v[$i]['id']+'">\
                                <div class="floatLeft overflowHidden contenedorImagenMini miniImagenFiesta">\
                                    <img src="'+v[$i]['imagen']+'" class="floatLeft" />\
                                </div>\
                                <div class="floatLeft w180">\
                                    <p class="floatLeft diaDeLaSemanaFiesta futura w100">'+v[$i]['fecha']+'</p>\
                                    <p class="floatLeft nombreDelBoliche futura w100">'+v[$i]['titulo']+'</p>\
                                    <p class="floatLeft direccionDelBoliche futura">'+v[$i]['dir_boliche']+'</p>\
                                    <div class="clearBoth"></div>\
                                    <p class="floatLeft provinciaDelBoliche futura">'+v[$i]['barrio']+'</p>\
                                </div>\
                            </div>';
                                $b++;

                    } //Si el evento que compara es de este mes pero ya paso
                }
                else
                {
                    $htv += '<div class="floatLeft W257X112 repEstilo" id="'+v[$i]['id']+'">\
                                <div class="floatLeft overflowHidden contenedorImagenMini miniImagenFiesta">\
                                    <img src="'+v[$i]['imagen']+'" class="floatLeft" />\
                                </div>\
                                <div class="floatLeft w180">\
                                    <p class="floatLeft diaDeLaSemanaFiesta futura w100">'+v[$i]['fecha']+'</p>\
                                    <p class="floatLeft nombreDelBoliche futura w100">'+v[$i]['titulo']+'</p>\
                                    <p class="floatLeft direccionDelBoliche futura">'+v[$i]['dir_boliche']+'</p>\
                                    <div class="clearBoth"></div>\
                                    <p class="floatLeft provinciaDelBoliche futura">'+v[$i]['barrio']+'</p>\
                                </div>\
                            </div>';
                                $b++;
                } //Si el evento que compara es del mes pasado

            } // termina bucle
            
            
            $(".cajitaEventoBoliche").click(function(){
                id = $(this).attr("id");
                muestraEvento(id,'eventospasados.php');
            });

            $(".W257X112").click(function(){
                id = $(this).attr("id");
                muestraEvento(id,'eventosactivos.php');
            });

            $(".muestraElResultadoQueTraeElBuscador").html($ht);
            $(".muestraElResultadoQueTraeElBuscadorV").html($htv);
        }   
           
            //$("#imgBol").attr("src",v[0]['imagen']+'?v=1');            

    }
    else if( xq == "donde" )
    {
        if(v != null)
            if(v['aviso'] != "")
                cargaLoadDelSite(v['aviso']);

    }
    else if( xq == "cargaEmail" )
    {
        $(".campoAvisoEmailVacio, .campoAvisoEmailIncorrecto").hide();
        $(".asociateAlEvento").append('<div class="floatLeft campoAvisoEmailIncorrecto"><p class="floatLeft">'+v['aviso']+'</p></div>');
    }

}