    <div class="task-complete">
    <div class="task-box">
      <h1>Tarea</h1>
      <form action="" method="post" id="formAddTask">
        <label for="name">Nombre</label>
        <input type="text" placeholder="Tarea" name="name" id="nombreTarea">
        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" value="<?php echo date("Y-m-d");?>" id="fechaTarea">
        <input type="submit" value="Guardar">
        <input type="hidden" name="editarIDTask" id="inputIdTareas" value="">
      </form>
    </div>
    <div class="notas2" id="contenedorTask"></div>  
    </div>
    
    <script src="./vistas/js/ajaxtareas.js"></script>
