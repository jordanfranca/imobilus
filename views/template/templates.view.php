<div class="row">
	<h2>Templates Disponíveis para o sistema imóbilus</h2>
	<?php 
		if($templates != false) {
			foreach ($templates as $array) {
				if($array['IND_ATIVO'] == 1) {
				?>
				<div class="large-4 columns left text-center template-lista">
					<div class="name-template"><?php echo $array['NOM_TEMPLATE']; ?></div>
					<img src="/templates/miniaturas/<?php echo $array['DSC_MINIATURA']; ?>" />
				</div>
				<?php
				}
			} 
		}
	?>
</div>