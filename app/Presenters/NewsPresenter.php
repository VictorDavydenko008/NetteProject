<?php

namespace App\Presenters;
use Nette;
class NewsPresenter extends Nette\Application\UI\Presenter
{
    public function renderArticles(){
        $this->getTemplate()->title = 'News';
        $this->getTemplate()->news = [['title'=>'Title 1', 'text' => 'Some text'], ['title'=>'Title 2', 'text' => 'Another text']];
    }
}