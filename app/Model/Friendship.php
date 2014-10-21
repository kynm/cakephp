<?php
class Friendship extends AppModel {
/* Other code if you have it */
    public $belongsTo = array(
      'UserFrom'=>array(
         'className'=>'User',
         'foreignKey'=>'user_from'
      ),
      'UserTo'=>array(
         'className'=>'User',
         'foreignKey'=>'user_to'
      )
   );
/* Again, other code */
}