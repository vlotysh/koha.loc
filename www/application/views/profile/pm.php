<!-- Вывод одного сообщения -->

<?  foreach ($pm_text as $text):?>
<div class="row">
    <div class="col-sm-5 col-md-6">Загловок <?=$text['title'];?></div>
</div>
<div class="row">
<div class="col-sm-5 col-md-6"><?=$text['content'];?></div>
</div>
<div class="row">
<div class="bar">От пользователя <?=$text['username']?></div>
</div>
<Div class="row">
     <div class="ms_block">
 <p>   Ответить пользователю</p>
<?=Form::open()?>
    <p>Заголовок</p>
    <p><?=Form::input('title','...',array('id' => 'title','placeholder' => '...'))?></p>
<p>Текст сообщения</p>
    <p><?=Form::textarea('content','',array('id'=> 'content','rows' => '4', 'cols' => '100'))?></p>
    <p><?=Form::hidden('user_id',$text['sender_id'])?></p>
   <?=Form::close()?>
    
     </div>
    
    <div class="progress progress-striped active" style="display: none;">
  <div class="bar" style="width: 100%;"></div>
</div>
  <div class="alert alert-success" style="display: none;">Отправлено!</div>
    

    <button id="send" class="btn btn-primary">Отправить сообщение</button>
 
</div>
    <?  endforeach;?>