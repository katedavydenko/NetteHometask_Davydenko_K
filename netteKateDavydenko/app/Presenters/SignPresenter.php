<?php

namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;

final class SignPresenter extends Nette\Application\UI\Presenter
{
    protected function createComponentSignInForm(): Form
    {
        $form = new Form;
        $form->addText('username', 'Username:')
            ->setRequired('Please enter your username.');

        $form->addPassword('password', 'Password:')
            ->setRequired('Please enter your password.');

        $form->addSubmit('send', 'Sign in');

        $form->onSuccess[] = [$this, 'signInFormSucceeded'];
        return $form;
    }

    public function signInFormSucceeded(Form $form, \stdClass $data): void
    {
        try {
            $this->getUser()->login($data->username, $data->password);
            $this->redirect('News:show');

        } catch (Nette\Security\AuthenticationException $e) {
            $form->addError('Incorrect username or password.');
        }
    }

    public function actionOut(): void
    {
        $this->getUser()->logout();
        $this->flashMessage('You have been signed out.');
        $this->redirect('MainPages:home');
    }

    protected function createComponentSignUpForm()
    {
        $form = new Form;
        $form->addText('username', 'Username:')
            ->setRequired('Please enter your username.');

        $form->addPassword('password', 'Password:')
            ->setRequired('Please enter your password.');

        $form->addPassword('password2', 'Password2:')
            ->setRequired('Please enter your password2.')
            ->addRule(Nette\Forms\Form::EQUAL, 'Passwords do not match', $form['password']);

        $form->addPassword('email', 'E-mail:')
            ->setRequired('Please enter your E-mail.')
            ->addRule(Nette\Forms\Form::EMAIL, 'Wrong form of E-mail', $form['email']);
        $form->addSubmit('send', 'Sign up');

        $form->onSuccess[] = [$this, 'signUpFormSucceeded'];
        return $form;

    }

    public function signUpFormSucceeded(Form $form, \stdClass $data): void
    {
        $this->flashMessage('Youve registred succesfuly');
        $this->flashMessage('Your login: ' . $data->username);
        $this->flashMessage('Your password: ' . $data->password);
        $this->redirect('MainPages:home');

    }
}
