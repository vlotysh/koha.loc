<!-- Вывод одного сообщения -->

<?  foreach ($pm_text as $text):?>
<div class="span3"><?=$text['title'];?></div><br>
                                               
<div class="span6 well"><?=$text['content'];?></div>
<div class="span3">От пользователя <?=$text['username']?></div>
<?  endforeach;?>