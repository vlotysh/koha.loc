<?php

defined('SYSPATH') or die('No direct script access.');

/**
 *commetn Model
 * Handles CRUD for user messages
 */
class Model_Info extends Kohana_ORM {
    protected $_table_name = 'user_info';
    protected $_primary_key = 'id';

    
    protected $_belongs_to = array(
      'user'  => array(
               'model'       => 'user',
               'foreign_key' => 'id',
          )
    );

}