<?php
if (isset($_POST['show'])) {
    echo "Links Data Posted"; /* All Links data from the form is now being stored in variables in string format */
    $show = $_POST['show'];
    $date = $_POST['date'];
    $venue = $_POST['venue'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $xmlBeg = "<?xml version='1.0' encoding='UTF-8'?>";
    $rootELementStart = "<shows>";
    $rootElementEnd = "</shows>";
    $xml_document = $rootELementStart;
    $xml_document.= "<show>";
    $xml_document.= $show;
    $xml_document.= "</show>";
    $xml_document.= "<date>";
    $xml_document.= $date;
    $xml_document.= "</date>";
    $xml_document.= "<venue>";
    $xml_document.= $venue;
    $xml_document.= "</venue>";
    $xml_document.= "<description>";
    $xml_document.= $description;
    $xml_document.= "</description>";
    $xml_document.= "<price>";
    $xml_document.= $price;
    $xml_document.= "</price>";
    $xml_document.= $rootElementEnd;
    $path_dir= "show.xml"; /* Data in Variables ready to be written to an XML file */
	
	$file = "show.xml"; 
	$fp2 = fopen($file, "r"); 
	$data = fread($fp2, 80000); 
	
    $fp = fopen($path_dir, 'w+');
	
    $write = fwrite($fp, $data.$xml_document); /* Loading the created XML file to check contents */
   
    echo "<br> Checking the loaded file <br>".$path_dir."<br>";
    echo "<br><br>Whats inside loaded XML file?<br>";
 
	} 
?>