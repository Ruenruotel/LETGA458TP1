<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button><!-- /.navbar-toggle -->
        <?php
        echo $this->Html->Link(__("MuffinChurches"), array(
            'controller' => 'churches',
            'action' => 'index'), array('class' => 'navbar-brand'));
        ?>
    </div><!-- /.navbar-header -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
            <li class="active">
                <?php
                if ($this->Session->check('Auth.User')) {
                    echo $this->Html->link(__("Hello, ") . $this->Session->read('Auth.User.username') . " !", array('controller' => 'users', 'action' => 'view', $this->Session->read('Auth.User.id')));
                    echo "</li><li>";
                    if ($this->Session->read('Auth.User.role') == "admin") {
                        echo $this->Html->link(__("[Add user]"), array(
                            'controller' => 'users',
                            'action' => 'add'));
                        echo "</li><li>";
                    }
                    if ($this->Session->read('Auth.User.active') == 0) {
                        echo $this->Html->link(__("[Send activation link]"), array(
                            'controller' => 'users',
                            'action' => 'resend_mail'));
                        echo "</li><li>";
                    }
                    echo $this->Html->link(__("[Logout]"), array(
                        'controller' => 'users',
                        'action' => 'logout'));
                } else {
                    echo $this->Html->link(__("[Register]"), array(
                        'controller' => 'users',
                        'action' => 'register')
                    );
                    echo "</li><li>";
                    echo $this->Html->link(__("[Login]"), array(
                        'controller' => 'users',
                        'action' => 'login')
                    );
                }
                ?>
            </li>

            <?php
            echo $this->Html->link(
                    $this->Html->image("muffinchurches_logo.svg", array('escape' => false, 'height' => '50px'))
                    , array('controller' => 'churches', 'action' => 'about'), array('escapeTitle' => false, 'title' => 'About'));
            ?>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= __('Languages') ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <?php
                    echo $this->I18n->flagSwitcher(array(
                        'class' => 'languages',
                        'id' => 'language-switcher '
                    ));
                    ?>
                </ul>
            </li>
        </ul><!-- /.nav navbar-nav -->
    </div><!-- /.navbar-collapse -->
</nav><!-- /.navbar navbar-default -->