// (function(d){
//     opciones = Array.prototype.slice.apply(d.querySelectorAll('.opcion'));
//     panels = Array.prototype.slice.apply(d.querySelectorAll('.tab'));
    
//     d.getElementById("tabs").addEventListener('click', e => {
//         if(e.target.tagName == 'DIV'){
//             let i = opciones.indexOf(e.target);
//             opciones.map(op => op.classList.remove('active-tab'));
//             opciones[i].classList.add('active-tab');
//             panels.map(panel => panel.classList.remove('visible-tab'));
//             panels[i].classList.add('visible-tab');
//             BarraLateral();
//         }
//     });
// })(document);
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