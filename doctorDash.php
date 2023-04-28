<!DOCTYPE html>
<html>


<?php
require ('connection.php');
if (substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1) == "doctorDash.php") {
	header("Location: index.php");
}
require("head.php");
?>

<body>
	<!-- Pre Loader -->
	<div class="loading">
		<div class="spinner">
			<div class="double-bounce1"></div>
			<div class="double-bounce2"></div>
		</div>
	</div>
	<!--/Pre Loader -->

	<div class="wrapper">
		<!-- Sidebar -->
		<?php
		include_once("doctor-nav.php");
		?>
		<!-- /Sidebar -->
		<!-- Page Content -->
		<div id="content">
			<!-- Top Navigation -->
			<?php
			include_once("top-nav.php");
			?>
			<!-- /Top Navigation -->
			<!-- Breadcrumb -->
			<!-- Page Title -->
			<div class="row no-margin-padding">
				<div class="col-md-6">
					<h3 class="block-title">Quick Statistics</h3>
				</div>
				<div class="col-md-6">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="index.html">
								<span class="ti-home"></span>
							</a>
						</li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div>
			</div>
			<!-- /Page Title -->

			<!-- /Breadcrumb -->
			<!-- Main Content -->
			<div class="container-fluid home">


				<div class="row">
					<!-- Widget Item -->
					<div class="col-md-4">
						<div class="widget-area proclinic-box-shadow color-red">
							<div class="widget-left">
								<span class="ti-user"></span>
							</div>
							<div class="widget-right">
								<h4 class="wiget-title">Patients</h4>
								<span class="numeric color-red">348</span>
								<p class="inc-dec mb-0"><span class="ti-angle-up"></span> +20% Increased</p>
							</div>
						</div>
					</div>
					<!-- /Widget Item -->
					<!-- Widget Item -->
					<div class="col-md-4">
						<div class="widget-area proclinic-box-shadow color-green">
							<div class="widget-left">
								<span class="ti-bar-chart"></span>
							</div>
							<div class="widget-right">
								<h4 class="wiget-title">Appointments</h4>
								<span class="numeric color-green">1585</span>
								<p class="inc-dec mb-0"><span class="ti-angle-down"></span> -15% Decreased</p>
							</div>
						</div>
					</div>
					<!-- /Widget Item -->
					<!-- Widget Item -->
					<div class="col-md-4">
						<div class="widget-area proclinic-box-shadow color-yellow">
							<div class="widget-left">
								<span class="ti-money"></span>
							</div>
							<div class="widget-right">
								<h4 class="wiget-title">Total Revenue</h4>
								<span class="numeric color-yellow">$7300</span>
								<p class="inc-dec mb-0"><span class="ti-angle-up"></span> +10% Increased</p>
							</div>
						</div>
					</div>
					<!-- /Widget Item -->
				</div>

				<div class="row">
					<!-- Widget Item -->
					<div class="col-sm-6">
						<div class="widget-area-2 proclinic-box-shadow">
							<h3 class="widget-title">Next Appointments</h3>
							<div class="table-responsive">
								<table class="table table1 table-bordered">
									<thead>
										<tr>
											<th>Token No.</th>
											<th>Patient Name</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$query="SELECT p.name,tk.id,tk.status FROM `token` as tk left join appointments as a on tk.ap_id=a.id LEFT join patient as p on a.p_id=p.id where tk.status='pending' order by tk.id";
											$result = $conn->query($query);
											while($row = $result->fetch_assoc()){
										?>	
										<tr>
											<td><?=$row['id']?></td>
											<td><?=$row['name']?></td>
											<td><?=$row['status']?></td>
											<td><button type="button" class="call btn btn-success" id="<?=$row['id']?>"> Call Patient</button>
											<button type="button" class="cancel btn btn-danger" id="<?=$row['id']?>">Cancel</button></td>
										</tr>		
										<?php
											}
										?>
										
									</tbody>
								</table>
							</div>

						</div>
					</div>
					<!-- /Widget Item -->
					<!-- Widget Item -->
					<div class="col-md-6">
						<div class="widget-area-2 progress-status proclinic-box-shadow">
							<h3 class="widget-title">Previous Appointments</h3>
							<div class="table-responsive">
								<table class="table table-bordered">
								<thead>
										<tr>
											<th>Token No.</th>
											<th>Patient Name</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$query="SELECT p.name,tk.id,tk.status FROM `token` as tk left join appointments as a on tk.ap_id=a.id LEFT join patient as p on a.p_id=p.id where tk.status!='pending' order by tk.id desc";
											$result = $conn->query($query);
											while($row = $result->fetch_assoc()){
										?>
										<tr>
											<td><?=$row['id']?></td>
											<td><?=$row['name']?></td>
											<td><?=$row['status']?></td>
											<td>
												<?php
													if($row['status']=="consult"){
														?><button type="button" class="examine btn btn-success" id="<?=$row['id']?>"> Add Examination</button>
														<?php
													} else {
														?><button type="button" class="view btn btn-success" id="<?=$row['id']?>"> View Details</button>
														<?php
													}
												?>
											</td>
										</tr>		
										<?php
											}
										?>
										
									</tbody>
								</table>
							</div>

						</div>
					</div>
					<!-- /Widget Item -->
				</div>

			</div>
			<!-- /Main Content -->
		</div>
		<!-- /Page Content -->
	</div>
	<!-- Back to Top -->
	<a id="back-to-top"
		href="#"
		class="back-to-top">
		<span class="ti-angle-up"></span>
	</a>
	<!-- /Back to Top -->

	<!-- Jquery Library-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<!-- Popper Library-->
	<script src="js/popper.min.js"></script>
	<!-- Bootstrap Library-->
	<script src="js/bootstrap.min.js"></script>
	<!-- morris charts -->
	<script src="charts/js/raphael-min.js"></script>
	<script src="charts/js/morris.min.js"></script>
	<script src="js/custom-morris.js"></script>

	<!-- Custom Script-->
	<script src="js/custom.js"></script>
</body>


<!-- Mirrored from www.konnectplugins.com/proclinic/Vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2023 05:55:43 GMT -->

</html>