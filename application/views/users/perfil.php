      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-users "></i>Perfil</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo base_url('home/'); ?>">Home</a></li>
						<li><i class="fa fa-users "></i>Perfil</li>						  	
					</ol>
				</div>
			</div>
			<div class="row">

				<div class="col-lg-6 col-lg-offset-3">
					<div class="panel panel-primary">
						<header class="panel-heading">Perfil</header>
						<div class="panel-body">
							<center>
							<div class="col-sm-6 m-bot15"><img class="wp-image-5035" src="<?php echo $user['avatar']; ?>" alt="avatar" style="max-width:470px;" /><br /></div>
							</center>
  							<div class="col-sm-6">
  								<table class="table table-condensed">
								<tbody>
									<tr>
										<td class="left-column"><strong>Nome de Usuário:</strong></td><td><?php echo $user['username']; ?></td>
  									</tr>
  									<tr>
  										<td class="left-column"><strong>E-mail:</strong></td><td><?php echo $user['email']; ?></td>
  									</tr>
  									<tr>
  										<td class="left-column"><strong>Classe:</strong></td><td><?php if ($this->session->userdata('class') == 2) { echo "Coordenador";} else { echo "Administrador"; } ?></td>
  									</tr>
  									<tr>
  										<td class="left-column"><strong>Data de Cadastro:</strong></td><td><?php echo $user['created']; ?></td>
  									</tr>
  								</tbody>
  								</table>
  							</div>
						</div>
					</div>
				</div>
			</div>