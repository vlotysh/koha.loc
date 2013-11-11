<h1><?php echo __('Recent Messages on Site')?></h1>

<?php foreach ($messages as $message) : ?>

	<p class="message">
		<?php echo $message->content; ?>
		<br />
		<span class="published">
			<?php echo Date::fuzzy_span($message->date_published)?>
		</span>
        <p><a class="btn primary large" href="<?= url::site()."view/".$message->id; ?>"><?=__('read_next')?></a></p>
                 
	</p>

	<hr />

<?php endforeach; ?>
 
<?php echo $pager_links; ?>
