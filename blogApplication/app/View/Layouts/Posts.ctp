<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php
    echo $this->Html->script('jquery');
    echo $this->Html->css('blog-home');
    echo $this->Html->css('bootstrap');
    echo $this->Html->css('bootstrap.min');
    ?>
    <title><?php echo $this->fetch('title'); ?></title>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--a class="navbar-brand" href="#">Start Bootstrap</a-->
                <?php
                                echo $this->Html->link('Add post', array('controller' => 'posts', 'action' => 'add'), array('class' => 'navbar-brand'));
                ?>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                         <?php if(!empty($this->Session->read('Auth.User.username'))){
                         ?><li><a><?php echo $this->Session->read('Auth.User.username');?></a></li><?php
                         }else{?><li><?php echo $this->Html->link('Log in', array('controller' => 'users', 'action' => 'login'));?></li><li><?php echo $this->Html->link('Sign Up', array('controller' => 'users', 'action' => 'add'));?></li><?php
                         }?>
                    <li>
                    <?php
                    if (AuthComponent::user()){
                      echo $this->Html->link('Log out', array('controller' => 'users', 'action' => 'logout'));
                    }
                    ?>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>
            </div>
        </div>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>test blog - application by Alexandr Kozlovsky</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
</body>

</html>
