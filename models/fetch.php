<?php
class FetchModel extends Model{
	public function Index(){
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		// echo ;

		// print_r($post);

		if(isset($post['movie1']))
		{
			$titleInput = "s=" . str_replace(' ', '+', $post['movie1']).'&apikey=3ca3eba0';
			if(isset($post['page']))
			{
				if($post['page'] > 0)
		    		$titleInput = "s=" . str_replace(' ', '+', $post['movie1']).'&apikey=3ca3eba0'.'&page='.$post['page'];
			}
		    $jsonUrl = "http://www.omdbapi.com/?" . $titleInput;

		    $jsonRaw = file_get_contents($jsonUrl);    
			$movieArray = json_decode($jsonRaw, true);

			$movieArray['movie_search'] = $post['movie1'];

			if(isset($post['page']))
				$movieArray['page_no'] = $post['page'];
			else
				$movieArray['page_no'] = 1;

			// header("Content-type: application/json");
   //  		print(json_encode($movieArray, JSON_PRETTY_PRINT));

			return $movieArray;
		}
		// else if($_GET['imdbid'])
		// {
		//     $titleInput = "i=" . str_replace(' ', '+', $_GET['imdbid']);
		//     $jsonUrl = "http://www.omdbapi.com/?" . $titleInput; 
		// }
	}
}
?>