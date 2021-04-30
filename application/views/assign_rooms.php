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
                    <form id="frmAsignarSalas" action="<?= base_url() ?>assign_rooms/add" method="POST" style="border:1px solid #ccc;padding:15px;border-radius:5px">
                        <h4 class="text-center" style="margin-bottom:20px">Asignar Salas</h4>
                        <div class="row">
                            <div class="col-4">
                                <label for="persona">Persona<span style="color:red">*</span></label>
                                <select class="form-control" name="persona" id="persona">
                                    <option value=""></option>
                                    <?php if($people): ?>
                                        <?php foreach($people as $p): ?>
                                            <option value="<?= $p->id ?>"><?= $p->persona ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="sala">Salas<span style="color:red">*</span></label>
                                <select class="form-control" name="sala" id="sala">
                                    <option value=""></option>
                                    <?php if($rooms): ?>
                                        <?php foreach($rooms as $r): ?>
                                            <option value="<?= $r->id ?>"><?= $r->nombre ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="fecha">Fecha y Hora<span style="color:red">*</span></label>
                                <input class="form-control" type="datetime-local" id="fecha" name="fecha">
                            </div>
                            <input type="hidden" id="idAssign" name="idAssign" value="0">
                        </div>
                        <div class="row">
                            <div class="col-12 mt-3 text-right">
                                <button id="btnCancelarAssign" class="btn btn-outline-danger" type="button" style="display:none">Cancelar</button>
                                <button id="btnAceptarAssign" class="btn btn-outline-secondary" type="submit">Aceptar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="mt-5">
                    <h4 class="mb-3">Salas Asignadas</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Persona</th>
                                <th>Sala</th>
                                <th>Fecha y Hora</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($assign): ?>
                                <?php foreach($assign as $a): ?>
                                    <tr>
                                        <td><?= $a->persona ?></td>
                                        <td><?= $a->sala ?></td>
                                        <td><?= date("d/m/Y H:i", strtotime($a->fecha)) ?></td>
                                        <td>
                                            <a href="#" data-id="<?= $a->id ?>" data-id_persona="<?= $a->idPersona ?>" data-id_sala="<?= $a->idSala ?>" data-fecha="<?= $a->fecha ?>" class="btn btn-info btn-sm editAssign" style="margin-right: 3px" title="Editar">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="<?= base_url() ?>assign_rooms/delete/<?= $a->id ?>" class="btn btn-danger btn-sm deleteAssign" title="Eliminar">
                                                <i class="fa fa-trash"></i>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center">No hay salas asignadas</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>  
            </div>
        </main>
    </body>
</html>