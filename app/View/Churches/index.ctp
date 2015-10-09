
<div id="page-container" class="row">

    <?php echo $this->element('menu/side_menu'); ?>

    <div id="page-content" class="col-sm-9">

        <div class="churches index">

            <h2><?php
                echo __('Churches');
                if ($this->Session->check('Auth.User')) {
                    echo " " . $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New'), array('controller' => 'churches', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false));
                }
                ?></h2>

            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo $this->Paginator->sort(__('name')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('missionaries')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('donations')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('user_id')); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
<?php foreach ($churches as $church): ?>
                            <tr>
                                <td><?php echo h($church['Church']['name']); ?>&nbsp;</td>
                                <td><?php
                                    foreach ($church['Missionary'] as $miss) {
                                        // echo h($tag['name']) . ' '; 
                                        echo $this->Html->link($miss['name'] . ' ', array('controller' => 'missionaries', 'action' => 'view', $miss['id']), array('class' => 'label label-info')) . " &nbsp;";
                                    }
                                    ?>
                                    &nbsp;</td>
                                <td><?php
                                    foreach ($church['Donation'] as $donn) {
                                        // echo h($tag['name']) . ' '; 
                                        echo $this->Html->link($donn['amount'] . ' $ ', array('controller' => 'donations', 'action' => 'view', $donn['id']), array('class' => 'label label-info')) . " &nbsp;";
                                    }
                                    ?>
                                    &nbsp;</td>
                                <td>
    <?php echo $this->Html->link($church['User']['username'], array('controller' => 'users', 'action' => 'view', $church['User']['id']), array('class' => 'label label-info')); ?>
                                </td>
                                <td class="actions">
                                    <?php
                                    echo $this->Html->link(__('View'), array('action' => 'view', $church['Church']['id']), array('class' => 'label label-info'));
                                    if ($this->Session->read('Auth.User.id') === $church['Church']['user_id'] || $this->Session->read('Auth.User.role') === 'admin') {
                                        echo " " . $this->Html->link(__('Edit'), array('action' => 'edit', $church['Church']['id']), array('class' => 'label label-info'));
                                        echo " " . $this->Form->postLink(__('Delete'), array('action' => 'delete', $church['Church']['id']), array('class' => 'label label-info'), __('Are you sure you want to delete "%s" ?', $church['Church']['name']));
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