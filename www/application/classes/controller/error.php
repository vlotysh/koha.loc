<?php defined('SYSPATH') or die('No direct script access.'); 

class Controller_Error extends Controller_Template {
     
    public function before()
    {
        parent::before();
        // Internal request only!
        if (Request::$initial !== Request::$current) 
        {
            if ($message = rawurldecode($this->request->param('message'))) 
            {
                $this->template->message = $message;
            }
        } 
        else 
        {
            $this->request->action(404);
        }
        
        $this->response->status((int) $this->request->action());
    }
    
    public function action_404()
    {   
        View::set_global('site_name', 'Site Beta');
        $this->template->title = '404 Not Found';
        $this->template->content = '';
                $this->template->description = '';
                $this->template->about_class_link_menu = '';
                $this->template->why_class_link_menu = '';
                $this->template->welcom_class_link_menu = '';
                $this->template->contact_class_link_menu = '';
                $this->template->profile_class_link_menu = '';
                $this->template->author = 'I am';
                $this->template->langg ='';
                $this->template->lang_class_link_menu = '';
                
                $this->template->styles = array(
			'bootstrap.min',
                        'bootstrap-responsive.min'
                        
		);
		
		$this->template->scripts = array(
                        'jquery',
                        'bootstrap.min',
                        'jquery.alphanumeric.min',
                        'jquery.password.sm.min',
                        'main'
                        //'less-1.2.1.min'
                );
                
        $this->template->content = View::factory('error/404' );
    }
    
    public function action_500()
    {   
        View::set_global('site_name', 'Site Beta');
        //$this->template->title = '404 Not Found';
        $this->template->content = '';
                $this->template->description = '';
                $this->template->about_class_link_menu = '';
                $this->template->why_class_link_menu = '';
                $this->template->welcom_class_link_menu = '';
                $this->template->contact_class_link_menu = '';
                $this->template->profile_class_link_menu = '';
                $this->template->author = 'I am';
                $this->template->langg ='';
                $this->template->lang_class_link_menu = '';
                
                $this->template->styles = array(
			'bootstrap.min',
                        'bootstrap-responsive.min'
                        
		);
		
		$this->template->scripts = array(
                        'jquery',
                        'bootstrap.min',
                        'jquery.alphanumeric.min',
                        'jquery.password.sm.min',
                        'main'
                        //'less-1.2.1.min'
                );
                
        $this->template->title = 'Internal Server Error';
        $this->template->content = View::factory('error/500' );
    }
    public function action_503()
    {    
        View::set_global('site_name', 'Site Beta');
        
                $this->template->content = '';
                $this->template->description = '';
                $this->template->about_class_link_menu = '';
                $this->template->why_class_link_menu = '';
                $this->template->welcom_class_link_menu = '';
                $this->template->contact_class_link_menu = '';
                $this->template->profile_class_link_menu = '';
                $this->template->author = 'I am';
                $this->template->langg ='';
                $this->template->lang_class_link_menu = '';
                
                $this->template->styles = array(
			'bootstrap.min',
                        'bootstrap-responsive.min'
                        
		);
		
		$this->template->scripts = array(
                        'jquery',
                        'bootstrap.min',
                        'jquery.alphanumeric.min',
                        'jquery.password.sm.min',
                        'main'
                        //'less-1.2.1.min'
                        
                );
                
        $this->template->title = 'Maintenance Mode';
        $this->template->content = View::factory('error/503' );
    }
}
