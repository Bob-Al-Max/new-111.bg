<?php

namespace app\modules\answers\controllers;

use app\controllers\AppController;

/**
 * Default controller for the `answers` module
 */
class DefaultController extends AppController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
