<h3 class="w3_inner_tittle two text-center">Statistic</h3>
<a class="btn btn-primary" href="?page=statistic">Return <i class="fa fa-backward"></i></a>
</br>
</br>
<center>
	<div class="statistic">
		<div id="chart_div" style="width: 800px; height: 500px;"></div>
		<div style="width: 1000px; height: 780px">
			<div id="piechart_Vietnam" style="width: 499px; height: 250px; float: left"></div>
			<div id="piechart_Fruit" style="width: 499px; height: 250px; float: left"></div>
			<div id="piechart_Chivas" style="width: 499px; height: 250px; float: left"></div>
			<div id="piechart_Vodka" style="width: 499px; height: 250px; float: left"></div>
			<div id="piechart_Whisky" style="width: 499px; height: 250px; float: left; margin: 0 248px 0 248px"></div>
		</div>
	</div>
</center>
<!-- Nhúng thư viện Google Chart -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- Biểu đồ cột và tròn -->
<?php statisticOrderWineDetails(); ?>

<?php	statisticByCategory("Vietnam");	?>

<?php	statisticByCategory("Fruit");	?>

<?php	statisticByCategory("Chivas");	?>

<?php	statisticByCategory("Vodka");	?>

<?php	statisticByCategory("Whisky");	?>
