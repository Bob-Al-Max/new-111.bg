<?php

namespace app\modules\questions\controllers;

use app\controllers\AppController;

/**
 * Default controller for the `questions` module
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
