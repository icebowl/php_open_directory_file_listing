<html>
<head>
<title> php open directory </title>
<style>
html{
 font-family: system-ui, sans-serif;
}

body{
    background-color: #fff;
    color: #2aa198;
   font-family: system-ui, sans-serif;
}
a{
  color: #268bd2;
  text-decoration: none;
}

a:hover{
  color: #2aa198;
}

.location{
  position:absolute;
  top:110px;
  left:10%;
  font-family: system-ui , sans-serif;
  background-color: #fff ;
  color: #2aa198;
  border: solid 5px;
  border-style: solid;
  border-color: #586e75;
  border-radius: 30px;
  padding : 10px;

}

</style>
</head>
<body>
<img src = "img/logo.png" height = "100px">
<div class = "location">

<?php
//error_reporting(0);
error_reporting(E_ALL);
ini_set('display_errors', 1);
//


//
$count = 0;
$filelist = array();
$filename = array();
$imgname = array();
if ($handle = opendir('.')) {
  while (false !== ($file = readdir($handle))){
    if ($file != "." &&  $file != "index.php" &&  $file != ".htaccess"  &&  $file != "img" &&  $file != "css" && $file != "js" && $file != ".git"  ){
      $imgname[$count] = "file.png";
      			if (false === strpos((string)$file ,'.'))$imgname[$count] = "folder.png";

      $filelist[$count] = $file;
      if ($file == ".."){
        $file = "RETURN TO PARENT FOLDER";
      }
        $filename[$count] = $file;
        $count = $count + 1;
      }
    }
    closedir($handle);
  }
?>

<?php
// search for ".."
// check for ..
$parent = -1;
for ($i = 0; $i < sizeof($filelist);$i++){
  if ($filelist[$i] == ".."){
    $parent = $i;
	}
}
// html gets built below:
for ($i = 0; $i < sizeof($filelist);$i++){
    if ($i == $parent) continue;
  echo "<img src = 'img/".$imgname[$i]."'>";
  echo "<a href = '"."$filelist[$i]"."'>"."$filename[$i]"." </a><br>";
}
// display back arrow
echo "<br /><a href = '"."$filelist[$parent]"."'>"."<img src = 'img/back.png'></a>";
echo "&nbsp;<a href = '"."$filelist[$parent]"."'>"."$filename[$parent]"."</a>";
?>

</h2>
</div>

</body>
</html>
