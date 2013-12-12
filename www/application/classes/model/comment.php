<?php

defined('SYSPATH') or die('No direct script access.');

/**
 *commetn Model
 * Handles CRUD for user messages
 */
class Model_comment extends Kohana_ORM {
    
    
    protected $_belongs_to = array(
      'message'  => array(
               'model'       => 'message',
               'foreign_key' => 'id',
          )
    );

}