      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-link"></i> Links</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo base_url('home/'); ?>">Home</a></li>
						<li><i class="fa fa-link"></i>Links</li>						  	
					</ol>
				</div>
			</div>
			<div class="row">

				<div class="col-lg-6">
					<div class="panel panel-primary">
						<header class="panel-heading">Lista de Links</header>
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
								<th class="text-center">Nome</th>
								<th class="text-center">Downloads</th>
								<th class="text-center">Data</th>
							</tr>
							<?php foreach ($links as $links_item): ?>
							<tr>
								<td class="text-center"><?php echo $links_item["idlinks"]; ?></td>
								<td>
									<?php if($this->session->userdata('class')==1) { ?>
									<a class="red-links" href="<?php echo base_url('links/delete')."/".$links_item["idlinks"]; ?>"><i class="fa fa-trash-o"></i></a>
									<?php } ?>
									<a href="<?php echo $links_item["link"]; ?>">
									<?php

									if($links_item["isova"]==1){
										if (strpos($links_item["link"],'OVA') !== false) { 
												$num_ep = "OVA ".$links_item["num_ep"];
											} else {
												$projeto = $this->projetos_model->get_projetos($links_item["idprojeto"]);
												if ($projeto["tipo"] == "Filme"){
													if (strpos($links_item["link"],'720')) { $num_ep = "720p"; } else { $num_ep = "1080p"; }
												}
												
											} 
									} else {
										$projeto = $this->projetos_model->get_projetos($links_item["idprojeto"]);
										if ($projeto["tipo"] == "Filme"){
											if (strpos($links_item["link"],'720')) { $num_ep = "720p"; } else { $num_ep = "1080p"; }
										} else {
											$num_ep = $links_item["num_ep"];
										}
									}


									?>
									<?php $projeto = $this->projetos_model->get_projetos($links_item["idprojeto"]); echo $projeto["titulo"]." - ".$num_ep; ?>
									</a>
									<?php if($this->session->userdata('class') <= 2) { ?>
									<a class="yellow-links" href="<?php echo base_url('links/edit')."/".$links_item["idlinks"]; ?>"><i class="fa fa-pencil"></i></a>
									<?php } ?>
								</td>
								<td class="text-center"><?php echo $links_item["downloads"]; ?></td>
								<td class="text-center"><?php echo $links_item["data"]; ?></td>
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
				<div class="col-lg-6">
					<div class="panel panel-primary">
						<header class="panel-heading">Pesquisar Link</header>
						<div class="panel-body">
							<div class="form-group">
								<?php echo form_open('links/search'); ?>
        						<label class="col-sm-2" style="text-align: right;" for="url">Termo</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" required="" name="keyword" /></div>
								<div class="col-lg-offset-2 col-lg-10"><button type="submit" name="submit" class="btn btn-primary">Pesquisar</button></div>
        					</div>
        						</form>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="panel panel-primary">
						<header class="panel-heading">Adicionar Link</header>
						<div class="panel-body">
							<?php
        					if (isset($message_display)) {
            					echo "<div class='alert alert-info fade in'>";
            					echo $message_display;
            					echo "</div>";
        					}
        					$errors = validation_errors();
        					if ($errors!=="") {
        						echo "<div class='alert alert-warning fade in'>";
        						echo $errors;
        						echo "</div>";
        					}
        					echo form_open('links/add_link'); ?>
							<div class="form-group">
								<label class="col-sm-2" style="text-align: right;" for="url">Link</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" required="" name="url" /></div>
								<label class="col-sm-2" style="text-align: right;" for="projeto">Projeto</label>
								<div class="col-sm-10"><select class="form-control m-bot15" name="projeto">
									<?php

									foreach ($projetos as $projetos_item): ?>

									<option value="<?php echo $projetos_item["idprojetos"]; ?>"><?php echo $projetos_item["titulo"]; ?></option>

									<?php endforeach; ?>

								<select></div>
								<label class="col-sm-2" style="text-align: right;" for="num_ep" >Episódio</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="number" name="num_ep" required=""/></div>
								<label class="col-sm-2" style="text-align: right;" for="crc">CRC32</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" name="crc" /></div>
								<label class="col-sm-2" style="text-align: right;" for="isova">Especial</label>
								<div class="col-sm-10"><select class="form-control m-bot15" name="isova">
								<option value="0">Não</option>
								<option value="1">Sim</option>
								</select></div>
								<div class="col-lg-offset-2 col-lg-10"><button type="submit" name="submit" class="btn btn-primary">Adicionar</button></div>
							</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="panel panel-primary">
						<header class="panel-heading">Top 10 Mais Baixados</header>
						<div class="panel-body">
							<center>
							<table class="table table-condensed">
							<tr>
								<th class="text-center">ID</th>
								<th class="text-center">Nome</th>
								<th class="text-center">Downloads</th>
								<th class="text-center">Data</th>
							</tr>
							<?php foreach ($top_links as $links_item): ?>
							<tr>
								<td class="text-center"><?php echo $links_item["idlinks"]; ?></td>
								<td>
									<a href="<?php echo $links_item["link"]; ?>">
									<?php

									if($links_item["isova"]==1){
										if (strpos($links_item["link"],'OVA') !== false) { 
												$num_ep = "OVA ".$links_item["num_ep"];
											} else {
												$projeto = $this->projetos_model->get_projetos($links_item["idprojeto"]);
												if ($projeto["tipo"] == "Filme"){
													if (strpos($links_item["link"],'720')) { $num_ep = "720p"; } else { $num_ep = "1080p"; }
												}
												
											} 
									} else {
										$projeto = $this->projetos_model->get_projetos($links_item["idprojeto"]);
										if ($projeto["tipo"] == "Filme"){
											if (strpos($links_item["link"],'720')) { $num_ep = "720p"; } else { $num_ep = "1080p"; }
										} else {
											$num_ep = $links_item["num_ep"];
										}
									}


									?>
									<?php $projeto = $this->projetos_model->get_projetos($links_item["idprojeto"]); echo $projeto["titulo"]." - ".$num_ep; ?>
									</a>
								</td>
								<td class="text-center"><?php echo $links_item["downloads"]; ?></td>
								<td class="text-center"><?php echo $links_item["data"]; ?></td>
							</tr>
							<?php endforeach; ?>
							</table>
							</center>
						</div>
					</div>
				</div>
			</div>