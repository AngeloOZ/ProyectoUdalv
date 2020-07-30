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
    let opciones = Array.prototype.slice.apply(document.querySelectorAll('.opcion'));
    let panels = Array.prototype.slice.apply(document.querySelectorAll('.tab'));
    let ctnPanel = document.getElementById("tabs");

    ctnPanel.addEventListener('click', e => {
        if(e.target.tagName == 'DIV'){
            let i = opciones.indexOf(e.target);
            opciones.map(op => op.classList.remove('active-tab'));
            opciones[i].classList.add('active-tab');
            panels.map(panel => panel.classList.remove('visible-tab'));
            panels[i].classList.add('visible-tab');
            BarraLateral();
        }
    });
}