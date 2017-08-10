<!--main content start-->
    <section id="main-content">
        <section class="wrapper">            
              <!--overview start-->
			<div class="row">
			  	<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-folder-open-o"></i><?php echo $title; ?></h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo base_url('home/'); ?>">Home</a></li>
						<li><i class="fa fa-folder-open-o"></i><?php echo $title; ?></li>						  	
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="panel panel-primary">
						<header class="panel-heading">Pesquisar Projetos</header>
						<div class="panel-body">
							<div class="form-group">
								<?php
        						$errors = validation_errors();
        						if ($errors!=="") {
        							echo "<div class='alert alert-warning fade in'>";
        							echo $errors;
        							echo "</div>";
        						}
        						echo form_open('projetos/search');

        						?>
        						<label class="col-sm-2" style="text-align: right;" for="keyword">Termo</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" required="" name="keyword" /></div>
								<div class="col-lg-offset-2 col-lg-10"><button type="submit" name="submit" class="btn btn-primary">Pesquisar</button></div>
        					</div>
        						</form>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<div class="panel panel-primary">
							<header class="panel-heading">Resultados da Pesquisa - "<?php echo $keyword; ?>"</header>
							<div class="panel-body">
							<center>
							<?php
        					if (isset($message_display_edit)) {
            					echo "<div class='alert alert-warning fade in'>";
            					echo $message_display_edit;
            					echo "</div>";
        					} ?>
							<table class="table table-condensed">
							<tr>
								<th class="text-center">ID</th>
								<th class="text-center">Titulo</th>
								<th class="text-center">Estado</th>
								<th class="text-center">Episódios Lançados</th>
							</tr>
							<?php foreach ($projetos as $projetos_item): ?>
							<tr>
								<td class="text-center"><?php echo $projetos_item["idprojetos"]; ?></td>
								<td>
									<?php if($this->session->userdata('class')==1) { ?>
									<a class="red-links" href="<?php echo base_url('projetos/delete')."/".$projetos_item["idprojetos"]; ?>"><i class="fa fa-trash-o"></i></a>
									<?php } ?>
									<a href="<?php echo base_url('projetos/view')."/".$projetos_item["idprojetos"]; ?>"><?php echo $projetos_item["titulo"] ?></a>
									<?php if($this->session->userdata('class') < 2) { ?>
									<a class="yellow-links" href="<?php echo base_url('projetos/edit')."/".$projetos_item["idprojetos"]; ?>"><i class="fa fa-pencil"></i></a>
									<?php } ?>
								</td>
								<td class="text-center"><?php if ($projetos_item["rls_eps"] < $projetos_item["num_eps"]) { echo "Andamento"; } else { echo "Completo"; } ?></td>
								<td class="text-center"><?php echo $projetos_item["rls_eps"]; ?></td>
							</tr>
							<?php endforeach; ?>
							</table>
							<div class="pagination">
    							<ul class="pagination">
							        <?php echo $pagination_helper->create_links(); ?>
    							</ul>    
							</div>
							</center>
						</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</section>