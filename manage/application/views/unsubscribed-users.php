<?php
include_once(APPPATH.'views/includes/header.php');
?>
	<script type="text/javascript">
		window.onload = function(){
			document.getElementById("149").className += " active";
		}
	</script>

	<div class="content-header row">
		<div class="content-header-left col-md-12 col-12 mb-1">
			<h1 class="content-header-title text-uppercase">Unsubscribed Users List</h1>
		</div>
	</div>

	<div class="content-body">
		<section id="configuration">
			<div class="row">
				<div class="col-12">
					<div class="card">

						<div class="card-content collapse show">
							<div class="card-body">
								<table class="table table-striped table-bordered table-sm responsive dataex-html5-export">
									<thead>
									<tr>
										<th>#</th>
										<th>Name</th>
										<th>Mobile</th>
										<th>Email</th>
										<th>City</th>
										<th>State</th>
										<th>User Type</th>
										<th>Reason</th>
									</tr>
									</thead>
									<tbody>

									<?php
									if(count($unsubscribeuserlist)) {
										$cnt=1;
										foreach ($unsubscribeuserlist as $row) {
											echo "<tr>";
											echo "<td width='50'>".htmlentities($row->id)."</td>";

											echo "<td class='text-capitalize'>".htmlentities($row->fullname)."</td>";
											echo "<td>".htmlentities($row->mobile)."</td>";
											echo "<td>".htmlentities($row->email)."</td>";
											echo "<td>".htmlentities($row->city)."</td>";
											echo "<td>".htmlentities($row->state)."</td>";
											echo "<td>".htmlentities($row->usertype)."</td>";
											echo "<td>".htmlentities($row->reason)."</td>";

											echo "</td>";

											echo "</tr>";
											$cnt++;
										}
									}
									?>

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

<?php
include_once(APPPATH.'views/includes/footer.php');
?>
