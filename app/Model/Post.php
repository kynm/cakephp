<?php
class Post extends AppModel {

	public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
		'body' => array(
			'notempty' => array(
		        'rule' => array('notempty'),
		        'message' => 'body is required'
      		),
		    'is_youtube_link' => array(
		        'rule' => 'is_youtube_link',
		       	'message' => 'body is youtube link',
		    ),
		),
    );

  	public function is_youtube_link($check) {

		if(stripos($check['body'],'youtube.com')===false){
		    return false;
		} else {
			return true;    
		}
  	}

}
?>