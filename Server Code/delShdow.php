<?php

if (isset($_POST['delete'])) {
		
		$doc = new DOMDocument; 
		$doc->load('show.xml');

		$thedocument = $doc->documentElement;

		//this gives you a list of the messages
		$list = $thedocument->getElementsByTagName('show')->item($_POST['delete']);

		//figure out which ones you want -- assign it to a variable (ie: $nodeToRemove )
		$nodeToRemove = $list;
		if ($nodeToRemove != null)
		$thedocument->removeChild($nodeToRemove);

		$doc->saveXML(); 
		
		$path_dir= "show.xml"; 
		$fp = fopen($path_dir, 'w');
		
		$write = fwrite($fp, $doc->saveXML());
	}
?>