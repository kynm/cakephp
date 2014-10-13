<!-- File: /app/View/Posts/index.ctp -->
<h1>Blog posts</h1>
<p><?php echo $this->Html->link('Add Post', array('action' => 'add')); ?></p>
<table>
    <!-- Here's where we loop through our $posts array, printing out post info -->
    <?php foreach ($posts as $post): ?>
    <tr>
        <td>
            <h2>
            title :
            <?php echo $this->Html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id']));?>
            </h2>
        <?php if($this->Session->read('Auth.User.id') == $post['Post']['user_id']): ?>
            <?php echo $this->Form->postLink(
            'Delete',
            array('action' => 'delete', $post['Post']['id']),
            array('confirm' => 'Are you sure?'));
            ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $post['Post']['id']));?>
        <?php endif?>
        <?php echo $post['Post']['created']; ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo $this->Youtube->thumbnail($post['Post']['body']); ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>