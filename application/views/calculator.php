<?php
    $this->load->view('includes/header');
?>

<?php echo link_tag('assets/plugins/calc/css/commoncalculator.css'); ?>
<?php echo link_tag('assets/plugins/calc/css/emicalculator.css'); ?>
<?php echo link_tag('assets/plugins/calc/css/calcstyle.css'); ?>
    
  <section class="wrapper bg-pale-primary">
    <div class="container pt-10 pt-md-10 pb-8 pb-md-8 text-center">
      <div class="row">
        <div class="col-md-12 col-12">
          <h1 class="display-3 mb-2">Loan EMI Calculator</h1>
          <p class="lead">We're looking for a passionate professional like YOU to strengthen our workforce!</p>
        </div>
        <!-- /column -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
  </section>
  <!-- /section -->

  <section id="" class="wrapper bg-light">
    <div class="container pt-10 pt-md-12 pb-13 pb-md-15">
      <div class="row">
        <div class="col-lg-12 mb-0">
           <div class="calculatorcontainer">
            <div class="emicalculatorcontainer">
              <div id="loanformcontainer" class="row">
                <div id="emicalculatordashboard" class="col-sm-12">
                  <div class="cleardiv"></div>
                  <div id="emicalculatorinnerformwrapper">
                    <form id="emicalculatorform">
                      <div class="form-horizontal" id="emicalculatorinnerform">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="row form-group lamount mb-5">
                              <label class="col-lg-4 control-label" for="loanamount">Loan Amount</label>
                              <div class="col-lg-8">
                                <div class="input-group">
                                  <input class="form-control" id="loanamount" name="loanamount" value="10,00,000" type="text">
                                  <div class="input-group-append">
                                    <span class="input-group-text">₹</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div id="loanamountslider"></div>
                            <div id="loanamountsteps" class="steps">
                              <span class="tick" style="left: 0%;">| <br>
                                <span class="marker">0</span>
                              </span>
                              <span class="tick d-none d-sm-block" style="left: 12.5%;">| <br>
                                <span class="marker">10L</span>
                              </span>
                              <span class=tick style="left: 25%;">| <br>
                                <span class=marker>20L</span>
                              </span>
                              <span class="tick d-none d-sm-block" style="left: 37.5%;">| <br>
                                <span class="marker">30L</span>
                              </span>
                              <span class="tick" style="left: 50%;">| <br>
                                <span class="marker">40L</span>
                              </span>
                              <span class="tick d-none d-sm-block" style="left: 62.5%;">| <br>
                                <span class="marker">50L</span>
                              </span>
                              <span class="tick" style="left: 75%;">| <br>
                                <span class="marker">60L</span>
                              </span>
                              <span class="tick d-none d-sm-block" style="left: 87.5%;">| <br>
                                <span class="marker">70L</span>
                              </span>
                              <span class="tick" style="left: 100%;">| <br>
                                <span class="marker">80L</span>
                              </span>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="row form-group lint mb-5">
                              <label class="col-lg-4 control-label" for="loaninterest">Interest Rate</label>
                              <div class="col-lg-8">
                                <div class="input-group">
                                  <input class="form-control" id="loaninterest" name="loaninterest" value="10.5" type="text">
                                  <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div id="loaninterestslider"></div>
                            <div id="loanintereststeps" class="steps">
                              <span class="tick" style="left: 0%;">| <br>
                                <span class="marker">5</span>
                              </span>
                              <span class="tick" style="left: 16.67%;">| <br>
                                <span class="marker">7.5</span>
                              </span>
                              <span class="tick" style="left: 33.34%;">| <br>
                                <span class="marker">10</span>
                              </span>
                              <span class="tick" style="left: 50%;">| <br>
                                <span class="marker">12.5</span>
                              </span>
                              <span class="tick" style="left: 66.67%;">| <br>
                                <span class="marker">15</span>
                              </span>
                              <span class="tick" style="left: 83.34%;">| <br>
                                <span class="marker">17.5</span>
                              </span>
                              <span class="tick" style="left: 100%;">| <br>
                                <span class="marker">20</span>
                              </span>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="row form-group lterm mb-5">
                              <label class="col-lg-4 control-label" for="loanterm">Loan Tenure</label>
                              <div class="col-lg-8">
                                <div class="loantermwrapper">
                                  <div class="input-group">
                                    <input class="form-control" id="loanterm" name="loanterm" value="20" type="text">
                                    <div class="input-group-append tenure-choice" data-toggle="buttons">
                                      <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-outline-red active">
                                          <input type="radio" name="loantenure" id="loanyears" value="loanyears" tabindex="4" autocomplete="off" checked="checked">Yr </label>
                                        <label class="btn btn-outline-red">
                                          <input type="radio" name="loantenure" id="loanmonths" value="loanmonths" tabindex="5" autocomplete="off">Mo </label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div id="loantermslider"></div>
                            <div id="loantermsteps" class="steps">
                              <span class="tick" style="left: 0%;">| <br>
                                <span class="marker">0</span>
                              </span>
                              <span class="tick" style="left: 16.67%;">| <br>
                                <span class="marker">5</span>
                              </span>
                              <span class="tick" style="left: 33.33%;">| <br>
                                <span class="marker">10</span>
                              </span>
                              <span class="tick" style="left: 50%;">| <br>
                                <span class="marker">15</span>
                              </span>
                              <span class="tick" style="left: 66.67%;">| <br>
                                <span class="marker">20</span>
                              </span>
                              <span class="tick" style="left: 83.33%;">| <br>
                                <span class="marker">25</span>
                              </span>
                              <span class="tick" style="left: 100%;">| <br>
                                <span class="marker">30</span>
                              </span>
                            </div>
                          </div>
                        </div>
                        <div id="leschemewrapper" class="sep toggle-visible">
                          <div class="sep row form-group escheme">
                            <label class="col-lg-4 control-label" for="emischeme">EMI Scheme</label>
                            <div class="col-lg-8">
                              <div class="input-group emischemes">
                                <div class="btn-group btn-group-toggle add-check" data-toggle="buttons">
                                  <label class="btn btn-secondary">
                                    <input type="radio" name="emischeme" id="emiadvance" value="emiadvance" tabindex="4" autocomplete="off">EMI in Advance </label>
                                  <label class="btn btn-secondary active">
                                    <input type="radio" name="emischeme" id="emiarrears" value="emiarrears" tabindex="5" autocomplete="off" checked="checked">EMI in Arrears </label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <input id="loanproduct" name="loanproduct" value type="hidden">
                      <input id="loanstartdate" name="loanstartdate" value type="hidden">
                      <input id="loanyearformat" name="loanyearformat" value type="hidden">
                      <input id="loandata" name="loandata" value type="hidden">
                      <input id="calcversion" name="calcversion" value=4.0 type="hidden">
                    </form>
                    <div class="row gutter-left gutter-right">
                      <div id="emipaymentsummary" class="col-sm-5 col-md-6 no-gutter-left no-gutter-right">
                        <div id="emiamount">
                          <h4>Loan EMI</h4>
                          <p>₹ <span>24,959</span>
                          </p>
                        </div>
                        <div id="emitotalinterest">
                          <h4>Total Interest Payable</h4>
                          <p>₹ <span>34,90,279</span>
                          </p>
                        </div>
                        <div id="emitotalamount" class="column-last">
                          <h4>Total Payment <br>(Principal + Interest) </h4>
                          <p>₹ <span>59,90,279</span>
                          </p>
                        </div>
                      </div>
                      <div id="emipiechart" class="no-gutter-left no-gutter-right col-sm-7 col-md-6 highcharts-container"></div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div id="emipaymentdetails">
                <form class="gutter-left gutter-right form-horizontal">
                  <div class="row form-group" id="emipaymentscheduleheader">
                    <label class="col-md-4 col-lg-5 control-label" for="startmonthyear">Schedule showing EMI payments starting from</label>
                    <div class="col-md-4 col-lg-3">
                      <div class="input-group">
                        <input class="form-control" id="startmonthyear" name="startmonthyear" value type="text">
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 col-lg-3 form-group lyearformat">
                      <select class="form-control" tabindex="15" name="yearformat" id="yearformat">
                        <option value="calendaryear" selected="selected">Calendar Year wise</option>
                        <option value="financialyear">Financial Year wise</option>
                      </select>
                    </div>
                  </div>
                </form>
                <div id="emibarchart" class="hidden-ts highcharts-container"></div>
                <div id="emipaymenttable"></div>
              </div>
            </div>
          </div>

        </div>
        <!--/column -->
      </div>
      <!--/.row -->
    </div>
    <!-- /.container -->
  </section>
  <!-- /section -->

  <section class="wrapper bg-link-water">
    <div class="container pt-10 pt-md-12 pb-10 pb-md-12">
      <div class="row">
        <div class="col-lg-12 mb-0 text-center">
            <p>Instant personal loan EMI calculator makes it easy for you to figure out the monthly installments on your loan.</p>

            <p>When you take an <a href="<?php echo site_url('onlineprocess/personalLoan'); ?>" target="_self">Instant personal loan</a>, the equated monthly installment is a key factor in deciding the loan amount and tenure. The <a href="<?php echo site_url('loan/calculator'); ?>" target="_self">personal loan calculator</a> helps you instantly calculate your pay-outs and, therefore, plan your personal loan and repayment better.</p>

            <p>To calculate your EMI, just enter the loan amount, rate of interest and loan tenure, and your EMI is instantly displayed. You can enter loan amounts from 25,000/- to 40,00,000/- on term from 1 to 6 years.</p>

            <p>The personal loan EMI calculator is designed to be easy-to-use and intuitive.You can use the personal loan EMI calculator to calculate the EMI on personal loan from any bank or financial institution. It is free to use.</p>
        </div>
        <!--/column -->
      </div>
      <!--/.row -->
    </div>
    <!-- /.container -->
  </section>
  <!-- /section -->

  <section class="wrapper bg-light">
    <div class="container py-10 py-md-12">
      <div class="row">
        <div class="col-lg-6 mb-0">
          <div id="accordion-1" class="accordion-wrapper">

            <div class="card accordion-item">
              <div class="card-header" id="accordion-heading-1-1">
                <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-1-1" aria-expanded="false" aria-controls="accordion-collapse-1-1">What is Personal Loan EMI?</button>
              </div>
              <!-- /.card-header -->
              <div id="accordion-collapse-1-1" class="collapse" aria-labelledby="accordion-heading-1-1" data-bs-target="#accordion-1">
                <div class="card-body">
                  <p>An EMI (Equated Monthly Installment) is a specified amount of money to be paid by the loan borrower to the lender on monthly basis. The EMI depends on the interest rate, loan repayment tenure, and loan amount. EMIs are scheduled at a particular date of every month.</p>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.collapse -->
            </div>
            <!-- /.card -->

            <div class="card accordion-item">
              <div class="card-header" id="accordion-heading-1-2">
                <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-1-2" aria-expanded="false" aria-controls="accordion-collapse-1-2">How to calculate Personal Loan EMI?</button>
              </div>
              <!-- /.card-header -->
              <div id="accordion-collapse-1-2" class="collapse" aria-labelledby="accordion-heading-1-2" data-bs-target="#accordion-1">
                <div class="card-body">
                  <p>It is essential to calculate your EMI before applying for a personal loan. While you can do so manually, using a Personal loan calculator can help you determine the more accurate value. You can select the required loan amount, tenure and rate of interest to get the exact payable EMI amount with an interactive chart.</p>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.collapse -->
            </div>
            <!-- /.card -->

            <div class="card accordion-item">
              <div class="card-header" id="accordion-heading-1-3">
                <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-1-3" aria-expanded="false" aria-controls="accordion-collapse-1-3">How to reduce your Personal Loan EMI?</button>
              </div>
              <!-- /.card-header -->
              <div id="accordion-collapse-1-3" class="collapse" aria-labelledby="accordion-heading-1-3" data-bs-target="#accordion-1">
                <div class="card-body">
                  <p>EMI may affect your monthly expenses until the entire loan repayment is done. Some simple steps that can help you reduce the personal loan EMI and manage outlays easily are:</p>
                  <ul>
                    <li>Option for a longer repayment tenor - It will help you spread the loan cost over a longer duration and help you pay in small installments.</li>
                    <li>Negotiate with the loan provider for a lower rate of interest.</li>
                    <li>You can choose a higher down payment for the rest of the loan amount to decrease.</li>
                    <li>Opt for the step-down EMI.</li>
                    <li>Change the lender if you get a loan offer with lesser EMI.</li>
                    <li>Maintain a strong CIBIL score to enjoy lower interest rates and reduced EMI.</li>
                    <li>Become a indiafinpro.com Member for the best deals as per your needs and repaying capacity.</li>
                  </ul>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.collapse -->
            </div>
            <!-- /.card -->

            <div class="card accordion-item">
              <div class="card-header" id="accordion-heading-1-4">
                <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-1-4" aria-expanded="false" aria-controls="accordion-collapse-1-4">What are the factors that affect Personal Loan EMI?</button>
              </div>
              <!-- /.card-header -->
              <div id="accordion-collapse-1-4" class="collapse" aria-labelledby="accordion-heading-1-4" data-bs-target="#accordion-1">
                <div class="card-body">  
                    <ul>
                      <li>Loan Amount - Monthly installments payable are directly proportional to the loan amount opted for. The higher the loan amount the higher will be your EMI.</li>
                      <li>Applicable Rate of Interest - The interest rate is a percentage at which lenders charge interest on the loan amount. A higher interest rate increases the EMIs.</li>
                      <li>Loan Repayment Tenure - It's the repayment period for the personal loan availed. A longer tenure reduces monthly installments while a shorter one increases it.</li>
                    </ul>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.collapse -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.accordion-wrapper -->
        </div>
        <!--/column -->

        <div class="col-lg-6">
          <div id="accordion-2" class="accordion-wrapper">
            
            <div class="card accordion-item">
              <div class="card-header" id="accordion-heading-2-1">
                <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-2-1" aria-expanded="false" aria-controls="accordion-collapse-2-1">What is Business Loan EMI?</button>
              </div>
              <!-- /.card-header -->
              <div id="accordion-collapse-2-1" class="collapse" aria-labelledby="accordion-heading-2-1" data-bs-target="#accordion-2">
                <div class="card-body">
                  <p>An EMI (Equated Monthly Installment) is a specified amount of money to be paid by the loan borrower to the lender on monthly basis. The EMI depends on the interest rate, loan repayment tenure, and loan amount. EMIs are scheduled at a particular date of every month.</p>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.collapse -->
            </div>
            <!-- /.card -->
            
            <div class="card accordion-item">
              <div class="card-header" id="accordion-heading-2-2">
                <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-2-2" aria-expanded="false" aria-controls="accordion-collapse-2-2">How to calculate Business Loan EMI?</button>
              </div>
              <!-- /.card-header -->
              <div id="accordion-collapse-2-2" class="collapse" aria-labelledby="accordion-heading-2-2" data-bs-target="#accordion-2">
                <div class="card-body">
                  <p>It is essential to calculate your EMI before applying for a business loan. While you can do so manually, using a Business loan calculator can help you determine the more accurate value. You can select the required loan amount, tenure and rate of interest to get the exact payable EMI amount with an interactive chart.</p>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.collapse -->
            </div>
            <!-- /.card -->

            <div class="card accordion-item">
              <div class="card-header" id="accordion-heading-2-2">
                <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-2-2" aria-expanded="false" aria-controls="accordion-collapse-2-2">How to reduce your Business Loan EMI?</button>
              </div>
              <!-- /.card-header -->
              <div id="accordion-collapse-2-2" class="collapse" aria-labelledby="accordion-heading-2-2" data-bs-target="#accordion-2">
                <div class="card-body">
                  <p>EMI may affect your monthly expenses until the entire loan repayment is done. Some simple steps that can help you reduce the business loan EMI and manage outlays easily are:</p>
                  <ul>
                    <li>Option for a longer repayment tenor - It will help you spread the loan cost over a longer duration and help you pay in small installments.</li>
                    <li>Negotiate with the loan provider for a lower rate of interest.</li>
                    <li>You can choose a higher down payment for the rest of the loan amount to decrease.</li>
                    <li>Opt for the step-down EMI.</li>
                    <li>Change the lender if you get a loan offer with lesser EMI.</li>
                    <li>Maintain a strong CIBIL score to enjoy lower interest rates and reduced EMI.</li>
                    <li>Become a indiafinpro.com Member for the best deals as per your needs and repaying capacity.</li>
                  </ul>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.collapse -->
            </div>
            <!-- /.card -->

            <div class="card accordion-item">
              <div class="card-header" id="accordion-heading-2-2">
                <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-collapse-2-2" aria-expanded="false" aria-controls="accordion-collapse-2-2">What are the factors that affect Business Loan EMI?</button>
              </div>
              <!-- /.card-header -->
              <div id="accordion-collapse-2-2" class="collapse" aria-labelledby="accordion-heading-2-2" data-bs-target="#accordion-2">
                <div class="card-body">
                  <ul>
                    <li>Loan Amount - Monthly installments payable are directly proportional to the loan amount opted for. The higher the loan amount the higher will be your EMI.</li>
                    <li>Applicable Rate of Interest - The interest rate is a percentage at which lenders charge interest on the loan amount. A higher interest rate increases the EMIs.</li>
                    <li>Loan Repayment Tenure - It's the repayment period for the business loan availed. A longer tenure reduces monthly installments while a shorter one increases it.</li>
                  </ul>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.collapse -->
            </div>
            <!-- /.card -->
 
          </div>
          <!-- /.accordion-wrapper -->
        </div>
        <!--/column -->
      </div>
      <!--/.row -->
    </div>
    <!-- /.container -->
  </section>
  <!-- /section -->

<?php
    $this->load->view('includes/footer');
?>

<script src="<?php echo base_url('assets/plugins/calc/js/calccore.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/calc/js/mouse.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/calc/js/slider.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/calc/js/commoncalculator.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/calc/js/emicalculator.js'); ?>" type="text/javascript"></script>