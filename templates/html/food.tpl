<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Matoppskrift</title>
  <link rel="stylesheet" href="css/food.css" />
  <script>
    window.onkeydown = function(event){
      if(event.keyCode === 32) {
	event.preventDefault();
	document.getElementById("new").click();
      }
    };
  </script>
</head>
<body>
<div class="background">
 <div class="outerbox">
  <div class="innerbox">
   <div class="result">
    {$result}
   </div>
   <div>
    <img class="picture" src="https://source.unsplash.com/320x240/?food" />
   </div>
  </div>
 </div>
</div>
<div class="share">
  <span class="share_new"><a id='new' href="?id">Ny oppscript</a></span>
  <span class="share_id"><a id='share' href="?id={$id}">Del oppscript</a></span>
</div>
<div class="about">
  <a href="https://github.com/ruskilli/recipe">Source at GitHub</a>
  <br>
  <img src="https://github.com/ruskilli/recipe/workflows/Build/badge.svg?{$time}" alt="Build status" />
</div>
</body>
</html>
