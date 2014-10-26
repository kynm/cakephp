<h2>Add Comment</h2>
<?php echo $this->Form->create('Comment',array('action' => 'add', 'url' => array($post_id))); ?>
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
        <?php echo $this->Form->input('body', array('rows' => '2', 'class' => 'form-control', 'placeholder' => 'content comment'));?>
    </div>
    <br />
    <button type="submit" value="sub" name="sub" class="btn btn-primary"><i class="fa fa-share"></i> Add Comment</button>
</form>