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
						<header class="panel-heading">Editar Projeto</header>
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
        					echo form_open('projetos/edit'); ?>
							<div class="form-group">
								<label class="col-sm-2" style="text-align: right;" for="idprojetos">ID</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" required="" name="idprojetos" value="<?php echo $projetos["idprojetos"]; ?>" readonly="readonly"/></div>
								<label class="col-sm-2" style="text-align: right;" for="titulo">Titulo</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" required="" name="titulo" value="<?php echo $projetos["titulo"] ?>" /></div>
								<label class="col-sm-2" style="text-align: right;" for="img">Imagem</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" required="" name="img" value="<?php echo $projetos["img"] ?>"/></div>
								<label class="col-sm-2" style="text-align: right;" for="capa">Capa</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" required="" name="capa" value="<?php echo $projetos["capa"] ?>"/></div>
								<label class="col-sm-2" style="text-align: right;" for="num_eps" >Número de Episódios</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="number" name="num_eps" required="" value="<?php echo $projetos["num_eps"] ?>"/></div>
								<label class="col-sm-2" style="text-align: right;" for="tipo" >Tipo</label>
								<div class="col-sm-10"><select class="form-control m-bot15" name="tipo">
								<option value="Anime" <?php if($projetos["tipo"]=="Anime") echo "selected=\"selected\""; ?>>Anime</option>
								<option value="OVA" <?php if($projetos["tipo"]=="OVA") echo "selected=\"selected\""; ?>>OVA</option>
								<option value="Filme" <?php if($projetos["tipo"]=="Filme") echo "selected=\"selected\""; ?>>Filme</option>
								</select></div>
								<label class="col-sm-2" style="text-align: right;" for="enc_video">Encode do Vídeo</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" required="" name="enc_video" value="<?php echo $projetos["enc_video"] ?>"/></div>
								<label class="col-sm-2" style="text-align: right;" for="enc_audio">Encode do Áudio</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" required="" name="enc_audio" value="<?php echo $projetos["enc_audio"] ?>"/></div>
								<label class="col-sm-2" style="text-align: right;" for="staff">Staff</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" required="" name="staff" value="<?php echo $projetos["staff"] ?>"/></div>
								<label class="col-sm-2" style="text-align: right;" for="ano">Ano</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="number" name="ano" required="" value="<?php echo $projetos["ano"] ?>"/></div>
								<label class="col-sm-2" style="text-align: right;" for="estudio">Estúdio</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" required="" name="estudio" value="<?php echo $projetos["estudio"] ?>"/></div>
								<label class="col-sm-2" style="text-align: right;" for="autor">Autor</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" required="" name="autor" value="<?php echo $projetos["autor"] ?>"/></div>
								<label class="col-sm-2" style="text-align: right;" for="genero">Gênero</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" required="" name="genero" value="<?php echo $projetos["genero"] ?>"/></div>
								<label class="col-sm-2" style="text-align: right;" for="sinopse">Sinopse</label>
								<div class="col-sm-10"><textarea class="form-control m-bot15" rows="3" required="" name="sinopse" ><?php echo $projetos["sinopse"] ?></textarea></div>
								<label class="col-sm-2" style="text-align: right;" for="parceria">Parceria</label>
								<div class="col-sm-10"><select class="form-control m-bot15" name="parceria">
								<option value="0" <?php if($projetos["parceria"]==0) echo "selected=\"selected\""; ?>>Não</option>
								<option value="1" <?php if($projetos["parceria"]==1) echo "selected=\"selected\""; ?>>Sim</option>
								</select></div>
								<label class="col-sm-2" style="text-align: right;" for="parceiro">Parceiro</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" name="parceiro" value="<?php echo $projetos["parceiro"] ?>"/></div>
								<label class="col-sm-2" style="text-align: right;" for="rls_eps">Episódios Lançados</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="number" name="rls_eps" required="" value="<?php echo $projetos["rls_eps"] ?>"/></div>
								<label class="col-sm-2" style="text-align: right;" for="tor_link">Link Torrent</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" name="tor_link" value="<?php echo $projetos["tor_link"] ?>"/></div>
								<label class="col-sm-2" style="text-align: right;" for="bd">Blu-ray</label>
								<div class="col-sm-10"><select class="form-control m-bot15" name="bd">
								<option value="0" <?php if($projetos["bd"]==0) echo "selected=\"selected\""; ?>>Não</option>
								<option value="1" <?php if($projetos["bd"]==1) echo "selected=\"selected\""; ?>>Sim</option>
								</select></div>
								<div class="col-lg-offset-2 col-lg-10"><button type="submit" name="submit" class="btn btn-primary">Salvar</button></div>
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</section>