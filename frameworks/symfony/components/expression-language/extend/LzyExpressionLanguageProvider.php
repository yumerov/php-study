<?php

use Symfony\Component\ExpressionLanguage\ExpressionFunction;
use Symfony\Component\ExpressionLanguage\ExpressionFunctionProviderInterface;

class LzyExpressionLanguageProvider implements ExpressionFunctionProviderInterface {

  public function getFunctions() {
    return [
      new ExpressionFunction(
        'lzy_trim', [$this, 'TrimCompile'], [$this, 'TrimEvaluate']),
      new ExpressionFunction(
        'lzy_md5', [$this, 'Md5Compile'], [$this, 'Md5Evaluate']),
    ];
  }

  public function TrimCompile($str) {
    return sprintf('(is_string(%1$s) ? trim(%1$s) : %1$s )', $str);
  }

  public function TrimEvaluate($arguments, $str) {
    if (is_string($str)) {
      $return = trim($str);
    } else {
      $return = $str;
    }

    return $return;
  }

  public function Md5Compile($str) {
    return sprintf('(is_string(%1$s) ? md5(%1$s) : %1$s )', $str);
  }

  public function Md5Evaluate($arguments, $str) {
    if (is_string($str)) {
      $return = md5($str);
    } else {
      $return = $str;
    }

    return $return;
  }

}
