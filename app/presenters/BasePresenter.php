<?php

namespace App\Presenters;

use Nette,
	App\Model;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
	public $texy;

	public function injectTexy(\Texy $texy)
	{
		$this->texy = $texy;
	}

	protected function createTemplate($class = NULL)
	{
		$template = parent::createTemplate($class);

		$template->registerHelper('texy', callback($this->texy, 'process'));

		return $template;
	}
}
