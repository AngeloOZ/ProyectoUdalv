<!-- <div class="note-box">
      <form action="#" method="post">
        <input type="text" placeholder="Nombre" name="nombre">
        <textarea class="descripcion" name="descripcion" rows="8" cols="71" placeholder="Descripcion"></textarea>
        <input type="submit" value="Guardar">
      </form>
</div>   -->
<style>
  .contenedor-aux{
    height: 100%;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  .eliminarNota{
    color: #fff;
    cursor: pointer;
  }
  .editarNota{
    color: #fff;
    cursor: pointer;
  }
</style>
<div class="contenedor-aux">
<form action="" id="formAddNotas">
    <label for="">Nombre</label>
    <input type="text" name="insertarNota" id="inputNota">
    <br>
    <label for="">Descripcion</label>
    <textarea name="insertarDescripcion" id="inputDescripcion" cols="30" rows="10"></textarea>
    <input type="submit" value="Enviar">
    <input type="hidden" name="editarID" value="" id="inputId">
  </form>
  <div class="notas" id="contenedorNotas"></div>
</div>


<script src="./vistas/js/ajaxnotas.js"></script>

