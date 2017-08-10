
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
            <!--overview start-->
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_document_alt"></i> Dashboard</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo base_url('home/'); ?>">Home</a></li>
						<li><i class="icon_document_alt"></i><?php echo $title; ?></li>						  	
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
						<div class="panel panel-default">
							<header class="panel-heading">
                	 	       Criar nova notícia
                		    </header>
                		    <div class="panel-body">
                		    	<?php echo validation_errors(); ?>

								<?php echo form_open('news/create'); ?>
									<div class="form-group">

  							    		<label class="col-sm-2" style="text-align: right;" for="title">Título</label>
    									<div class="col-sm-10"><input class="form-control m-bot15" type="input" name="title" required="" /></div>

							    		<label class="col-sm-2" style="text-align: right;" for="text">Texto</label>
    									<div class="col-sm-10"><textarea class="form-control m-bot15" name="text" required=""></textarea></div>

    									<div class="col-lg-offset-2 col-lg-10"><button type="submit" name="submit" class="btn btn-primary">Criar Notícia</button></div>
    								</div>
								</form>
                		    </div>               				
						</div>
				</div>
			</div>