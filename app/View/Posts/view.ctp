<!-- File: /app/View/Posts/view.ctp -->

<h1><?php echo h($post['Post']['title'])?></h1>
<p><small>Name: <?php echo $this->Html->link($post['User']['username'], array('controller' => 'users','action' => 'view', $post['User']['id']));?></small>
<?php 
if (!$Relationship->isFollower($user_id, $post['Post']['user_id']) && $user_id != $post['Post']['user_id']):?>
    <?php echo $this->Html->link('Follow', array('controller' => 'Relationships', 'action' => 'follow', $post['User']['id']), array('class' => 'btn btn-primary', 'data-remote' => 'true'));?>
<?php elseif ($Relationship->isFollower($user_id, $post['Post']['user_id'])):?>
    <?php echo $this->Html->link('UnFollow', array('controller' => 'Relationships', 'action' => 'unFollow', $user_id, $post['Post']['user_id']), array('class' => 'btn btn-primary', 'data-remote' => 'true'));?>
<?php endif;?>
</p>
<p>
<?php echo $this->Facebook->like(); ?>
</p>
<p><small>Created: <?php echo $post['Post']['created']?></small></p>

<p><?php echo $this->Youtube->video($post['Post']['body'])?></p>
<ul class="pager">
    <?php if ($neighbors['prev']) :?>
        <li class="previous"><?php echo $this->Html->link(' Older', array('action' => 'view', $neighbors['prev']['Post']['id']));?></li>
    <?php endif;?>
    <?php if ($neighbors['next']['Post']['body']) :?>
        <li class="next"><?php echo $this->Html->link(' Next', array('action' => 'view', ($neighbors['next']['Post']['id'])));?></li>
    <?php else:?>
    <li class="next"><?php echo $this->Html->link(' Next', array('action' => 'view', 1));?></li>
    <?php endif;?>
</ul>
<table>
    <tr colspan="3" width="300">
    <?php foreach ($followingPosts as $followingPost) :?>
        <td class="show_image">
            <?php echo $this->Youtube->thumbnail($followingPost['Post']['body'], 'thumb3', array('url' => array('action' => 'view', $followingPost['Post']['id']), 'class' => 'show_image')); ?>
        </td>
    <?php endforeach;?>
    </tr>
</table>
<?php echo $this->element('comment\newcomment', array("post_id" => $post['Post']['id']));?>
<?php echo $this->Facebook->comments(); ?>
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