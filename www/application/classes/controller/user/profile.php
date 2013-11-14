<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User_Profile extends Controller_Application {

	public $assert_auth_actions = array(
		'private' => array('login'),
                'admin' => array('login')
	);

	public function action_index()
	{		
		$id = $this->request->param('id');
		$user = new Model_User($id);
		
		if (!$user->id) 
		{
		 throw new Exception('Not a valid user');
		}
		
		$content = View::factory('profile/public')
			->set('user', $user)
			->bind('messages', $messages)
			->bind('pager_links', $pager_links);
		
		$pagination = Pagination::factory(array(
  			'total_items'    => $user->messages->count_all(),
  			'items_per_page' => 3,
  		));
		
		$pager_links = $pagination->render();
		$messages = $user->messages->limit($pagination->items_per_page)->offset($pagination->offset)->find_all(); 
	        $this->template->content = $content;
	}
        
        public function action_admin()
	{		
		$this->request->param('id');
                $this->template->description='Admin Profile';
                $this->template->title=__('Admin');
                $this->template->admin_class_link_menu = 'active';
                
                $content = View::factory('profile/admin')
			->bind('user', $user);
		
                $user = Auth::instance()->get_user();
               
                if((!$user)or(!Auth::instance()->logged_in('admin'))) $this->request->redirect('noaccess');
              
	        $this->template->content = $content;	
	}

	public function action_private()
	{		

                $this->template->title = "Профайл";
                $this->template->description='Private Profile';
                $this->template->profile_class_link_menu = 'active';
		
		$content = View::factory('profile/private')
			->bind('user', $user)
			->bind('messages', $messages)
			->bind('pager_links', $pager_links);
		
		$user = Auth::instance()->get_user();
                
                if(!$user) $this->request->redirect('noaccess');
                
                $pagination = Pagination::factory(array(
  			'total_items'    => $user->messages->where('user_id', '=' , $user->id)->count_all(),
  			'items_per_page' => 3,
  		));
		
		$pager_links = $pagination->render();
		$messages = $user->messages->limit($pagination->items_per_page)->offset($pagination->offset)->where('user_id', '=' , $user->id)->find_all(); 
		$this->template->content = $content;
	}
        
        

}