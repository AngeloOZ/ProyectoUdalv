
const BtnSemanal = document.getElementById("boton_semanal");
if(BtnSemanal){
    BtnSemanal.addEventListener("click",()=>{
        TraerDatos();
    })
}

let popo
TraerDatos();


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
        
    });
    xhr.send(datos);
    
}
setTimeout(()=>{
console.log(popo);

},500)