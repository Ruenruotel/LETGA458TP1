
<div id="page-container" class="row">

	<?php echo $this->element('menu/side_menu'); ?>
	
	<div id="page-content" class="col-sm-9">

		<h2><?php echo __('Add Church'); ?></h2>

		<div class="churches form">
		
			<?php echo $this->Form->create('Church', array('role' => 'form')); ?>

				<fieldset>

					<div class="form-group">
						<?php echo $this->Form->input('name', array('class' => 'form-control', 'label' => __('Name'))); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('details', array('class' => 'form-control', 'label' => __('Details'))); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('user_id', array('class' => 'form-control', 'label' => __('User'), 'default' => $this->Session->read('Auth.User.id'))); ?>
					</div><!-- .form-group -->
					<div class="form-group">
							<?php echo $this->Form->input('Missionary', array('multiple' => 'checkbox', 'label' => __('Missionaries')));?>
					</div><!-- .form-group -->

					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->