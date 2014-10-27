<!-- File: /app/View/Posts/view.ctp -->

<h1><?php echo h($post['Post']['title'])?></h1>
<p><small>Name: <?php echo $post['User']['username']?></small>
<?php 
if (!$Relationship->isFollower($user_id, $post['Post']['user_id']) && $user_id != $post['Post']['user_id']):?>
    <?php echo $this->Html->link('Follow', array('controller' => 'Relationships', 'action' => 'follow', $post['User']['id']), array('class' => 'btn btn-primary', 'data-remote' => 'true'));?>
<?php elseif ($Relationship->isFollower($user_id, $post['Post']['user_id'])):?>
    <?php echo $this->Html->link('UnFollow', array('controller' => 'Relationships', 'action' => 'unFollow', $user_id, $post['Post']['user_id']), array('class' => 'btn btn-primary', 'data-remote' => 'true'));?>
<?php endif;?>
</p>
<p><small>Created: <?php echo $post['Post']['created']?></small></p>

<p><?php echo $this->Youtube->video($post['Post']['body'])?></p>
<ul class="pager">
  <li class="previous"><?php echo $this->Html->link(' Older', array('action' => 'view', $post['Post']['id']  - 1));?></li>
  <li class="next"><?php echo $this->Html->link(' Next', array('action' => 'view', $post['Post']['id']  + 1));?></li>
</ul>
<?php echo $this->element('comment\newcomment', array("post_id" => $post['Post']['id']));?>
<div class="pagination">
    <ul>
        <?php 
            echo $this->Paginator->prev( '<<', array( 'class' => '', 'tag' => 'li' ), null, array( 'class' => 'disabled myclass', 'tag' => 'li' ) );
            echo $this->Paginator->numbers( array( 'tag' => 'li', 'separator' => '', 'currentClass' => 'disabled myclass' ) );
            echo $this->Paginator->next( '>>', array( 'class' => '', 'tag' => 'li' ), null, array( 'class' => 'disabled myclass', 'tag' => 'li' ) );
        ?>
    </ul>
</div>
<?php foreach ($comments as $comment): ?>
    <br/>
<div class="input-group">
  <span class="label label-success"><?php echo $comment['User']['username']?></span>
  Commented: <?php echo $comment['Comment']['created']?>
  <p class="content"> <?php echo $comment['Comment']['body']?></p>
</div>
<?php endforeach;?>
<div class="pagination">
    <ul>
        <?php 
            echo $this->Paginator->prev( '<<', array( 'class' => '', 'tag' => 'li' ), null, array( 'class' => 'disabled myclass', 'tag' => 'li' ) );
            echo $this->Paginator->numbers( array( 'tag' => 'li', 'separator' => '', 'currentClass' => 'disabled myclass' ) );
            echo $this->Paginator->next( '>>', array( 'class' => '', 'tag' => 'li' ), null, array( 'class' => 'disabled myclass', 'tag' => 'li' ) );
        ?>
    </ul>
</div>