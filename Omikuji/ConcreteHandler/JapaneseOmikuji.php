<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\ChainOfResponsibilityOmikuji\ConcreteHandler;

use DoYouPhp\PhpDesignPattern\ChainOfResponsibilityOmikuji\Handler\OmikujiHandler;

/**
 * 日本語
 */
class JapaneseOmikuji extends OmikujiHandler
{
    private $set = array('大吉', '吉', '大凶');
    protected function execOmikuji($input)
    {
        if($input>=1){//おみくじ
            for($i=0;$i<$input;$i++){
                $fortune[]=$this->set[array_rand($this->set)];
            }
            $result = $input.' 回<br>'.implode(',',$fortune);
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
        return '<font color="#FF0000">料金が不足しています</font>';
    }
    
    /**
     * 成功時のメッセージを取得する
     */
    protected function getSuccessMessage()
    {
    }

}
