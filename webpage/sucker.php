<?php 
	$name_isvalid = isset($_REQUEST["name"]) && ($_REQUEST["name"] != "");
	$section_isvalid = isset($_REQUEST["section"]) && ($_REQUEST["section"] != "");
	$cardnumber_isvalid = isset($_REQUEST["card_number"]) && ($_REQUEST["card_number"] != "");
	$cardtype_isvalid = isset($_REQUEST["card_type"]) && ($_REQUEST["card_type"] != "");

	$isfilled = $name_isvalid && $section_isvalid && $cardnumber_isvalid && $cardtype_isvalid;
 ?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<!-- saved from url=(0075)http://www.webstepbook.com/supplements/labsection/lab4-buyagrade/sucker.php -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Buy Your Way to a Better Education!</title>
		<link href="./buyagrade.css" type="text/css" rel="stylesheet">
	</head>

	<body>

		<?php
			if($isfilled){
				$filename = "./suckers.txt";
				$record = "\n" . implode(";" , $_REQUEST);
				file_put_contents($filename, $record, FILE_APPEND);
			
		 ?>

		<h1>Thanks, sucker!</h1>

		<p>Your information has been recorded.</p>

		<dl>
			<dt>Name</dt>
			<dd>
				<?= $_REQUEST["name"] ?>
			</dd>

			<dt>Section</dt>
			<dd>
				<?= $_REQUEST["section"] ?>
			</dd>

			<dt>Credit Card</dt>
			<dd>
				<?= $_REQUEST["card_number"] . " (" . $_REQUEST["card_type"] . ")"?>
			</dd>
		</dl>
	
		<p>Here are all the suckers who have submitted here:</p>
		<pre>
			<?php print(file_get_contents($filename)) ?>
		</pre>

		<?php
		 } 
		else{
		?>
		
		<h1>Sorry</h1>
		<p>You didn't fill out the form completely. <a href="./buyagrade.html">Try again?</a></p>
		<?php } ?>
  </body></html>