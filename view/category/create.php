<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <h1>Crear Categoria</h1>
    </div>
  </div>
  <form role="form" method="POST" action="<?php echo APP_URL;?>/category/saveCategory">
  <div class="row">
    <div class="col-md-12">
      <label for="nombre" class="form-label">Nombre de la Categoria</label>
      <input type="text" class="form-control" id="nombre" name="nombre">
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <input type="submit" class="btn btn-primary" value="Guardar">
    </div>
  </div>
  </form>
</div>