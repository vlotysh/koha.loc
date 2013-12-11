<?php defined('SYSPATH') or die('No direct script access.');?>
<?if(Auth::instance()->logged_in()):?>
    <?php echo Form::open(); ?>
<div >
                  
               <p><?php echo __('New_comments'); ?> </p>
		
		<?php echo Form::textarea('content',array('rows' => 5, 'cols' => 30,'style'=>'width:800px;')); ?>
              
        
        </div>
	<?php $id = isset($page->id) ? $page->id : ''; ?>
        <?php echo Form::textarea('id', $id,array('rows' => 1, 'cols' => 1,'style'=>'resize:none;width:0px;visibility: hidden;')); ?>

<div class="field">
		<?php echo Form::submit('comment', "OK"); ?>
	</div>
<?php echo Form::close(); ?>


 <?  endif;?>