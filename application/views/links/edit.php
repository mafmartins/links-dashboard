<!--main content start-->
    <section id="main-content">
        <section class="wrapper">            
              <!--overview start-->
			<div class="row">
			  	<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-link"></i><?php echo $title; ?></h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo base_url('home/'); ?>">Home</a></li>
						<li><i class="fa fa-link"></i><?php echo $title; ?></li>						  	
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="panel panel-primary">
						<header class="panel-heading">Editar Link</header>
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
        					echo form_open('links/edit'); ?>
							<div class="form-group">
								<label class="col-sm-2" style="text-align: right;" for="idlinks">ID</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" required="" name="idlinks" value="<?php echo $links["idlinks"]; ?>" readonly="readonly"/></div>
								<label class="col-sm-2" style="text-align: right;" for="url">Link</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" required="" name="url" value="<?php echo $links["link"]; ?>" /></div>
								<label class="col-sm-2" style="text-align: right;" for="projeto">Projeto</label>
								<div class="col-sm-10"><select class="form-control m-bot15" name="projeto">
									<?php
									$projeto = $this->projetos_model->get_projetos();

									foreach ($projeto as $projetos_item): ?>

									<option value="<?php echo $projetos_item["idprojetos"]; ?>" <?php if($projetos_item["idprojetos"]==$links["idprojeto"]) echo "selected=\"selected\""; ?>><?php echo $projetos_item["titulo"]; ?></option>

									<?php endforeach; ?>

								<select></div>
								<label class="col-sm-2" style="text-align: right;" for="num_ep" >Episódio</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="number" name="num_ep" required="" value="<?php echo $links["num_ep"]; ?>"/></div>
								<label class="col-sm-2" style="text-align: right;" for="crc">CRC32</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" name="crc" value="<?php echo $links["crc"]; ?>"/></div>
								<label class="col-sm-2" style="text-align: right;" for="data">Data</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" name="data" value="<?php echo $links["data"]; ?>" required=""/></div>
								<label class="col-sm-2" style="text-align: right;" for="downloads" >Downloads</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" name="downloads" value="<?php echo $links["downloads"]; ?>" required=""/></div>
								<label class="col-sm-2" style="text-align: right;" for="isova">Especial</label>
								<div class="col-sm-10"><select class="form-control m-bot15" name="isova">
								<option value="0" <?php if($links["isova"]==0) echo "selected=\"selected\""; ?>>Não</option>
								<option value="1" <?php if($links["isova"]==1) echo "selected=\"selected\""; ?>>Sim</option>
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