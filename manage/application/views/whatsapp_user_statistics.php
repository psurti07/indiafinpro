<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
	window.onload = function(){
		document.getElementById("141").className += " active";
		document.getElementById("1418").className += " active";
		applicationdata();
	}
</script>

	<div class="content-body">
		<div class="row">
			<div class="col-12">
				<h2 class="text-bold-600 text-center">Whatsapp User Statistics</h2>
				<hr />
			</div>
		</div>

		<div class="row" id="whatsappusers">
			<div id="lodder"></div>
			<!-- Digital Loan -->

		</div>
	</div>

	<script type="text/javascript">
		function applicationdata() {
			$.ajax({
				url: "<?php echo base_url('dashboard/whatsappcrondata'); ?>",
				method: "POST",
				dataType: "JSON",
				cache: false,
				contentType: false,
				processData: false,
				beforeSend: function() {
					document.getElementById('lodder').innerHTML="<i class='la la-spinner spinner' style='font-size:80px;position:absolute'></i>";
				},
				success: function(response) {
					$('#remarketingusers').html('');
					if (response['success'] == true) {
						var html = "";
						$.each(response.statistics, function(index, element) {
							html += '<div class="col-xl-3 col-lg-3 col-12">';
							html += '<div class="card pull-up border-primary">';
							html += '<div class="card-content">';
							html += '<div class="card-body">';
							html += '<a class="text-dark" href="#">';
							html += '<div class="media d-flex">';
							html += '<div class="media-body text-left">';
							html += '<h3 class="text-bold-700" id="oldapplication">' + element + '</h3>';
							html += '<span>Days - ' + index + '</span>';
							html += '</div>';
							html += '<div><i class="la la-users font-large-1 float-right"></i></div>';
							html += '</div>';
							html += '</a>';
							html += '</div>';
							html += '</div>';
							html += '</div>';
							html += '</div>';

						});
						$('#whatsappusers').html(html);
						document.getElementById("lodder").innerHTML = "";
					}
				}
			});
		}
	</script>
<?php
include_once(APPPATH . 'views/includes/footer.php');
?>
