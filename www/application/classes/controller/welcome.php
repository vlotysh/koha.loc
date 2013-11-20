<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Application  {

	public function action_index()
	{		
		$content = View::factory('welcome')
			->bind('messages', $messages)
			->bind('pager_links', $pager_links);
			
		$message = Model::factory('message');
                
		$message_count = $message->count_all();
	
		$pagination = Pagination::factory(array(
                   'current_page'      => array('source' => 'query_string', 'key' => 'page'),
			'total_items'    => $message_count,
			'items_per_page' => 5,
		));
		
	       $pager_links = $pagination->render();
               
               $messages = $message->get_all($pagination->items_per_page, $pagination->offset);
               $this->template->content = $content;
              
               $this->template->title = __('Main');
               $this->template->welcom_class_link_menu = 'active';
	}
  
        public function action_language()
	{
		// requested language
		$lang = $this->request->param('lg');
                
               if( ! isset($lang) OR empty($lang)) 
               {
			$this->request->redirect('welcome');
	       }
		
		if( ! in_array($lang, Kohana::$config->load('ko32example.language'))) 
                {
			$lang = 'ru';
		}
		
                $this->template->langg =$lang;
                $this->template->lang_class_link_menu = 'active';
		Cookie::set('lang', $lang);
		I18n::lang($lang);
                $this->request->redirect(Session::instance()->get('controller'));
                
	}

} // End Welcome