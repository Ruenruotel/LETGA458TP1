<?php $this->Html->script('https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js', array('inline' => false));
$this->Html->script('View/Countries/complete', array('inline' => false)); ?>

<div id="page-container" class="row">

    <?php echo $this->element('menu/side_menu'); ?>

    <div id="page-content" class="col-sm-9">

        <h2><?php echo __('Edit Missionary'); ?></h2>

        <div class="missionaries form">

            <?php echo $this->Form->create('Missionary', array('role' => 'form', 'type' => 'file')); ?>

            <fieldset>

                <div class="form-group">
                    <?php echo $this->Form->input('id', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('name', array('class' => 'form-control', 'label' => __('Name'))); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('details', array('class' => 'form-control', 'label' => __('Details'))); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('email', array('class' => 'form-control', 'label' => __('Email'))); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('user_id', array('class' => 'form-control', 'label' => __('User'))); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('religion_id', array('class' => 'form-control', 'label' => __('Religion'))); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('subreligion_id', array('class' => 'form-control', 'label' => __('Sub-religion'))); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('country_name', array('type' => 'text', 'class' => 'form-control', 'id' => 'autocomplete', 'label' => __('Origin country'))); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('Church', array('multiple' => 'checkbox', 'label' => __('Churches'))); ?>
                </div><!-- .form-group -->
                <?php
                if (isset($this->data['Missionary']['profile_picture'])) {
                    echo '<p>' . __('Current profile picture : ');
                    echo $this->Html->image($this->data['Missionary']['profile_picture'], array('escape' => false));
                    echo '</p>';
                }
                ?>
                <div class="form-group">
                    <?php echo $this->Form->input('profile_picture', array('type' => 'file', 'value' => $this->data['Missionary']['profile_picture'], 'label' => __('Change profile picture'))); ?>
                </div><!-- .form-group -->

                <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary')); ?>

            </fieldset>

            <?php echo $this->Form->end(); ?>

        </div><!-- /.form -->

    </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->

<?php
$this->Js->get('#MissionaryReligionId')->event('click', $this->Js->request(array(
            'controller' => 'subreligions',
            'action' => 'getByReligion'
                ), array(
            'update' => '#MissionarySubreligionId',
            'async' => true,
            'method' => 'post',
            'dataExpression' => true,
            'data' => $this->Js->serializeForm(array(
                'isForm' => true,
                'inline' => true
            ))
        ))
);?>