<?php
declare(strict_types=1);
namespace DoYouPhp\PhpDesignPattern\ChainOfResponsibilityOmikuji;
require dirname(__DIR__) . '/vendor/autoload.php';
use DoYouPhp\PhpDesignPattern\ChainOfResponsibilityOmikuji\ConcreteHandler\EnglishOmikuji;
use DoYouPhp\PhpDesignPattern\ChainOfResponsibilityOmikuji\ConcreteHandler\JapaneseOmikuji;
use DoYouPhp\PhpDesignPattern\ChainOfResponsibilityOmikuji\ConcreteHandler\FrenchOmikuji;
use DoYouPhp\PhpDesignPattern\ChainOfResponsibilityOmikuji\ConcreteHandler\NotNullHandler;

if (isset($_POST['Omikuji']) && isset($_POST['input'])) {
    $Omikuji = $_POST['Omikuji'];
    $input = $_POST['input'];
    $handler = new NotNullHandler();
    
    /**
     * チェーンの作成
     * validate_typeの値によってチェーンを動的に変更
     */

     //英語
    if (in_array("English", $Omikuji)) {
      $price = 300;
      $newhandler = new EnglishOmikuji();
      $newhandler->sethandler($handler);
      $handler = $newhandler;
    }

    //日本語
    if (in_array("Japanese", $Omikuji)) {
      $price = 150;
      $newhandler = new JapaneseOmikuji();
      $newhandler->sethandler($handler);
      $handler = $newhandler;
    }

    //フランス語
    if (in_array("French", $Omikuji)) {
      $price = 450;
      $newhandler = new FrenchOmikuji();
      $newhandler->sethandler($handler);
      $handler = $newhandler;
    }
    
    /**
     * おみくじ結果の表示
     */
    echo '<h3>';
    $result = $handler->Omikuji(floor($input[0]/$price));
    echo '</h3>';
}
?>

<form action="" method="post">
  <p>
    振込：<input type="number" name="input[]">円
</p>
  <p>
    ラインナップ：<br>
    <input type="radio" name="Omikuji[]" value="English">English：300yen<br>
    <input type="radio" name="Omikuji[]" value="Japanese">日本語：150円<br>
    <input type="radio" name="Omikuji[]" value="French">français：450yen<br>
</p>
  <p>
    <input type="submit">
</p>
</form>
