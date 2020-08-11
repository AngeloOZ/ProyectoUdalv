const FormTask = document.getElementById("formAddTask");
const ContenedorTask = document.getElementById("contenedorTask");
let bandEditarTask = false;
ListarTask();

ContenedorTask.addEventListener('click',e=>{
    if(e.target.classList.contains('fa-eraser')){
        let ctnTask = e.target.parentElement;
        let idTask = ctnTask.getAttribute("atributoidtask");
        CargarDatosTask(ctnTask,idTask);
    }else if(e.target.classList.contains('fa-times-circle')){
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
                let idTask = e.target.parentElement.getAttribute("atributoidtask");
                EliminarTask(idTask)
            }
          })
    }
})


FormTask.addEventListener('submit', e=>{
    e.preventDefault();
    AgregarTask();
})

function AgregarTask(){
    let operacion;
    if(bandEditarTask)
        operacion = 'update';
    else
        operacion = 'create';

    let datos = new FormData(FormTask);
    datos.append("operacionEnlace",operacion);
    let xhr;
    if(window.XMLHttpRequest) xhr = new XMLHttpRequest();
    else xhr = new ActiveXObject("Microsoft.XMLHTTP");
    // *Abrir conexion, se pasa los parametros METHOD y Enlace
    xhr.open('POST', 'controladores/controlador.tareas.php');
    xhr.addEventListener('load', ()=>{
        resultado = JSON.parse(xhr.response);
        Swal.fire({
            icon: resultado["RespType"],
            title: resultado["sms2"],
            text: resultado["sms"],
            showConfirmButton: false,
            timer: 2000,
        })
        FormTask.reset();
        ListarTask();
    })
    xhr.send(datos);
    if(bandEditarTask) bandEditarTask = false;
}
function ListarTask(){
    let operacion = 'read';
    let datos = new FormData();
    datos.append("operacionEnlace",operacion);
    let xhr;
    if(window.XMLHttpRequest) xhr = new XMLHttpRequest();
    else xhr = new ActiveXObject("Microsoft.XMLHTTP");
    // *Abrir conexion, se pasa los parametros METHOD y Enlace
    xhr.open('POST', 'controladores/controlador.tareas.php');
    xhr.addEventListener('load', ()=>{
        resultado = (xhr.response);
        $("#contenedorTask").html(resultado);
        console.log("2 listando...")
    })
    xhr.send(datos);
}
function EliminarTask(id){
    let operacion = 'delete';
    let datos = new FormData();
    datos.append("operacionEnlace",operacion);
    datos.append("idTask",id);

    let xhr;
    if(window.XMLHttpRequest) xhr = new XMLHttpRequest();
    else xhr = new ActiveXObject("Microsoft.XMLHTTP");
    // *Abrir conexion, se pasa los parametros METHOD y Enlace
    xhr.open('POST', 'controladores/controlador.tareas.php');
    xhr.addEventListener('load', ()=>{
        resultado = JSON.parse(xhr.response);
        Swal.fire({
            icon: resultado["RespType"],
            title: resultado["sms2"],
            text: resultado["sms"],
            showConfirmButton: false,
            timer: 2000,
        })
        ListarTask();
    })
    xhr.send(datos);
}
const inputfecha = document.getElementById("fechaTarea");

function CargarDatosTask(task, id){
    bandEditarTask = true;
    const inputask = document.getElementById("nombreTarea");
    const inputfecha = document.getElementById("fechaTarea");
    const inputIdTask = document.getElementById("inputIdTareas");
    inputask.value = task.querySelector('h3').textContent;
    inputfecha.value = task.querySelector('label').textContent;
    inputIdTask.value = id;
}