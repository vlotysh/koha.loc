<?php

Class Model_Pm extends ORM {
     protected $_table = 'Pms';
/*public function get_pm($id = '') {
        $query = DB::select('pms.id', 'pms.title', 'pms.sender_id','pms.recipient_id', 'pms.content','pms.date', 'pms.read','users.username')
                ->from('pms')
                ->join('users')
                ->on('pms.sender_id', ' = ', 'users.id')
                ->where('pms.id', '=', $id)
                ->execute();
             

        if ($query)
        return $query;
        else
          return false;
    }*/
    
    public function get_pm($id = '') {
        $query = DB::select('pms.id', 'pms.title', 'pms.sender_id','pms.recipient_id', 'pms.content','pms.date', 'pms.read','users.username')
                ->from('pms')
                ->join('users')
                ->on('pms.sender_id', ' = ', 'users.id')
                ->where('pms.id', '=', $id)
                ->limit(1)
                ->execute();
               
             

        if ($query)
           return $query;
 
    }
    
     public function add_pm($title = '...',$content = 'Сообщение', $sender_id = '', $recipient_id = '') {
         
       $this->title = ($title == '') ? '...' : $title;
       $this->content = $content;
       $this->sender_id = $sender_id;   
       $this->recipient_id = $recipient_id;
       $this->date = time();
       if ($this->save()){ return true;}
      
    }

};
?>
