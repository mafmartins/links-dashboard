      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-folder-open-o "></i>Perfil</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo base_url('home/'); ?>">Home</a></li>
						<li><i class="fa fa-folder-open-o "></i>Projetos</li>						  	
					</ol>
				</div>
			</div>
			<div class="row">

				<div class="col-lg-8 col-lg-offset-2">
					<div class="panel panel-primary">
						<header class="panel-heading"><?php echo $projeto['titulo']; ?></header>
						<div class="panel-body">
							
							<div class="col-sm-6">
								<center>
								<img class="wp-image-5035 img-responsive" src="<?php echo $projeto['img']; ?>" alt="capa do anime" width="470" /><br />
								</center>
								<?php if($this->session->userdata('class') < 2) { ?>
									<a class="yellow-links" href="<?php echo base_url('projetos/edit')."/".$projeto["idprojetos"]; ?>"><h4 style="margin-left: 20px;"><i class="fa fa-pencil m-l-10"></h4></i></a>
								<?php } ?>
							</div>
							
  							<div class="col-sm-6">
  								<table class="table table-condensed">
								<tbody>
									<tr>
										<td class="left-column"><strong>Ano:</strong></td><td><?php echo $projeto['ano']; ?></td>
  									</tr>
  									<tr>
  										<td class="left-column"><strong>Criador(a):</strong></td><td><?php echo $projeto['autor']; ?></td>
  									</tr>
  									<tr>
  										<td class="left-column"><strong>Estúdio:</strong></td><td><?php echo $projeto['estudio']; ?></td>
  									</tr>
  									<tr>
  										<td class="left-column"><strong>Gênero:</strong></td><td><?php echo $projeto['genero']; ?></td>
  									</tr>
  									<tr>
  										<td class="left-column"><strong>Estado do Projeto:</strong></td><td><?php if ($projeto["rls_eps"] < $projeto["num_eps"]) : echo "Andamento"; else : echo "Completo"; endif; ?></td>
  									</tr>
  									<?php if ($projeto["parceria"]==1){ ?>
  									<tr>
  										<td class="left-column"><strong>Parceria:</strong></td><td><?php echo $projeto['parceiro']; ?></td>
  									</tr>
  									<?php	} ?>
  									<tr>
  										<td class="left-column"><strong>Staff:</strong></td><td><?php echo $projeto['staff']; ?></td>
  									</tr>
  									<tr>
  										<td class="left-column"><strong>Vídeo/Áudio:</strong></td><td><?php echo $projeto['enc_video']; ?> / <?php echo $projeto['enc_audio']; ?></td>
  									</tr>
  									<tr>
  										<td colspan="2" ><strong>Sinopse:</strong><br /><?php echo $projeto['sinopse']; ?></td>
  									</tr>
  								</tbody>
  								</table>
  							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">

				<div class="col-lg-8 col-lg-offset-2">
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
			</div>