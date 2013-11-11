<?php echo $pager_links; ?>
<?php foreach ($messages as $message) : ?>

	<p class="message">
		<?php echo $message->content; ?>
		<br />
		<span class="published">
			<?php echo Date::fuzzy_span($message->date_published)?>
		</span>
		<?php if (time() - $message->date_published >0) : ?>
			<div class="options">
				<a href="<?php echo url::site("messages/edit/{$message->user_id}/{$message->id}") ?>">Edit Message</a> | 
				<a href="<?php echo url::site("messages/delete/{$message->user_id}/{$message->id}") ?>">Delete Message</a>
			</div>
		<?php endif; ?>
	</p>
	
	<hr />
	
<?php endforeach; ?>
<?php echo $pager_links; ?>

