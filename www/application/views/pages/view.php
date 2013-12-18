
<? if (Auth::instance()->logged_in() && Auth::instance()->get_user()->id == $message['user_id']): ?>
  
    <p><a href="<?php echo url::site("messages/edit/{$message['user_id']}/{$message['id']}") ?>">Edit Message</a></p>
<? endif; ?>
<? print_r($message) ?>
<p><?= $message['content'] ?></p>
<p>Автор <a href="/profile/user:<?=$message['user_id']?>"><?= $author?></a>. Дата публикации <?= date("j.n.Y G:i:s", $message['date_published']) ?></p>

<? if (count($messages_comments) > 0): ?>


    <? foreach ($messages_comments as $messages_comment) : ?>


        <blockquote>



            <p><?= $messages_comment['content'] ?></p>
            <? if ($message['user_id'] == $messages_comment['user_id']): ?>

                <p><small>Автор статьи</small></p></p>
        <? else: ?>
            <p><small>Автор <a href="/profile/user:<?=$messages_comment['user_id']?>"><?= $messages_comment['username'] ?></a></small></p>
        <? endif; ?>

        </blockquote>

    <? endforeach; ?>



    <?= $pager_links; ?>




<? else: ?>

    <blockquote>Нет комментариев</blockquote>

<? endif; ?>
<?=
$new_comments?>