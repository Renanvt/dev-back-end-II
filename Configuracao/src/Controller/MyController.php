<?php

namespace App\Controller;

use App\Model\MyModel;

class MyController
{
    public function view()
    {
        $model = new MyModel();
        // dados fictícios
        $data = $model->read();

        require APP_ROOT . '/resources/view/index.phtml';
    }
}
