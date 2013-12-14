
<?  print_r($messages_content)?>
<p><?=$messages_content['content']?></p>
<p>Автор <?=$author?></p>
<?if(count($messages_comments) > 0):?>


<? foreach ($messages_comments as $messages_comment) : ?>


    <blockquote>



<p><?=$messages_comment['content']?></p>
<? if($messages_content['user_id'] == $messages_comment['user_id']):?>

<p><small>Автор статьи</small></p></p>
<?else:?>
    <p><small>Автор <?=$messages_comment['username']?></small></p>
<?  endif;?>

    </blockquote>

<? endforeach; ?>



<?=$pager_links; ?>




<? else:?>

    <blockquote>Нет комментариев</blockquote>

<? endif; ?>
<?=$new_comments?>