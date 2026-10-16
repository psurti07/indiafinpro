<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
	window.onload = function () {
		document.getElementById("106").className += " active";
		document.getElementById("1060").className += " active";
	}
</script>

<div class="content-header row">
	<div class="content-header-left col-md-12 col-12 mb-1">
		<h1 class="content-header-title text-uppercase">Site Settings</h1>
	</div>
</div>

<div class="content-body">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-content collapse show">
					<div class="card-body">

						<dl class="row mb-0">
							<dt class="col-md-3 col-12">SMS Sender Id</dt>
							<dd class="col-md-9 col-12">
								<?php echo form_open('site/updatesenderid', array('id' => 'filterForm3', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
								<span class="mr-2"><input name="senderid" type="text" class="input-sm form-control col-md-9"
										id="senderid" value="<?php echo $sitedetails['smssenderid']->option_value; ?>"
										style="display: inline;" /></span>
								<button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
								<?php echo form_close(); ?>
							</dd>
						</dl>

						<hr class="mb-2" />

						<dl class="row mb-0">
							<dt class="col-md-3 col-12">Site Welcome Model</dt>
							<dd class="col-md-9 col-12">
								<span class="mr-2">
									<?php
									echo ($sitedetails['welcomemodel']->option_value == 1) ? "Show" : "Hide";
									?>
								</span>
								<a href="<?php echo site_url('site/modelstatus/' . $sitedetails['welcomemodel']->option_value); ?>"
									target="_self" class="btn btn-icon btn-outline-dark btn-sm"><i class="la la-rotate-left"></i></a>
							</dd>
						</dl>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-12">
			<div class="card">
				<div class="card-content collapse show">
					<div class="card-body">
						<dl class="row mb-0">
							<dt class="col-md-3 col-12">Facebook Domain Verification Id</dt>
							<dd class="col-md-9 col-12">
								<?php echo form_open('site/updatefbdomain', array('id' => 'filterForm1', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
								<span class="mr-2"><input name="domainid" type="text" class="input-sm form-control col-md-9"
										id="domainid" value="<?php echo $sitedetails['fbdomainvalue']->option_value; ?>"
										style="display: inline;" /></span>
								<button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
								<?php echo form_close(); ?>
							</dd>
						</dl>

						<hr class="mb-2" />

						<dl class="row mb-0">
							<dt class="col-md-3 col-12">Facebook Pixel Key</dt>
							<dd class="col-md-9 col-12">
								<?php echo form_open('site/updatefbpixel', array('id' => 'filterForm2', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
								<span class="mr-2"><input name="pixelid" type="text" class="input-sm form-control col-md-9" id="pixelid"
										value="<?php echo $sitedetails['fbpixelvalue']->option_value; ?>" style="display: inline;" /></span>
								<button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
								<?php echo form_close(); ?>
							</dd>
						</dl>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-12">
			<div class="card">
				<div class="card-content collapse show">
					<div class="card-body">
						<dl class="row mb-0">
							<dt class="col-md-3 col-12">Facebook Access Token - PL & BL</dt>
							<dd class="col-md-9 col-12">
								<?php echo form_open('site/updatefbaccesstokendigital', array('id' => 'filterForm2', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
								<span class="mr-2"><input name="fbaccesstokendigital" type="text" class="input-sm form-control col-md-9"
										id="fbaccesstokendigital" value="<?php echo $sitedetails['fbaccesstokendigital']->option_value; ?>"
										style="display: inline;" /></span>
								<button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
								<?php echo form_close(); ?>
							</dd>
						</dl>

						<hr class="mb-2" />

						<dl class="row mb-0">
							<dt class="col-md-3 col-12">Facebook Event Name - PL & BL</dt>
							<dd class="col-md-9 col-12">
								<?php echo form_open('site/updatefbeventnamedigital', array('id' => 'filterForm2', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
								<span class="mr-2"><input name="fbeventnamedigital" type="text" class="input-sm form-control col-md-9"
										id="fbeventnamedigital" value="<?php echo $sitedetails['fbeventnamedigital']->option_value; ?>"
										style="display: inline;" /></span>
								<button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
								<?php echo form_close(); ?>
							</dd>
						</dl>

						<hr class="mb-2" />

						<dl class="row mb-0">
							<dt class="col-md-3 col-12">Facebook Event ID - PL & BL</dt>
							<dd class="col-md-9 col-12">
								<?php echo form_open('site/updatefbeventiddigital', array('id' => 'filterForm2', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
								<span class="mr-2"><input name="fbeventiddigital" type="text" class="input-sm form-control col-md-9"
										id="fbeventiddigital" value="<?php echo $sitedetails['fbeventiddigital']->option_value; ?>"
										style="display: inline;" /></span>
								<button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
								<?php echo form_close(); ?>
							</dd>
						</dl>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="card">
				<div class="card-content collapse show">
					<div class="card-body">
						<dl class="row mb-0">
							<dt class="col-md-3 col-12">Whatsapp Campaign - Remarketing</dt>
							<dd class="col-md-9 col-12">
								<?php echo form_open('site/updatewpcampmain', array('id' => 'filterForm6', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
								<span class="mr-2"><input name="wpcampaignmain" type="text" class="input-sm form-control col-md-9"
										id="wpcampaignmain" value="<?php echo $sitedetails['wpcampaignmain']->option_value; ?>"
										style="display: inline;" /></span>
								<button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
								<?php echo form_close(); ?>
							</dd>
						</dl>

						<hr class="mb-2" />

						<dl class="row mb-0">
							<dt class="col-md-3 col-12">Whatsapp Campaign - Get Offer</dt>
							<dd class="col-md-9 col-12">
								<?php echo form_open('site/updatewpcampmainoffer', array('id' => 'filterForm7', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
								<span class="mr-2"><input name="wpcampaignoffer" type="text" class="input-sm form-control col-md-9"
										id="wpcampaignoffer" value="<?php echo $sitedetails['wpcampaignoffer']->option_value; ?>"
										style="display: inline;" /></span>
								<button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
								<?php echo form_close(); ?>
							</dd>
						</dl>

						<hr class="mb-2" />

						<dl class="row mb-0">
							<dt class="col-md-3 col-12">Whatsapp Campaign - Payment Success</dt>
							<dd class="col-md-9 col-12">
								<?php echo form_open('site/updatewpcampmainsuccess', array('id' => 'filterForm8', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
								<span class="mr-2"><input name="wpcampaignsuccess" type="text" class="input-sm form-control col-md-9"
										id="wpcampaignsuccess" value="<?php echo $sitedetails['wpcampaignsuccess']->option_value; ?>"
										style="display: inline;" /></span>
								<button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
								<?php echo form_close(); ?>
							</dd>
						</dl>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-12">
			<div class="card">
				<div class="card-content collapse show">
					<div class="card-body">
						<dl class="row mb-0">
							<dt class="col-md-3 col-12">Interekt Template - Get Offer</dt>
							<dd class="col-md-9 col-12">
								<?php echo form_open('site/update_intkt_getoffer', array('id' => 'filterForm6', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
								<span class="mr-2"><input name="intkt_getoffer" type="text" class="input-sm form-control col-md-9"
										id="intkt_getoffer" value="<?php echo $sitedetails['intekt_get_offer_name']->option_value; ?>"
										style="display: inline;" /></span>
								<button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
								<?php echo form_close(); ?>
							</dd>
						</dl>

						<hr class="mb-2" />

						<dl class="row mb-0">
							<dt class="col-md-3 col-12">Interekt Template - Remarketing</dt>
							<dd class="col-md-9 col-12">
								<?php echo form_open('site/update_intktrm_offer', array('id' => 'filterForm7', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
								<span class="mr-2"><input name="intkt_rm_offer" type="text" class="input-sm form-control col-md-9"
										id="intkt_rm_offer" value="<?php echo $sitedetails['intekt_rm_offer_name']->option_value; ?>"
										style="display: inline;" /></span>
								<button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
								<?php echo form_close(); ?>
							</dd>
						</dl>

						<hr class="mb-2" />

						<dl class="row mb-0">
							<dt class="col-md-3 col-12">Interekt Template - Username Password</dt>
							<dd class="col-md-9 col-12">
								<?php echo form_open('site/update_intkt_usrpass', array('id' => 'filterForm8', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
								<span class="mr-2"><input name="intkt_user_password" type="text" class="input-sm form-control col-md-9"
										id="intkt_user_password" value="<?php echo $sitedetails['intkt_userwelcomename']->option_value; ?>"
										style="display: inline;" /></span>
								<button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
								<?php echo form_close(); ?>
							</dd>
						</dl>

						<hr class="mb-2" />

						<dl class="row mb-0">
							<dt class="col-md-3 col-12">Interekt Template - Payment Success</dt>
							<dd class="col-md-9 col-12">
								<?php echo form_open('site/update_intkt_payment_success', array('id' => 'filterForm8', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
								<span class="mr-2"><input name="intkt_payment_success" type="text" class="input-sm form-control col-md-9"
										id="intkt_payment_success" value="<?php echo $sitedetails['intkt_payment_success']->option_value; ?>"
										style="display: inline;" /></span>
								<button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
								<?php echo form_close(); ?>
							</dd>
						</dl>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
include_once(APPPATH . 'views/includes/footer.php');
?>
