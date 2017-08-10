      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-users "></i>Gerir Usuários</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo base_url('home/'); ?>">Home</a></li>
						<li><i class="fa fa-users "></i>Gerir Usuários</li>						  	
					</ol>
				</div>
			</div>
			<div class="row">

				<div class="col-lg-6">
					<div class="panel panel-primary">
						<header class="panel-heading">Lista de Usuários</header>
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
								<th class="text-center">Username</th>
								<th class="text-center">E-mail</th>
								<th class="text-center">Classe</th>
							</tr>
							<?php foreach ($users as $users_item): ?>
							<tr>
								<td class="text-center"><?php echo $users_item["id"]; ?></td>
								<td>
									<?php if($this->session->userdata('class')==1) { ?>
									<a class="red-links" href="<?php echo base_url('users/delete')."/".$users_item["id"]; ?>"><i class="fa fa-trash-o"></i></a>
									<?php } ?>
									<a href="<?php echo base_url('users/perfil')."/".$users_item["id"]; ?>">
									<?php echo $users_item["username"] ?>
									</a>
									<?php if($this->session->userdata('class') ==1) { ?>
									<a class="yellow-links" href="<?php echo base_url('users/edit')."/".$users_item["id"]; ?>"><i class="fa fa-pencil"></i></a>
									<?php } ?>
								</td>
								<td class="text-center"><?php echo $users_item["email"]; ?></td>
								<td class="text-center"><?php if ($users_item["class"] == 2) { echo "Coordenador";} else { echo "Administrador"; } ?></td>
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
						<header class="panel-heading">Criar Usuário</header>
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
        					echo form_open('users/add_user'); ?>
							<div class="form-group">
								<label class="col-sm-2" style="text-align: right;" for="username">Username</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" required="" name="username" /></div>
								<label class="col-sm-2" style="text-align: right;" for="password">Password</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="password" required="" name="password" /></div>
								<label class="col-sm-2" style="text-align: right;" for="email" >E-mail</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" required="" name="email" /></div>
								<label class="col-sm-2" style="text-align: right;" for="class">Classe</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="number" required="" name="class" /></div>
								<label class="col-sm-2" style="text-align: right;" for="avatar">Avatar</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" required="" name="avatar" /></div>
								<div class="col-lg-offset-2 col-lg-10"><button type="submit" name="submit" class="btn btn-primary">Criar</button></div>
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>