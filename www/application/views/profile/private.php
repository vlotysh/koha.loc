<h2>Private Profile for <b><?php echo $user->username; ?></b></h2>
<p><?php echo HTML::anchor('messages/add', 'Create New Message'); ?></p>
<h3><?php echo __('Our Recent Messages');?>:</h3>
<?php echo $pager_links; ?>
<?php if (count($messages)) : ?>
	<?php foreach($messages as $message) : ?>
		<p class="message">
			<?php echo $message->content; ?>
			<br />
			<span class="published"><?php echo Date::fuzzy_span($message->date_published)?></span>
			<?php //if (time() - $message->date_published < 900) : ?>
				<div class="options">
                                    <a target="_blank" href="<?php echo url::site("view/{$message->id}") ?>">View</a> | 
					<a href="<?php echo url::site("messages/edit/{$message->user_id}/{$message->id}") ?>">Edit Message</a> | 
					<a href="<?php echo url::site("messages/delete/{$message->user_id}/{$message->id}") ?>">Delete Message</a>
				</div>
			<?php //endif; ?>
		</p>
		<hr />
	<?php endforeach; ?>
<?php else: ?>
	<p><?php echo __('No Recent Messages');?>.</p>
<?php endif; ?>


<?php echo $pager_links; ?>