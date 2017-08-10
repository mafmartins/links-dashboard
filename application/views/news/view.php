      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
            <!--overview start-->
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo base_url('home/'); ?>">Home</a></li>
						<li><i class="icon_document_alt"></i>Notícias</li>
						<li><i class="icon_document_alt"></i><?php echo $news_item['title']; ?></li>						  	
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
						<section class="panel panel-default">
									
							<header class="panel-heading">
								<?php if($this->session->userdata('class')==1) { ?>
								<a class="red-links" href="<?php echo base_url('news/delete')."/".$news_item["id"]; ?>"><i class="fa fa-trash-o"></i></a>
								<a class="yellow-links" href="<?php echo base_url('news/edit')."/".$news_item["id"]; ?>"><i class="fa fa-pencil"></i></a>
                	 	       	<?php } echo $news_item['title']; ?> - <?php echo $news_item['date']; ?>
                		    </header>
                		    <div class="panel-body">
                		    	<?php echo $news_item['text']; ?>
                		    </div>               				
						</section>
					</div>
			</div>