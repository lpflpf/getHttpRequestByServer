<html>
	<link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	<body>
		<div class="container">
			<div class="row">
				<div class="span2">

					<div class="col-sm-7 col-sm-offset-5">
						<h1>URL & params</h1>
					</div>

					<div class="col-sm-2 col-sm-offset-10">
						<h5><b>Author</b>: lipengfei</h5>
					</div>

					<form action="index.php" method="post" class="form-horizontal">

							<div class="form-group">
								<label class="col-sm-2 control-label" for="inputHelpBlock">URL:</label>
								<div class="col-sm-10">
		      						<input class="form-control" name="URL" id="inputHelpBlock" placeholder="url">
		    					</div>
							</div>
							<div id="params">
							</div>

						<div class="form-group">
							<div class="col-sm-offset-5 col-sm-1">
								<button type="submit" class="btn btn-default">submit</button>
							</div>
							<div class="col-sm-2">
								<button type="button" class="btn btn-default" id="addParams">add Params</button>
							</div>
						</div>

					</form>
				</div>
			</div>

			<div class="row col-sm-0">
		</div>				<?php
					if (isset($_POST['URL'])){
						$url = $_POST['URL'];
						if (isset($_POST['Param']))
						{
							$params = $_POST['Param'];
							$url=vsprintf($url,$params);
						}
						$curl = curl_init();
						curl_setopt($curl, CURLOPT_URL, $url);
						curl_setopt($curl, CURLOPT_HEADER, 0);
						curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
						$data = curl_exec($curl);
						curl_close($curl);
						print_r($data);
					}
				?>
	
		</div>
	<script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script language="javascript">
		$("#addParams").bind("click", function(){
			var txt = "<div class=\"form-group\">\
								<label class=\"col-sm-2 control-label\" for=\"inputHelpBlock\">Param:</label>\
								<div class=\"col-sm-10\">\
		      						<input class=\"form-control\" name=\"Param[]\" id=\"inputHelpBlock\" placeholder=\"param\">\
		    					</div>\
							</div>";
			$("#params").append(txt);
		});
	</script>
</body>
</html>
