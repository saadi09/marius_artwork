<?= $this->extend('default_layout') ?>
<?= $this->section('content') ?>
<div class="wrapper wrapper-content">
	<div class="row">
	<div class="col-lg-3">
		<div class="ibox ">
			<div class="ibox-title">
				<div class="ibox-tools">
				</div>
				<h5>Customers</h5>
			</div>
			<div class="ibox-content">
				<h1 class="no-margins">10</h1>
				<div class="stat-percent font-bold text-success"><!-- <i class="fa fa-bolt"></i> -->
				</div> <small>Total Customers</small>
			</div>
		</div>
	</div>
	<div class="col-lg-3">
		<div class="ibox ">
			<div class="ibox-title">
				<div class="ibox-tools">
				</div>
				<h5>Artists</h5>
			</div>
			<div class="ibox-content">
				<h1 class="no-margins">5</h1>
				<div class="stat-percent font-bold text-success"><!-- <i class="fa fa-bolt"></i> -->
				</div> <small>Total Artists</small>
			</div>
		</div>
	</div>
	<div class="col-lg-3">
		<div class="ibox ">
			<div class="ibox-title">
				<div class="ibox-tools">
				</div>
				<h5>Pending Artworks</h5>
			</div>
			<div class="ibox-content">
				<h1 class="no-margins">5</h1>
				<div class="stat-percent font-bold text-success"><!-- <i class="fa fa-bolt"></i> -->
				</div> <small>Total Pending Artworks</small>
			</div>
		</div>
	</div>
	<div class="col-lg-3">
		<div class="ibox ">
			<div class="ibox-title">
				<div class="ibox-tools">
				</div>
				<h5>Approved Artworks</h5>
			</div>
			<div class="ibox-content">
				<h1 class="no-margins">5</h1>
				<div class="stat-percent font-bold text-success"><!-- <i class="fa fa-bolt"></i> -->
				</div> <small>Total Approved Artworks</small>
			</div>
		</div>
	</div>
</div>	
<?= $this->endSection() ?>