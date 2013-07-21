<html>
    
    <head>
        <title>Add A Show</title>
		
	
		<script>
		var i=0;
		function addShow(){
			document.getElementById("showForm").innerHTML+='<div id="table'+i+'"><br><hr><img src="images/cancel.png" onClick="delShow('+i+')" style="cursor:pointer;width:30px;float:right;" /><table><tr><td>Show Title:</td><td><input type="text" name="show" size="50"></td></tr><tr><td>Date:</td><td><input type="text" name="date" size="50"></td></tr><tr><td>Venue:</td><td><input type="text" name="venue" size="50"></td></tr><tr><td>Location:</td><td><input type="text" name="location" size="50"></td></tr><tr><td>price:</td><td><input type="text" name="price" size="50"></td></tr></table></div>'
			i++;
		}
		function delShow(num){
			
			document.getElementById("table"+num).style.display="none";
			document.forms["form"+num].submit();

		}
		setTimeout('document.getElementById("xml").style.display="none"',4000);
		</script>
		
		<style type="text/css">
			
			 body {
        background: #555 url(images/download.png);
		font: 13px 'Lucida sans', Arial, Helvetica;
        color: #eee;
        text-align: center;
    }
    
    a {
        color: #ccc;
    }
    
    /*-------------------------------------*/
    
    .cf:before, .cf:after{
      content:"";
      display:table;
    }
    
    .cf:after{
      clear:both;
    }

    .cf{
		width:500px;
      zoom:1;
    }

    /*-------------------------------------*/	
    
    .form-wrapper {
        padding: 15px;
        margin: 0px auto 50px auto;
        background: #444;
        background: rgba(0,0,0,.2);
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border-radius: 10px;
        -moz-box-shadow: 0 1px 1px rgba(0,0,0,.4) inset, 0 1px 0 rgba(255,255,255,.2);
        -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.4) inset, 0 1px 0 rgba(255,255,255,.2);
        box-shadow: 0 1px 1px rgba(0,0,0,.4) inset, 0 1px 0 rgba(255,255,255,.2);
    }
    .xml-table {
        padding: 15px;
        margin: 5px auto 50px auto;
        background: #444;
        background: rgba(0,0,0,.2);
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border-radius: 10px;
        -moz-box-shadow: 0 1px 1px rgba(0,0,0,.4) inset, 0 1px 0 rgba(255,255,255,.2);
        -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.4) inset, 0 1px 0 rgba(255,255,255,.2);
        box-shadow: 0 1px 1px rgba(0,0,0,.4) inset, 0 1px 0 rgba(255,255,255,.2);
    }
	
    .form-wrapper input {
        width: 330px;
        height: 20px;
        padding: 10px 5px;
        float: left;    
        font: bold 15px 'lucida sans', 'trebuchet MS', 'Tahoma';
        border: 0;
        background: #eee;
        -moz-border-radius: 3px 0 0 3px;
        -webkit-border-radius: 3px 0 0 3px;
        border-radius: 3px 0 0 3px;      
    }
    
    .form-wrapper input:focus {
        outline: 0;
        background: #fff;
        -moz-box-shadow: 0 0 2px rgba(0,0,0,.8) inset;
        -webkit-box-shadow: 0 0 2px rgba(0,0,0,.8) inset;
        box-shadow: 0 0 2px rgba(0,0,0,.8) inset;
    }
    
    .form-wrapper input::-webkit-input-placeholder {
       color: #999;
       font-weight: normal;
       font-style: italic;
    }
    
    .form-wrapper input:-moz-placeholder {
        color: #999;
        font-weight: normal;
        font-style: italic;
    }
    
    .form-wrapper input:-ms-input-placeholder {
        color: #999;
        font-weight: normal;
        font-style: italic;
    }    
    
   
		</style>
	<?php
	
if (isset($_POST['title'])) {

	$title = $_POST['title'];
    $date = $_POST['date'];
    $venue = $_POST['venue'];
    $location = $_POST['location'];
    $price = $_POST['price'];
	 
	$file = "show.xml"; 
	$fp2 = fopen($file, "r"); 
	$data = fread($fp2, 80000);  
	
	$sxe = new SimpleXMLElement($data);
	
	$show = $sxe->addChild('show');
	$show->addChild('title', $title);
	$show->addChild('date', $date);
	$show->addChild('venue', $venue);
	$show->addChild('description', $location);
	$show->addChild('price', $price);
	
	$path_dir= "show.xml"; 
	$fp = fopen($path_dir, 'w+');
	
	$write = fwrite($fp, $sxe->asXML()); 
	
	} 

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
    </head>
    
    <body>
       <a href="index2.html"> <div >Go Home</div></a> <center><h2>Add A Show</h2></center>
		 
        <form method="POST" style="margin-top:0px!important" class="form-wrapper cf"action="show.php">
			<div id="showForm">
				<br>
				<table>
					<tr>
						<td>Show Title:</td><td>
							<input type="text" name="title" size="50"/>
						</td>
					</tr>
					<tr>
						<td>Date:</td><td>
							<input type="date" name="date" size="50"/>
						</td>
					</tr>
					<tr>
						<td>Venue:</td><td>
							<input type="text" name="venue" size="50"/>
						</td>
					</tr>
					 <tr>
						<td>Location:</td><td>
							<input type="text" name="location" size="50"/>
						</td>
					</tr>
					 <tr>
						<td>Price:</td><td>
							<input type="text" name="price" size="50"/>
						</td>
					</tr>
				</table>
				
			   </div>
            
			<input class="form-wrapper cf"style="left:90px;height:50px;top:50px;cursor:pointer;position:relative;"type="submit" value="Add Show" name="create">
			<!--<div  style="cursor:pointer;width:450px;" onclick="addShow();" id="addShow">Add Show</div>-->
        
        </form>
		
		<?php
		$xmlDoc = new DOMDocument();
		$xmlDoc->load('show.xml');
		$tableNum=0;
		//get elements from "<channel>"
		for($i=$xmlDoc->getElementsByTagName('show')->length-1;$i>-1;$i--){
			$channel=$xmlDoc->getElementsByTagName('show')->item($i);
			$title = $channel->getElementsByTagName('title')
			->item(0)->nodeValue;
			$date = $channel->getElementsByTagName('date')
			->item(0)->nodeValue;
			$venue = $channel->getElementsByTagName('venue')
			->item(0)->nodeValue;
			$location = $channel->getElementsByTagName('description')
			->item(0)->nodeValue;
			$price = $channel->getElementsByTagName('price')
			->item(0)->nodeValue;
			
			$tableNum++;
			print('<div class="xml-table cf" id="table'.$i.'"><div style="float:left;"> Show #'.$tableNum.'</div><br><hr><form method="post" name="form'.$i.'" action="show.php"><input type="hidden" name="delete" value="'.$i.'"/><img src="images/cancel.png" onClick="delShow('.$i.')" style="cursor:pointer;width:30px;float:right;" /></form><table><tr><td>Show Title:</td><td>'.$title.'</td></tr><tr><td>Date:</td><td>'.$date.'</td></tr><tr><td>Venue:</td><td>'.$venue.'</td></tr><tr><td>Location:</td><td>'.$location.'</td></tr><tr><td>Price:</td><td>$'.$price.'</td></tr></table></div>');
		
		}
		//get and output "<item>" elements
		
		?>


		
    </body>

</html>
