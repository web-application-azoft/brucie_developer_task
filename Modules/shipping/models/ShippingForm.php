<?php

namespace app\Modules\shipping\models;

use app\Modules\shipping\ShippingModule;
use Yii;
use yii\base\Model;

/**
 * Description of ShippingForm
 *
 * @author kasatkin
 */
class ShippingForm extends Model {
    //put your code here
    
    public $package;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            //['package', 'each', 'rule' => ['integer']],
            ['package', 'string'],
            ['package', 'required'],
        ];
    }
    
    
    public function calculate()
    {
        $module=\Yii::$app->getModule('shipping');

        return $module->calculate(explode(',',$this->package));
    }

}
