<?php

namespace App\Presenters;
use Nette;
class EditPresenter extends Nette\Application\UI\Presenter
{
    public function startup(): void
    {
        parent::startup();

        if (!$this->getUser()->isLoggedIn()) {
            $this->redirect('Sign:in');
        }
    }
}