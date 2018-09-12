<?php

namespace app\modules\questions\controllers;

use Yii;
use app\modules\questions\models\Questions;
use app\modules\answers\models\Answers;
use app\modules\answers\models\forms\AnswerForm;
use app\modules\questions\models\forms\QuestionForm;
use app\modules\questions\models\QuestionsSearch;
use app\controllers\AppController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * QuestionsController implements the CRUD actions for Questions model.
 */
class QuestionsController extends AppController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Questions models.
     * @return mixed
     */
    public function actionIndex()
    {
        $questions = Questions::find()->all();
       $answer_form = new AnswerForm();
       
       
       
        
        return $this->render('index', [
            'questions' => $questions,
            'answer_form ' =>$answer_form 
           
            
        ]);
    }

    /**
     * Displays a single Questions model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
          $answer_form = new AnswerForm();
        
        $answer_form->load(\Yii::$app->request->post());
         if($answer_form->saveAnswer($id)){
             
             return $this->render('view', [
            'model' => $this->findModel($id),
        
        ]);  
        }
        
        return $this->render('view', [
            'model' => $this->findModel($id),
            'answer_form' => $answer_form
        
        ]);
    }
    
    
    public function actionAnswer($id){
        $answer_form = new AnswerForm();
        
        $answer_form->load(\Yii::$app->request->post());
        
        if($answer_form->saveAnswer($id)){
             return $this->render('view', [
            'model' => $this->findModel($id),
        
        ]);  
        }
        
     
    }

    



    /**
     * Creates a new Questions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new QuestionForm();

        if ($model->load(Yii::$app->request->post()) && $model->saveQuestion()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Questions model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Questions model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Questions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Questions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Questions::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
