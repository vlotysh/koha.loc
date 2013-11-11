<?php defined('SYSPATH') or die('No direct script access.');?>
<?php echo Form::open(); ?>
<div >
    <b><?php echo $page->language; ?> - Title</b></br>
		<?php $title = isset($page->title) ? $page->title : ''; ?>
		<?php echo Form::textarea('title', $title,array('rows' => 1, 'cols' => 30,'style'=>'resize:none;width:500px;')); ?>
                <br/>
                <b><?php echo $page->language; ?> - Descr</b></br>
		<?php $description = isset($page->description) ? $page->description : ''; ?>
		<?php echo Form::textarea('description', $description,array('rows' => 1, 'cols' => 30,'style'=>'resize:none;width:500px;')); ?>
                <br/>
                
                <b><?php echo $page->language; ?> - Content</b></br>
		<?php $content = isset($page->content) ? $page->content : ''; ?>
		<?php echo Form::textarea('content', $content,array('rows' => 5, 'cols' => 30,'style'=>'width:800px;')); ?>
	
        
        </div>
	<?php $id = isset($page->id) ? $page->id : ''; ?>
        <?php echo Form::textarea('id', $id,array('rows' => 1, 'cols' => 1,'style'=>'resize:none;width:0px;visibility: hidden;')); ?>

<div class="field">
		<?php echo Form::submit('pages_form', "OK"); ?>
	</div>
<?php echo Form::close(); ?>


