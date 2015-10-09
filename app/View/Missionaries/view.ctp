
<div id="page-container" class="row">

    <?php echo $this->element('menu/side_menu'); ?>

    <div id="page-content" class="col-sm-9">

        <div class="missionaries view">

            <h2><?php
                echo __('Missionary');
                if ($this->Session->read('Auth.User.id') === $missionary['Missionary']['user_id'] || $this->Session->read('Auth.User.role') === 'admin') {
                    echo " " . $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('Edit'), array('action' => 'edit', $missionary['Missionary']['id']), array('class' => 'btn btn-primary', 'escape' => false));
                    echo " " . $this->Form->postLink('<i class="icon-plus icon-white"></i> ' . __('Delete'), array('action' => 'delete', $missionary['Missionary']['id']), array('class' => 'btn btn-primary', 'escape' => false), __('Are you sure you want to delete "%s" ?', $missionary['Missionary']['name']));
                }
                ?></h2>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Name'); ?></strong></td>
                            <td>
                                <?php echo h($missionary['Missionary']['name']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Details'); ?></strong></td>
                            <td>
                                <?php echo h($missionary['Missionary']['details']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Email'); ?></strong></td>
                            <td>
                                <?php echo h($missionary['Missionary']['email']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
                            <td>
                                <?php echo h($missionary['Missionary']['created']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
                            <td>
                                <?php echo h($missionary['Missionary']['modified']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('User'); ?></strong></td>
                            <td>
                                <?php echo $this->Html->link($missionary['User']['username'], array('controller' => 'users', 'action' => 'view', $missionary['User']['id']), array('class' => 'label label-info')); ?>
                                &nbsp;
                            </td>
                        </tr>					</tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->

        <p><?php
            if ($this->Session->check('Auth.User')) {
                echo " " . $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New missionary'), array('controller' => 'missionaries', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false));
            }
            echo " " . $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('Back to list'), array('action' => 'index'), array('class' => 'btn btn-primary', 'escape' => false));
            ?></p>

        <div class="related">

            <h3><?php echo __('Related Churches'); ?></h3>

            <?php if (!empty($missionary['Church'])): ?>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo __('Name'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($missionary['Church'] as $church):
                                ?>
                                <tr>
                                    <td><?php echo $church['name']; ?></td>
                                    <td class="actions">
                                        <?php
                                        echo $this->Html->link(__('View'), array('controller' => 'churches', 'action' => 'view', $church['id']), array('class' => 'label label-info'));
                                        if ($this->Session->read('Auth.User.id') === $church['user_id'] || $this->Session->read('Auth.User.role') === 'admin') {
                                            echo " " . $this->Html->link(__('Edit'), array('controller' => 'churches', 'action' => 'edit', $church['id']), array('class' => 'label label-info'));
                                            echo " " . $this->Form->postLink(__('Delete'), array('controller' => 'churches', 'action' => 'delete', $church['id']), array('class' => 'label label-info'), __('Are you sure you want to delete "%s" ?', $church['name']));
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
                if ($this->Session->check('Auth.User')) {
                    echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New church'), array('controller' => 'churches', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false));
                }
                ?>				</div><!-- /.actions -->
                
        </div><!-- /.related -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
