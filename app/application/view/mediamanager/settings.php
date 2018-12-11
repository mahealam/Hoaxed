            <div class="row">
                <div class="col-lg-6">
                      <div class="card-box">
                        <h5 class="m-b-5"><b>Upadate Name</b></h5>
                        <p class="text-muted font-13 m-b-30">
                            Use only your actual name
                        </p>

                        <form class="form-horizontal group-border-dashed">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">First name</label>
                                <div class="col-sm-6">
                                    <input type="text" id="fname" class="form-control" required
                                           placeholder="First Name" value="<?php echo $_SESSION['user']['fname']; ?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Last name</label>
                                <div class="col-sm-6">
                                    <input type="text" id="lname" class="form-control" required
                                           placeholder="Last Name" value="<?php echo $_SESSION['user']['lname']; ?>"/>
                                </div>
                            </div>

                            
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9 m-t-15">
                                    <button id="update-name" type="button" class="btn btn-primary waves-effect waves-light">
                                        Update
                                    </button>
                                    <button type="reset" class="btn btn-default waves-effect m-l-5">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- end col -->

                <div class="col-lg-6">
                    <div class="card-box">
                        <h4 class="header-title m-t-0 m-b-30">Update Password</h4>

                        <form class="form-horizontal" role="form" data-parsley-validate novalidate>
                            <div class="form-group">
                                <label for="oldPass" class="col-sm-4 control-label">Old Password*</label>
                                <div class="col-sm-7">
                                    <input type="password" required class="form-control"
                                           id="oldPass" placeholder="Type your old Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="newPass" class="col-sm-4 control-label">New Password*</label>
                                <div class="col-sm-7">
                                    <input id="newPass" type="password" placeholder="Minimum 6 character long" required
                                           class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="confirmNewPass" class="col-sm-4 control-label">Confirm Password
                                    *</label>
                                <div class="col-sm-7">
                                    <input data-parsley-equalto="#newPass" type="password" required
                                           placeholder="Re-type your new Password" class="form-control" id="confirmNewPass">
                                </div>
                            </div>

                            
                           
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <button id="update-password" type="button" class="btn btn-primary waves-effect waves-light">
                                        Update
                                    </button>
                                    <button type="reset"
                                            class="btn btn-default waves-effect waves-light m-l-5">
                                        Reset
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- end col -->



                <div class="col-lg-6">
                    <div class="card-box">
                        <h5 class="m-b-5"><b>Upadate Address</b></h5>
                        <p class="text-muted font-13 m-b-30">Be careful when you change your mailing address</p>

                        <form class="form-horizontal group-border-dashed">

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Address Line 1</label>
                                <div class="col-sm-6">
                                    <input id="adrline1" type="text" class="form-control" required
                                           placeholder="Address Line 1" value="<?php echo $data['adrline1']; ?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Address Line 2</label>
                                <div class="col-sm-6">
                                    <input id="adrline2" type="text" class="form-control" required
                                           placeholder="Address Line 2" value="<?php echo $data['adrline2']; ?>"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">City</label>
                                <div class="col-sm-6">
                                    <input id="city" type="text" class="form-control" required
                                           placeholder="City" value="<?php echo $data['city']; ?>"/>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-3 control-label">States</label>
                                <div class="col-sm-6">
                                    <input id="state" type="text" class="form-control" required
                                           placeholder="States" value="<?php echo $data['state']; ?>"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Zip Code</label>
                                <div class="col-sm-6">
                                    <input id="zip" data-parsley-type="digits" type="text"
                                           class="form-control" required
                                           placeholder="Zip Code" value="<?php echo $data['zip']; ?>"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Phone</label>
                                <div class="col-sm-6">
                                    <input id="phone" data-parsley-type="digits" type="text"
                                           class="form-control" required
                                           placeholder="You Primary Phone" value="<?php echo $data['phone']; ?>"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Country</label>
                                <div class="col-sm-6">
                                    <input id="country" type="text" class="form-control" required
                                           placeholder="Country" value="<?php echo $data['country']; ?>"/>
                                </div>
                            </div>

                            
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9 m-t-15">
                                    <button type="button" id="update-address" class="btn btn-primary waves-effect waves-light">
                                        Update
                                    </button>
                                    <button type="reset" class="btn btn-default waves-effect m-l-5">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- end col -->

                

                


                
               
                <div class="col-lg-6">
                    <div class="card-box">


                        <h4 class="header-title m-t-0 m-b-30">Update E-mails</h4>
                        <form  class="form-horizontal group-border-dashed">

                            <div class="form-group">
                                <label for="emailAddress" class="col-sm-4 control-label">Primary E-mail*</label>
                                <div class="col-sm-7">
                                    <input type="email" name="email" required
                                       placeholder="Enter email" class="form-control" id="primaryEmail" value="<?php echo $_SESSION['user']['email']; ?>">
                                 </div>
                            </div>                           

                            <div class="form-group">
                                 <div class="col-sm-offset-4 col-sm-8">
                                    <button id="update-email" class="btn btn-primary waves-effect waves-light" type="button">
                                        Update
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div><!-- end col -->

                
            </div>
            <!-- end row -->
            <script type="text/javascript">
                    $(document).ready(function() {
                        
                        $('form').parsley();

                        $("#update-name").click(function(){
                            if ($("#fname").val() != "" && $("#lname").val() != "") {
                                $.ajax({
                                    method: "POST",
                                    url: url + "ajax/updateName",
                                    dataType: 'json',
                                    data: {
                                        fname: $("#fname").val(),
                                        lname: $("#lname").val()
                                    }
                                }).done(function(msg) {
                                   swal( msg.prefix, msg.content, msg.status);
                                });
                            } else {
                                swal("Wait!", "Please fill all fields with valid data!", "error");
                                
                            }
                        });


                        $("#update-password").click(function(){
                            if ($("#oldPass").val() != "" && $("#newPass").val() != "") {
                                
                                $.ajax({
                                    method: "POST",
                                    url: url + "ajax/updatePassword",
                                    dataType: 'json',
                                    data: {
                                        oldPass: $("#oldPass").val(),
                                        newPass: $("#newPass").val(),
                                    }
                                }).done(function(msg) {
                                   swal( msg.prefix, msg.content, msg.status);
                                });
                            } else {
                                swal("Wait!", "Please fill all fields with valid data!", "error");
                                
                            }
                        });
                       
                        $("#update-address").click(function(){
                            if ($("#adrline1").val() != "" && $("#adrline2").val() != "" && $("#city").val() != "" && $("#state").val() != "" && $("#zip").val() != "" && $("#phone").val() != "" && $("#country").val() != "" ) { 
                                $.ajax({
                                    method: "POST",
                                    url: url + "ajax/updateAddress",
                                    dataType: 'json',
                                    data: {
                                        adrline1: $("#adrline1").val(),
                                        adrline2: $("#adrline2").val(),
                                        city: $("#city").val(),
                                        state: $("#state").val(),
                                        zip: $("#zip").val(),
                                        phone: $("#phone").val(),
                                        country: $("#country").val()
                                    }
                                }).done(function(msg) {
                                   swal( msg.prefix, msg.content, msg.status);
                                });
                            } else {
                                swal("Wait!", "Please fill all fields with valid data!", "error");  
                            }
                        });
                       
                        
                        $("#update-email").click(function(){
                            if ($("#primaryEmail").val() != "") {
                                $.ajax({
                                    method: "POST",
                                    url: url + "ajax/updateEmail",
                                    dataType: 'json',
                                    data: {
                                        primaryEmail: $("#primaryEmail").val(),
                                    }
                                }).done(function(msg) {
                                   swal( msg.prefix, msg.content, msg.status);
                                });
                            } else {
                                swal("Wait!", "Please fill all fields with valid data!", "error");
                                
                            }
                        });

                    });
                </script>
                <!-- Validation js (Parsleyjs) -->
                <script type="text/javascript" src="<?php echo URL; ?>plugins/parsleyjs/dist/parsley.min.js"></script>