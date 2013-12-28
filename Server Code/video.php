<html>
    
    <head>
        <title>Add A Video (Coming Soon)</title>
		
	
		<script>
		var i=0;
		function addShow(){
			document.getElementById("showForm").innerHTML+='<div id="table'+i+'"><br><hr><img src="images/cancel.png" onClick="delShow('+i+')" style="cursor:pointer;width:30px;float:right;" /><table><tr><td>Title:</td><td><input type="text" name="show" size="50"></td></tr><tr><td>Youtube ID:</td><td><input type="text" name="date" size="50"></td></tr><tr><td>Content:</td><td><input type="text" name="venue" size="50"></td></tr><tr><td>description:</td><td><input type="text" name="description" size="50"></td></tr><tr><td>price:</td><td><input type="text" name="price" size="50"></td></tr></table></div>'
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
    
   #thumbnail{

   		padding:0px!important;
   		background:transparent!important;

   }
		</style>
	<?php
	
if (isset($_POST['title'])) {



	/*$thumb;
	list($width, $height) = getimagesize($_FILES['file']['tmp_name']);
	
	$maxWidth= 400;
	$maxHeight= 200;

	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$extension = end(explode(".", $_FILES["file"]["name"]));
	if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/png")
	|| ($_FILES["file"]["type"] == "image/pjpeg"))
	&& in_array($extension, $allowedExts)&&$width==$maxWidth&&$height==$maxHeight)
	  {
	  if ($_FILES["file"]["error"] > 0)
	    {
	    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
	    }
	  else
	    {
	    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
	    echo "Type: " . $_FILES["file"]["type"] . "<br>";
	    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
	    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

	    if (file_exists("upload/" . $_FILES["file"]["name"]))
	      {
	      //echo $_FILES["file"]["name"] . " already exists. ";
	       $thumb = "upload/" . $_FILES["file"]["name"];
	      }
	    else
	      {
	      move_uploaded_file($_FILES["file"]["tmp_name"],
	      "upload/" . $_FILES["file"]["name"]);
	      //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
	      $thumb = "upload/" . $_FILES["file"]["name"];
	      }
	    }
	  }
	else
	  {
	  echo "<span style='color:red;font-size:30pt'>Invalid file, must be 400 by 200</span>";
	  $thumb='';
	  }*/
	$title = $_POST['title'];
    $link = $_POST['link'];
    
	$json = file_get_contents('main.json'); 
	$data = json_decode($json, true);
	

	$videoNum = count($data['videos']);//[0]['title']);
	
	/*
	$file = "video.xml"; 
	$fp2 = fopen($file, "r"); 
	$data = fread($fp2, 80000);  
	
	$sxe = new SimpleXMLElement($data);
	*/
	$data['videos'][$videoNum]['title'] = $title;
	$data['videos'][$videoNum]['link'] = $link;
	/*
	$show = $sxe->addChild('video');
	$show->addChild('title', $title);
	$show->addChild('link', $link);
	$show->addChild('thumb', $thumb);
	*/

	$path_dir= "main.json"; 
	$fp = fopen($path_dir, 'w+');
	
	$sxe = json_encode($data);
	$write = fwrite($fp, $sxe); 
	
	} 

if (isset($_POST['delete'])) {


		$json = file_get_contents('main.json'); 
		$data = json_decode($json, true);

		$vidToDel = $_POST['delete'];

		unset($data['videos'][$vidToDel]);

		$data['videos'] = array_values($data['videos']);
		
		$path_dir= "main.json"; 
		$fp = fopen($path_dir, 'w+');
		
		$sxe = json_encode($data);
		$write = fwrite($fp, $sxe); 
		
	/*	$doc = new DOMDocument; 
		$doc->load('video.xml');

		$thedocument = $doc->documentElement;

		//this gives you a list of the messages
		$list = $thedocument->getElementsByTagName('video')->item($_POST['delete']);

		//figure out which ones you want -- assign it to a variable (ie: $nodeToRemove )
		$nodeToRemove = $list;
		if ($nodeToRemove != null)
		$thedocument->removeChild($nodeToRemove);

		$doc->saveXML(); 
		
		$path_dir= "video.xml"; 
		$fp = fopen($path_dir, 'w');
		
		$write = fwrite($fp, $doc->saveXML());*/
	}
	
?>
    </head>
    
    <body>
       <a href="index2.html"> <div>Go Home</div></a> <center><h2>Add A Video</h2></center>
		 
        <form method="POST" style="margin-top:0px!important" class="form-wrapper cf" action="" enctype="multipart/form-data">
			<div id="showForm">
				<br>
				<table>
					<tr>
						<td>Title:</td><td>
							<input type="text" name="title" size="50">
						</td>
					</tr>
					<tr>
						<td>YouTube Id of Video:</td><td>
							<input type="text" name="link" size="40">
						</td>
					</tr>
					<!-- <tr>
						<td>Thumbnail:</td><td>
							<input type="file" name="file" id='thumbnail'>
						</td>
					</tr> -->
				</table>
				
			   </div>
            
			<input class="form-wrapper cf"style="left:90px;height:50px;top:50px;cursor:pointer;position:relative;"type="submit" value="Add Update" name="create">
			<!--<div  style="cursor:pointer;width:450px;" onclick="addShow();" id="addShow">Add Show</div>-->
        
        </form>
		
		<?php
		$json = file_get_contents('main.json'); 
		$data = json_decode($json, true);

		$tableNum=0;
		//get elements from "<channel>"
		for($i=count($data['videos'])-1;$i>-1;$i--){

			 $title =$data['videos'][$i]['title'];
			 $link =$data['videos'][$i]['link'];

			/*$channel=$xmlDoc->getElementsByTagName('video')->item($i);
			$title = $channel->getElementsByTagName('title')
			->item(0)->nodeValue;
			$link = $channel->getElementsByTagName('link')
			->item(0)->nodeValue;
			$thumb = $channel->getElementsByTagName('thumb')
			->item(0)->nodeValue;*/
			
			$tableNum++;
			print('<div class="xml-table cf" id="table'.$i.'"><div style="float:left;"> Video #'.$tableNum.'</div><br><hr><form method="post" name="form'.$i.'" action="video.php"><input type="hidden" name="delete" value="'.$i.'"/><img src="images/cancel.png" onClick="delShow('.$i.')" style="cursor:pointer;width:30px;float:right;" /></form><table><tr><td>Title:</td><td>'.$title.'</td></tr><tr><td>Video:</td><td><center><iframe width="100%" height="200px" src="//www.youtube.com/embed/'.$link.'" frameborder="0"  ></iframe></center></td></tr></table></div>');
		
		}

		/* add for image :<tr><td>Thumbnail:</td><td><img src="'.$thumb.'"/></td></tr>*/
		//get and output "<item>" elements
		
		?>


		
    </body>

</html>
