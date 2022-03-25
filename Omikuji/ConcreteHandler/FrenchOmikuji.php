<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\ChainOfResponsibilityOmikuji\ConcreteHandler;

use DoYouPhp\PhpDesignPattern\ChainOfResponsibilityOmikuji\Handler\OmikujiHandler;

/**
 * フランス語
 */
class FrenchOmikuji extends OmikujiHandler
{
   

    private $set = array('heureux','Comme d habitude','N importe quoi');
    protected function execOmikuji($input)
    {
        if($input>=1){//おみくじ
            for($i=0;$i<$input;$i++){
                $fortune[]=$this->set[array_rand($this->set)];
            }
            $result = $input.' chance<br>'.implode(',',$fortune);
            echo $result;
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * 処理失敗時のメッセージを取得する
     */
    protected function getErrorMessage()
    {
        return '<font color="#FF0000">Les taux sont insuffisants</font>';
    }

    /**
     * 成功時のメッセージを取得する
     */
    protected function getSuccessMessage()
    {
    }
}
