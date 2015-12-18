
<div id="page-container" class="row">

    <?php echo $this->element('menu/side_menu'); ?>

    <div id="page-content" class="col-sm-9">

        <div class="donations view">

            <h2><?php
                echo __('Donation');
                if ($this->Session->read('Auth.User.id') === $donation['Church']['user_id'] || $this->Session->read('Auth.User.role') === 'admin') {
                    echo " " . $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('Edit'), array('action' => 'edit', $donation['Donation']['id']), array('class' => 'btn btn-primary', 'escape' => false));
                    echo " " . $this->Form->postLink('<i class="icon-plus icon-white"></i> ' . __('Delete'), array('action' => 'delete', $donation['Donation']['id']), array('class' => 'btn btn-primary', 'escape' => false), __('Are you sure you want to delete this %s $ donation ?', $donation['Donation']['amount']));
                }
                ?></h2>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Church'); ?></strong></td>
                            <td>
			<?php echo $this->Html->link($donation['Church']['name'], array('controller' => 'churches', 'action' => 'view', $donation['Church']['id']), array('class' => 'label label-info')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Amount'); ?></strong></td>
                            <td>
			<?php echo h($donation['Donation']['amount']) . " $"; ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Date'); ?></strong></td>
                            <td>
			<?php echo h($donation['Donation']['date']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
                            <td>
			<?php 
                                $created = $donation['Donation']['created'];
                                echo is_numeric($created) ? date("Y-m-d H:i:s", $created) : h($created);
                                ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
                            <td>
			<?php 
                                $modified = $donation['Donation']['modified'];
                                echo is_numeric($modified) ? date("Y-m-d H:i:s", $modified) : h($modified);
                                ?>
                                &nbsp;
                            </td>
                        </tr>					</tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->

        <p><?php
            if ($this->Session->check('Auth.User') && $this->Session->read('Auth.User.active') == 1) {
                echo " " . $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New donation'), array('controller' => 'donations', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false));
            }
            echo " " . $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('Back to list'), array('action' => 'index'), array('class' => 'btn btn-primary', 'escape' => false));
            ?></p>

    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
