<?php

namespace app\classes\widgets;

use yii\base\Widget;

class HomeWidget extends Widget
{
    public function init()
    {
        parent::init();
    }

    public function run(){
        return $this->render('home');
    }
}