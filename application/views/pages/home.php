      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Home</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo base_url('home/'); ?>">Home</a></li>					  	
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="panel panel-primary">
						<header class="panel-heading">Notícias</header>
						<div class="panel-body">
							<center>
							<table class="table table-condensed">
							<?php foreach ($news as $news_item): ?>
							<tr>
								<th class="text-center" style="border-top: none; width: 80%"><a href="<?php echo base_url('news')."/".$news_item["id"]; ?>"><?php echo $news_item["title"]  ?></a></th>
								<td class="text-center" style="border-top: none;"><?php echo $news_item["date"]  ?></th>
							</tr>
							<?php endforeach; ?>
							</table>
							</center>
						</div>
					</div>
					<div class="panel panel-primary">
						<header class="panel-heading">Links Recentes</header>
						<div class="panel-body">
							<center>
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
									<?php if($this->session->userdata('class') == 1) { ?>
									<a class="yellow-links" href="<?php echo base_url('links/edit')."/".$links_item["idlinks"]; ?>"><i class="fa fa-pencil"></i></a>
									<?php } ?>
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
        					echo form_open('pages/add_link'); ?>
							<div class="form-group">
								<label class="col-sm-2" style="text-align: right;" for="url">Link</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" required="" name="url" /></div>
								<label class="col-sm-2" style="text-align: right;" for="projeto">Projeto</label>
								<div class="col-sm-10"><select class="form-control m-bot15" name="projeto">
									<?php

									foreach ($projetos as $projetos_item): ?>

									<option value="<?php echo $projetos_item["idprojetos"]; ?>" ><?php echo $projetos_item["titulo"]; ?></option>

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
					<div class="panel panel-primary">
						<header class="panel-heading">Projetos em Andamento</header>
						<div class="panel-body">
							<center>
							<table class="table table-condensed">
							<tr>
								<th class="text-center">ID</th>
								<th class="text-center">Titulo</th>
								<th class="text-center">Estado</th>
								<th class="text-center">Episódios Lançados</th>
							</tr>
							<?php foreach ($projetos_andamento as $projetos_item): ?>
							<tr>
								<td class="text-center"><?php echo $projetos_item["idprojetos"]; ?></td>
								<td>
									<a href="<?php echo base_url('projetos')."/view/".$projetos_item["idprojetos"]; ?>"><?php echo $projetos_item["titulo"] ?></a>
									<?php if($this->session->userdata('class') < 2) { ?>
									<a class="yellow-links" href="<?php echo base_url('projetos/edit')."/".$projetos_item["idprojetos"]; ?>"><i class="fa fa-pencil"></i></a>
									<?php } ?>
								</td>
								<td class="text-center"><?php if ($projetos_item["rls_eps"] < $projetos_item["num_eps"]) { echo "Andamento"; } else { echo "Completo"; } ?></td>
								<td class="text-center"><?php echo $projetos_item["rls_eps"]; ?></td>
							</tr>
							<?php endforeach; ?>
							</table>
							</center>
						</div>
					</div>
				</div>
			</div>
