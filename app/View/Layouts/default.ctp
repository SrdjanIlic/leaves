<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $this->Html->css('bootstrap.min'); ?>
        <?php echo $this->Html->css('bootstrap-responsive.min'); ?>
        <?php echo $this->Html->css('jquery-ui'); ?>
        <?php echo $this->Html->css('leaves'); ?>
        <script src="http://code.jquery.com/jquery.js"></script>
        <?php echo $this->Html->script('bootstrap.min'); ?>
        <?php echo $this->Html->script('jquery-ui'); ?>
        <?php echo $this->Html->script('leaves'); ?>
    </head>
    <body>

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
            <div class="container">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="brand" href="/">Leaves</a>
                <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="active"><?php echo $this->Html->link(__('Users'), array('controller' => 'users', 'action' => 'index')); ?></li>
                    <li class="active"><?php echo $this->Html->link(__('Leaves'), array('controller' => 'leaves', 'action' => 'index')); ?></li>
                    <li class="active"><?php echo $this->Html->link(__('Leave types'), array('controller' => 'leave_types', 'action' => 'index')); ?></li>
                    <li class="active"><?php echo $this->Html->link(__('Holidays'), array('controller' => 'holidays', 'action' => 'index')); ?></li>
                    <?php if ($currentAccount['group_id'] == 1): ?>
                        <li class="active"><?php echo $this->Html->link(__('Rules'), array('controller' => 'rules', 'action' => 'index')); ?></li>
                    <?php endif; ?>
                    <li class="active"><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?></li>
                </ul>
              </div>
            </div>
            </div>
        </div>
        <div class="container" style='padding-top:41px;'>
            <div class="row">
                <div class="span12">
                    <?php echo $this->fetch('content'); ?>
                </div>
            </div>
        </div>
    </body>
</html>