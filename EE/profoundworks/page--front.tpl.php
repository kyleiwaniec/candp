<div id="body-inner">
  <div id="top-row">
  	<div class="logo">
    	<a href="<?php print $front_page;?>">
      		<img src="<?php print $base_path?>/<?php print $directory;?>/images/logo.png" alt="<?php print $site_name;?>"/>
    	</a>
	</div>

 	<div class="main-menu">
		<?php print render($page['topblock']); ?>
    	<?php if ($main_menu): ?>
        	<?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu'))); ?>
    	<?php endif; ?>
	</div>
  </div>
  
  <div id="header">
  	<?php print render($page['header']); ?>
  </div>

<div id="wrapper-front">  
  <div id="content-front">

    <?php print render($messages); ?>
    <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
    <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>

    <?php print render($page['content']); ?>
  </div>

</div>

  <div id="footer">
    <?php if ($page['footer']): ?>    
      <?php print render($page['footer']); ?>
    <?php endif; ?>  
  </div>
</div>