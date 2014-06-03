<?php

namespace App\Presenters;

use Nette,
	Nette\Application\UI\Form;



class PresentationPresenter extends BasePresenter
{
	/** @var Nette\Database\Context */
	private $database;


	public function __construct(Nette\Database\Context $database)
	{
		$this->database = $database;
	}


	public function renderShow($presentationId)
	{
		$presentation = $this->database->table('presentation')->get($presentationId);
		if (!$presentation) {
			$this->error('Presentation not found');
		}

		$this->template->presentation = $presentation;
	}

}
