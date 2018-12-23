        <div id="page-contents">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card-box">

                            <h1 class="header-title">Having trouble with our site?</h1>

                            <p class="text-muted">
                                Check our  <code>FAQ</code> Section, We have answered frequently asked question there.
                            </p>

                            <p><span class="dropcap text-primary">Don't</span> hesitate to contact our support team, if you still have any issue with hoaxed.me, We will try our best to get your issue resolved.</p>
                        </div>
                    </div>


                    <div class="col-lg-6">
                        <div class="card-box">

                            <h1 class="header-title m-t-0 m-b-30">Contact Support</h1>

                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Subject</label>
                                    <div class="col-md-10">
                                        <input class="form-control" name="subject" id="user_subject" placeholder="Subject Line" value="" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="email">Email</label>
                                    <div class="col-md-10">
                                        <input id="user_email" name="email" class="form-control" placeholder="Your Email" type="email">
                                    </div>
                                </div>
                               

                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Message</label>
                                    <div class="col-md-10">
                                        <textarea id="user_message" class="form-control" rows="5" placeholder="Please describe your issue in detail..."></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-8">
                                        <button id="help-submit" type="button" class="btn btn-primary waves-effect waves-light">
                                        Send
                                        </button>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    

                </div>
                <!-- end row -->
            </div>
        </div>

                <script type="text/javascript">


                    $(document).ready(function() {
                        
                        $("#help-submit").click(function() {

                            if($("#user_email").val() != "" && $("#user_subject").val() != "" && $("#user_message").val() != "" ) {
                                $.ajax({
                                    method: "POST",
                                    url: url + "ajax/submitUserEnquiry",
                                    dataType: 'json',
                                    data: {
                                        email: $("#user_email").val(),
                                        subject: $("#user_subject").val(),
                                        message: $("#user_message").val()
                                    }
                                }).done(function(msg) {
                                    swal( { title: msg.prefix, text: msg.content, type: msg.status },function() {
                                        if (msg.status === 'success') {
                                                location.reload();
                                        }
                                    });
                                });
                            } else {
                                swal("Wait!", "Please fill all fields with valid data !", "error");
                            }
                        });
                    });
                </script>