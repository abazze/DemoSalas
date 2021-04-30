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
                    <form id="frmPersonas" action="<?= base_url() ?>people/addPeople" method="POST" style="border:1px solid #ccc;padding:15px;border-radius:5px">
                        <h4 class="text-center" style="margin-bottom:20px">Alta y edición de personas</h4>
                        <div class="row">
                            <div class="offset-1 col-5">
                                <label for="nombre">Nombre<span style="color:red">*</span></label>
                                <input class="form-control" type="text" id="nombre" name="nombre">
                            </div>
                            <div class="col-5">
                                <label for="apellido">Apellido<span style="color:red">*</span></label>
                                <input class="form-control" type="text" id="apellido" name="apellido">
                            </div>
                            <input type="hidden" id="idPeople" name="idPeople" value="0">
                        </div>
                        <div class="row">
                            <div class="col-12 mt-3 text-right">
                                <button id="btnCancelarPeople" class="btn btn-outline-danger" type="button" style="display:none">Cancelar</button>
                                <button id="btnAceptarPeople" class="btn btn-outline-secondary" type="submit">Aceptar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="mt-5">
                    <h4 class="mb-3">Personas Agregadas</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($people): ?>
                                <?php foreach($people as $p): ?>
                                    <tr>
                                        <td><?= $p->nombre ?></td>
                                        <td><?= $p->apellido ?></td>
                                        <td>
                                            <a href="#" data-id="<?= $p->id ?>" data-nombre="<?= $p->nombre ?>" data-apellido="<?= $p->apellido ?>" class="btn btn-info btn-sm editPeople" style="margin-right: 3px" title="Editar">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="<?= base_url() ?>people/deletePeople/<?= $p->id ?>" class="btn btn-danger btn-sm deletePeople" title="Eliminar">
                                                <i class="fa fa-trash"></i>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3" class="text-center">No hay personas registradas</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>  
            </div>
        </main>
    </body>
</html>