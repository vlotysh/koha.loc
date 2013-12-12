<?php defined('SYSPATH') or die('No direct script access.');?>
<?if(Auth::instance()->logged_in()):?>
    <?php echo Form::open(); ?>
<div >
                  
               <p><?php echo __('New_comments'); ?> </p>
		
		<?php echo Form::textarea('content'); ?>
              
        
        </div>
	<?php $id = isset($page->id) ? $page->id : ''; ?>
        <?php echo Form::hidden('id', Auth::instance()->get_user()->id,array('rows' => 1, 'cols' => 1,'style'=>'resize:none;width:0px;visibility: hidden;padding: 0px;')); ?>

<div class="field">
		<?php echo Form::submit('submit', "OK"); ?>
	</div>
<?php echo Form::close(); ?>

<?=$error?>
 <?  endif;?>