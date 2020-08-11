
const BtnSemanal = document.getElementById("boton_semanal");
if(BtnSemanal){
    BtnSemanal.addEventListener("click",()=>{
        TraerDatos1();
    })
}
const BtnMensual = document.getElementById("boton_mensual");
if(BtnMensual){
    BtnMensual.addEventListener("click",()=>{
        TraerDatos2();
    })
}
const BtnTodo = document.getElementById("boton_todo");
if(BtnTodo){
    BtnTodo.addEventListener("click",()=>{
        TraerDatos();
    })
}
let popo
TraerDatos();
const formInsertar = document.getElementById("insertarMood");
formInsertar.addEventListener("submit",e=>{
    e.preventDefault();
    agregarMood();
    TraerDatos();
})
function agregarMood(){
   
    let operacion="insert";
    let datos=new FormData(formInsertar);
    datos.append("operacionMood",operacion);
    let xhr;
    if(window.XMLHttpRequest){
        xhr=new XMLHttpRequest();
    }
    else{
        xhr=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhr.open("POST","controladores/controlador.mood.php");
    xhr.addEventListener("load",()=>{
        resultado= JSON.parse(xhr.response);
        console.log(resultado);
    });
    xhr.send(datos);
}
function TraerDatos(){
    let operacion="read";
    let datos=new FormData();
    datos.append("operacionMood",operacion);
    let xhr;
    if(window.XMLHttpRequest){
        xhr=new XMLHttpRequest();
    }
    else{
        xhr=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhr.open("POST","controladores/controlador.mood.php");
    xhr.addEventListener("load",()=>{
        resultado= JSON.parse(xhr.response);
        popo=resultado;
        //console.log(popo);
        actualizarGrafica(resultado);
    });
    xhr.send(datos);
    
}
function TraerDatos1(){
    let operacion="read";
    let datos=new FormData();
    datos.append("operacionMood1",operacion);
    let xhr;
    if(window.XMLHttpRequest){
        xhr=new XMLHttpRequest();
    }
    else{
        xhr=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhr.open("POST","controladores/controlador.mood.php");
    xhr.addEventListener("load",()=>{
        resultado= JSON.parse(xhr.response);
        popo=resultado;
        //console.log(popo);
        actualizarGrafica(resultado);
    });
    xhr.send(datos);
    
}
function TraerDatos2(){
    let operacion="read";
    let datos=new FormData();
    datos.append("operacionMood2",operacion);
    let xhr;
    if(window.XMLHttpRequest){
        xhr=new XMLHttpRequest();
    }
    else{
        xhr=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhr.open("POST","controladores/controlador.mood.php");
    xhr.addEventListener("load",()=>{
        resultado= JSON.parse(xhr.response);
        popo=resultado;
        //console.log(popo);
        actualizarGrafica(resultado);
    });
    xhr.send(datos);
    
}
