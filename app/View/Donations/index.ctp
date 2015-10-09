
<div id="page-container" class="row">

    <?php echo $this->element('menu/side_menu'); ?>

    <div id="page-content" class="col-sm-9">

        <div class="donations index">

            <h2><?php
                echo __('Donations');
                if ($this->Session->check('Auth.User')) {
                    echo " " . $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New'), array('action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false));
                }
                ?></h2>

            <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo $this->Paginator->sort(__('church_id')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('amount')); ?></th>
                            <th><?php echo $this->Paginator->sort(__('date')); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($donations as $donation): ?>
                            <tr>
                                <td>
                                    <?php echo $this->Html->link($donation['Church']['name'], array('controller' => 'churches', 'action' => 'view', $donation['Church']['id']), array('class' => 'label label-info')); ?>
                                </td>
                                <td><?php echo h($donation['Donation']['amount']) . " $"; ?>&nbsp;</td>
                                <td><?php echo h($donation['Donation']['date']); ?>&nbsp;</td>
                                <td class="actions">
                                    <?php
                                    echo $this->Html->link(__('View'), array('action' => 'view', $donation['Donation']['id']), array('class' => 'label label-info'));
                                    if ($this->Session->read('Auth.User.id') === $donation['Church']['user_id'] || $this->Session->read('Auth.User.role') === 'admin') {
                                        echo " " . $this->Html->link(__('Edit'), array('action' => 'edit', $donation['Donation']['id']), array('class' => 'label label-info'));
                                        echo " " . $this->Form->postLink(__('Delete'), array('action' => 'delete', $donation['Donation']['id']), array('class' => 'label label-info'), __('Are you sure you want to delete this %s $ donation ?', $donation['Donation']['amount']));
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