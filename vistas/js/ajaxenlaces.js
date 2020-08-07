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
        const tr = e.target.parentElement.parentElement.parentElement;
        const idLink = tr.children[0].getAttribute("atributeid");
        alert(idLink);
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
    AgregarEnlace();
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
        // const ContenedorTabla = document.getElementById('contenedor-tabla');
        resultado = (xhr.response);
        $("#contenedor-tabla").html(resultado);
    })
    xhr.send(datos);
}
function AgregarEditarEnlace(){
    let operacion;
    (bandEditar)? operacion = 'update' :operacion = 'create';
    alert(operacion);        
    let datos = new FormData(FormAddLink);
    datos.append("operacionEnlace",operacion);
    let xhr;
    if(window.XMLHttpRequest) xhr = new XMLHttpRequest();
    else xhr = new ActiveXObject("Microsoft.XMLHTTP");

    xhr.open('POST', 'controladores/controlador.enlaces.php');
    xhr.addEventListener('load', ()=>{
        resultado = (xhr.response);
        console.log(resultado);
        FormAddLink.reset();
        ListarEnlaces("");
        if(bandEditar) bandEditar = false;
    })
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