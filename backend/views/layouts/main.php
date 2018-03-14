<?php

/**
 * @var string $content
 * @var \yii\web\View $this
 */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

$bundle = yiister\gentelella\assets\Asset::register($this);
$user = Yii::$app->user;
$urlManager = Yii::$app->urlManager;
$baseUrl = Yii::$app->urlManager->baseUrl;
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="nav-<?= !empty($_COOKIE['menuIsCollapsed']) && $_COOKIE['menuIsCollapsed'] == 'true' ? 'sm' : 'md' ?>" >
<?php $this->beginBody(); ?>
<div class="container body">

    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="navbar nav_title" style="border: 0;">
                    <a href="/" class="site_title"><i class="fa fa-paw"></i> <span><?= Yii::$app->name;?></span></a>
                </div>
                <div class="clearfix"></div>

                <!-- menu prile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src="http://placehold.it/128x128" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2><?= $user->identity->username;?></h2>
                    </div>
                </div>
                <!-- /menu prile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                    <div class="menu_section">
                        <h3>Menus</h3>
                        <?=
                        \yiister\gentelella\widgets\Menu::widget(
                            [
                                "items" => [
                                    ["label" => "Home", "url" => ["site/index"], "icon" => "home"],
                                    [
                                        "label" => "Users",
                                        "icon" => "user",
                                        "url" => "#",
                                        "items" => [
                                            ["label" => "Add User", "url" => ["user/create"]],
                                            ["label" => "Manage Users", "url" => ["user/index"]],
                                        ],
                                    ],
                                    [
                                        "label" => "Customers",
                                        "icon" => "users",
                                        "url" => "#",
                                        "items" => [
                                            ["label" => "Add Customer", "url" => ["customer/create"]],
                                            ["label" => "Manage Customers", "url" => ["customer/index"]],
                                        ],
                                    ],
                                    [
                                        "label" => "Bookings",
                                        "icon" => "ticket",
                                        "url" => "#",
                                        "items" => [
                                            ["label" => "Add Booking", "url" => ["booking/create"]],
                                            ["label" => "Manage Bookings", "url" => ["booking/index"]],
                                            ["label" => "Manage Orders", "url" => ["order/index"]],
                                            ["label" => "Payments", "url" => ["payment/index"]],
                                        ],
                                    ],
                                    [
                                        "label" => "Rooms",
                                        "icon" => "door",
                                        "url" => "#",
                                        "items" => [
                                            ["label" => "Add Room", "url" => ["room/create"]],
                                            ["label" => "Manage Rooms", "url" => ["room/index"]],
                                        ],
                                    ],
                                    [
                                        "label" => "Facilities",
                                        "icon" => "door",
                                        "url" => "#",
                                        "items" => [
                                            ["label" => "Add Facility", "url" => ["facility/create"]],
                                            ["label" => "Manage Facilities", "url" => ["facility/index"]],
                                            ["label" => "Add Facility Types", "url" => ["facility-type/create"]],
                                            ["label" => "Manage Facility Types", "url" => ["facility-type/index"]],
                                        ],
                                    ],
                                    [
                                        "label" => "Memberships",
                                        "icon" => "door",
                                        "url" => "#",
                                        "items" => [
                                            ["label" => "Manage Memberships", "url" => ["membership-customer/index"]],
                                            ["label" => "Membership Settings", "url" => ["membership/index"]],
                                        ],
                                    ],
                                    [
                                        "label" => "News & Events",
                                        "icon" => "door",
                                        "url" => "#",
                                        "items" => [
                                            ["label" => "Add News/Event", "url" => ["news-event/create"]],
                                            ["label" => "Manage News & Events", "url" => ["news-event/index"]],
                                        ],
                                    ],
                                    [
                                        "label" => "Feedbacks/Contacts",
                                        "icon" => "envelope",
                                        "url" => "#",
                                        "items" => [
                                            ["label" => "Manage Feedbacks/Contacts", "url" => ["feedback/index"]],
                                        ],
                                    ],
                                    [
                                        "label" => "Settings",
                                        "icon" => "gears",
                                        "url" => "#",
                                        "items" => [
                                            ["label" => "Manage Settings", "url" => ["setting/index"]],
                                        ],
                                    ],
                                ],
                            ]
                        )
                        ?>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings" href="<?= $urlManager->createAbsoluteUrl(['setting/index']);?>">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Profile" href="<?= $urlManager->createAbsoluteUrl(['site/my-profile']);?>">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Change Password" href="<?= $urlManager->createAbsoluteUrl(['site/change-password']);?>">
                        <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout" data-method="post" href="<?= $urlManager->createAbsoluteUrl(['site/logout']);?>">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="http://placehold.it/128x128" alt=""><?= $user->identity->username;?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="<?= $urlManager->createAbsoluteUrl(['site/my-profile']);?>">  Profile</a></li>
                                <li><a href="<?= $urlManager->createAbsoluteUrl(['setting/index']);?>">  Settings</a></li>
                                <li><a href="<?= $urlManager->createAbsoluteUrl(['site/help']);?>">Help</a></li>
                                <li><a href="<?= $urlManager->createAbsoluteUrl(['site/logout']);?>" data-method="post"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">0</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                <!--<li>
                                    <a>
										<span class="image">
											<img src="http://placehold.it/128x128" alt="Profile Image" />
										</span>
										<span>
											<span>John Smith</span>
											<span class="time">3 mins ago</span>
										</span>
										<span class="message">
											Film festivals used to be do-or-die moments for movie makers. They were where...
										</span>
                                    </a>
                                </li>-->
                                <li>
                                    <div class="text-center">
                                        <a href="<?= $urlManager->createAbsoluteUrl(['site/notifications']);?>">
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>

        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <?php if (isset($this->params['h1'])): ?>
                <div class="page-title">
                    <div class="title_left">
                        <h1><?= $this->params['h1'] ?></h1>
                    </div>
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="clearfix"></div>
			<?= Breadcrumbs::widget([
				'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
			]) ?>
			<?= Alert::widget() ?>
            <?= $content ?>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
            <div class="pull-right">&copy; Resort. <?= date('Y');?>. Developed with <i class="fa fa-heart text-danger"></i> by <a href="http://salokhe.in">Pankaj Salokhe</a></div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>

</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>
<!-- /footer content -->
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
