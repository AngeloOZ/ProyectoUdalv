function BarraLateral(){
    user = document.getElementById("user");
    body = document.querySelector('body');
    body.classList.toggle('active-barra');

    if(body.classList.contains('active-barra')){
        user.classList.remove('fa-user-circle');
        user.classList.remove('fas')
        user.classList.add('fa-times-circle');
        user.classList.add('far');
    }else{
        user.classList.add('fa-user-circle')
        user.classList.add('fas')
        user.classList.remove('fa-times-circle');
        user.classList.remove('far');
    }
}
function BuscadorEnlaces(){
    const Buscador = document.getElementById("buscador");
    const resultSearch = document.getElementById('result-search');
    const SearchLink = document.querySelector('.buscador-enalces');
    const ctnEnlaces = document.querySelector('.ctn-enlaces');

    Buscador.addEventListener('keyup',(e)=>{
        e.preventDefault();
        if(Buscador.value.length>0){
            ctnEnlaces.style.transform = "translateY(0px)"
            SearchLink.style.height = "126px"
            resultSearch.style.display = "flex"
            setTimeout(()=>{
                resultSearch.style.transform = "scale(1)"
            },200)
        }else{
            ctnEnlaces.style.transform = "translateY(-70px)"
            SearchLink.style.height = "50px"
            resultSearch.style.transform = "scale(0)";
            setTimeout(()=>{
                resultSearch.style.display = "none"
            },500)
        }
    });
}

Popup = document.getElementById("popup");
ClosePopup = document.getElementById("close-popup");

if(ClosePopup){
    ClosePopup.addEventListener('click', ()=>{
        Popup.classList.toggle('active-modal');
    });
}

function modalAgregar(){
    Popup.classList.toggle('active-modal');
}
