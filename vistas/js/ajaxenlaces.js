document.getElementById('form-search-url').addEventListener('submit',e=>{e.preventDefault()});

const IdUser = document.getElementById('hiddenIdUsuario').value;
const TokenUser = document.getElementById('hiddenTokenUsuario').value;
const FormAddLink = document.getElementById('form-agregar-enlace');
const inputSearch = document.getElementById('searchLink');
const CtnTabla = document.getElementById('contenedor-tabla');

CtnTabla.addEventListener('click', e =>{
    if(e.target.classList.contains('fa-pencil-alt')){
        let aux = e.target;
        console.log('editando');
        console.log(aux.parentElement.parentElement.parentElement);
    }else if(e.target.classList.contains('fa-trash-alt')){
        let aux = e.target;
        console.log('Eliminado');
        console.log(aux.parentElement.parentElement.parentElement);
    }

})

inputSearch.addEventListener('keyup',e=>{
    if(inputSearch.value != ""){
        ListarEnlacesbyFilter(inputSearch.value)   
    }else{
        ListarEnlaces();
    }
});
FormAddLink.addEventListener('submit', e=>{
    e.preventDefault();
    AgregarEnlace();
    ListarEnlaces();
});

ListarEnlaces();
function ListarEnlaces(){
    const operacion = 'read';
    let datos = new FormData();
    datos.append("operacionEnlace",operacion);
    datos.append("idUserEnlace",IdUser);
    datos.append("TokenUserEnlace",TokenUser);
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
function ListarEnlacesbyFilter(filter){
    const operacion = 'read';
    let datos = new FormData();
    datos.append("operacionEnlace",operacion);
    datos.append("idUserEnlace",IdUser);
    datos.append("TokenUserEnlace",TokenUser);
    datos.append("FilterSearch",filter);
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
function AgregarEnlace(){
    const operacion = 'create';
    let datos = new FormData(FormAddLink);
    datos.append("idUserEnlace",IdUser);
    datos.append("TokenUserEnlace",TokenUser);
    datos.append("operacionEnlace",operacion);
    let xhr;
    if(window.XMLHttpRequest) xhr = new XMLHttpRequest();
    else xhr = new ActiveXObject("Microsoft.XMLHTTP");

    xhr.open('POST', 'controladores/controlador.enlaces.php');
    xhr.addEventListener('load', ()=>{
        resultado = (xhr.response);
        console.log(resultado);
        FormAddLink.reset();
        ListarEnlaces();
    })
    xhr.send(datos);
}