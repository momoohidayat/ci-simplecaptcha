<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Simple Captcha Example</title>
</head>
<body>

<div id="container">
<img src="<?php echo base_url()?>example/display_captcha" class="round4" />
<?php echo"<pre>";print_r($this->session->userdata);echo"</pre>";?>
</body>
</html>