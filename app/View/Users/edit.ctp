
<div id="page-container" class="row">

    <?php echo $this->element('menu/side_menu'); ?>

    <div id="page-content" class="col-sm-9">

        <h2><?php echo __('Edit User'); ?></h2>

        <div class="users form">

            <?php echo $this->Form->create('User', array('role' => 'form')); ?>

            <fieldset>

                <div class="form-group">
                    <?php echo $this->Form->input('id', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('username', array('class' => 'form-control', 'label' => __('Username'))); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('email', array('class' => 'form-control', 'label' => __('Email'))); ?>
                </div><!-- .form-group -->
                <?php if ($this->Session->read('Auth.User.role') === 'admin') { ?>
                <div class="form-group">
                    <?php echo $this->Form->input('role', array('class' => 'form-control', 'label' => __('Role'),
                        'options' => array('admin' => 'Admin', 'member' => 'Member')));
                    ?>
                </div><!-- .form-group -->
                <?php } ?>

<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary')); ?>

            </fieldset>

<?php echo $this->Form->end(); ?>

        </div><!-- /.form -->

    </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->