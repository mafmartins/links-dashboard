      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-bar-chart-o"></i>Estatísticas</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo base_url('home/'); ?>">Home</a></li>
						<li><i class="fa fa-bar-chart-o"></i>Estatísticas</li>						  	
					</ol>
				</div>
			</div>
			<div class="row">

				<div class="col-lg-6">
					<div class="panel panel-primary">
						<header class="panel-heading">Resumo Total</header>
						<div class="panel-body">
							<div class="row" style="margin-bottom: 10px;">
								<div class="col-lg-3 text-center"><h4 style="margin-top: 0px;margin-bottom: 15px;">Número de Links:</h4><span class="label label-primary" style="font-size:18px;"><?php echo $links_count; ?></span></div>
								<div class="col-lg-3 text-center"><h4 style="margin-top: 0px;margin-bottom: 15px;">Total Downloads:</h4><span class="label label-success" style="font-size:18px;"><?php echo $total_downs; ?></span></div>
								<div class="col-lg-3 text-center"><h4 style="margin-top: 0px;margin-bottom: 15px;">Média por Link:</h4><span class="label label-info" style="font-size:18px;"><?php echo $avg_downs; ?></span></div>
								<div class="col-lg-3 text-center"><h4 style="margin-top: 0px;margin-bottom: 15px;">Média por Dia:</h4><span class="label label-warning" style="font-size:18px;"><?php echo $avg_days; ?></span></div>
							</div>
							<div id="chart_div3" align='center' style="overflow-x: auto-scroll; overflow-y: hidden; width: 100%; height: 309px;"></div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="panel panel-primary">
						<header class="panel-heading">Top 10 - Episódios Mais Baixados</header>
						<div class="panel-body" >
							<div id="chart_div" align='center' style="overflow-x: auto-scroll; overflow-y: hidden; width: 100%; height: 400px;"></div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="panel panel-primary">
						<header class="panel-heading">Top 10 - Projetos Mais Baixados</header>
						<div class="panel-body" >
							<div id="chart_div1" align='center' style="overflow-x: auto-scroll; overflow-y: hidden; width: 100%; height: 400px;"></div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="panel panel-primary">
						<header class="panel-heading">Top 10 - Média de Downloads por Episódio</header>
						<div class="panel-body">
							<div id="chart_div2" align='center' style="overflow-x: auto-scroll; overflow-y: hidden; width: 100%; height: 400px;"></div>
							</div>
						</div>
					</div>
				</div>
			</div>