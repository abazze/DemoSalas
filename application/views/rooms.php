<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
    
    <body>
        <main role="main">
            <div class="container">
                <h3 class="text-center"><u><?= $description ?></u></h3>
                <div>
                    <form id="frmSalas" action="<?= base_url() ?>rooms/addRooms" method="POST" style="border:1px solid #ccc;padding:15px;border-radius:5px">
                        <h4 class="text-center" style="margin-bottom:20px">Alta y edición de salas</h4>
                        <div class="row">
                            <div class="offset-3 col-6">
                                <label for="nombre">Nombre<span style="color:red">*</span></label>
                                <input class="form-control" type="text" id="nombre" name="nombre">
                                <input type="hidden" id="idRooms" name="idRooms" value="0">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-3 text-right">
                                <button id="btnCancelarRooms" class="btn btn-outline-danger" type="button" style="display:none">Cancelar</button>
                                <button id="btnAceptarRooms" class="btn btn-outline-secondary" type="submit">Aceptar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="mt-5">
                    <h4 class="mb-3">Salas Agregadas</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($rooms): ?>
                                <?php foreach($rooms as $r): ?>
                                    <tr>
                                        <td><?= $r->nombre ?></td>
                                        <td>
                                            <a href="#" data-id="<?= $r->id ?>" data-nombre="<?= $r->nombre ?>" class="btn btn-info btn-sm editRooms" style="margin-right: 3px" title="Editar">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="<?= base_url() ?>rooms/deleteRoom/<?= $r->id ?>" class="btn btn-danger btn-sm deleteRooms" title="Eliminar">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="2" class="text-center">No hay salas registradas</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>  
            </div>
        </main>
    </body>
</html>