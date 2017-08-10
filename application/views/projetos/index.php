      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-folder-open-o "></i> Projetos</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo base_url('home/'); ?>">Home</a></li>
						<li><i class="fa fa-folder-open-o"></i>Projetos</li>						  	
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="panel panel-primary">
						<header class="panel-heading">Pesquisar Projetos</header>
						<div class="panel-body">
							<div class="form-group">
								<?php echo form_open('projetos/search'); ?>
        						<label class="col-sm-2" style="text-align: right;" for="url">Termo</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" required="" name="keyword" /></div>
								<div class="col-lg-offset-2 col-lg-10"><button type="submit" name="submit" class="btn btn-primary">Pesquisar</button></div>
        					</div>
        						</form>
						</div>
					</div>
					<div class="panel panel-primary">
						<header class="panel-heading">Lista de Projetos</header>
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
				<div class="col-lg-6">
					<div class="panel panel-primary">
						<header class="panel-heading">Adicionar Projeto</header>
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
        					echo form_open('projetos/add_projeto'); ?>
							<div class="form-group">
								<label class="col-sm-2" style="text-align: right;" for="titulo">Titulo</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" required="" name="titulo" /></div>
								<label class="col-sm-2" style="text-align: right;" for="img">Imagem</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" required="" name="img" /></div>
								<label class="col-sm-2" style="text-align: right;" for="capa">Capa</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" required="" name="capa" /></div>
								<label class="col-sm-2" style="text-align: right;" for="num_eps" >Número de Episódios</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="number" name="num_eps" required="" value="25"/></div>
								<label class="col-sm-2" style="text-align: right;" for="tipo" >Tipo</label>
								<div class="col-sm-10"><select class="form-control m-bot15" name="tipo">
								<option value="Anime">Anime</option>
								<option value="OVA">OVA</option>
								<option value="Filme">Filme</option>
								</select></div>
								<label class="col-sm-2" style="text-align: right;" for="enc_video">Encode do Vídeo</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" required="" name="enc_video" /></div>
								<label class="col-sm-2" style="text-align: right;" for="enc_audio">Encode do Áudio</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" required="" name="enc_audio" /></div>
								<label class="col-sm-2" style="text-align: right;" for="staff">Staff</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" required="" name="staff" /></div>
								<label class="col-sm-2" style="text-align: right;" for="ano">Ano</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="number" name="ano" required="" value="2015"/></div>
								<label class="col-sm-2" style="text-align: right;" for="estudio">Estúdio</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" required="" name="estudio" /></div>
								<label class="col-sm-2" style="text-align: right;" for="autor">Autor</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" required="" name="autor" /></div>
								<label class="col-sm-2" style="text-align: right;" for="genero">Gênero</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" required="" name="genero" /></div>
								<label class="col-sm-2" style="text-align: right;" for="sinopse">Sinopse</label>
								<div class="col-sm-10"><textarea class="form-control m-bot15" rows="3" required="" name="sinopse" ></textarea></div>
								<label class="col-sm-2" style="text-align: right;" for="parceria">Parceria</label>
								<div class="col-sm-10"><select class="form-control m-bot15" name="parceria">
								<option value="0">Não</option>
								<option value="1">Sim</option>
								</select></div>
								<label class="col-sm-2" style="text-align: right;" for="parceiro">Parceiro</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" name="parceiro" /></div>
								<label class="col-sm-2" style="text-align: right;" for="rls_eps">Episódios Lançados</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="number" name="rls_eps" required="" value="0"/></div>
								<label class="col-sm-2" style="text-align: right;" for="tor_link">Link Torrent</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" name="tor_link" /></div>
								<label class="col-sm-2" style="text-align: right;" for="bd">Blu-ray</label>
								<div class="col-sm-10"><select class="form-control m-bot15" name="bd">
								<option value="0">Não</option>
								<option value="1">Sim</option>
								</select></div>
								<div class="col-lg-offset-2 col-lg-10"><button type="submit" name="submit" class="btn btn-primary">Adicionar</button></div>
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>

