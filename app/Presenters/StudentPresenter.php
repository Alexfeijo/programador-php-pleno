<?php 
namespace App\Presenters;

use EscapeWork\LaravelSteroids\Presenter;

class StudentPresenter extends Presenter
{
    public function born_date()
    {
        return $this->model->born_date->format('d/m/Y');
    }
}