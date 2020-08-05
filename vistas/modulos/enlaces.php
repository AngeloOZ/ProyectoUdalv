<div class="contenedor-links">
    <div class="view-pc" id="overlay">
        <div class="add" id="btn-add-link"><i class="fas fa-plus"></i></div>
        <span id="close-overlay" class="close-overlay"><i class="far fa-times-circle" ></i></span>
        <div class="agregar-link" id="add-link">
            <h3 class="title-form">Agregar Enlace</h3>
            <form action="" id="form-agregar-enlace" class="form-agregar-enlace">
                <input type="text" name="ingresarNombreEnlace" id="" placeholder="Nombre de enlace" autocomplete="off">
                <input type="url" name="ingresarUrl" placeholder="Ingrese URL" autocomplete="off">
                <div class="group-select">
                    <label for="">Icono</label>
                    <select name="ingresarIcono" id="icono">
                        <option value="fab fa-gitkraken" selected>Default</option>
                        <option value="fab fa-wikipedia-w">Consultas</option>
                        <option value="fab fa-github">Github</option>
                        <option value="fab fa-youtube">YouTube</option>
                        <option value="fab fa-facebook">Facebook</option>
                        <option value="fab fa-instagram">Instagram</option>
                        <option value="fas fa-bookmark">Marcadores</option>
                    </select>
                </div>
                <input type="hidden" value="<?php echo $usuario["token"]?>" name="hiddenTokenUsuario" id="hiddenTokenUsuario">
                <input type="hidden" value="<?php echo $usuario["id"]?>" name="hiddenIdUsuario" id="hiddenIdUsuario">
                <input type="submit" value="Guardar Enlace">
            </form>
        </div>
    </div>
    <div class="listar-link">
        <div class="contenedor-buscador">
            <form id="form-search-url">
                <div class="form-group-search">
                    <i class="fas fa-search"></i>
                    <input type="search" name="buscador" placeholder="Buscar enlaces" autocomplete="off" id="searchLink">
                </div>
            </form>
        </div>
        <div class="contenedor-tabla" id="contenedor-tabla"></div>
    </div>
</div>
<script src="./vistas/js/ajaxenlaces.js"></script>
<script>AgregarLinkMoblie()</script>