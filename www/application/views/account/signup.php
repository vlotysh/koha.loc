<h1><?php echo __('Create an account'); ?></h1>

<?php if ($errors) { ?>
	<p class="message">Some errors were encountered, please check the details you entered.</p>
	<p>
	<ul class="errors">
	<?php foreach ($errors as $message): ?>
		<li><?php echo $message ?></li>
	<?php endforeach ?>
	</ul>
	</p>
<?php } ?>

<?php echo Form::open(NULL, array('id' => 'create', 'autocomplete' => 'off')); ?>
<fieldset>
	<dl>
		<dt>
			
		<?php echo Form::label('email', 'Email') ?></dt>
		<dd>
			
		<?php echo Form::input('email', $post['email'], array('id' => 'focus')) ?></dd>
		<dt>
			
		<?php echo Form::label('username', 'Username') ?></dt>
		<dd>
			
		<?php echo Form::input('username', $post['username'], array('id' => 'username', 'MAXLENGTH' => 12)) ?></dd>
		<b><div id="status" style="float:left;margin-top:-30px;margin-left: 235px;"></div></b>
		<dt>
			
		<?php echo Form::label('password', 'Password') ?></dt>
		<dd>
			
		<?php echo Form::password('password', $post['password'], array('id' => 'password')) ?></dd>
	</dl>
	<input type="submit" name="Create">
</fieldset>

<?php echo Form::close(); ?>