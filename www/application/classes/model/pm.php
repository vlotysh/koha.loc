<?php

Class Model_Pm extends ORM {
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
                ->as_object()
                ->execute();
               
             

        if ($query)
           return $query;
 
    }

};
?>
