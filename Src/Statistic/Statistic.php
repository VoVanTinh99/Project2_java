<h3 class="w3_inner_tittle two text-center">Statistic</h3>
<a class="btn btn-primary" href="?page=more_statistic">Views more <i class="fa fa-plus"></i></a>
</br>
</br>
<center>
	<div class="statistic">
		<div id="chart_div" style="width: 800px; height: 500px;"></div>
		<div style="width: 1000px; height: 360px">
				<div id="piechart_Vietnam" style="width: 499px; height: 350px; float: left"></div>
				<div id="piechart_Fruit" style="width: 499px; height: 350px; float: left"></div>
		</div>
	</div>
	<div style="width: 100%">
		<a class="btn btn-primary" href="?page=more_statistic" style="width: 100%">Views more <i class="fa fa-plus"></i></a>
	</div>
</center>
<!-- Nhúng thư viện Google Chart -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- Biểu đồ cột và tròn -->
<?php statisticOrderWineDetails(); ?>

<?php	statisticByCategory("Vietnam");	?>

<?php	statisticByCategory("Fruit");	?>
