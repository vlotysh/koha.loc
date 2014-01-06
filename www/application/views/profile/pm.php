<!-- Вывод одного сообщения -->

<?  foreach ($pm_text as $text):?>

    <div>Заголовок <?=$text['title'];?></div>


    <div><?=$text['content'];?></div>


    <div class="bar">От <?if(Auth::instance()->get_user()->id == $text['sender_id']):?>Вас<?else:?>пользователя <a href="<?=  URL::base()?>profile/user:<?=$text['sender_id'];?>"><?=$text['username']?></a><?  endif;?></div>
<div>Было отправлено в <?=date("j. n. Y G:i:s", $text['date'])?></div>


<?if(Auth::instance()->get_user()->id != $text['sender_id']):?>

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
<?  endif;?>
    <?  endforeach;?>