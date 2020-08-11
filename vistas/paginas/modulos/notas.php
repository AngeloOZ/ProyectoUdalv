
<div class="contenedor-prin">
  <div class="contenedor-aux">
    <form action="" id="formAddNotas">
      <h1>Agregar Nota</h1>
      <label for="">Nombre</label>
      <input type="text" name="insertarNota" id="inputNota">
      <br>
      <label for="">Descripcion</label>
      <textarea name="insertarDescripcion" id="inputDescripcion" cols="30" rows="10"></textarea>
      <input type="submit" value="Enviar">
      <input type="hidden" name="editarID" value="" id="inputIdnotas">
      </form>
    </div>
  <div class="notas" id="contenedorNotas"></div>

</div>


<script src="./vistas/js/ajaxnotas.js"></script>

