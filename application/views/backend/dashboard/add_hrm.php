<!-- BEGIN PAGE CONTENT-->
<style>
.ds .required {
    color: #e02222;
    font-size: 12px;
    padding-left: 2px;
}
.ds .form-group.form-md-line-input .form-control ~ label{width: 94%;left: 19px; top:14px;}
.ds .form-group.form-md-line-input{ margin-bottom:25px; margin-left:0px; margin-right:0px;}
.ds .lt{line-height: 38px;}
  .ds .tld{  margin-bottom: 10px !important;  padding-top: 10px;}
	.tld_in{ background-color: #f8f8f8;    width: 100%;float: left;padding-top: 7px;}
	.tld_in:hover{ background-color: #f1f1f1;}
	.ds .form-group.form-md-line-input.form-md-floating-label .form-control.edited ~ label{top: -10px;}
	/*.ds .form-group.form-md-line-input .form-control{ font-size:13px;}*/
	.ds .dropzone .dz-default.dz-message{width: 100%;height: 50px;margin-left:0px; margin-top:0px;
    top: 0;left: 0;font-size: 50%;}
	.ds .dropzone{min-height: 130px;}
</style>
			<div class="row ds">
				<div class="col-md-12">
<!---->
<div class="portlet light bordered" id="form_wizard_1">
						<div class="portlet-title">
							<div class="caption font-green">
								<i class="icon-pin font-green"></i>
								<span class="caption-subject bold uppercase">Add Employee</span>
							</div>
							
						</div>
						<div class="portlet-body form">
							<form action="#" class="form-horizontal" id="submit_form" method="POST">
								<div class="form-wizard">
									<div class="form-body">
										<ul class="nav nav-pills nav-justified steps">
											<li>
												<a href="#tab1" data-toggle="tab" class="step">
												<span class="number">
												1 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Account Setup </span>
												</a>
											</li>
											<li>
												<a href="#tab2" data-toggle="tab" class="step">
												<span class="number">
												2 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Profile Setup </span>
												</a>
											</li>
											<li>
												<a href="#tab3" data-toggle="tab" class="step active">
												<span class="number">
												3 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Billing Setup </span>
												</a>
											</li>
											<li>
												<a href="#tab4" data-toggle="tab" class="step">
												<span class="number">
												4 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Verification </span>
												</a>
											</li>
										</ul>
										<div id="bar" class="progress progress-striped" role="progressbar">
											<div class="progress-bar progress-bar-success">
											</div>
										</div>
										<div class="tab-content">
											<div class="alert alert-danger display-none">
												<button class="close" data-dismiss="alert"></button>
												You have some form errors. Please check below.
											</div>
											<div class="alert alert-success display-none">
												<button class="close" data-dismiss="alert"></button>
												Your form validation is successful!
											</div>
											<div class="tab-pane active" id="tab1">
											<div class="col-md-12">	<h3 class="block">Personal details</h3></div>
												
												<div class="form-group form-md-line-input form-md-floating-label col-md-6">
										<input type="text" class="form-control" id="form_control_1"> 
										<label>Employee Name <span class="required">*</span></label>
										<span class="help-block">Enter Employee Name...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-6">
									<input type="text" class="form-control date-picker" id="form_control_1" placeholder="DOB *"> 
										<label></label>
										<span class="help-block">Enter First DOB...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-6">
									
										<select class="form-control" id="form_control_1">
											<option value=""></option>
											<option value="5">Male</option>
											<option value="6">Female</option>
										</select>
										<label>Gender <span class="required">*</span></label>
										<span class="help-block">Enter Gender Type...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-6">
									<input type="text" class="form-control" id="form_control_1"> 
										<label>Present Address <span class="required">*</span></label>
										<span class="help-block">Enter Present Address...</span>
									</div>
									
												<div class="form-group form-md-line-input form-md-floating-label col-md-6">
										<input type="text" class="form-control" id="form_control_1"> 
										<label>Permanent Address <span class="required">*</span></label>
										<span class="help-block">Enter Permanent Address...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-6">
									<input type="text" class="form-control" id="form_control_1"> 
										<label>Phone Number <span class="required">*</span></label>
										<span class="help-block">Enter Phone Number...</span>
									</div>
									
												<div class="form-group form-md-line-input form-md-floating-label col-md-6">
										<input type="text" class="form-control" id="form_control_1"> 
										<label>Mobile Number<span class="required">*</span></label>
										<span class="help-block">Enter Mobile Number...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-6">
									<input type="text" class="form-control" id="form_control_1"> 
										<label>Personal Email <span class="required">*</span></label>
										<span class="help-block">Enter Personal Email...</span>
									</div>
									
												<div class="form-group form-md-line-input form-md-floating-label col-md-6">
										<input type="text" class="form-control" id="form_control_1"> 
										<label>Professional Email <span class="required">*</span></label>
										<span class="help-block">Enter Professional Email...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-6">
									<select class="form-control" id="form_control_1">
											<option value=""></option>
											<option value="single">Single</option>
											<option value="married">Married</option>
											<option value="divorced">Divorced</option>
											<option value="widowed">Widowed</option>

										</select>
										<label>Marital Status <span class="required">*</span></label>
										<span class="help-block">Enter Marital Status...</span>
									</div>
									
												<div class="form-group form-md-line-input form-md-floating-label col-md-6">
										<input type="text" class="form-control" id="form_control_1"> 
										<label>Spouse Name <span style="font-size:11px !important; color:red;">(if Married)</span></label>
										<span class="help-block">Enter Spouse Name...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-6">
									<input type="text" class="form-control" id="form_control_1"> 
										<label>Spouse Phone Number <span style="font-size:11px !important; color:red;">(if Married)</span></label>
										<span class="help-block">Enter Spouse Phone Number...</span>
									</div>
									
												<div class="form-group form-md-line-input form-md-floating-label col-md-4">
										<input type="text" class="form-control" id="form_control_1"> 
										<label>Number of Dependents <span class="required">*</span></label>
										<span class="help-block">Enter Dependents...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-4">
									<input type="text" class="form-control" id="form_control_1"> 
										<label>Number of Children<span class="required">*</span></label>
										<span class="help-block">Enter Number of Children...</span>
									</div>
									
												<div class="form-group form-md-line-input form-md-floating-label col-md-4">
										<select class="form-control" id="form_control_1">
											<option value=""></option>
											<option value="single">Hindu</option>
											<option value="married">Demo</option>
										</select>
										<label>Religion <span class="required">*</span></label>
										<span class="help-block">Enter Religion...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-4">
									<select class="form-control" id="form_control_1">
											<option value=""></option>
											<option value="single">Hindu</option>
											<option value="married">Demo</option>
										</select>
										<label>Caste <span class="required">*</span></label>
										<span class="help-block">Enter Caste Name...</span>
									</div>
									
												<div class="form-group form-md-line-input form-md-floating-label col-md-4">
										<select class="form-control" id="form_control_1">
											<option value=""></option>
											<option value="single">Yes</option>
											<option value="married">No</option>
										</select>
										<label>Handicapped ?<span class="required">*</span></label>
										<span class="help-block">Enter Handicapped...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-4">
									<select class="form-control" id="form_control_1">
											<option value=""></option>
											<option value="single">A</option>
											<option value="married">B</option>
											<option value="single">O</option>
											<option value="married">AB</option>
											<option value="single">AB+</option>
											<option value="married">AB-</option>
										</select> 
										<label>Blood Group <span class="required">*</span></label>
										<span class="help-block">Enter Blood Group...</span>
									</div>
									<div class="col-md-12"><h4><strong>Emergency Contact details</strong></h4></div>
												<div class="form-group form-md-line-input form-md-floating-label col-md-4">
												
										<input type="text" class="form-control" id="form_control_1"> 
										<label>Contact Name <span class="required">*</span></label>
										<span class="help-block">Enter Contact Name...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-4">
									<select class="form-control" id="form_control_1">
											<option value=""></option>
											<option value="single">Hindu</option>
											<option value="married">Demo</option>
										</select>
										<label>Relation <span class="required">*</span></label>
										<span class="help-block">Enter Relation...</span>
									</div>
									
												<div class="form-group form-md-line-input form-md-floating-label col-md-4">
										<input type="text" class="form-control" id="form_control_1"> 
										<label>Phone/ Mobile Number <span class="required">*</span></label>
										<span class="help-block">Enter Phone/ Mobile Number...</span>
									</div>
									
									<div class="col-md-12"><h4><strong>Medical Condition</strong></h4></div>
												<div class="form-group form-md-line-input form-md-floating-label col-md-6">
										<input type="text" class="form-control" id="form_control_1"> 
										<label>Condition Name <span class="required">*</span></label>
										<span class="help-block">Enter Condition Name...</span>
									</div>
									
												<div class="form-group form-md-line-input form-md-floating-label col-md-6">
										<input type="text" class="form-control" id="form_control_1"> 
										<label>Condition Description <span class="required">*</span></label>
										<span class="help-block">Enter Condition Description...</span>
									</div>
									
									<div class="col-md-12"><h4><strong>Extra-Curricular activities </strong></h4></div>
												<div class="form-group form-md-line-input form-md-floating-label col-md-4">
										<input type="text" class="form-control" id="form_control_1"> 
										<label>Activity Name <span class="required">*</span></label>
										<span class="help-block">Enter Activity Name...</span>
									</div>
									
											<div class="form-group form-md-line-input form-md-floating-label col-md-4">
										<select class="form-control" id="form_control_1">
											<option value=""></option>
											<option value="novice">Novice</option>
											<option value="beginner">Beginner</option>
											<option value="intermediate">Intermediate</option>
											<option value="pro">Pro</option>

										</select>
										<label>Level <span class="required">*</span></label>
										<span class="help-block">Enter Level...</span>
									</div>
									
												<div class="form-group form-md-line-input form-md-floating-label col-md-4">
										<input type="text" class="form-control" id="form_control_1"> 
										<label>Activity Description<span class="required">*</span></label>
										<span class="help-block">Enter Activity Description...</span>
									</div>
									
												<div class="clearfix"></div>
											</div>
											<div class="tab-pane" id="tab2">
												<div class="col-md-12"><h3 class="block">Professional details</h3></div>
												<div class="form-group form-md-line-input form-md-floating-label col-md-4">
										<input type="text" class="form-control" id="form_control_1"> 
										<label> Organization <span class="required">*</span></label>
										<span class="help-block">Enter Organization Name...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-4">
									<input type="text" class="form-control" id="form_control_1"> 
										<label>Branch <span class="required">*</span></label>
										<span class="help-block">Enter Branch Name...</span>
									</div>
								
									<div class="form-group form-md-line-input form-md-floating-label col-md-4">
									<input type="text" class="form-control" id="form_control_1"> 
										<label>Department <span class="required">*</span></label>
										<span class="help-block">Enter Department Name...</span>
									</div>
									
												<div class="form-group form-md-line-input form-md-floating-label col-md-4">
										<input type="text" class="form-control" id="form_control_1"> 
										<label>Workgroup <span class="required">*</span></label>
										<span class="help-block">Enter Workgroup Name...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-4">
									<input type="text" class="form-control" id="form_control_1"> 
										<label>Location <span class="required">*</span></label>
										<span class="help-block">Enter Location...</span>
									</div>
									
												<div class="form-group form-md-line-input form-md-floating-label col-md-4">
										<input type="text" class="form-control" id="form_control_1"> 
										<label>Designation<span class="required">*</span></label>
										<span class="help-block">Enter Designation...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-4">
									<input type="text" class="form-control" id="form_control_1"> 
										<label>Roll<span class="required">*</span></label>
										<span class="help-block">Enter Your Roll...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-4">
									<select class="form-control" id="form_control_1">
											<option value=""></option>
											<option value="fresher">Fresher</option>
											<option value="junior">Junior</option>
											<option value="executive">Executive</option>
											<option value="lower_management">Lower Management</option>
											<option value="medium_management">Medium Management</option>
											<option value="Higher_management">Higher Management</option>
											<option value="stakeholder">Stakeholder</option>

										</select>
										<label>Level <span class="required">*</span></label>
										<span class="help-block">Enter Your Level...</span>
									</div>
									
									<div class="form-group form-md-line-input form-md-floating-label col-md-4">
									<select class="form-control" id="form_control_1">
											<option value=""></option>
											<option value="name">Name</option>
										</select>
										<label>Reporting to <span class="required">*</span></label>
										<span class="help-block">Enter Reporting to...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-4">
									<input type="text" class="form-control date-picker" id="form_control_1"  placeholder="Joining Date *"> 
										<label></label>
										<span class="help-block">Enter Joining Date...</span>
									</div>
									
									<div class="form-group form-md-line-input form-md-floating-label col-md-4">
									<select class="form-control" id="form_control_1">
											<option value=""></option>
											<option value="full_time">Full Time</option>
											<option value="part_time">Part Time</option>
										</select>
										<label>Mode of Engagement <span class="required">*</span></label>
										<span class="help-block">Select Engagement Name...</span>
									</div>
									
									<div class="col-md-12"><h4><strong>Salary</strong></h4></div>
												<div class="form-group form-md-line-input form-md-floating-label col-md-4">
										<input type="text" class="form-control" id="form_control_1"> 
										<label>CTC <span class="required">*</span></label>
										<span class="help-block">Enter Your CTC...</span>
									</div>
									
									<div class="form-group form-md-line-input form-md-floating-label col-md-4">
										<input type="text" class="form-control" id="form_control_1"> 
										<label>Cash in Hand <span class="required">*</span></label>
										<span class="help-block">Enter Cash in Hand Amount...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-4">
									<select class="form-control" id="form_control_1">
											<option value=""></option>
											<option value="yes">Yes</option>
											<option value="no">No</option>
										</select>
										<label>Taxable ? <span class="required">*</span></label>
										<span class="help-block">Taxable ?...</span>
									</div>
									
									
									<div class="col-md-12"><h4><strong>Has PF? </strong></h4></div>
												<div class="form-group form-md-line-input form-md-floating-label col-md-4">
										<input type="text" class="form-control" id="form_control_1"> 
										<label> Name <span class="required">*</span></label>
										<span class="help-block">Enter Name...</span>
									</div>
												<div class="form-group form-md-line-input form-md-floating-label col-md-4">
										<input type="text" class="form-control" id="form_control_1"> 
										<label>Account No.<span class="required">*</span></label>
										<span class="help-block">Enter Account No...</span>
									</div>
									<div class="col-md-12"><h4><strong>Previous Employment detail  </strong></h4></div>
									
									<div class="form-group form-md-line-input form-md-floating-label col-md-4">
										<input type="text" class="form-control" id="form_control_1"> 
										<label>Company Name <span class="required">*</span></label>
										<span class="help-block">Enter Company Name...</span>
									</div>
												<div class="form-group form-md-line-input form-md-floating-label col-md-4">
										<input type="text" class="form-control" id="form_control_1"> 
										<label> Industry Type <span class="required">*</span></label>
										<span class="help-block">Enter Industry Type...</span>
									</div>
												<div class="form-group form-md-line-input form-md-floating-label col-md-4">
										<input type="text" class="form-control" id="form_control_1"> 
										<label>Location<span class="required">*</span></label>
										<span class="help-block">Enter Location...</span>
									</div>
									
											<div class="form-group form-md-line-input form-md-floating-label col-md-4">
										<input type="text" class="form-control" id="form_control_1"> 
										<label>Designation <span class="required">*</span></label>
										<span class="help-block">Enter Designation...</span>
									</div>
												<div class="form-group form-md-line-input form-md-floating-label col-md-4">
										<input type="text" class="form-control" id="form_control_1"> 
										<label>CTC<span class="required">*</span></label>
										<span class="help-block">Enter CTC...</span>
									</div>
									
											<div class="form-group form-md-line-input form-md-floating-label col-md-4">
										<input type="text" class="form-control" id="form_control_1"> 
										<label>Job Role <span class="required">*</span></label>
										<span class="help-block">Enter Job Role...</span>
									</div>
												<div class="form-group form-md-line-input form-md-floating-label col-md-4">
										<input type="text" class="form-control" id="form_control_1"> 
										<label>Reason for leaving<span class="required">*</span></label>
										<span class="help-block">Enter Reason for leaving...</span>
									</div>
											
									
									<div>
									<div class="col-md-12"><h4><strong>Skill Set  </strong></h4></div>
									
									<div class="form-group form-md-line-input form-md-floating-label col-md-4">
										<input type="text" class="form-control" id="form_control_1"> 
										<label>Skill Name <span class="required">*</span></label>
										<span class="help-block">Enter Skill Name...</span>
									</div>
												<div class="form-group form-md-line-input form-md-floating-label col-md-4">
										<select class="form-control" id="form_control_1">
											<option value=""></option>
											<option value="yes">Low</option>
											<option value="no">High</option>
											<option value="no"> Medium</option>
											<option value="no">Expert</option>
										</select> 
										<label> Proficiency <span class="required">*</span></label>
										<span class="help-block">Enter Proficiency Type...</span>
									</div>
												<div class="form-group form-md-line-input form-md-floating-label col-md-4">
										<select class="form-control" id="form_control_1">
											<option value=""></option>
											<option value="yes">Yes</option>
											<option value="no">No</option>
										</select>  
										<label>Being Used on Current Job Profile?<span class="required">*</span></label>
										<span class="help-block">Enter Current job Profile...</span>
									</div>
									
											<div class="form-group form-md-line-input form-md-floating-label col-md-4">
										<select class="form-control" id="form_control_1">
											<option value=""></option>
											<option value="yes">Being used currently?</option>
											<option value="no">Add Date</option>
										</select>  
										<label>Last Used  <span class="required">*</span></label>
										<span class="help-block">Enter Last Used...</span>
									</div>
												<div class="form-group form-md-line-input form-md-floating-label col-md-4">
										<select class="form-control" id="form_control_1">
											<option value=""></option>
											<option value="01">01</option>
											<option value="02">02</option>
											<option value="03">03</option>
											<option value="04">04</option>
											<option value="05">05</option>
											<option value="06">06</option>
											<option value="07">07</option>
											<option value="08">08</option>
											<option value="09">09</option>
											<option value="10">10</option>
										</select> 
										<label>Self-Assessment grade <span class="required">*</span></label>
										<span class="help-block">Self-Assessment grade...</span>
									</div>
									<div class="col-md-12"><h4><strong>Certified?</strong></h4></div>
											<div class="form-group form-md-line-input form-md-floating-label col-md-4">
										<input type="text" class="form-control date-picker" id="form_control_1" placeholder="Certified from *"> 
										<label></label>
										<span class="help-block">Enter Certified from...</span>
									</div>
												<div class="form-group form-md-line-input form-md-floating-label col-md-4">
										<input type="text" class="form-control date-picker" id="form_control_1" placeholder="Valid till *"> 
										<label></label>
										<span class="help-block">Enter Valid till Date...</span>
									</div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-12">
										<textarea type="text" class="form-control" id="form_control_1"> </textarea>
										<label>Description <span class="required">*</span></label>
										<span class="help-block">Enter Description...</span>
									</div>
									
									
												<div class="clearfix"></div>
											</div></div>	
											<div class="tab-pane" id="tab3">
											<div class="col-md-12">	<h3 class="block">Documentation (Upload Section)</h3></div>
									<div class="form-group form-md-line-input form-md-floating-label col-md-3">
									<p><strong>Employee Photo</strong></p>
			<div action="http://localhost/hotel//assets/dashboard/assets/global/plugins/dropzone/upload.php" class="dropzone" id="my-dropzone">
					</div>
						</div>
						<div class="form-group form-md-line-input form-md-floating-label col-md-3">
									<p><strong>Pan Card</strong></p>
			<div action="http://localhost/hotel//assets/dashboard/assets/global/plugins/dropzone/upload.php" class="dropzone" id="my-dropzone">
					</div>
						</div>
						<div class="form-group form-md-line-input form-md-floating-label col-md-3">
									<p><strong>Voter ID Card</strong></p>
			<div action="http://localhost/hotel//assets/dashboard/assets/global/plugins/dropzone/upload.php" class="dropzone" id="my-dropzone">
					</div>
						</div>
						<div class="form-group form-md-line-input form-md-floating-label col-md-3">
									<p><strong>Adhar Card</strong></p>
			<div action="http://localhost/hotel//assets/dashboard/assets/global/plugins/dropzone/upload.php" class="dropzone" id="my-dropzone">
					</div>
						</div>
						<div class="form-group form-md-line-input form-md-floating-label col-md-3">
									<p><strong>Previous Company Release Letter</strong></p>
			<div action="http://localhost/hotel//assets/dashboard/assets/global/plugins/dropzone/upload.php" class="dropzone" id="my-dropzone">
					</div>
						</div>
						<div class="form-group form-md-line-input form-md-floating-label col-md-3">
									<p><strong>Last 3 Salary Slip</strong></p>
			<div action="http://localhost/hotel//assets/dashboard/assets/global/plugins/dropzone/upload.php" class="dropzone" id="my-dropzone">
					</div>
						</div>
						<div class="form-group form-md-line-input form-md-floating-label col-md-3">
									<p><strong>CV</strong></p>
			<div action="http://localhost/hotel//assets/dashboard/assets/global/plugins/dropzone/upload.php" class="dropzone" id="my-dropzone">
					</div>
						</div>
						<div class="form-group form-md-line-input form-md-floating-label col-md-3">
									<p><strong>Offer Letter</strong></p>
			<div action="http://localhost/hotel//assets/dashboard/assets/global/plugins/dropzone/upload.php" class="dropzone" id="my-dropzone">
					</div>
						</div>
						<div class="form-group form-md-line-input form-md-floating-label col-md-3">
									<p><strong>Joining Letter</strong></p>
			<div action="http://localhost/hotel//assets/dashboard/assets/global/plugins/dropzone/upload.php" class="dropzone" id="my-dropzone">
					</div>
						</div>
						<div class="form-group form-md-line-input form-md-floating-label col-md-3">
									<p><strong>Add other Document </strong></p>
			<div action="http://localhost/hotel//assets/dashboard/assets/global/plugins/dropzone/upload.php" class="dropzone" id="my-dropzone">
					</div>
						</div>
									<div class="clearfix"></div>
											</div>
											<div class="tab-pane" id="tab4">
												<div class="col-md-12"><h3 class="block">Verification</h3></div>
												<div class="col-md-12"><h4>Your request has been processed</h4></div>
											</div>
										</div>
									</div>
									<div class="form-actions">
										<div class="row">
											<div class="col-md-offset-3 col-md-9">
												<a href="javascript:;" class="btn default button-previous">
												<i class="m-icon-swapleft"></i> Back </a>
												<a href="javascript:;" class="btn blue button-next">
												Continue <i class="m-icon-swapright m-icon-white"></i>
												</a>
												<a href="javascript:;" class="btn green button-submit">
												Submit <i class="m-icon-swapright m-icon-white"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					<div class="clearfix"></div>
<!---->

			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
	