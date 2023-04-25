<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;


final class MainPagesPresenter extends Nette\Application\UI\Presenter
{
    public function renderHome() : void
    {
        $this->getTemplate()->title = 'Home';
    }
    public function renderAbout() : void
    {
        $this->getTemplate()->title = 'About';
    }
    public function renderContacts() : void
    {
        $this->getTemplate()->title = 'Contacts';
    }

}
