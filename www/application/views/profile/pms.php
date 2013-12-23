<?if(count($private_messages) > 1):?>
<table width="100%" class="table">
 <tr>
    <td>Заголовок</td>
    <td>От кого</td>
    <td>Текст сообщения</td>
    <td>Дата</td>
</tr>
<?php foreach($private_messages as $private_message):?>
<tr <?if($private_message['read'] == 0):?>class="alert"<?endif;?>>
    <td><a href="/profile/pm/<?=$private_message['id']?>"><?=$private_message['title']?></a></td>
    <td><a href="/profile/user:<?=$private_message['sender_id']?>"><?=$private_message['username']?></a></td>
    <td><?=$private_message['content']?></td>
    <td><?=$private_message['date']?></td>
</tr>
<?  endforeach;?>

</table>

<?else:?>

<span>Нет сообщений!</span>
<? endif; ?>
