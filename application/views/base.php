<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Asignación de Salas</title>

        <!-- Estilos -->
        <link href="<?= base_url() ?>assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/css/styles.css" rel="stylesheet">

        <style type="text/css">
            a:hover{
                text-decoration: none
            }

            .active{
                background:rgba(0,0,0,0.1)
            }

            a.nav-link.active::after{
                content: "";
                display: inline-block;
                position: absolute;
                border: 7px solid white;
                border-color: transparent #fcfdfc transparent transparent;
                /*top: 15px;*/
                right: -1px;
            }

            main{
                margin-left: 250px;
            }

            main[role=main]{
                margin-top: 80px;
            }

            main[role=msg]{
                padding-top: 0px;
            }

            .alert{
                margin-top: 88px!important;
                margin-bottom: -65px;
            }
        </style>
    </head>
    <body>
        <!-- Navegación -->
        <nav class="navbar navbar-expand-lg navbar-ligth" style="background:#fff;box-shadow:0px 0px 8px 0px rgba(0,0,0,0.1);height:50px;position:fixed;top:0;width:100%;z-index:1000">
            <div class="container-fluid" style="margin-left:225px">
                <?php $this->load->view('menu', $titulo) ?>
            </div>
        </nav>
        
        <!-- Mensajes a mostrar -->
        <?php if($this->session->flashdata('error') != null):?>
            <main role="msg">
                <div class="alert alert-danger col-md-5 mx-auto mt-5 text-center">
                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                    <?= $this->session->flashdata('error');?>
                </div>
            </main>
        <?php endif; ?>

        <?php if($this->session->flashdata('success') != null):?>
            <main role="msg">
                <div class="alert alert-success col-md-5 mx-auto mt-5 text-center">
                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                    <?= $this->session->flashdata('success');?>
                </div>
            </main>
        <?php endif; ?>

        <!-- Contenido -->
        <?php if(isset($view)): ?>
            <?= $this->load->view($view, null, true); ?>
        <?php endif; ?>
        <!-- Javascript -->
        <script src="<?= base_url() ?>assets/libs/jquery/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url() ?>assets/js/main.js"></script>
      </body>
</html>
