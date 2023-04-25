<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use Nette\Application\AbortException;


final class MainPagesPresenter extends Nette\Application\UI\Presenter
{
    /**
     * @throws AbortException
     */
    public function startup(): void
    {
        parent::startup();

        if (!$this->getUser()->isLoggedIn()) {
            $this->redirect('Sign:in');
        }
    }
    public function renderHome(): void
    {
        $this->getTemplate()->title = 'Home';
    }
    public function renderAbout(): void
    {
        $this->getTemplate()->title = 'About';
    }
    public function renderNews(): void
    {
        $this->getTemplate()->title = 'News';
    }
    public function renderLogIn(): void
    {
        $this->getTemplate()->title = 'Sign in';
    }
    public function renderLogOut(): void
    {
        $this->getTemplate()->title = 'Sign out';
    }
}
