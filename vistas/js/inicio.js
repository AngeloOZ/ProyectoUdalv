window.onload = function(){
    TabPanelOnloadPage();
}
function TabPanelOnloadPage(){
    let opciones = Array.prototype.slice.apply(document.querySelectorAll('.opcion'));
    let panels = Array.prototype.slice.apply(document.querySelectorAll('.tab'));
    opciones.map(op => op.classList.remove('active-tab'));
    panels.map(panel => panel.classList.remove('visible-tab'));
    if(localStorage.getItem("index")){
        let i = (localStorage.getItem("index")); 
        opciones[i].classList.add('active-tab');
        panels[i].classList.add('visible-tab');
    }else{
        opciones[1].classList.add('active-tab');
        panels[1].classList.add('visible-tab');
    }
}
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
function TabPanel(){
    let ctnPanel = document.getElementById("tabs");
    let opciones = Array.prototype.slice.apply(document.querySelectorAll('.opcion'));
    let panels = Array.prototype.slice.apply(document.querySelectorAll('.tab'));
    ctnPanel.addEventListener('click', e => {
        if(e.target.tagName == 'DIV'){
            let i = opciones.indexOf(e.target);
            localStorage.setItem("index",i);
            opciones.map(op => op.classList.remove('active-tab'));
            opciones[i].classList.add('active-tab');
            panels.map(panel => panel.classList.remove('visible-tab'));
            panels[i].classList.add('visible-tab');
            BarraLateral();
        }
    });
}
function AgregarLinkMoblie(){
    btnAgregar = document.getElementById('btn-add-link');
    ctnOverlay = document.getElementById('overlay');

    if(btnAgregar){
        btnAgregar.addEventListener('click', ()=>{
            ctnOverlay.classList.toggle('overlay');
        })
    }
    if(ctnOverlay){
        ctnOverlay.addEventListener('click', e=>{
            if(e.target.classList.contains('fa-times-circle')){
                ctnOverlay.classList.toggle('overlay')
            }
        })
    }
}