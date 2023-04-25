<?php
namespace App\Presenters;

use JetBrains\PhpStorm\NoReturn;
use Nette;
use Nette\Application\AbortException;
use Nette\Application\UI\Form;

final class SignPresenter extends Nette\Application\UI\Presenter
{
    protected function createComponentSignInForm(): Form
    {
        $form = new Form;
        $form->addText('username', 'Username:')
            ->setRequired('Please enter your username.');

        $form->addPassword('password', 'Password:')
            ->setRequired('Please, enter your password.');

        $form->addSubmit('send', 'Sign in');

        $form->onSuccess[] = [$this, 'signInFormSucceeded'];
        return $form;
    }

    /**
     * @throws AbortException
     */
    public function signInFormSucceeded(Form $form, \stdClass $data): void
    {
        try {
            $this->getUser()->login($data->username, $data->password);
            $this->redirect('MainPages:home');

        } catch (Nette\Security\AuthenticationException $e) {
            $form->addError('Incorrect username or password.');
        }
    }

    /**
     * @throws AbortException
     */
    #[NoReturn] public function actionOut(): void
    {
        $this->getUser()->logout();
        $this->flashMessage('You have been signed out.');
        $this->redirect('MainPages:home');
    }
}
