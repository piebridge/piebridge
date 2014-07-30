<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->use_view();
		$this->display();
	}
}