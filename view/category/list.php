<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <h1>Lista de categorias</h1>
    </div>
  </div>
  <div class="col-md-12">
    <table class="table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($this->categories as $category) { ?>
          <tr>
            <td><?php echo $category->id ?></td>
            <td><?php echo $category->nombre ?></td>
          </tr>
          <?php } ?>
      </tbody>
    </table>
  </div>
</div>