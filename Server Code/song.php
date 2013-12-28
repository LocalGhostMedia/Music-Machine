	<html>
	    
	    <head>
	        <title>Add A Song</title>
			
		
			<script>
			var i=0;
			function addShow(){
				document.getElementById("showForm").innerHTML+='<div id="table'+i+'"><br><hr><img src="images/cancel.png" onClick="delShow('+i+')" style="cursor:pointer;width:30px;float:right;" /><table><tr><td>Song Name:</td><td><input type="text" name="show" size="50"></td></tr><tr><td>iTunes URL (Optional):</td></tr></table></div>'
				i++;
			}
			function delShow(num){
				
				document.getElementById("table"+num).style.display="none";
				document.forms["form"+num].submit();

			}
			//setTimeout('document.getElementById("xml").style.display="none"',4000);
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
	    #file{

	   		padding:0px!important;
	   		background:transparent!important;

	   }
	   
			</style>
		
	    </head>
	    
	    <body>
	       <a href="index2.html"> <div >Go Home</div></a> <center><h2>Add A Song</h2></center>
			 
	        <form method="POST" enctype="multipart/form-data" style="margin-top:0px!important" class="form-wrapper cf" action="song.php">
				<div id="showForm">
					<br>
					<table>
						<tr>
							<td>Song Name:</td><td>
								<input type="text" name="title" size="50">
							</td>
						</tr>
						<!-- feature coming soon to link right to itunes sstore for music -->
						 <tr>
							<td>iTunes URL(Coming Soon):</td><td>
								<input type="text" name="itunes" size="50">
							</td>
						</tr> 
						<tr>
							<td>Song file:</td><td>
								<input type="file" name="uploadedfile" id='file'>
							</td>
						</tr>

					</table>
					
				   </div>
	            
				<input class="form-wrapper cf"style="left:90px;height:50px;top:50px;cursor:pointer;position:relative;"type="submit" value="Add Song" name="create">
				<!--<div  style="cursor:pointer;width:450px;" onclick="addShow();" id="addShow">Add Show</div>-->
	        
	        </form>
			<?php
				$hashedfilename;
				$filename;

				if(isset($_POST['title'])){
					//**********************************************************************************************
					 
					 
					//echo "Please wait while we attempt to upload your file...<br><br>";
					 
					//**********************************************************************************************
					 
					 
					$target_path = "upload/";
					 
					$flag = 0; // Safety net, if this gets to 1 at any point in the process, we don't upload.
					 
					$filename = $_FILES['uploadedfile']['name'];
					$filesize = $_FILES['uploadedfile']['size'];
					$mimetype = $_FILES['uploadedfile']['type'];
					 
					$filename = htmlentities($filename);
					$filesize = htmlentities($filesize);
					$mimetype = htmlentities($mimetype);
					 
					$target_path = $target_path . basename( $filename );
					 
					if($filename != ""){
					 
					//echo "Beginning upload process for file named: ".$filename."<br>";
					//echo "Filesize: ".$filesize."<br>";
					//echo "Type: ".$mimetype."<br><br>";
					 
					}
					 
					//First generate a MD5 hash of what the new file name will be
					//Force a MP3 extention on the file we are uploading
					 
					$hashedfilename = md5($filename);
					$hashedfilename = $hashedfilename.".mp3";
					 
					//Check for empty file
					if($filename == ""){
					$error = "No File Exists!";
					$flag = $flag + 1;
					 
					}
					 
					//Now we check that the file doesn't already exist.
					$existname = "upload/".$filename;
					 
					if(file_exists($existname)){
					
					unlink($existname);
				
					}
					 
					//Whitelisted files - Only allow files with MP3 extention onto server...
					 
					$whitelist = array(".mp3");
					foreach ($whitelist as $ending) {
					 
					if(substr($filename, -(strlen($ending))) != $ending) {
					 $error = "The file type or extention you are trying to upload is not allowed!  
					You can only upload MP3 files to the server!";
					$flag++;
					}
					}
					 
					 
					//Now we check the filesize.  If it is too big or too small then we reject it
					//MP3 files should be at least 1MB and no more than 6.5 MB
					 
					if($filesize > 69206000){
					//File is too large
					 
					if($flag == 0){
					$error = "The file you are trying to upload is too large!  
					Your file can be up to 6.5 MB in size only.  
					Please upload a smaller MP3 file or encode your file with a lower bitrate.";
					}
					 
					$flag = $flag + 1;
					}
					 
					if($filesize < 2286){
					//File is too small
					 
					if($flag == 0){
					$error = "The file you are trying to upload is too small!
					Your file has been marked as suspicious because our system has
					determined that it is too small to be a valid MP3 file.
					Valid MP3 files must be bigger than 1 MB and smaller than 6.5 MB.";
					}
					 
					$flag = $flag + 1;
					 
					}
					 
					//Check the mimetype of the file
					/*if($mimetype != "audio/x-mp3" and $mimetype != "audio/mpeg"){
					 
					if($flag == 0){
					$error = "The file you are trying to upload does not contain expected data.
					Are you sure that the file is an MP3?";
					}
					 
					$flag = $flag + 1;
					}*/
					 
					//Check that the file really is an MP3 file by reading the first few characters of the file
					$f = @fopen($_FILES['uploadedfile']['tmp_name'],'r');
					$s = @fread($f,3);
					@fclose($f);
					if($s != "ID3"){
					 
					if($flag == 0){
					$error = "The file you are attempting to upload does not appear to be a valid MP3 file.";
					}
					 
					$flag++;
					}
					 
					 
					 
					//All checks are done, actually move the file...
					 
					if($flag == 0){
					 
					if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
					   
					 
					    //Change the filename to MD5 hash and FORCE a MP3 extention.
					 
					    if(@file_exists("upload/".$filename)){
					 
					    //Rename the file to an MD5 version
					    rename("upload/".$filename, "upload/".$hashedfilename);
					 
					    //echo "The file ".  basename( $filename ). "
					  //   has been uploaded.  Your file is <a href='upload/$filename'>here</a>.";
					   
					    }  
					    else{
					      echo "There was an error uploading the file, please try again!";
					    }
					 
					 
					} else{
					    echo "There was an error uploading the file, please try again!";
					}
					 
					}
					else {
					echo "File Upload Failed!<br>";
					if($error != ""){
					echo $error;
					}
					}
				}

				// -------------------------------------------------------//

				if (isset($_POST['title'])) {

					$title = $_POST['title'];
					$itunes = $_POST['itunes'];
					$url = 'upload/'.$hashedfilename;//$_FILES['uploadedfile']['name'];
				   
					 
					$json = file_get_contents('main.json'); 
					$data = json_decode($json, true);
	

					$songsNum = count($data['songs']);

					$data['songs'][$songsNum]['title'] = $title;
					$data['songs'][$songsNum]['itunes'] = $itunes;
					$data['songs'][$songsNum]['url'] = $url;
					
					$path_dir= "main.json"; 
					$fp = fopen($path_dir, 'w+');
					
					$sxe = json_encode($data);
					$write = fwrite($fp, $sxe); 
				
				} 

			if (isset($_POST['delete'])) {

					$json = file_get_contents('main.json'); 
					$data = json_decode($json, true);

					$songToDel = $_POST['delete'];
					$deleteURL = $data['songs'][$songToDel]['url'];

					unset($data['songs'][$songToDel]);

					$data['songs'] = array_values($data['songs']);

					echo'deleted off server :'.$deleteURL;

					$path_dir= "main.json"; 
					$fp = fopen($path_dir, 'w+');
					
					$sxe = json_encode($data);
					$write = fwrite($fp, $sxe); 

				}
			?>
			<?php
			$json = file_get_contents('main.json'); 
			$data = json_decode($json, true);
			$tableNum=0;
			//get elements from "<channel>"
			for($i=count($data['songs'])-1;$i>-1;$i--){

				$title =$data['songs'][$i]['title'];
			 	$itunes =$data['songs'][$i]['itunes'];
			 	$url =$data['songs'][$i]['url'];
								
				$tableNum++;
				print('<div class="xml-table cf" id="table'.$i.'"><div style="float:left;"> Song #'.$tableNum.'</div><br><hr><form method="post" name="form'.$i.'" action="song.php"><input type="hidden" name="delete" value="'.$i.'"/><img src="images/cancel.png" onClick="delShow('.$i.')" style="cursor:pointer;width:30px;float:right;" /></form><table><tr><td style="width:100px">Song Title:</td><td>'.$title.'</td></tr><tr><td>iTunes URL:</td><td>'.$itunes.'</td></tr><tr><td>URL to file:</td><td>'.$url.'</td></tr><tr><td>Listen to Song:</td><td><audio controls><source src="'.$url.'" type="audio/mpeg">Your browser does not support the audio element.</audio></td></tr></table></div>');
			
			}
			//get and output "<item>" elements
			
			?>


			
	    </body>
	
	</html>
