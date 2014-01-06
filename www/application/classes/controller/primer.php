<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Primer extends Controller_Template {
    protected $user;
    public $template = 'template';
    
         /**
	 * The before() method is called before your controller action.
	 * In our template controller we override this method so that we can
	 * set up default values. These variables are then available to our
	 * controllers if they need to be modified.
	 */
	public function before()
	{
            
		parent::before();
                 $this->auth = Auth::instance();
		$this->user = $this->auth->get_user();
                
                if ($this->auto_render)
		{
			// keep the last url if it's not home/language
			if(Request::current()->action() != 'language') 
                        {
				Session::instance()->set('controller', Request::current()->uri());
			}
			
			if (Auth::instance()->logged_in('participant'))
			{
				$this->template->loged = TRUE;
			}
                        
                        if (Auth::instance()->logged_in('admin'))
			{
				$this->template->loged = TRUE;
			}
			
		}
                
			View::set_global('site_name', __('Site Beta'));
		//Модели 
                        $this->massege_model = ORM::factory('message');
                        $this->pm = ORM::factory('pm');
                        
                        
		$this->template->content = '';
                $this->template->description = '';
                $this->template->title = '';
                $this->template->about_class_link_menu = '';
                $this->template->why_class_link_menu = '';
                $this->template->message_class_link_menu = '';
                $this->template->welcom_class_link_menu = '';
                $this->template->contact_class_link_menu = '';
                $this->template->profile_class_link_menu = '';
                $this->template->admin_class_link_menu = '';
                $this->template->author = 'I am';
                $this->template->langg ='';
                $this->template->lang_class_link_menu = '';
                $this->template->page_name=NULL;
		$this->template->msCount = 0;
                
			$this->template->styles = array(
			'bootstrap.min',
                        'bootstrap-responsive.min',
                        'style'
                        
		);
		
               
                
		$this->template->scripts = array(
                        'jquery',
                        'bootstrap.min',
                        'jquery.alphanumeric.min',
                        'jquery.password.sm.min',
                        'main',
                        'prefixfree.min',
                                       
                        //'less-1.2.1.min'
                        
                );
        }
                 
		
        
	/**
	 * The after() method is called after your controller action.
	 * In our template controller we override this method so that we can
	 * make any last minute modifications to the template before anything
	 * is rendered.
	 */
	public function after()
	{
          
		parent::after();
	}
		
}