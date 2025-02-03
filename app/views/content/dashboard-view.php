<div class="container is-fluid home-container">
	<h1 class="title"></h1>
  	<div class="columns is-flex is-justify-content-center">
  	</div>
  	<div class="columns is-flex is-justify-content-center">
  		<h2 class="subtitle home-text">¡Bienvenido User Name!</h2>
		<?php 
			$sql = "SELECT * FROM usuarios";
			$pdo->query($sql);
			
		?>
  	</div>
</div>