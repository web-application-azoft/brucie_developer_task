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
    
    /**
     * Function which calculates optimized packages
     * @param integer[] $bananas Count of bananas to send 
     * @return array
     */
    public function calculate($bananas) {
        # We get all our unique possible weights/sizes of our packages
        $weights = array_values(ArrayHelper::map(PossibleWeights::find()->all(), 'id', 'weight'));
        $result = [];
        foreach ($bananas as $b) {
            # Find minimum bananas
            $temp = $this->_getPacksCount($b, $weights);
            # if result was found we get the optimized package weights array
            if ($temp) {
                $countOfBananas = $this->_scalarMultiply($temp, $weights);
                $packages = $this->_getPacksCount($countOfBananas, $weights);
                $result[] = [
                    'vector' => $packages,
                    'orderedCount' => $b,
                    'bananasToSend' => $countOfBananas,
                    'banknotes' => $weights,
                    'packageCount' => (is_array($packages) ? array_sum($packages) : null),
                ];
            } else {
                $result[] = [
                    'vector' => [],
                    'orderedCount' => $b,
                    'bananasToSend' => null,
                    'banknotes' => $weights,
                    'packageCount' => null,
                ];
            }
        }
        return $result;
    }

    /**
     * Optimizing by count of packages
     * @param integer[] $bananas Count of bananas to send 
     * @param integer[] $weightsArray array of possible package weights
     * @return array|null
     */
    private function _getPacksCount($bananas, $weightsArray) {
        if (count($weightsArray)) {
            # Sort possible weights array and reverse them
            sort($weightsArray);
            $weightsArray = array_reverse($weightsArray);
            $length = count($weightsArray);
            # Trying to get a count of bananas as sum of possible weights
            foreach ($weightsArray as $k => $v) {
                $a = intdiv($bananas, $v);
                if ($bananas) {
                    # we packs bananas at most small possible full package(s)
                    if ($a > 0) {
                        $result[$v] = $a;
                        $bananas -= $a * $v;
                        if ($k == ($length - 1)) {
                            if ($bananas) {
                                $result[$v] ++;
                            }
                        }
                    } else {
                        # Check that is the smallest possible pack, 
                        # if there are more bananas we add them
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

    /**
     * Scalar multiplication of 2 vector of same length
     * @param integer[] $a
     * @param integer[] $b
     * @return integer
     */
    private function _scalarMultiply($a, $b) {
        $result = 0;
        if (count($a) && (count($a) == count($b))) {
            foreach ($a as $k => $v) {
                $result += $b[$k] * $v;
            }
        } else {
            throw \Exception('');
        }
        return $result;
    }

}
