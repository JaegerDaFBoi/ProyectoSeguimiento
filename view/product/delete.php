<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <h1>Eliminar Producto</h1>
    </div>
  </div>
  <form role="form" method="POST" action="<?php echo APP_URL;?>/product/deleteProduct">
    <?php foreach ($this->product as $product) { ?>
      <div class="row">
        <div class="col-md-12">
          <input type="hidden" name="id" value="<?php echo $product->id; ?>">
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <label for="nombreproducto" class="form-label">Nombre del Producto</label>
          <input type="text" class="form-control" id="nombreproducto" name="nombreproducto" value="<?php echo $product->nombre; ?>">
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <label for="precioproducto" class="form-label">Precio del Producto</label>
          <input type="text" class="form-control" id="precioproducto" name="precioproducto" value="<?php echo $product->precio; ?>">
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
      <?php } ?>
      <div class="row">
        <div class="col-md-12">
          <input type="submit" class="btn btn-primary" value="Eliminar">
      </div>
  </div>
  </form>
</div>

