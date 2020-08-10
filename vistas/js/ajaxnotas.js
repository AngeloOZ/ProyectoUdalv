const FormNotas = document.getElementById("formAddNotas");
const ContenedorNotas = document.getElementById("contenedorNotas");
let bandEditarNotas = false;
ListarNota();
ContenedorNotas.addEventListener('click', e =>{
    if(e.target.classList.contains('editarNota')){
        let ctnNota = e.target.parentElement;
        let idNota = e.target.getAttribute("atributoidnota");
        CargarDatosNotas(ctnNota,idNota);
    }else if(e.target.classList.contains('eliminarNota')){
        Swal.fire({
            title: 'Está Seguro?',
            text: "Una vez borrado no puede revertir la acción!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, Borralo!'
          }).then((result) => {
            if (result.value) {
                let idNota = e.target.getAttribute("atributoidnota");
                EliminarNota(idNota)
            }
          })
    }
})


FormNotas.addEventListener('submit', e=>{
    e.preventDefault();
    AgregarNota();
})

function AgregarNota(){
    let operacion;
    if(bandEditarNotas)
        operacion = 'update';
    else
        operacion = 'create';

    let datos = new FormData(FormNotas);
    datos.append("operacionEnlace",operacion);

    let xhr;
    if(window.XMLHttpRequest) xhr = new XMLHttpRequest();
    else xhr = new ActiveXObject("Microsoft.XMLHTTP");
    // *Abrir conexion, se pasa los parametros METHOD y Enlace
    xhr.open('POST', 'controladores/controlador.notas.php');
    xhr.addEventListener('load', ()=>{
        resultado = JSON.parse(xhr.response);
        Swal.fire({
            icon: resultado["RespType"],
            title: resultado["sms2"],
            text: resultado["sms"],
            showConfirmButton: false,
            timer: 2000,
        })
        FormNotas.reset();
        ListarNota();
    })
    xhr.send(datos);
    if(bandEditarNotas) bandEditarNotas = false;
}
function ListarNota(){
    let operacion = 'read';
    let datos = new FormData();
    datos.append("operacionEnlace",operacion);
    let xhr;
    if(window.XMLHttpRequest) xhr = new XMLHttpRequest();
    else xhr = new ActiveXObject("Microsoft.XMLHTTP");
    // *Abrir conexion, se pasa los parametros METHOD y Enlace
    xhr.open('POST', 'controladores/controlador.notas.php');
    xhr.addEventListener('load', ()=>{
        resultado = (xhr.response);
        $("#contenedorNotas").html(resultado);
        console.log("2 listando...")
    })
    xhr.send(datos);
}
function EliminarNota(id){
    let operacion = 'delete';
    let datos = new FormData();
    datos.append("operacionEnlace",operacion);
    datos.append("idNota",id);

    let xhr;
    if(window.XMLHttpRequest) xhr = new XMLHttpRequest();
    else xhr = new ActiveXObject("Microsoft.XMLHTTP");
    // *Abrir conexion, se pasa los parametros METHOD y Enlace
    xhr.open('POST', 'controladores/controlador.notas.php');
    xhr.addEventListener('load', ()=>{
        resultado = JSON.parse(xhr.response);
        Swal.fire({
            icon: resultado["RespType"],
            title: resultado["sms2"],
            text: resultado["sms"],
            showConfirmButton: false,
            timer: 2000,
        })
        ListarNota();
    })
    xhr.send(datos);
}

function CargarDatosNotas(nota, id){
    bandEditarNotas = true;
    const inputNota = document.getElementById("inputNota");
    const inputDesc = document.getElementById("inputDescripcion");
    const inputIdNota = document.getElementById("inputId");
    inputNota.value = nota.querySelector('h3').textContent;
    inputDesc.value = nota.querySelector('p').textContent;
    inputIdNota.value = id;
}