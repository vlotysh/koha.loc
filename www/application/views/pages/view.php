<p><?=$id?></p>
<?  print_r($messages_content)?>
<p><?=$messages_content['content']?></p>

<?  print_r($messages_comments)?>

<? foreach ($messages_comments as $messages_comment) : ?>

<p><?=$messages_comment['content']?></p>
<p>Автор <?=$messages_comment['username']?></p>
<? endforeach; ?>
