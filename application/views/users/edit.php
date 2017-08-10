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
				<div class="col-lg-6 col-lg-offset-3">
					<div class="panel panel-primary">
						<header class="panel-heading">Editar Usuário</header>
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
        					echo form_open('users/edit'); ?>
							<div class="form-group">
								<label class="col-sm-2" style="text-align: right;" for="id">ID</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" required="" name="id" readonly="readonly" value="<?php echo $users["id"]; ?>" /></div>
								<label class="col-sm-2" style="text-align: right;" for="username">Username</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" required="" name="username" value="<?php echo $users["username"]; ?>"/></div>
								<label class="col-sm-2" style="text-align: right;" for="password">Password</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="password" required="" name="password" value="<?php echo $users["password"]; ?>"/></div>
								<label class="col-sm-2" style="text-align: right;" for="email" >E-mail</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" required="" name="email" value="<?php echo $users["email"]; ?>"/></div>
								<label class="col-sm-2" style="text-align: right;" for="class">Classe</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="number" required="" name="class" value="<?php echo $users["class"]; ?>"/></div>
								<label class="col-sm-2" style="text-align: right;" for="avatar">Avatar</label>
								<div class="col-sm-10"><input class="form-control m-bot15" type="input" required="" name="avatar" value="<?php echo $users["avatar"]; ?>"/></div>
								<div class="col-lg-offset-2 col-lg-10"><button type="submit" name="submit" class="btn btn-primary">Editar</button></div>
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>