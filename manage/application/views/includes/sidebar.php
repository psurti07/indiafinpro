<div class="main-menu menu-fixed menu-dark menu-accordion " data-scroll-to-active="true">
	<div class="main-menu-content">
		<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
			<?php
			$role = $this->session->userdata['admintype'];
			if ($role == 0 || $role == 1) {
			?>

			<li id="101" class="nav-item">
				<a href="<?php echo site_url('dashboard'); ?>"><i class="la la-dashboard"></i><span
						class="menu-title">Dashboard</span></a>
			</li>
			<li id="141" class=" nav-item"><a href="#"><i class="la la-calendar"></i><span class="menu-title">Today
						Statistics</span></a>
				<ul class="menu-content">
					<li id="1411"><a class="menu-item" href="<?php echo site_url('dashboard/loanstatistics'); ?>">Loan
							Enquiry</a></li>
					<li id="1412"><a class="menu-item"
							href="<?php echo site_url('dashboard/cardstatistics'); ?>">Subscription Plan</a></li>
					<li id="1413"><a class="menu-item"
							href="<?php echo site_url('dashboard/customerstatistics'); ?>">Customer</a></li>
					<li id="1415"><a class="menu-item"
							href="<?php echo site_url('dashboard/applicationstatistics'); ?>">Application</a></li>
					<li id="1416"><a class="menu-item"
							href="<?php echo site_url('dashboard/processstatistics'); ?>">Process Steps</a></li>
					<li id="1417"><a class="menu-item"
							href="<?php echo site_url('dashboard/remarketingstatistics'); ?>">Remarketing Users</a></li>
				</ul>
			</li>

			<li id="999" class="nav-item">
				<a href="<?php echo site_url('site/search'); ?>"><i class="la la-search"></i><span
						class="menu-title">Search Data</span></a>
			</li>

			<!-- ================== NEW NAVIGATION HEADER ================== -->
			<li class=" navigation-header"><span>ALL LEADS</span></li>

			<li id="1081" class=" nav-item"><a href="#"><i class="la la-server"></i><span class="menu-title">Digital PL
						Enquiry</span></a>
				<ul class="menu-content">
					<li id="10811"><a class="menu-item" href="<?php echo site_url('users/digitalleads/pl'); ?>">Company
							Leads</a></li>
				</ul>
			</li>

			<li id="1082" class=" nav-item"><a href="#"><i class="la la-server"></i><span class="menu-title">Digital BL
						Enquiry</span></a>
				<ul class="menu-content">
					<li id="10821"><a class="menu-item" href="<?php echo site_url('users/digitalleads/bl'); ?>">Company
							Leads</a></li>
				</ul>
			</li>
			<!-- ================== NEW NAVIGATION HEADER ================== -->
			<li class=" navigation-header"><span>ACCOUNTS</span></li>

			<li id="107" class=" nav-item"><a href="#"><i class="la la-users"></i><span
						class="menu-title">Customers</span></a>
				<ul class="menu-content">
					<li id="1070"><a class="menu-item" href="<?php echo site_url('users'); ?>">Customer List</a></li>
					<li id="1071"><a class="menu-item" href="<?php echo site_url('users/addForm'); ?>">Create an
							Account</a></li>
				</ul>
			</li>
			<!-- ================== NEW NAVIGATION HEADER ================== -->
			<li class=" navigation-header"><span>ORDERS</span></li>

			<li id="109" class=" nav-item"><a href="#"><i class="la la-credit-card"></i><span
						class="menu-title">Subscription Plan</span></a>
				<ul class="menu-content">
					<li id="1091"><a class="menu-item"
							href="<?php echo site_url('users/subscriptionlist/11'); ?>">Personal Subscription Plan</a>
					</li>
					<li id="1092"><a class="menu-item"
							href="<?php echo site_url('users/subscriptionlist/12'); ?>">Business Subscription Plan</a>
					</li>
				</ul>
			</li>

			<li id="134" class=" nav-item"><a href="#"><i class="la la-hand-o-right"></i><span class="menu-title">Fail
						Payment Pages</span></a>
				<ul class="menu-content">
					<li id="1341"><a class="menu-item" href="<?php echo site_url('offer/cardoffer'); ?>">Card Offer</a>
					</li>
				</ul>
			</li>

			<li id="135" class=" nav-item"><a href="#"><i class="la la-hand-o-right"></i><span class="menu-title">IVR
						Payment Pages</span></a>
				<ul class="menu-content">
					<li id="1351"><a class="menu-item" href="<?php echo site_url('offer/ivrpaymentoffer'); ?>">IVR
							Payment Offer</a></li>
				</ul>
			</li>

			<li id="151" class=" nav-item"><a href="#"><i class="la la-hand-o-right"></i><span class="menu-title">SMS
						Marketing Pages</span></a>
				<ul class="menu-content">
					<li id="1511"><a class="menu-item" href="<?php echo site_url('offer/specialoffer'); ?>">Special
							Offer</a></li>
				</ul>
			</li>


			<li id="152" class=" nav-item"><a href="#"><i class="la la-hand-o-right"></i><span
						class="menu-title">Whatsapp Marketing</span></a>
				<ul class="menu-content">
					<li id="1522"><a class="menu-item" href="<?php echo site_url('offer/bumperoffer'); ?>">Bumper
							Offer</a></li>
				</ul>
			</li>

			<li id="136" class=" nav-item"><a href="#"><i class="la la-hand-o-right"></i><span class="menu-title">Extra
						Pages</span></a>
				<ul class="menu-content">
					<li id="1363"><a class="menu-item" href="<?php echo site_url('offer/festivaloffer'); ?>">Festival
							Offer</a></li>
				</ul>
			</li>

			<?php
				}
				if ($role == 0 || $role == 1 || $role == 2 ) {
				?>
			<li id="125" class="nav-item">
				<a href="<?php echo site_url('account/invoice'); ?>"><i class="la la-list-ol"></i><span
						class="menu-title">Invoice</span></a>
			</li>

			<?php
				}
				if ($role == 0 || $role == 1 ) {
				?>
			<li id="137" class="nav-item">
				<a href="<?php echo site_url('account/refund'); ?>"><i class="la la-reply"></i><span
						class="menu-title">Refund</span></a>
			</li>

			<!-- ================== NEW NAVIGATION HEADER ================== -->
			<li class=" navigation-header"><span>REQUEST</span></li>

			<li id="110" class=" nav-item"><a href="#"><i class="la la-list"></i><span class="menu-title">Loan
						Application</span></a>
				<ul class="menu-content">
					<li id="1101"><a class="menu-item" href="<?php echo site_url('loan/application'); ?>">New
							Application</a></li>
					<li id="1104"><a class="menu-item" href="<?php echo site_url('loan/reapplyhistory'); ?>">Reapply
							Application</a></li>
					<li id="1102"><a class="menu-item" href="<?php echo site_url('loan/approvehistory'); ?>">Approve
							Application</a></li>
					<li id="1105"><a class="menu-item" href="<?php echo site_url('loan/queryprocesshistory'); ?>">Query
							Process Application</a></li>
					<li id="1103"><a class="menu-item" href="<?php echo site_url('loan/rejecthistory'); ?>">Rejected
							Application</a></li>
				</ul>
			</li>

			<!-- ================== NEW NAVIGATION HEADER ================== -->
			<li class=" navigation-header"><span>REFERRAL PAYOUT</span></li>

			<li id="1121" class="nav-item">
				<a href="<?php echo site_url('users/referral'); ?>"><i class="la la-sitemap"></i><span
						class="menu-title">Customer Referral</span></a>
			</li>

			<!-- ================== NEW NAVIGATION HEADER ================== -->
			<li class=" navigation-header"><span>REPORTS</span></li>

				<li id="124" class=" nav-item"><a href="#"><i class="la la-bar-chart"></i><span class="menu-title">Digital
							Leads</span></a>
					<ul class="menu-content">
						<li id="12499"><a class="menu-item" href="<?php echo site_url('report/digitalleads'); ?>">All
								Leads</a></li>
						<li id="12411"><a class="menu-item"
								href="<?php echo site_url('report/digitalleads/pl'); ?>">Personal Loan</a></li>
						<li id="12412"><a class="menu-item"
								href="<?php echo site_url('report/digitalleads/bl'); ?>">Business Loan</a></li>
					</ul>
				</li>

				<li id="122" class="nav-item">
					<a href="<?php echo site_url('report/customers'); ?>"><i class="la la-bar-chart"></i><span
							class="menu-title">Customers Reg.</span></a>
				</li>
		
				<li id="123" class="nav-item">
					<a href="<?php echo site_url('report/applications'); ?>"><i class="la la-bar-chart"></i><span
							class="menu-title">App Status Report</span></a>
				</li>

				<?php
				}
				if ($role == 0 || $role == 1 || $role == 2 ) {
				?>
			<li id="128" class="nav-item">
				<a href="<?php echo site_url('report/gstdata'); ?>"><i class="la la-bar-chart"></i><span
						class="menu-title">GST Data</span></a>
			</li>

			<li id="147" class="nav-item">
				<a href="<?php echo site_url('report/tdsdata'); ?>"><i class="la la-bar-chart"></i><span
						class="menu-title">TDS Data</span></a>
			</li>
			<?php
				}
				if ($role == 0 || $role == 1 ) {
				?>

			<li id="138" class="nav-item">
				<a href="<?php echo site_url('report/refunddata'); ?>"><i class="la la-bar-chart"></i><span
						class="menu-title">Refund Data</span></a>
			</li>


				<!-- ================== NEW NAVIGATION HEADER ================== -->
				<li class=" navigation-header"><span>PAYMENTS LOG</span></li>

				<!--<li id="166" class="nav-item">
					<a href="<?php echo site_url('payment/phonepelog'); ?>"><i class="la la-inr"></i><span
							class="menu-title">PhonePe Log</span></a>
				</li>
				<li id="167" class="nav-item">
					<a href="<?php echo site_url('payment/sabpaisalog'); ?>"><i class="la la-inr"></i><span
							class="menu-title">Sabpaisa Log</span></a>
				</li>

				<li id="165" class="nav-item">
					<a href="<?php echo site_url('payment/razorpaylog'); ?>"><i class="la la-inr"></i><span
							class="menu-title">Razorpay Log</span></a>
				</li>
			<li id="169" class="nav-item">
				<a href="<?php echo site_url('payment/zaakpaylog'); ?>"><i class="la la-inr"></i><span class="menu-title">Zaakpay Log</span></a>
			</li>
			<li id="171" class="nav-item">
				<a href="<?php echo site_url('payment/airpaylog'); ?>"><i class="la la-inr"></i><span class="menu-title">Airpay Log</span></a>
			</li>
			<li id="172" class="nav-item">
				<a href="<?php echo site_url('payment/openmoneylog'); ?>"><i class="la la-inr"></i><span class="menu-title">Openmoney Log</span></a>
			</li>
			<li id="173" class="nav-item">
				<a href="<?php echo site_url('payment/easebuzzlog'); ?>"><i class="la la-inr"></i><span class="menu-title">Easebuzz Log</span></a>
			</li>-->


			<!-- ================== NEW NAVIGATION HEADER ================== -->
			<li class=" navigation-header"><span>DATA LIST</span></li>

			<li id="102" class=" nav-item"><a href="#"><i class="la la-university"></i><span
						class="menu-title">Banks</span></a>
				<ul class="menu-content">
					<li id="1021"><a class="menu-item" href="<?php echo site_url('banks'); ?>">Banks</a></li>
					<li id="1022"><a class="menu-item" href="<?php echo site_url('banks/roipackages'); ?>">ROI
							Packages</a></li>
					<li id="1023"><a class="menu-item" href="<?php echo site_url('banks/applylinks'); ?>">Apply
							Links</a></li>
				</ul>
			</li>

			<li id="105" class=" nav-item"><a href="#"><i class="la la-graduation-cap"></i><span
						class="menu-title">Career</span></a>
				<ul class="menu-content">
					<li id="1051"><a class="menu-item" href="<?php echo site_url('career'); ?>">Career Opening</a></li>
					<li id="1052"><a class="menu-item" href="<?php echo site_url('career/enquiry'); ?>">Career
							Enquiry</a></li>
				</ul>
			</li>

			<li id="132" class=" nav-item"><a href="#"><i class="la la-lightbulb-o"></i><span class="menu-title">Ads
						Content</span></a>
				<ul class="menu-content">
					<li id="1321"><a class="menu-item" href="<?php echo site_url('site/advertisement/txt'); ?>">Text</a>
					</li>
					<li id="1322"><a class="menu-item"
							href="<?php echo site_url('site/advertisement/img'); ?>">Images</a></li>
				</ul>
			</li>

			<li id="116" class="nav-item">
				<a href="<?php echo site_url('site/newsletter'); ?>"><i class="la la-envelope"></i><span
						class="menu-title">Newsletter List</span></a>
			</li>

			<li id="139" class="nav-item">
				<a href="<?php echo site_url('support/ticket'); ?>"><i class="la la-life-ring"></i><span
						class="menu-title">Support Request</span></a>
			</li>

			<li id="104" class="nav-item">
				<a href="<?php echo site_url('support/contact'); ?>"><i class="la la-globe"></i><span
						class="menu-title">Contact Enquiry</span></a>
			</li>

			<li id="146" class="nav-item">
				<a href="<?php echo site_url('site/emailtemplates'); ?>"><i class="la la-envelope-square"></i><span
						class="menu-title">Email Templates List</span></a>
			</li>

			<li id="149" class="nav-item">
				<a href="<?php echo site_url('site/unsubscribedusers'); ?>"><i class="la la-comment"></i><span
						class="menu-title">Unsubscribed Users</span></a>
			</li>

			<!-- ================== NEW NAVIGATION HEADER ================== -->
			<li class=" navigation-header"><span>SMS DATA</span></li>

			<li id="150" class="nav-item">
				<a href="<?php echo site_url('sms/customsms'); ?>"><i class="la la-paper-plane"></i><span
						class="menu-title">Send Custom SMS</span></a>
			</li>

			<li id="131" class="nav-item">
				<a href="<?php echo site_url('sms/smsmessages'); ?>"><i class="la la-comment"></i><span
						class="menu-title">SMS Messages</span></a>
			</li>

			<li id="145" class="nav-item">
				<a href="<?php echo site_url('sms/smstemplates'); ?>"><i class="la la-comments"></i><span
						class="menu-title">SMS Templates List</span></a>
			</li>

			<li id="148" class="nav-item">
				<a href="<?php echo site_url('sms/dndlist'); ?>"><i class="la la-ban"></i><span class="menu-title">DND
						List</span></a>
			</li>

			<li id="127" class="nav-item">
				<a href="<?php echo site_url('sms/bulksms'); ?>"><i class="la la-paper-plane"></i><span
						class="menu-title">Bulk SMS List</span></a>
			</li>

			<li id="121" class="nav-item">
				<a href="<?php echo site_url('sms/sentotps'); ?>"><i class="la la-asterisk"></i><span
						class="menu-title">Sent OTPs</span></a>
			</li>

			<li id="129" class="nav-item">
				<a href="<?php echo site_url('sms/remarketinglog'); ?>"><i class="la la-clock-o"></i><span
						class="menu-title">Remarketing Log</span></a>
			</li>

				<!-- ================== NEW NAVIGATION HEADER ================== -->
				<li class=" navigation-header"><span>OTHER OPTIONS</span></li>

				<li id="133" class="nav-item">
					<a href="<?php echo site_url('site/fileremarks'); ?>"><i class="la la-exclamation-circle"></i><span
							class="menu-title">File Remarks</span></a>
				</li>

				<li id="130" class="nav-item">
					<a href="<?php echo site_url('site/impupdate'); ?>"><i class="la la-bullhorn"></i><span
							class="menu-title">Important Update</span></a>
				</li>

				<li id="106" class=" nav-item"><a href="#"><i class="la la-cog"></i><span class="menu-title">Site
							Options</span></a>
					<ul class="menu-content">
						<li id="1060"><a class="menu-item" href="<?php echo site_url('site/sitesettings'); ?>">Facebook
								Settings</a></li>
						<li id="1066"><a class="menu-item" href="<?php echo site_url('site/accountmsg'); ?>">Account
								Message</a></li>
						<li id="1064"><a class="menu-item"
								href="<?php echo site_url('site/editPage/welcome-message'); ?>">Welcome Message</a></li>
					</ul>
				</li>

				<li id="117" class=" nav-item"><a href="#"><i class="la la-file"></i><span
							class="menu-title">Pages</span></a>
					<ul class="menu-content">
						<li id="1171"><a class="menu-item"
								href="<?php echo site_url('site/editPage/privacy-policy'); ?>">Privacy Policy</a></li>
						<li id="11711"><a class="menu-item"
								href="<?php echo site_url('site/editPage/refund-policy'); ?>">Refund Policy</a></li>
						<li id="1175"><a class="menu-item"
								href="<?php echo site_url('site/editPage/disclaimer'); ?>">Disclaimer</a></li>
						<li id="1172"><a class="menu-item"
								href="<?php echo site_url('site/editPage/terms-conditions'); ?>">Terms & Conditions</a></li>
						<li id="11712"><a class="menu-item"
								href="<?php echo site_url('site/editPage/customer-legal-agreement'); ?>">Customer - Legal
								Agreement</a></li>
					</ul>
				</li>

				<?php
				}
				if ($role == 0 ) {
				?>
				<li id="143" class="nav-item">
					<a href="<?php echo site_url('site/stafflist'); ?>"><i class="la la-users"></i><span
							class="menu-title">Staff List</span></a>
				</li>
			<?php } ?>

		</ul>

		<div class="mb-5"></div>
	</div>
</div>
