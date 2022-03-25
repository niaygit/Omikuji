<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\ChainOfResponsibilityOmikuji\ConcreteHandler;

use DoYouPhp\PhpDesignPattern\ChainOfResponsibilityOmikuji\Handler\OmikujiHandler;

/**
 * 英語
 */
class EnglishOmikuji extends OmikujiHandler
{
    private $set = array('Great', 'fine', 'bad');
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
        return '<font color="#FF0000">That fare is not enough.</font>';
    }
    
     /**
     * 成功時のメッセージを取得する
     */
    protected function getSuccessMessage()
    {
    }

}
