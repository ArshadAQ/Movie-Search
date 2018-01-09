<?php
class Details extends Controller{
	protected function Index(){
		$viewmodel = new DetailsModel();
		$this->returnView($viewmodel->Index(), false);
	}
}
?>