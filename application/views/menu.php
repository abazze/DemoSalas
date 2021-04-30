<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
	<span class="navbar-brand" style="color:rgba(255,255,255,.5); font-size:1rem"><?=$titulo?></span>
	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"        		aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class="navbar-nav navbar-sidenav" id="exampleAccordion" style="overflow-y: auto">
			<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Configuración">
				<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseConfiguracion" data-parent="#exampleAccordion">
					<i class="fa fa-fw fa-cog"></i>
					<span class="nav-link-text">Maestros</span>
				</a>
				<ul class="sidenav-second-level collapse" id="collapseConfiguracion">
					<li>
						<a href="<?= base_url() ?>people">Personas</a>
					</li>
					<li>
						<a href="<?= base_url() ?>rooms">Salas</a>
					</li>
				</ul>
			</li>
			<li class="nav-item" data-toggle="tooltip" data-placement="right">
				<a class="nav-link" href="<?= base_url() ?>assign_rooms">
					<i class="fa fa-fw fa-exchange"></i>
					<span class="nav-link-text">Asignar salas</span>
				</a>
			</li>
		</ul>
	</div>
</nav>