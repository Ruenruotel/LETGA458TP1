<div id="page-container" class="row">

    <?php echo $this->element('menu/side_menu'); ?>

    <div id="page-content" class="col-sm-9">

        <?php
        echo $this->Html->image("muffinchurches_logo.svg", array('escape' => false));
        ?>

        <h2><?= __('About MuffinChurches') ?></h2><br>
        <p><?= __('Created by Gaël Letourneur,') ?></p>
        <p><?= __('In course "420-267 MO Développer un site Web et une application pour Internet",') ?></p>
        <p><?= __('At Autumn 2015 at Collège Montmorency,') ?></p>
        <p><?= __('This site enables any visitor to view missionaries, churches and donations.') ?></p>
        <p><?= __('You may register and login to manage churches, as well as view and manage your own account.') ?></p>
        <p><?= __('However, you need to activate your account by clicking on a link sent to your email to manage missionaries and donations as well.') ?></p>
        <p><?= __('An activated user may add all the data he wants, but he can only modify/delete his own records. However, and admin can modify/delete every church/missionary/donation, as well as view and manage all accounts.') ?></p>

        <br><br><p><?= __('Basically, how this site works is this way :') ?></p>
        <p><?= __('A church can have many missionaries, and many donations.') ?></p>
        <p><?= __('A donation is linked to one church.') ?></p>
        <p><?= __('A missionary can have many churches (Has and belongs to many relation bewteen churches and missionaries). ') ?></p>
        <p><?= __('Many special fields are included for missionaries : you may upload a profile picture, choose a religion and then a subreligion (linked lists), and finally, you may choose a country, helped by an autocomplete function.') ?></p>

        <br><br><p><?= __('This site has been partially inspired by this diagram : ') ?></p>
        <p><?= $this->Html->image('model.jpg', array('escape' => false)) ?></p>
        <p><?= __('Source : ') . $this->Html->link('http://www.databaseanswers.org/data_models/missionaries/index.htm,') ?></p>

        <br><br><p><?= __('If you encounter any problems while manipulating this site, please send an email to gaelletourneur2@hotmail.com .') ?></p>

    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->