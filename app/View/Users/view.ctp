<h2>name : <?php echo $viewUser['User']['username']?>
	<h2>All  post:</h2>
<table>
    <tr colspan="3" width="300">
    <?php foreach ($viewUser['Posts'] as $post) :?>
        <td class="show_image">
            <?php echo $this->Youtube->thumbnail($post['body'], 'thumb3', array('url' => array('action' => 'view', $post['id']), 'class' => 'show_image')); ?>
        </td>
    <?php endforeach;?>
    </tr>
</table>

<h2>following:</h2>
<ul class="list-group">
	<?php// die(var_dump($viewUser));?>
	<?php foreach ($followingUsers as $following) :?>
		<li class="list-group-item list-group-item-success">
			<?php echo $this->Html->link($following['User']['username'], array('controller' => 'users','action' => 'view', $following['User']['id']));?>
		</li>
	<?php endforeach;?>
</ul>

<h2>Followers:</h2>
<ul class="list-group">
	<?php// die(var_dump($viewUser));?>
	<?php foreach ($followerUsers as $follower) :?>
		<li class="list-group-item list-group-item-success">
			<?php echo $this->Html->link($follower['User']['username'], array('controller' => 'users','action' => 'view', $follower['User']['id']));?>
		</li>
	<?php endforeach;?>
</ul>