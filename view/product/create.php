<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <h1>Crear Producto</h1>
    </div>
  </div>
  <form role="form" method="POST" action="<?php echo APP_URL; ?>/product/save">
  <div class="row">
    <div class="col-md-12">
      <label for="nombreproducto" class="form-label">Nombre del Producto</label>
      <input type="text" class="form-control" id="nombreproducto" name="nombreproducto"> 
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <label for="precioproducto" class="form-label">Precio del Producto</label>
      <input type="text" class="form-control" id="precioproducto" name="precioproducto"> 
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <select class="form-control" name="categoria">
        <?php 
          $dsn = DBTYPE.":host=".DBHOST.";dbname=".DBNAME;
          $connection = new PDO($dsn,DBUSER,DBPASS);
          $query = $connection->prepare("SELECT * FROM categorias");
          $query->execute();
          $data = $query->fetchAll();
          foreach ($data as $category):
            echo '<option value="'.$category["id"].'">'.$category["nombre"].'</option>';
          endforeach;  
        ?>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <input type="submit" class="btn btn-primary" value="Guardar">
    </div>
  </div>
  </form>
</div>