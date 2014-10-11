<h1>Add Post</h1>
<?php echo $this->Form->create('Post');?>
  <div class="form-group">
    <?php echo $this->Form->input('title');?>
  </div>
  <div class="form-group">
    <?php echo $this->Form->input('body', array('rows' => '3'));?>
  </div>
<!--   <div class="form-group">
    <?php echo $this->Form->input('youtube_link');?>
  </div> -->
  <button type="submit" class="btn btn-default">Submit</button>
</form>