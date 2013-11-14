<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User_Messages extends Controller_Application {

	public $assert_auth_actions = array(
		'add' => array('login'),
		'edit' => array('login'),
		'delete' => array('login')
	);

	public function action_index()
	{		
		URL::redirect();	
   	}

	public function action_get_messages() 
	{
		$user = Auth::instance()->get_user();
                $user_id=$user->id;
		//$messages = new Model_Message;
                $messages = Model::factory('message');
              //  print_r($messages);exit;
		
		$user_id = $this->request->param('id');
		
		if ($user_id) 
		{
			$message_count = $messages->where('user_id', '=', $user_id)->count_all();	
		}
		else 
		{
			$message_count = $messages->count_all();
		}
		
		$pagination = Pagination::factory(array(
  			'total_items'    => $message_count,
  			'items_per_page' => 3,
  		));
		
		$pager_links = $pagination->render();
		
		$messages = $messages->get_all($pagination->items_per_page, $pagination->offset, $user_id);
                
              //  print_r($messages);exit();
	
		$this->template->content = View::factory('profile/messages')
			->set('messages', $messages)
			->set('pager_links', $pager_links);
	}
	
	public function action_new() 
        {
		$user = Auth::instance()->get_user();
                $user_id=$user->id;
                $messages = Model::factory('message');
		$message_count = $messages->where('date_published', '>', time() - 86400)->count_all();
		$pagination = Pagination::factory(array(
  			'total_items'    => $message_count,
  			'items_per_page' => 5,
  		));
		$pager_links = $pagination->render();
		$messages = $messages->get_new($pagination->items_per_page, $pagination->offset);
                $this->template->content = View::factory('profile/messages')
			->set('messages', $messages)
			->set('pager_links', $pager_links);
	}
	
	public function action_add() 
	{
		$user = Auth::instance()->get_user();
                $message = Model::factory('message');
                
		$user_id = $user->id;
          
		$message->user = $user;
		$this->template->content = View::factory('profile/message_form')
			->bind('errors', $errors);
		
		if ($_POST)
		{
			$_POST['date_published'] = date('Y-m-d');
			$message->values($_POST);
			if ($message->check())
			{
				$message->save();
				$redirect = "profile/private";
				Request::factory()->redirect($redirect);
			}
			else 
			{
				$errors = $message->validate()->errors('messages/add');
			}

		}		
		
	}
	
	public function action_edit() 
	{
		
		$user = Auth::instance()->get_user();
		$user_name=$user->username;
		$message_id = $this->request->param('message_id');
		$messages_ = ORM::factory('message');
		$user_id=$user->id;
               $message = $messages_->where('id', '=', $message_id)->find()->as_array();
               //$this->debug($message);
               if ($message['user_id']!= $user_id) 
               {
			throw new Exception("User is not owner of the message");
	       }
		
		$this->template->content = View::factory('profile/message_form')
                               ->set('value', $message['content']);
		
		if ($_POST)
		{
                    
                        $messages_->content = $_POST['content'];
                        $messages_->where('id', '=', $message_id);
                        $messages_->save();
                                                             
			$redirect = "profile/private";
			Request::factory()->redirect($redirect);
		}		
		
	}
	
	public function action_delete() 
	{
		$user = Auth::instance()->get_user();
		$message_id = $this->request->param('message_id');
		$messages = Model::factory('message');
                $user_id=$user->id;
                $message = $messages->where('id', '=', $message_id)->find($message_id)->as_array();
		
		if ($message['user_id'] != $user_id) 
                {
			throw new Exception("User is not owner of the message");
		}

		$messages->delete('id', $message_id);
		$redirect = "profile/private";
		Request::factory()->redirect($redirect);
		
	}
	
}