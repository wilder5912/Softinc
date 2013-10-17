addEvent(window,'load',inicializarEventos,false);

function inicializarEventos()
{
  var ob;
  for(f=1;f<=2;f++)
  {
    ob=document.getElementById('enlace'+f);
    addEvent(ob,'click',presionEnlace,false);
  }
}

function presionEnlace(e)
{
  if (window.event)
  {
    window.event.returnValue=false;
    var url=window.event.srcElement.getAttribute('href');
    cargar(url);     
  }
  else
    if (e)
    {
      e.preventDefault();
      var url=e.target.getAttribute('href');
      cargar(url);     
    }
}


var conexion1;
function cargar(url) 
{
  if(url=='')
  {
    return;
  }
  conexion1=crearXMLHttpRequest();
  conexion1.onreadystatechange = procesarEventos;
  conexion1.open("get", url, true);
  conexion1.send(null);
}

function procesarEventos()
{
  var detalles = document.getElementById("cambio");
  if(conexion1.readyState == 4)
  {
    cambio.innerHTML = conexion1.responseText;
  } 
  else 
  {
    cambio.innerHTML = 'Cargando...';
  }
}

//***************************************
//Funciones comunes a todos los problemas
//***************************************
function addEvent(elemento,nomevento,funcion,captura)
{
  if (elemento.attachEvent)
  {
    elemento.attachEvent('on'+nomevento,funcion);
    return true;
  }
  else  
    if (elemento.addEventListener)
    {
      elemento.addEventListener(nomevento,funcion,captura);
      return true;
    }
    else
      return false;
}

function crearXMLHttpRequest() 
{
  var xmlHttp=null;
  if (window.ActiveXObject) 
    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  else 
    if (window.XMLHttpRequest) 
      xmlHttp = new XMLHttpRequest();
  return xmlHttp;
}



