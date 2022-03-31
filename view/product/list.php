<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <h1>Lista de Productos</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Precio</th>
            <th scope="col">Categoria</th>
          </tr>
        </thead>
        <tbody>
        <?php
          foreach ($this->products as $product) { ?>
            <tr>
              <td><?php echo $product->id ?></td>
              <td><?php echo $product->nombre ?></td>
              <td><?php echo $product->precio ?></td>
              <td><?php echo $product->categorianombre ?></td>
            </tr>
            <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>