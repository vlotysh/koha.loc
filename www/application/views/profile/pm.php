<!-- Вывод одного сообщения -->

<?  foreach ($pm_text as $text):?>
<div class="span3"><?=$text['title'];?> , От пользователя <?=$text['username']?></div>
<?  endforeach;?>