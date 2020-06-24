<?php FuncionesRequeridas::esAdministrador() ?>
<div class="container marketing">
    <div class="row">
        <div  class="container-fluid padding">
            <div class="row welcome text-center">
                <div id="ofer" class="col-12">
                    <?php if (isset($editar) && isset($producto) && is_object($producto)): ?>
                        <h1 class="py-3">Editar Producto <?= $producto->nombreProducto ?></h1>
                        <?php $accionUrl = urlBase . "Producto/guardarProducto&id=" . $producto->idProducto; ?>
                    <?php else: ?>
                        <h1 class="py-3">Nuevo Producto</h1>
                        <?php $accionUrl = urlBase . "Producto/guardarProducto"; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <hr class="featurette-divider">

        <div class="container text-left">
            <form action="<?= $accionUrl ?>" method="POST" enctype="multipart/form-data">
                <label for="nombre">Nombre del producto:</label>
                <input type="text" class="form-control" name="nombre" value="<?= isset($producto) && is_object($producto) ? $producto->nombreProducto : ''; ?>" required autofocus>

                <label for="departamento">Departamento:</label>
                <?php $departamentos = FuncionesRequeridas::obtenerDepartamento() ?>
                <select name="departamento" class="form-control">
                    <option value="" disabled="" selected="">Seleccione un departamento</option>
                    <?php while ($dep = $departamentos->fetch_object()): ?>
                        <option value="<?= $dep->idDepartamento ?>" <?= isset($producto) && is_object($producto) && $dep->idDepartamento == $producto->idDepartamento ? 'selected' : ''; ?>>
                            <?= $dep->nombreDepartamento ?>
                        </option>
                    <?php endwhile; ?>
                </select>
                
                <label for="descripcion">Descripcion:</label>
                <textarea name="descripcion" class="form-control medida"><?= isset($producto) && is_object($producto) ? $producto->descripcionProducto : ''; ?></textarea>

                <label for="tipo">Tipo:</label>
                <?php $tipos = FuncionesRequeridas::obtenerTipoProducto() ?>
                <select name="tipo" class="form-control">
                    <option value="" disabled="" selected="">Seleccione un tipo de producto</option>
                    <?php while ($tip = $tipos->fetch_object()): ?>
                        <option value="<?= $tip->idTipoProducto ?>" <?= isset($producto) && is_object($producto) && $tip->idTipoProducto == $producto->idTipoProducto ? 'selected' : ''; ?>>
                            <?= $tip->tipoProducto ?>
                        </option>
                    <?php endwhile; ?>
                </select>

                <label for="precio" >Precio:</label>
                <input type="number"  class="form-control medida" name="precio" value="<?= isset($producto) && is_object($producto) ? $producto->precioProducto : ''; ?>" required autofocus>

                <label for="productosDisponibles" >Produtos Disponibles:</label>
                <input type="number"  class="form-control medida" name="productosDisponibles" value="<?= isset($producto) && is_object($producto) ? $producto->productosDisponibles : ''; ?>" required autofocus>

                <label for="foto" >Foto:</label>
                <?php if (isset($producto) && is_object($producto) && !empty($producto->fotoProducto)): ?>
                    <img src="<?= urlBase ?>assets/img/productos/<?= $producto->fotoProducto ?>" class="imagenProducto">
                <?php endif; ?>
                <input type="file"  class="form-control medida" name="foto"  autofocus>


                <input type="submit" class="btn btn-lg btn-primary btn-block my-3" value="Guardar">
            </form>
        </div> 
    </div>
</div>