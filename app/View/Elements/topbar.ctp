<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="nav-collapse">
                <ul class="nav">
                    <li class="active"><?php echo $this->Html->link('Home', '/posts/index');?></li>
                    <li><?php echo $this->Html->link('Hot', '/posts/index/hot');?></li>
                    <li><a href="#contact">Contact</a></li>
                    <?php if($this->Session->check('Auth.User.username')): ?>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><?php echo $this->Session->read('Auth.User.username'); ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><?php echo $this->Html->link('Add Post', '/posts/add');?></li>
                            <li><?php echo $this->Html->link('All Post', '/posts/user_posts');?></li>
                            <li><?php echo $this->Html->link('Logout', '/users/logout');?></li>
                        </ul>
                    </li>
                    <?php else :?>
                    <li><?php echo $this->Html->link('Login', '/users/login');?></li>
                    <?php endif;?>
                    <li>
                        <?php echo $this->Form->create('Post', array('action' => 'search', 'novalidate' => true, 'class' => 'form-search'));?>
                        <?php echo $this->Form->input('title', array('class' => 'input-medium search-query'));?>
                            <button type="submit" value='GO!' class='hide'>Search</button>
                        </form>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>