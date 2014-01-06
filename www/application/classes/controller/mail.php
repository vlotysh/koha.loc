<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Mail extends Controller_Application {
    //Все модели объявлены в род. класе primer
    
    public function before() {
        parent::before();
        
        $this->template->message_class_link_menu = 'active';
    }

        public function action_index() {
            
            
            
         $this->template->title = "Сообщения";
        $this->template->description = 'Private Profile';
     
        
        
       
       $user = Auth::instance()->get_user();

        if (!$user)
            $this->request->redirect('noaccess');
        
       


        $pm_model = ORM::factory('pm')->where('recipient_id', '=', $user->id)->count_all();
       
        $pagination = Pagination::factory(array(
                    'total_items' => $pm_model,
                    'items_per_page' => 10,
        ));

        $pager_links = $pagination->render();
        
        $outbox = '';
        $inbox = 'active';
        
        $private_messages =  $this->massege_model->get_pms($pagination->items_per_page, $pagination->offset, $user->id);
        /*
        $messages = $user->messages->limit($pagination->items_per_page)->offset($pagination->offset)->where('user_id', '=', $user->id)->find_all();
        */
         $pms = View::factory('profile/pms')
                ->bind('private_messages', $private_messages)
                ->bind('pager_links', $pager_links)
                ->bind('inbox',$inbox)
                ->bind('outbox',$outbox);;
         
        $this->template->content = $pms;
    }
    
    public function action_outbox() {
            
            
            
         $this->template->title = "Исходящие";
        $this->template->description = 'Private Profile';
     
        
        
       
       $user = Auth::instance()->get_user();

        if (!$user)
            $this->request->redirect('noaccess');
        
       


        $pm_model = ORM::factory('pm')->where('sender_id', '=', $user->id)->count_all();
       
        $pagination = Pagination::factory(array(
                    'total_items' => $pm_model,
                    'items_per_page' => 10,
        ));

        $pager_links = $pagination->render();
        
        $inbox = '';
        $outbox = 'active';
        
        $private_messages =  $this->massege_model->get_outbox_pms($pagination->items_per_page, $pagination->offset, $user->id);
        /*
        $messages = $user->messages->limit($pagination->items_per_page)->offset($pagination->offset)->where('user_id', '=', $user->id)->find_all();
        */
         $pms = View::factory('profile/pms')
                ->bind('private_messages', $private_messages)
                ->bind('pager_links', $pager_links)
                ->bind('inbox',$inbox)
                ->bind('outbox',$outbox);
         
        $this->template->content = $pms;
    }
    
    
     public function action_view() {
             $pm_id = $this->request->param('id');
          
       
        // $pm_text = Request::factory('messages/get_pm/'.$pm_id)->execute();

        $content = View::factory('profile/pm')
                ->bind('pm_text', $pm_text);

        $id = $this->request->param('id');
        $pm = ORM::factory('pm', $pm_id);

        $pm->where('id', '=', $pm_id)->set('read', 1)->save();

        $pm_text = $pm->get_pm($pm_id);
        $this->template->title = 'Сообщение!';
        $this->template->content = $content;
     }
    
}