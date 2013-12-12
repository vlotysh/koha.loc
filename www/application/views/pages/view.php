
<?  print_r($messages_content)?>
<p><?=$messages_content['content']?></p>

<?//if(!empty($new_comments)):?>
<? print_r($messages_comments);?>

<? foreach ($messages_comments as $messages_comment) : ?>

<p><?=$messages_comment['content']?></p>
<p>Автор <?=$messages_comment['username']?></p>
<? endforeach; ?>



<?=$pager_links; ?>
<?//  endif;?>