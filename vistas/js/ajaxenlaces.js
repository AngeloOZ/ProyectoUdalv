//*variables que utilizadas
let bandEditar = false;
const inputFormAddLink = {
    id: document.getElementById("hiddenIdLink"),
    icono: document.getElementById("ingresarIcono"),
    nombre: document.getElementById("ingresarNombreEnlace"),
    url: document.getElementById("ingresarUrl"),
}
const FormAddLink = document.getElementById('form-agregar-enlace');
const inputSearch = document.getElementById('searchLink');
const CtnTabla = document.getElementById('contenedor-tabla');
//*Funciones que se ejecutan al cargar
document.getElementById('form-search-url').addEventListener('submit',e=>{e.preventDefault()});
ListarEnlaces();

//*Eventos 
CtnTabla.addEventListener('click', e =>{
    if(e.target.classList.contains('fa-pencil-alt')){
        bandEditar = true;
        const tr = e.target.parentElement.parentElement.parentElement;
        CargarDatosInput(tr);
             
    }else if(e.target.classList.contains('fa-trash-alt')){
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
                const tr = e.target.parentElement.parentElement.parentElement;
                const idLink = tr.children[0].getAttribute("atributeid");
                EliminarEnlace(idLink)
            }
          })
    }

})
inputSearch.addEventListener('keyup',e=>{
    if(inputSearch.value != ""){
        ListarEnlacesFiltrados(inputSearch.value);
    }else{
        ListarEnlaces();
    }
});
FormAddLink.addEventListener('submit', e=>{
    e.preventDefault();
    AgregarEditarEnlace();
    ListarEnlaces();
});

// *Funciones 
function ListarEnlaces(){
    const operacion = 'read';
    let datos = new FormData();
    datos.append("operacionEnlace",operacion);

    let xhr;
    if(window.XMLHttpRequest) xhr = new XMLHttpRequest();
    else xhr = new ActiveXObject("Microsoft.XMLHTTP");

    xhr.open('POST', 'controladores/controlador.enlaces.php');
    xhr.addEventListener('load', ()=>{
        // const ContenedorTabla = document.getElementById('contenedor-tabla');
        resultado = (xhr.response);
        $("#contenedor-tabla").html(resultado);
    })
    xhr.send(datos);
}
function ListarEnlacesFiltrados(valor){
    const operacion = 'read';
    let datos = new FormData();
    datos.append("operacionEnlace",operacion);
    datos.append("FilterSearch",valor);

    let xhr;
    if(window.XMLHttpRequest) xhr = new XMLHttpRequest();
    else xhr = new ActiveXObject("Microsoft.XMLHTTP");

    xhr.open('POST', 'controladores/controlador.enlaces.php');
    xhr.addEventListener('load', ()=>{
        resultado = (xhr.response);
        $("#contenedor-tabla").html(resultado);
    })
    xhr.send(datos);
}
function AgregarEditarEnlace(){
    let operacion;
    if(bandEditar)operacion = 'update';
    else operacion = 'create';

    let datos = new FormData(FormAddLink);
    datos.append("operacionEnlace",operacion);
    let xhr;
    if(window.XMLHttpRequest) xhr = new XMLHttpRequest();
    else xhr = new ActiveXObject("Microsoft.XMLHTTP");
    xhr.open('POST', 'controladores/controlador.enlaces.php');
    xhr.addEventListener('load', ()=>{
        resultado = JSON.parse(xhr.response);
        Swal.fire({
            icon: resultado["RespType"],
            title: resultado["sms2"],
            text: resultado["sms"],
            showConfirmButton: false,
            timer: 2500,
        })
        FormAddLink.reset();
        ListarEnlaces();
    })
    xhr.send(datos);
    if(bandEditar) bandEditar = false;
}
function EliminarEnlace(idEnlace){
    let operacion = "delete";
    let datos = new FormData();
    datos.append("idEnlaceDelete",idEnlace);
    datos.append("operacionEnlace",operacion);

    let xhr;
    if(window.XMLHttpRequest)
        xhr = new XMLHttpRequest();
    else
        xhr = new ActiveXObject("Microsoft.XMLHTTP");

    xhr.open('POST', 'controladores/controlador.enlaces.php');
    xhr.addEventListener('load', ()=>{
        resultado = JSON.parse(xhr.response);
        Swal.fire({
            icon: resultado["RespType"],
            title: resultado["sms2"],
            text: resultado["sms"],
            showConfirmButton: false,
            timer: 2500,
        });
        ListarEnlaces();
    });
    xhr.send(datos);
}
function CargarDatosInput(tr){
    if(bandEditar){
        document.querySelector('.title-form').textContent = "Editar enlace"
    }
    inputFormAddLink.id.value = tr.children[0].getAttribute("atributeid");
    inputFormAddLink.nombre.value = tr.children[1].textContent;
    inputFormAddLink.url.value = tr.children[2].firstChild.textContent;

    let url = tr.children[1].querySelector('i').getAttribute('class');
    for(let i=0; i<inputFormAddLink.icono.options.length; i++){
        if(inputFormAddLink.icono.options[i].value == url){
            inputFormAddLink.icono.selectedIndex = i;
        }
    }
}