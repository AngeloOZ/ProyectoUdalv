<div class="contenedor-usuario">
    <div class="contenedor-usuario2">
        <div class="personal-information">
            <h2 class="title-information">Información Personal</h2>
            <form action="" method="post" class="form" id="formDataUser">
                <div class="icono-profile">
                    <i class="<?php echo $usuario["username"] ?>"></i>
                </div>
                <div class="grupo-form">
                    <label for="">Avatar</label>
                    <select name="editarUserAvatar" id="avatar-icon">
                        <option value="fas fa-user" selected>Normal</option>
                        <option value="fas fa-user-tie">Elegante</option>
                        <option value="fas fa-user-nurse">Enfermera</option>
                        <option value="fas fa-user-md">Médico</option>
                        <option value="fas fa-user-graduate">Estudiante</option>
                        <option value="fas fa-user-astronaut">Astronauta</option>
                        <option value="fas fa-user-ninja">Ninja</option>
                        <option value="fas fa-user-secret">Incognito</option>
                        <option value="fas fa-skiing">Skiing</option>
                        <option value="fas fa-skating">Skating</option>
                        <option value="fas fa-snowboarding">Snowboarding</option>
                    </select>
                </div>
                <div class="grupo-form">
                    <label for="">Primer Nombre</label>
                    <input type="text" name="editUserName" value="<?php echo $usuario["name"] ?>">
                </div>
                <div class="grupo-form">
                    <label for="">Primer Apellido</label>
                    <input type="text" name="editUserLast" value="<?php echo $usuario["lastname"] ?>">
                </div>
                <div class="grupo-form">
                    <label for="">Fecha de Nacimmiento</label>
                    <input type="date" name="editUserDate" value="<?php echo $usuario["birthday"] ?>">
                </div>
                <input type="submit" value="Guardar cambios">
            </form>
            <?php 
                $informacion = new ControladorFormularios();
                $informacion->ctrEditarInformacionUsuario();
            ?>
        </div>
        <div class="account-information">
            <h2 class="title-information">Cambiar Contraseña</h2>
            <form action="" method="post" class="form" id="formPassChange">
                <div class="grupo-form">
                    <label for="">Contraseña Actual</label>
                    <input type="password" name="editPassActual">
                </div>
                <div class="grupo-form">
                    <label for="">Nueva Contraseña</label>
                    <input type="password" name="editPassnew">
                </div>
                <div class="grupo-form">
                    <label for="">Confirmar Contraseña</label>
                    <input type="password" name="editPassnewCon">
                </div>
                <input type="submit" value="Actualizar Contraseña">
                <?php 
                    $pass = new ControladorFormularios();
                    $pass->ctrEditarPassword();
                ?>
            </form>
        </div>
    </div>
</div>
<script>
    CambiarAvatar();
</script>