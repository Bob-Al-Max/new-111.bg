<?php



namespace app\controllers;
use Yii;

class QueController extends \yii\web\Controller
{
   
    public function actionIndex(){
       
        $mo = \app\models\Questions::find()->all();
        
       
        
        
        
        //print_r($a->da()); die;
        
        return $this->render('index', ['mo' => $mo]);
    }
    
    public function actionTest(){
        
//       $customers = \app\models\Customer::find()
//    ->select('customer.*')
//    ->leftJoin('corder', '`corder`.`customer_id` = `customer`.`id`')
//    ->where(['corder.status' => \app\models\Corder::ACTIVE])
//    ->with('corders')
//    ->count();

        $customers = \app\models\Customer::find()
    ->joinWith('corders',['eagerLoading' => false])
    ->where(['corder.status' => \app\models\Corder::ACTIVE])
    ->all();
    //SELECT * FROM customer LEFT OUTER JOIN corder ON corder.customer_id = customer.id WHERE corder.status = 1   
       
       
       //$cc = \app\models\Customer::find()->where()->all();
       
       
       
       
       
       
        return $this->render('test',['customers' => $customers]);
    }
}
