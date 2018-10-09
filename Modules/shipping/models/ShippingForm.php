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
            ['package', 'string'],
            ['package', 'required'],
            ['package', 'filter', 'filter' => [$this, 'normalizeData']],
        ];
    }
    
    /**
     * Filters string, delete everything except numbers, symbol "," and whitespaces
     * @param string $value
     * @return string
     */
    public function normalizeData($value) {
        $output = preg_replace( '/[^0-9,]/', '', $value );
        $output = str_replace(' ','',$output);
        return $output ;
    }

    /**
     * Main function of our module
     * @return string
     */    
    public function calculate()
    {
        $module=\Yii::$app->getModule('shipping');

        return $module->calculate(explode(',',$this->package));
    }

}
