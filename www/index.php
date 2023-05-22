<?php include 'db.php' ?>
<?php include 'includes/header.php' ?>



    
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">
                <!--MESSAGE-->
                <?php if(isset($_SESSION['message'])){?>
                    <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message']?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php session_unset(); } ?>
                
                <!--INSERTAR PRODUCTO-->
                <div class="card card-body">
                    <form action="insert.php" method="POST">
                        <div class="form-group">                            
                            <input type="text" name="producto" class="form-control" placeholder="Descripcion del producto" autofocus>
                        </div>
                        <div class="form-group">                            
                            <input type="text" name="cantidad" class="form-control" placeholder="Piezas de producto">
                        </div>
                        <div class="form-group">                            
                            <input type="text" name="precio" class="form-control" placeholder="Precio de producto">
                        </div>  
                        <input type="submit" class="btn btn-success btn-block" name="guardar" value="Guardar">          
                    </form>
                </div>
            </div>
            <!--TABLA DE PRODUCTOS-->
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT idProducto,producto,cantidad,precio FROM Productos";
                            $select_products = mysqli_query($conn,$query);
                            while($row=mysqli_fetch_array($select_products)){
                        ?>
                            <tr>
                                <td><?php echo $row['producto'] ?></td>
                                <td><?php echo $row['cantidad'] ?></td>
                                <td><?php echo $row['precio'] ?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $row['idProducto'] ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                    </svg>
                                    </a>
                                    <a href="delete.php?id=<?php echo $row['idProducto'] ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-text" viewBox="0 0 16 16">
                                        <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                                    </svg>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?> 
                                               
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php include 'includes/footer.php' ?>

