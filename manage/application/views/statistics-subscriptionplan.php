<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
	window.onload = function () {
		document.getElementById("141").className += " active";
		document.getElementById("1412").className += " active";
		membercarddata();
	}
</script>

<div class="content-body">
	<div class="row">
		<div class="col-12">
			<h2 class="text-bold-600 text-center">Subscription Plan Statistics-
				<?php echo date('d M, Y'); ?>
			</h2>
			<hr />
		</div>
	</div>

	<div class="row">
		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up bg-success bg-darken-4">
				<div class="card-content">
					<div class="card-body">
						<a href="<?php echo site_url('users/subscriptionlist/11?dt_to=' . date('Y-m-d')); ?>">
							<div class="media d-flex">
								<div class="media-body text-white text-left">
									<h3 class="text-white" id="personalplans"></h3>
									<span>Personal Subscription Plans <em>-
											<?php echo PG_MAIN_PL; ?>
										</em></span>
								</div>
								<div><i class="la la-credit-card text-white font-large-1 float-right"></i></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up bg-success bg-darken-4">
				<div class="card-content">
					<div class="card-body">
						<a href="<?php echo site_url('users/subscriptionlist/12?dt_to=' . date('Y-m-d')); ?>">
							<div class="media d-flex">
								<div class="media-body text-white text-left">
									<h3 class="text-white" id="businessplans"></h3>
									<span>Business Subscription Plans <em>-
											<?php echo PG_MAIN_BL; ?>
										</em></span>
								</div>
								<div><i class="la la-credit-card text-white font-large-1 float-right"></i></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<hr />
			<h2 class="text-bold-600 text-center">Fail Payment Pages Statistics-
				<?php echo date('d M, Y'); ?>
			</h2>
			<hr />
		</div>
	</div>

	<div class="row">
		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up bg-pink bg-darken-1">
				<div class="card-content">
					<div class="card-body">
						<a href="<?php echo site_url('offer/cardoffer?dt_to=' . date('Y-m-d')); ?>">
							<div class="media d-flex">
								<div class="media-body text-white text-left">
									<h3 class="text-white" id="cardoffer"></h3>
									<span>Card Offer <em>-
											<?php echo PG_CARD_OFFER; ?>
										</em></span>
								</div>
								<div><i class="la la-hand-o-right text-white font-large-1 float-right"></i></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<hr />
			<h2 class="text-bold-600 text-center">IVR Payment Pages Statistics-
				<?php echo date('d M, Y'); ?>
			</h2>
			<hr />
		</div>
	</div>

	<div class="row">
		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up bg-yellow bg-darken-3">
				<div class="card-content">
					<div class="card-body">
						<a href="<?php echo site_url('offer/ivrpaymentoffer?dt_to=' . date('Y-m-d')); ?>">
							<div class="media d-flex">
								<div class="media-body text-white text-left">
									<h3 class="text-white" id="ivrpaymentoffer"></h3>
									<span>IVR Payment offer <em>-
											<?php echo PG_IVRPAYMENT_OFFER; ?>
										</em></span>
								</div>
								<div><i class="la la-hand-o-right text-white font-large-1 float-right"></i></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<hr />
			<h2 class="text-bold-600 text-center">SMS Marketing Pages Statistics-
				<?php echo date('d M, Y'); ?>
			</h2>
			<hr />
		</div>
	</div>

	<div class="row">
		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up bg-blue bg-darken-3">
				<div class="card-content">
					<div class="card-body">
						<a href="<?php echo site_url('offer/specialoffer?dt_to=' . date('Y-m-d')); ?>">
							<div class="media d-flex">
								<div class="media-body text-white text-left">
									<h3 class="text-white" id="specialoffer"></h3>
									<span>Special Offer <em>-
											<?php echo PG_SPECIAL_OFFER; ?>
										</em></span>
								</div>
								<div><i class="la la-hand-o-right text-white font-large-1 float-right"></i></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<hr />
			<h2 class="text-bold-600 text-center">Whatsapp Marketing Pages Statistics-
				<?php echo date('d M, Y'); ?>
			</h2>
			<hr />
		</div>
	</div>

	<div class="row">
		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up bg-blue bg-darken-3">
				<div class="card-content">
					<div class="card-body">
						<a href="<?php echo site_url('offer/bumperoffer?dt_to=' . date('Y-m-d')); ?>">
							<div class="media d-flex">
								<div class="media-body text-white text-left">
									<h3 class="text-white" id="bumperoffer"></h3>
									<span>Bumper Offer <em>-
											<?php echo PG_BUMPER_OFFER; ?>
										</em></span>
								</div>
								<div><i class="la la-hand-o-right text-white font-large-1 float-right"></i></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<hr />
			<h2 class="text-bold-600 text-center">Extra Pages Statistics-
				<?php echo date('d M, Y'); ?>
			</h2>
			<hr />
		</div>
	</div>

	<div class="row">

		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up bg-blue bg-darken-3">
				<div class="card-content">
					<div class="card-body">
						<a href="<?php echo site_url('offer/festivaloffer?dt_to=' . date('Y-m-d')); ?>">
							<div class="media d-flex">
								<div class="media-body text-white text-left">
									<h3 class="text-white" id="festivaloffer"></h3>
									<span>Festival Offer <em>-
											<?php echo PG_FESTIVAL_OFFER; ?>
										</em></span>
								</div>
								<div><i class="la la-hand-o-right text-white font-large-1 float-right"></i></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>

	</div>

</div>

<script type="text/javascript">
	function membercarddata() {
		$.ajax({
			url: "<?php echo base_url('dashboard/membercarddata'); ?>",
			method: "POST",
			dataType: "JSON",
			cache: false,
			contentType: false,
			processData: false,
			beforeSend: function () {
				document.getElementById('personalplans').innerHTML = "<i class='la la-spinner spinner'></i>";
				document.getElementById('businessplans').innerHTML = "<i class='la la-spinner spinner'></i>";
			},
			success: function (response) {
				if (response['success'] == true) {
					document.getElementById('personalplans').innerHTML = response['statistics']['personalplans'];
					document.getElementById('businessplans').innerHTML = response['statistics']['businessplans'];
				}
			}
		});
		setTimeout(membercarddata, 300000);

		offerdata();
	}


	function offerdata() {
		$.ajax({
			url: "<?php echo base_url('dashboard/offerdata'); ?>",
			method: "POST",
			dataType: "JSON",
			cache: false,
			contentType: false,
			processData: false,
			beforeSend: function () {
				document.getElementById('cardoffer').innerHTML = "<i class='la la-spinner spinner'></i>";
				document.getElementById('ivrpaymentoffer').innerHTML = "<i class='la la-spinner spinner'></i>";
				document.getElementById('specialoffer').innerHTML = "<i class='la la-spinner spinner'></i>";
				document.getElementById('bumperoffer').innerHTML = "<i class='la la-spinner spinner'></i>";
				document.getElementById('festivaloffer').innerHTML = "<i class='la la-spinner spinner'></i>";
			},
			success: function (response) {
				if (response['success'] == true) {
					document.getElementById('cardoffer').innerHTML = response['statistics']['cardoffer'];
					document.getElementById('ivrpaymentoffer').innerHTML = response['statistics']['ivrpaymentoffer'];
					document.getElementById('specialoffer').innerHTML = response['statistics']['specialoffer'];
					document.getElementById('bumperoffer').innerHTML = response['statistics']['bumperoffer'];
					document.getElementById('festivaloffer').innerHTML = response['statistics']['festivaloffer'];
				}
			}
		});
	}
</script>

<?php
include_once(APPPATH . 'views/includes/footer.php');
?>
