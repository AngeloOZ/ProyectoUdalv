// function ComprobadorEmail(){
//     const inputRegistrarEmail = document.getElementById("registrarCorreo");

//     inputRegistrarEmail.addEventListener('change',()=>{

//         let warning = (inputRegistrarEmail.parentElement).querySelector('p');

//         let email = inputRegistrarEmail.value;
//         console.log('email: ', email);
//         let datos = new FormData();
//         datos.append("validarEmail",email);

//         let xhr;
//         if(window.XMLHttpRequest) xhr = new XMLHttpRequest();
//         else xhr = new ActiveXObject("Microsoft.XMLHTTP");
//         xhr.open('POST', 'ajax/ajax.controlador.php');
//         xhr.addEventListener('load', ()=>{
//             console.log(JSON.parse(xhr.response));
//         })
//         xhr.send(datos);
//     })
// }
