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
        
       $private_messages =  $this->massege_model->get_pms(15, 0, $user->id);


/*
        $pms = View::factory('profile/pms')
                ->bind('private_messages', $private_messages);


        $pagination = Pagination::factory(array(
                    'total_items' => $user->messages->where('user_id', '=', $user->id)->count_all(),
                    'items_per_page' => 3,
        ));

        $pager_links = $pagination->render();
        $messages = $user->messages->limit($pagination->items_per_page)->offset($pagination->offset)->where('user_id', '=', $user->id)->find_all();
        */
         $pms = View::factory('profile/pms')
                ->bind('private_messages', $private_messages);
         
        $this->template->content = $pms;
    }
    
    
     public function action_view() {
             $pm_id = $this->request->param('id');
          
       
        // $pm_text = Request::factory('messages/get_pm/'.$pm_id)->execute();

        $content = View::factory('profile/pm')->bind('pm_text', $pm_text);

        $id = $this->request->param('id');
        $pm = ORM::factory('pm', $pm_id);

        $pm->where('id', '=', $pm_id)->set('read', 1)->save();

        $pm_text = $pm->get_pm($pm_id);
        $this->template->title = 'Сообщения!';
        $this->template->content = $content;
     }
    
}