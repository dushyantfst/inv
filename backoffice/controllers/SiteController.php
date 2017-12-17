<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\IpTasks;
use app\models\IpTaskStatus;
use app\models\IpProjects;
use yii\web\ForbiddenHttpException;

class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex($timestamp) {
        $ip = $this->getRealIp();
        $row = (new \yii\db\Query())
                ->from('ip_sessions')
                ->where(['and', 'timestamp=' . $timestamp, "ip_address='" . $ip . "'"])
                ->one();
        var_dump($row);
        if ($row) {
            return $this->render('index');
        } else {
            Yii::$app->getResponse()->redirect('index.php');
        }
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
                    'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
                    'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout() {
        return $this->render('about');
    }

    public function actionListTasks() {

        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;

        $tasks = (new \yii\db\Query())
                ->select(['task_name', 'task_status', 'task_finish_date', 'task_id', 'project_id', 'task_start_date'])
                ->from('ip_tasks')
                ->all();
        $status = (new \yii\db\Query())
                ->select(['task_status_name', 'task_status_id'])
                ->from('ip_task_status')
                ->all();   //IpTaskStatus::find()->all();
        $projects = (new \yii\db\Query())
                ->select(['project_id', 'project_name'])
                ->from('ip_projects')
                ->all();

        $statusArray = Array();
        foreach ($status as $key => $value) {
//            var_dump($status[$key]["task_status_id"]);
//            var_dump($status[$key]["task_status_name"]);
            $statusArray[$status[$key]["task_status_id"]] = $status[$key]["task_status_name"];
        }

        $projectArray = Array();
        foreach ($projects as $key => $value) {
//            var_dump($status[$key]["task_status_id"]);
//            var_dump($status[$key]["task_status_name"]);
            $projectArray[$projects[$key]["project_id"]] = $projects[$key]["project_name"];
        }

        $resultArray = Array();
        foreach ($tasks as $k => $value) {

//            var_dump($tasks[$k]["task_name"]);
            $arrayTemp = Array();
            foreach ($tasks[$k] as $key => $value) {

                if (strcasecmp($key, "task_status") == 0) {
//                    $arrayTemp[$key] = $statusArray["task_status"];
//                    var_dump($statusArray[$tasks[$k]["task_status"]]);
                    $arrayTemp[$key] = $statusArray[$tasks[$k]["task_status"]]; //$value;
                } else if (strcasecmp($key, "project_id") == 0) {
//                    $arrayTemp[$key] = $statusArray["task_status"];
//                    var_dump($statusArray[$tasks[$k]["task_status"]]);
                    $arrayTemp[$key] = $projectArray[$tasks[$k]["project_id"]]; //$value;
                } else {
                    $arrayTemp[$key] = $value;
                }
            }


            array_push($resultArray, $arrayTemp);
        }

        if (count($tasks) > 0) {

            return array('status' => true, 'result' => $resultArray);
        } else {

            return array('status' => false, 'data' => 'No Student Found');
        }
    }

    public function getRealIp() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {   //check ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {   //to check ip is pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

}
