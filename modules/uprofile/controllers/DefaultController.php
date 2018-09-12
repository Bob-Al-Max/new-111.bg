<?php

namespace app\modules\uprofile\controllers;

use app\controllers\AppController;

/**
 * Default controller for the `uprofile` module
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
