<?php

declare(strict_types=1);

namespace DoYouPhp\PhpDesignPattern\ChainOfResponsibilityOmikuji\Handler;

/**
 * Handlerクラスに相当する
 */
abstract class OmikujiHandler
{
    private $next_handler;

    public function __construct()
    {
        $this->next_handler = null;
    }

    public function setHandler(self $handler)
    {
        $this->next_handler = $handler;

        return $this;
    }

    public function getNextHandler()
    {
        return $this->next_handler;
    }

    /**
     * チェーンの実行
     */
    public function Omikuji($input)
    {
        $result = $this->execOmikuji($input);
        if ($result) {
          echo $this->getSuccessMessage();
        } else {
          echo $this->getErrorMessage();
        }
        echo '<br>';
        if ($this->getNextHandler() !== null) {
            return $this->getNextHandler()->Omikuji($input);
        }

        return true;
    }

    /**
     * 自クラスが担当する処理を実行
     */
    abstract protected function execOmikuji($input);

    /**
     * 処理失敗時のメッセージを取得する
     */
    abstract protected function getErrorMessage();
    
    /**
     * 成功時のメッセージを取得する
     */
    abstract protected function getSuccessMessage();
}
