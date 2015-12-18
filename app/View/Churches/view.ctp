<?php $totalDonations = 0; ?>
<div id="page-container" class="row">

    <?php echo $this->element('menu/side_menu'); ?>

    <div id="page-content" class="col-sm-9">

        <div class="churches view">

            <h2><?php
                echo __('Church');
                if ($this->Session->read('Auth.User.id') === $church['Church']['user_id'] || $this->Session->read('Auth.User.role') === 'admin') {
                    echo " " . $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('Edit'), array('action' => 'edit', $church['Church']['id']), array('class' => 'btn btn-primary', 'escape' => false));
                    echo " " . $this->Form->postLink('<i class="icon-plus icon-white"></i> ' . __('Delete'), array('action' => 'delete', $church['Church']['id']), array('class' => 'btn btn-primary', 'escape' => false), __('Are you sure you want to delete "%s" ?', $church['Church']['name']));
                }
                ?></h2>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Name'); ?></strong></td>
                            <td>
                                <?php echo h($church['Church']['name']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Details'); ?></strong></td>
                            <td>
                                <?php echo h($church['Church']['details']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('User'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($church['User']['username'], array('controller' => 'users', 'action' => 'view', $church['User']['id']), array('class' => 'label label-info')); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
                            <td>
                                <?php 
                                $created = $church['Church']['created'];
                                echo is_numeric($created) ? date("Y-m-d H:i:s", $created) : h($created);
                                ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
                            <td>
                                <?php 
                                $modified = $church['Church']['modified'];
                                echo is_numeric($modified) ? date("Y-m-d H:i:s", $modified) : h($modified);
                                ?>
                                &nbsp;
                            </td>
                        </tr>					</tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->

        <p><?php
            if ($this->Session->check('Auth.User')) {
                echo " " . $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New church'), array('controller' => 'churches', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false));
            }
            echo " " . $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('Back to list'), array('action' => 'index'), array('class' => 'btn btn-primary', 'escape' => false));
            ?></p>


        <div class="related">

            <h3><?php echo __('Related Donations'); ?></h3>

            <?php if (!empty($church['Donation'])): ?>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo __('Amount'); ?></th>
                                <th><?php echo __('Date'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($church['Donation'] as $donation):
                                ?>
                                <tr>
                                    <td><?php
                                        echo $donation['amount'] . " $";
                                        $totalDonations += $donation['amount'];
                                        ?></td>
                                    <td><?php echo $donation['date']; ?></td>
                                    <td class="actions">
                                        <?php
                                        echo $this->Html->link(__('View'), array('controller' => 'donations', 'action' => 'view', $donation['id']), array('class' => 'label label-info'));
                                        if ($this->Session->read('Auth.User.id') === $church['Church']['user_id'] || $this->Session->read('Auth.User.role') === 'admin') {
                                            echo " " . $this->Html->link(__('Edit'), array('controller' => 'donations', 'action' => 'edit', $donation['id']), array('class' => 'label label-info'));
                                            echo " " . $this->Form->postLink(__('Delete'), array('controller' => 'donations', 'action' => 'delete', $donation['id']), array('class' => 'label label-info'), __('Are you sure you want to delete this %s $ donation ?', $donation['amount']));
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table><!-- /.table table-striped table-bordered -->
                </div><!-- /.table-responsive -->

                <h5><?php echo "Total : " . $totalDonations . " $" ?></h5>

            <?php endif; ?>


            <div class="actions">
                <?php
                if ($this->Session->check('Auth.User') && $this->Session->read('Auth.User.active') == 1) {
                    echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New donation'), array('controller' => 'donations', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false));
                }
                ?>				</div><!-- /.actions -->

        </div><!-- /.related -->


        <div class="related">

            <h3><?php echo __('Related Missionaries'); ?></h3>

<?php if (!empty($church['Missionary'])): ?>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo __('Name'); ?></th>
                                <th><?php echo __('Email'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($church['Missionary'] as $missionary):
                                ?>
                                <tr>
                                    <td><?php echo $missionary['name']; ?></td>
                                    <td><?php echo $missionary['email']; ?></td>
                                    <td class="actions">
                                        <?php
                                        echo $this->Html->link(__('View'), array('controller' => 'missionaries', 'action' => 'view', $missionary['id']), array('class' => 'label label-info'));
                                        if ($this->Session->read('Auth.User.id') === $missionary['user_id'] || $this->Session->read('Auth.User.role') === 'admin') {
                                            echo " " . $this->Html->link(__('Edit'), array('controller' => 'missionaries', 'action' => 'edit', $missionary['id']), array('class' => 'label label-info'));
                                            echo " " . $this->Form->postLink(__('Delete'), array('controller' => 'missionaries', 'action' => 'delete', $missionary['id']), array('class' => 'label label-info'), __('Are you sure you want to delete "%s" ?', $missionary['name']));
                                        }
                                        ?>
                                    </td>
                                </tr>
    <?php endforeach; ?>
                        </tbody>
                    </table><!-- /.table table-striped table-bordered -->
                </div><!-- /.table-responsive -->

<?php endif; ?>


            <div class="actions">
                <?php
                if ($this->Session->check('Auth.User') && $this->Session->read('Auth.User.active') == 1) {
                    echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New missionary'), array('controller' => 'missionaries', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false));
                }
                ?>				</div><!-- /.actions -->

        </div><!-- /.related -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
