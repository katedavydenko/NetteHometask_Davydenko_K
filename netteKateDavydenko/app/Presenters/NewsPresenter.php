<?php

namespace App\Presenters;
use Nette;
class NewsPresenter extends Nette\Application\UI\Presenter
{
    public function renderShow() : void
    {
        $this->getTemplate()->title = 'News';
        $this->getTemplate()->text = ['title'=>'Cat ate a whole watermelon', 'context'=>'Everyone is shocked!'];
    }

}