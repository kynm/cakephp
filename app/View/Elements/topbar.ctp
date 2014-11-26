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
                    <li class="active"><?php echo $this->Html->link('Home', '/posts/index');?></li></li>
                    <li><a href="#about">About</a></li>
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
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>