<?php
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
// Doanh thu và lợi nhuân
function statisticOrderWineDetails() {
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
  echo '<script type="text/javascript">';
  // Biểu đồ cột
  echo "
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Wine', 'Quantity (unit: bottle)', 'Revenue (unit: $)', 'Profit (unit: $)'],";

  			$sql_statistic_orderwinedetail = "SELECT wine.WineName, sum(orderwinedetails.`WineOrderQuantity`) as OrderQuantity, sum(orderwinedetails.`WineSoldPrice`) as SoldPrice, sum(orderwinedetails.`WineOriginalPrice`) as OriginalPrice FROM `orderwinedetails` INNER JOIN `wine` ON orderwinedetails.WineOrderId = wine.WineId GROUP BY orderwinedetails.`WineOrderId`";
  		  $result_statistic_orderwinedetail = mysqli_query($conn,$sql_statistic_orderwinedetail);
  		  while ($row = mysqli_fetch_array($result_statistic_orderwinedetail)) {
  		  	echo "['";
  				echo $row['WineName'];
  				echo "',";
  				echo $row['OrderQuantity'];
  				echo ",";
  				echo $row['SoldPrice'];
  				echo ",";
  				$kq = $row['SoldPrice'] - $row['OriginalPrice'];
  				echo $kq;
  				echo "],";
  		  }
      echo "
      ]);

      var options = {
        chart: {
          title: 'Total sales',
          subtitle: 'Quantity, Revenue and Profit',
        }
      };

      var chart_div = new google.charts.Bar(document.getElementById('chart_div'));

      chart_div.draw(data, google.charts.Bar.convertOptions(options));
    }";
    echo '</script>';
}

// Tổng số lượng và thị phần
function statisticByCategory($categoryName) {
  echo '<script type="text/javascript">';
// Biểu đồ tròn
  echo "google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);";

  echo "
  function drawChart() {

  	var data_".$categoryName." = google.visualization.arrayToDataTable([
  		['Categories', 'Total market share'],";

  		$sql_statistic_category_vietnam = "SELECT * FROM `wine` INNER JOIN `category` ON wine.CategoryId = category.CategoryId WHERE category.CategoryName = '".$categoryName."'";
  		$result_statistic_category_vietnam = mysqli_query($conn, $sql_statistic_category_vietnam);
  		while ($row = mysqli_fetch_array($result_statistic_category_vietnam)) {
  			echo "['";
  			echo $row['WineName'];
  			echo "',";
  			$kq = (($row['WineQuantity'] + $row['WineSold']) - $row['WineQuantity']);
  			echo $kq;
  			echo "],";
  		}
    echo "
  	]);

  	var options_".$categoryName." = {
  		title: 'Total sales categories of ra and of the categories ".$categoryName."'
  	};

  	var chart_".$categoryName." = new google.visualization.PieChart(document.getElementById('piechart_".$categoryName."'));

  	chart_".$categoryName.".draw(data_".$categoryName.", options_".$categoryName.");
  }";
  echo '</script>';
}
?>
