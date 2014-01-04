<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Application extends Controller_Primer {
   
    
         /**
	 * The before() method is called before your controller action.
	 * In our template controller we override this method so that we can
	 * set up default values. These variables are then available to our
	 * controllers if they need to be modified.
	 */
	public function before()
	{
            
		parent::before();
            
                 if (!$this->auth->logged_in()) {
                     
                     $this->request->redirect('login');
                 }
		//Объясление моделей
                
                
	}
        public function debug($object, $die = 1) {
            echo "<pre>";
            print_r ($object);
            echo "<pre>";
            if($die == 1) {
            exit();
            }
        }
        
        
	/**
	 * The after() method is called after your controller action.
	 * In our template controller we override this method so that we can
	 * make any last minute modifications to the template before anything
	 * is rendered.
	 */
	public function after()
	{
            if(Auth::instance()->logged_in()) {
             $ms = ORM::factory('pm')->where('read', '=', 0)->and_where('recipient_id', '=', Auth::instance()->get_user()->id)->count_all();
            //$this->debug($ms);
            $this->template->msCount = $ms;
            }
            if ($this->auto_render)
		{
			//$this->template->styles = array_merge( $this->template->styles, $styles );
			//$this->template->scripts = array_merge( $this->template->scripts, $scripts );
		}
                
                
		parent::after();
	}
		
}