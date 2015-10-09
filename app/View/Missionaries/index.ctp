
<div id="page-container" class="row">

    <?php echo $this->element('menu/side_menu'); ?>

    <div id="page-content" class="col-sm-9">

        <div class="missionaries index">

            <h2><?php
                echo __('Missionaries');
                if ($this->Session->check('Auth.User')) {
                    echo " " . $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New'), array('controller' => 'missionaries', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false));
                }
                ?></h2>

            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo $this->Paginator->sort(__('name')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('churches')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('email')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('user_id')); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($missionaries as $missionary): ?>
                            <tr>
                                <td><?php echo h($missionary['Missionary']['name']); ?>&nbsp;</td>
                                <td><?php
                                    foreach ($missionary['Church'] as $chur) {
                                        // echo h($tag['name']) . ' '; 
                                        echo $this->Html->link($chur['name'] . ' ', array('controller' => 'churches', 'action' => 'view', $chur['id']), array('class' => 'label label-info')) . " &nbsp;";
                                    }
                                    ?>
                                    &nbsp;</td>
                                <td><?php echo h($missionary['Missionary']['email']); ?>&nbsp;</td>
                                <td>
                                    <?php echo $this->Html->link($missionary['User']['username'], array('controller' => 'users', 'action' => 'view', $missionary['User']['id']), array('class' => 'label label-info')); ?>
                                </td>
                                <td class="actions">
                                    <?php
                                    echo $this->Html->link(__('View'), array('action' => 'view', $missionary['Missionary']['id']), array('class' => 'label label-info'));
                                    if ($this->Session->read('Auth.User.id') === $missionary['Missionary']['user_id'] || $this->Session->read('Auth.User.role') === 'admin') {
                                        echo " " . $this->Html->link(__('Edit'), array('action' => 'edit', $missionary['Missionary']['id']), array('class' => 'label label-info'));
                                        echo " " . $this->Form->postLink(__('Delete'), array('action' => 'delete', $missionary['Missionary']['id']), array('class' => 'label label-info'), __('Are you sure you want to delete "%s" ?', $missionary['Missionary']['name']));
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div><!-- /.table-responsive -->

            <p><small>
                    <?php
                    echo $this->Paginator->counter(array(
                        'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
                    ));
                    ?>
                </small></p>

            <ul class="pagination">
                <?php
                echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
                echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
                echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
                ?>
            </ul><!-- /.pagination -->

        </div><!-- /.index -->

    </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->