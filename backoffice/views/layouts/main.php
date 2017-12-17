<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
//        'brandLabel' => Yii::$app->name,
//        'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar navbar-fixed-top',
                ],
            ]);


            $menuItems[] = ['label' => 'Dashboard', 'url' => '/index.php/dashboard'];
            $menuItems[] = ['label' => 'Client', 'options' => ['style' => 'font-weight:bold'],
                'url' => ['#'],
                'css' => 'font-weight:bold',
                'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
                'items' => [
                    ['label' => 'Add Client', 'url' => '/index.php/clients/form'],
                    ['label' => 'View Clients', 'url' => '/index.php/clients/index'],
                ],
            ];
            $menuItems[] = ['label' => 'Quotes', 'options' => ['style' => 'font-weight:bold'],
                'url' => ['#'],
                'css' => 'font-weight:bold',
                'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
                'items' => [
                    
                    ['label' => 'View Quotes', 'url' => '/index.php/quotes/index'],
                ],
            ];
            $menuItems[] = ['label' => 'Invoices', 'options' => ['style' => 'font-weight:bold'],
                'url' => ['#'],
                'css' => 'font-weight:bold',
                'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
                'items' => [
                    ['label' => 'View Invoices', 'url' => '/index.php/invoices/index'],
                    ['label' => 'View Recurring Invoices', 'url' => '/index.php/invoices/recurring/index'],
                ],
            ];
            $menuItems[] = ['label' => 'Products',
                'options' => ['style' => 'font-weight:bold'],
                'url' => ['#'],
                'css' => 'font-weight:bold',
                'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
                'items' => [
                    ['label' => 'Create Payments', 'url' => '/index.php/payments/form'],
                    ['label' => 'View Payments', 'url' => '/index.php/payments/index'],
                ],
            ];
            $menuItems[] = ['label' => 'Products',
                'options' => ['style' => 'font-weight:bold'],
                'url' => ['#'],
                'css' => 'font-weight:bold',
                'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
                'items' => [
                    ['label' => 'Create Product', 'url' => '/index.php/products/form'],
                    ['label' => 'View Products', 'url' => '/index.php/products/index'],
                    ['label' => 'Product Families', 'url' => '/index.php/families/index'],
                    ['label' => 'Product Units', 'url' => '/index.php/units/index'],
                ],
            ];
            $menuItems[] = ['label' => 'Tasks',
                'options' => ['style' => 'font-weight:bold'],
                'url' => ['#'],
                'css' => 'font-weight:bold',
                'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
                'items' => [
                    ['label' => 'Create Task', 'url' => '/index.php/tasks/form'],
                    ['label' => 'Show Tasks', 'url' => '/index.php/tasks'],
                    ['label' => 'Projects', 'url' => '/index.php/tasks'],
                    ['label' => 'All Tasks', 'url' => urldecode(Url::toRoute(['/ip-tasks/index']))],
                    ['label' => 'Show Task Status', 'url' => urldecode(Url::toRoute(['/site/index']))],
                ],
            ];
            $menuItems[] = ['label' => 'Reports', 'options' => ['style' => 'font-weight:bold'],
                'url' => ['#'],
                'css' => 'font-weight:bold',
                'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
                'items' => [
                    ['label' => 'Invoice Aging', 'url' => '/index.php/reports/invoice_aging'],
                    ['label' => 'Payment History', 'url' => '/index.php/reports/payment_history'],
                    ['label' => 'Sales by Client', 'url' => '/index.php/reports/sales_by_client'],
                    ['label' => 'Sales by Date', 'url' =>  '/index.php/reports/sales_by_year'],
                ],
            ];

//            Yii::$app->user->isGuest ? (
//                ['label' => 'Login', 'url' => ['/site/login']]
//            ) : (
//                '<li>'
//                . Html::beginForm(['/site/logout'], 'post')
//                . Html::submitButton(
//                    'Logout (' . Yii::$app->user->identity->username . ')',
//                    ['class' => 'btn btn-link logout']
//                )
//                . Html::endForm()
//                . '</li>'
//            )

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-left'],
                'items' => $menuItems,
            ]);




            NavBar::end();
            ?>

            <div class="container">
            <?=
            Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ])
            ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; ArcTop Labs Private Limited <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
