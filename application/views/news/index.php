
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
            <!--overview start-->
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_document_alt"></i> <?php echo $title; ?></h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="<?php echo base_url('home/'); ?>">Home</a></li>
						<li><i class="icon_document_alt"></i><?php echo $title; ?></li>						  	
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<?php

					if (isset($message_display)) {
            			echo "<div class='alert alert-info fade in'>";
            			echo $message_display;
            			echo "</div>";
        			}

					?>
					<?php foreach ($news as $news_item): ?>
						<div class="panel panel-default">
							<header class="panel-heading">
							<?php if($this->session->userdata('class')==1) { ?>
							<a class="red-links" href="<?php echo base_url('news/delete')."/".$news_item["id"]; ?>"><i class="fa fa-trash-o"></i></a>
							<a class="yellow-links" href="<?php echo base_url('news/edit')."/".$news_item["id"]; ?>"><i class="fa fa-pencil"></i></a>
							<?php } echo $news_item['title']; ?> - <?php echo $news_item['date']; ?>
							</header>
							<div class="panel-body">
                		    	<?php

                		    	$max_length = 340;

                		    	$s=$news_item['text'];

								if (strlen($s) > $max_length)
								{
    								$offset = ($max_length - 3) - strlen($s);
    								$s = substr($s, 0, strrpos($s, ' ', $offset)) . '...';
								}

                		    	echo $s; ?>
                		    	<p><a href="<?php echo base_url('news/'.$news_item['id']); ?>">Ler mais...</a></p>
                		   </div>               				
						</div>
					<?php endforeach; ?>
						<center>
						<div class="pagination">
    						<ul class="pagination">
								<?php echo $pagination_helper->create_links(); ?>
    						</ul>    
						</div>
						</center>
					</div>
			</div>