<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Default auth user
 *
 * @package    Kohana/Auth
 * @author     Kohana Team
 * @copyright  (c) 2007-2011 Kohana Team
 * @license    http://kohanaframework.org/license
 */
class Model_Page extends ORM {
 
    
    /**
	 * Page select
	 * 
	 * @param  string       action_name
	 * @param  string	lang
	 * @return self
	 */
	public function page_select($action_name, $lang) 
	{
		
             $this->where('page_name', '=', $action_name)->and_where('language', '=', $lang);
     
             return $this->find();
	}
        
        public function get_pages_by_name($page_name,$limit = 10, $offset = 0)
	{
		$this->order_by('id', 'ASC')
			->limit($limit)
			->offset($offset);
								
			$this->where('page_name', '=', $page_name);
		
		return $this->find_all();
	}
        
        public function edit($id,$page_name,$lang,$title,$description,$content) 
	{
		 $this->id = $id;
                 $this->language = $lang;
                 $this->page_name = $page_name;
                 $this->title = $title;
                 $this->description = $description;
		 $this->content = $content;
                 $this->date_change = time();
		 $this->save();

	}
    
}// End Model_Page
