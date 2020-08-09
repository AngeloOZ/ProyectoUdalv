<div class="note-box">
      <form action="#" method="post">
        <input type="text" placeholder="Nombre" name="nombre">
        <textarea class="descripcion" name="descripcion" rows="8" cols="71" placeholder="Descripcion"></textarea>
        <input type="submit" value="Guardar">
        <?php 
          $agregar = new ControladorNotas();
          $agregar->ctrAgregarNotas();
        ?>
      </form>
</div>  
<!-- <a href="#" class="float" target="_blank"> -->
<!-- <i id="add" class="fas fa-undo-alt"></i>  -->
<div class="notas">
      <?php 
        $notas = ControladorNotas::ctrListarNotas(null);
        echo $notas;
      ?>
</div>
<a href="calendario" class="float" target="_blank">
<i id="add" class="fas fa-plus"></i></a>