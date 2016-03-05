<html>
<head>

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>

<body>
<?php


include('/dom/simple_html_dom.php');

	$surl=$_GET["starmusic"];
	$sturl=$_GET["streamurl"];
	$durl=$_GET["durationurl"];


$html = file_get_html($surl);

// Find all article blocks
$count=0;
echo "<div class='container-fluid'>";


echo "<div class='page-header'>";
echo "<h1>";
        
 foreach($html->find('table.main_tb2 td h1') as $article) {
	
if($count==2)
    echo $article;
    $count++;
}

echo "</h1>";
echo "</div>";
$count=0;




	?>


<!--Movie Details-->

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
       	<?php
          	foreach($html->find('table.main_tb2 tr p') as $article) {
            if($count<8)
            echo $article;
            $count++;
            }
          	?>

    </div>
        <div class="col-md-8">
           	<h1>Over All Zip File Url:</h1>
          		<?php
          		$count=0;
            	foreach($html->find('td[width=320] a') as $article) {
                if($count<8)
                echo $article->href;
                $count++;
                }

          	?>

        </div>
      </div>
    </div>




<div class="container-fluid">
    
  <table class="table">
    <thead>
      <tr>
        <th>Song Name</th>
        <th>Download URL</th>
       </tr>
    </thead>
    <tbody>
    
      



			




   

			<?php
          		$count=0;
          		$i=0;
              	foreach($html->find('table.main_tb2 tr h2') as $article) {
              	echo "<tr>";
                if($count>4)
                {
                echo "<td>".$article->innertext."</td>";
                $i++;
                $j=0;
                foreach($html->find('table.main_tb2 tr a') as $article) {
               if($article->innertext=="Download")
               	{$j++;}
               	if($i==$j){
                echo "<td>http://www.starmusiq.com/".$article ->href."</td>";break;}
        		}
                }
                $count++;
                echo "</tr>";
               
                }

          	?>
</tr>
           
 </tbody>
  </table>
</div>


<h1>Stream Web Site</h1>






<div class="container-fluid">
    
  <table class="table">
    <thead>
      <tr>
        <th>Song Name</th>
        <th>Download URL</th>
       </tr>
    </thead>
    <tbody>
    
        

			<?php

			$html2 = file_get_html($sturl);
          		$count=0;
          		$i=0;
              	foreach($html2->find('span.songlist') as $article) {
              	echo "<tr>";
                echo "<td>".$article->innertext."</td>";
                $i++;
                $j=0;
                foreach($html2->find('span.download a') as $article) {
                $j++;
               	if($i==$j){
                echo "<td>".$article ->href."</td>";break;}
        		}
                
                $count++;
                echo "</tr>";
               
                }

          	?>
</tr>
           
 </tbody>
  </table>
</div>














</body>

</html>