<div id="sidebar" class="col-sm-3">
    <div class="actions">
        <ul class="list-group">
            <div class="dropdown">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Churches') ?> <span class="caret"></span></button>
                <ul class="dropdown-menu scrollable-menu" role="menu">
                    <li class="list-group-item"><?php echo $this->Html->link(__('List'), array('controller' => 'churches', 'action' => 'index'), array('class' => '')); ?></li>
                    <?php if ($this->Session->check('Auth.User')) { ?>
                    <li class="list-group-item"><?php echo $this->Html->link(__('New'), array('controller' => 'churches', 'action' => 'add'), array('class' => '')); ?></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="dropdown">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Missionaries') ?> <span class="caret"></span></button>
                <ul class="dropdown-menu scrollable-menu" role="menu">
                    <li class="list-group-item"><?php echo $this->Html->link(__('List'), array('controller' => 'missionaries', 'action' => 'index'), array('class' => '')); ?></li> 
                    <?php if ($this->Session->check('Auth.User') && $this->Session->read('Auth.User.active') == 1) { ?>
                    <li class="list-group-item"><?php echo $this->Html->link(__('New'), array('controller' => 'missionaries', 'action' => 'add'), array('class' => '')); ?></li> 
                    <?php } ?>
                </ul>
            </div>
            <div class="dropdown">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Donations') ?> <span class="caret"></span></button>
                <ul class="dropdown-menu scrollable-menu" role="menu">
                    <li class="list-group-item"><?php echo $this->Html->link(__('List'), array('controller' => 'donations', 'action' => 'index'), array('class' => '')); ?></li> 
                    <?php if ($this->Session->check('Auth.User') && $this->Session->read('Auth.User.active') == 1) { ?>
                    <li class="list-group-item"><?php echo $this->Html->link(__('New'), array('controller' => 'donations', 'action' => 'add'), array('class' => '')); ?></li> 
                    <?php } ?>
                </ul>
            </div>
            <?php if ($this->Session->check('Auth.User') && $this->Session->read('Auth.User.role') == "admin") { ?>
            <div class="dropdown">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?= __('Users') ?> <span class="caret"></span></button>
                <ul class="dropdown-menu scrollable-menu" role="menu">
                    <li class="list-group-item"><?php echo $this->Html->link(__('List'), array('controller' => 'users', 'action' => 'index'), array('class' => '')); ?></li> 
                    <li class="list-group-item"><?php echo $this->Html->link(__('New'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?></li> 
                </ul>
            </div>
           <?php } ?>
        </ul><!-- /.list-group -->
    </div><!-- /.actions -->
</div><!-- /#sidebar .span3 -->