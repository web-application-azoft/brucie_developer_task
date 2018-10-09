<?php

namespace app\Modules\shipping;
use app\Modules\shipping\models\PossibleWeights;
use yii\helpers\ArrayHelper;

/**
 * shipping module definition class
 */
class ShippingModule extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\Modules\shipping\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    
    public function calculate($bananas) {
        //$banknotes = array_values(ArrayHelper::map(PossibleWeights::find()->all(), 'id','weight'));
        $banknotes = [250, 500, 1000, 2000, 5000];
        $result = [];
        foreach ($bananas as $b) {
            $temp=$this->_getPacksCount($b, $banknotes);
            if ($temp) {
                $countOfBananas=$this->_scalarMultiply($temp, $banknotes);
                $packages=$this->_getPacksCount($countOfBananas, $banknotes);
                $result[] = [
                    'vector'=> $packages,
                    'orderedCount' => $b,
                    'bananasToSend'=>$countOfBananas,
                    //'bananasToSendOptimized'=>implode(',',$this->_getPacksCount($countOfBananas, $banknotes)),
                    'banknotes'=>$banknotes,
                    'packageCount' => (is_array($packages) ? array_sum($packages) : null),
                ];
            } else {
                $result[] = [
                    'vector'=> [],
                    'orderedCount' => $b,
                    'bananasToSend'=> null,
                    //'bananasToSendOptimized'=>implode(',',$this->_getPacksCount($countOfBananas, $banknotes)),
                    'banknotes'=>$banknotes,
                    'packageCount' =>null,
                ];
            }
        }
        return $result;
    }

    private function _getPacksCount($bananas, $banknotesArray) {
        
        if (count($banknotesArray)) {
            sort($banknotesArray);
            $banknotesArray = array_reverse($banknotesArray);
            $length = count($banknotesArray);

            foreach ($banknotesArray as $k => $v) {
                $a = intdiv($bananas, $v);
                if ($bananas) {
                    if ($a > 0) {
                        $result[$v] = $a;
                        $bananas -= $a * $v;
                        if ($k == ($length - 1)) {
                            if ($bananas) {
                                $result[$v] ++;
                            }
                        }
                    } else {
                        if ($k == ($length - 1)) {
                            $result[$v] = 1;
                        } else {
                            $result[$v] = 0;
                        }
                    }
                } else {
                    $result[$v] = 0;
                }
            }
            return array_reverse($result);
        } else {
            return null;
        }
    }

    private function _scalarMultiply($a, $b){
        $result=0;
        if (count($a) && (count($a)==count($b)) ) {
            foreach ($a as $k=>$v) {
               $result+= $b[$k]*$v;
            }
        } else {
            throw \Exception('');
        }
        return $result;
    }
}
