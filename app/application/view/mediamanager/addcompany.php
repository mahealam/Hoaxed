    <div id="page-contents">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-7">
              <!-- Edit Work and Education
              ================================================= -->
              <div class="new-company-container">
                <div class="block-title">
                  <h1 class="grey"><i class="icon ion-ios-book-outline"></i> Add Business Profile</h1>
                  <div class="line"></div>
                  <p>Please fill in the form to register your business On Hoaxed.me</p>
                  <div class="line"></div>
                </div>
                <div class="edit-block">
                  <form name="business" id="business" class="form-inline">
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="school">Business Name</label>
                        <input id="company_name" class="form-control input-group-lg" name="company_name" title="Enter Business Name" placeholder="My Business" value="" type="text">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="school">Business Logo</label>
                        <input id="company_logo" class="form-control input-group-lg" name="company_name" title="Enter Business Name" placeholder="Enter the link of your logo" value="" type="text">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="school">Business Cover</label>
                        <input id="company_cover" class="form-control input-group-lg" name="company_name" title="Enter Business Name" placeholder="Enter the link of your cover" value="" type="text">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-6">
                        <label for="date-from">Business Slogan</label>
                        <input id="company_slogan" class="form-control input-group-lg" name="date" title="Enter your Business Slogan" placeholder="Enter your business slogan" value="" type="text">
                      </div>
                      <div class="form-group col-xs-6">
                        <label for="date-to" class="">Business Type</label>
                        <input id="company_type" class="form-control input-group-lg" name="date" title="Enter your business type" placeholder="Enter your business type" type="text">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="edu-description">Business Information</label>
                        <textarea id="company_information" name="description" class="form-control" placeholder="Write a short summary of your services to make people better understand your business" rows="4" cols="400"></textarea>
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="edu-description">Business Address</label>
                        <textarea id="company_address" name="description" class="form-control" placeholder="Enter your business address" rows="4" cols="400"></textarea>
                      </div>
                    </div>
                    
                    <button type="button" id="submit-business" class="btn btn-primary">Save</button>
                  </form>
                </div>
              </div>
            </div>
            
            <div class="col-md-2">
              
            </div>


          </div>
        </div>
      </div>
      <script type="text/javascript">

        $(document).ready(function() {
            
          $("#submit-business").click(function() {

              if($("#company_name").val() != "" && $("#company_type").val() != "") {
                  $.ajax({
                      method: "POST",
                      url: url + "ajax/submitBusiness",
                      dataType: 'json',
                      data: {
                          company_name: $("#company_name").val(),
                          company_logo: $("#company_logo").val(),
                          company_cover: $("#company_cover").val(),
                          company_type: $("#company_type").val(),
                          company_slogan: $("#company_slogan").val(),
                          company_information: $("#company_information").val(),
                          company_address: $("#company_address").val()
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