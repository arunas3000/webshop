<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(isset($_POST['search'])) {
		
		$search_term = test_input($_POST['keyword']); 
	
		header("Location: search.php?keyword={$search_term}&page=0" );
	}
