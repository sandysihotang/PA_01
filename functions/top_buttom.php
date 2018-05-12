<?php 
class top_buttom{
public function top($title){?>
        		<!DOCTYPE html>
<html lang="en">
<head>
  <title><?=$title?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
</head>
<style type="text/css">
    .img{
        width:300px;
        height: 300px;

    }
</style>
<body>
		<?php }

		public function buttom(){?>
                  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/jquery-3.3.1.slim.min.js"></script>
</body>

</html>

		<?php }
    }
 ?>