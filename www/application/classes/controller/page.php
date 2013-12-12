<?php

defined('SYSPATH') or die('No direct script access.'); //защита от прямого вызова 

class Controller_Page extends Controller_Application {

    private function templ() {
        $page = ORM::factory('page'); //Получаем () ORM модель
        $action_name = $this->request->action(); //название текущего действия (совпадает с названием страницы)
        $lang = I18n::lang(); //текущий язык
        $page->page_select($action_name, $lang); //получаем страницу из базы
        //print_r($page);exit;
        //Получаем элементы страницы
        $content = $page->content;
        $this->template->content = $content;
        $this->template->description = $page->description;
        $this->template->title = $page->title;
        $this->template->page_name = $page->page_name;
    }

    public function action_view() {

        $id = $this->request->param('id');

        $content = View::factory('pages/view')
                ->bind('messages_content', $messages_content)
                ->bind('author', $user)
                ->bind('messages_comments', $messages_comments)
                ->bind('pager_links', $pager_links)
                ->bind('new_comments', $new_comments);
                
             

                        
        
        $lang = I18n::lang(); //текущий язык
        
        $message = ORM::factory('message',$id);
        
            
        $total_items = $message->comments->count_all(); 
        $user = $message->user->username;
       
 
             $pagination = Pagination::factory(array(
                        'current_page'      => array('source' => 'route', 'key' => 'page'),
			'total_items'    =>  $total_items,
			'items_per_page' => 1,
		));
          
             
        $pager_links =  $pagination->render();
        $messages_content = $message->get_article($id);
        $new_comments = View::factory('pages/comment')->bind('error', $error);
        
        $messages_comments = $message->get_comments($pagination->items_per_page, $pagination->offset, $id);
        
     //   $messages_comments = $message->comments->find_all();


        $this->template->content = $content;

        if ($_POST) {
        $date = Arr::extract($_POST, array('content'));
       $post = Validation::factory($date)
			->rule('content', 'not_empty')
			->rule('content', 'min_length', array(':value', 3));

       if($post->check()) {
           $comment = ORM::factory('comment');
           $comment->post_id = $id;
           $comment->content = $date['content'];
           $comment->user_id = Auth::instance()->get_user()->id;
           $comment->date = date("Y-m-d");
           $comment->save();
           
           $redirect = "/view/" . $id;
           Request::factory()->redirect($redirect);
       } else {
            $redirect = "/view/" . $id;
          //  Request::factory()->redirect($redirect);
            $error = 'NO Ok';
            
       }
       
           
        }
    }

    public function action_about() {
        $this->templ();
        $this->template->about_class_link_menu = 'active'; //свойство текущего активного пункта меню
    }

    public function action_why_site() {
        $this->templ();
        $this->template->why_class_link_menu = 'active';
    }

    public function action_contact() {
        $this->templ();
        $this->template->contact_class_link_menu = 'active';
    }

    public function action_edit() {

        if (!Auth::instance()->logged_in('admin')) {
            $this->request->redirect('noaccess');
        }


        $page_name = $this->request->param('id');
        //print_r ($page_name); exit();
        $this->template->page_name = $page_name;
        
        echo  $page_name;
       // $pageone = ORM::factory('page')->where('title', '=', 'about')->and_where('language', '=', I18n::lang());
      $page = ORM::factory('page');
        $lang = I18n::lang(); //текущий язык
       $pageone = $page->page_select($page_name, $lang);
        echo '(---)'. $page_name;
        //print_r ($pages['0']->title); exit();
     $this->template->title = $pageone->title;
        $this->template->content = View::factory('pages/pages_form')
                ->set('page', $pageone);

        if ($_POST) {
            $page = ORM::factory('page', $_POST['id']);
            $page->title = $_POST['title'];
            $page->description = $_POST['description'];
            $page->content = $_POST['content'];
            $page->date_change = time();
            $page->update();
            $redirect = "page/" . $page_name;
            Request::factory()->redirect($redirect);
        }
    }

}