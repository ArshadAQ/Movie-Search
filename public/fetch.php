<?php
class Fetch extends Controller{
	protected function Index(){
		$viewmodel = new FetchModel();
		$this->returnView($viewmodel->Index(), false);
	}
}