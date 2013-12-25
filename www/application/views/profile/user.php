<script>
    $('#myModal').modal(options);
    </script>

<p>Это страничка пользователя <?=$user->username;?></p>

<p>
   <a href="#myModal" role="button" class="btn" data-toggle="modal">Отправить пользователю сообщение</a>    
   <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

</div>
<div class="modal-body">
    <div class="ms_block">
    <?=Form::open()?>
    <p>Заголовок</p>
    <p><?=Form::input('title','...',array('id' => 'title','placeholder' => '...'))?></p>
<p>Текст сообщения</p>
    <p><?=Form::textarea('content','',array('id'=> 'content','rows' => '4', 'cols' => '100'))?></p>
    <p><?=Form::hidden('user_id',$user->id)?></p>
    </div>
     <?=Form::close()?>
    <div class="alert" style="display: none;">Сообщение Отправлено!</div>
   
   
</div>
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
<button id="send" rel="<?=$user->id;?>" class="btn btn-primary">Отправить сообщение</button>
</div>
</div>
</p>