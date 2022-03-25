<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\ChainOfResponsibilityOmikuji\ConcreteHandler;

use DoYouPhp\PhpDesignPattern\ChainOfResponsibilityOmikuji\Handler\OmikujiHandler;

/**
 * ConcreteHandlerクラスに相当する
 */
class NotNullHandler extends OmikujiHandler
{
    /**
     * 自クラスが担当する処理を実行
     */
    protected function execOmikuji($input)
    {
        return $input !== '';
    }

    /**
     * 処理失敗時のメッセージを取得する
     */
    protected function getErrorMessage()
    {
        
    }

    /**
     * 成功時のメッセージを取得する
     */
    protected function getSuccessMessage()
    {
      
    }
}
