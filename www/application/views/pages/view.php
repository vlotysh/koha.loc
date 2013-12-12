
<?  print_r($messages_content)?>
<p><?=$messages_content['content']?></p>
<p>Автор <?=$author?></p>
<?if(count($messages_comments) > 0):?>


<? foreach ($messages_comments as $messages_comment) : ?>

<p><?=$messages_comment['content']?></p>
<? if($messages_content['user_id'] == $messages_comment['user_id']):?>

<p>Автор статьи</p>
<?else:?>
<p>Автор <?=$messages_comment['username']?></p>
<?  endif;?>

<? endforeach; ?>



<?=$pager_links; ?>




<? else:?>

<p>Нет комментариев</p>
<? endif; ?>
<?=$new_comments?>