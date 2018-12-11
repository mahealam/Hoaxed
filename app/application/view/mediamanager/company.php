    <?php
    $company = $data['company'];
    $reviews = $data['reviews'];
     ?>

    <div id="page-contents">
      <div class="container">
        <!-- Timeline
          ================================================= -->
        <div class="timeline">
          <div class="timeline-cover">
            <!--Timeline Menu for Large Screens-->
            <div class="timeline-nav-bar">
              <div class="row">
                <div class="col-md-3">
                  <div class="profile-info">
                    <img src="<?php echo $company['company_logo']; ?>" alt="" class="img-responsive profile-photo" />
                    <h3><?php echo $company['company_name']; ?></h3>
                    <p class="text-muted"><?php echo $company['company_type']; ?></p>
                  </div>
                </div>
                <div class="col-md-9">
                  <ul class="list-inline profile-menu">
                    <li><a href="#"><?php echo $company['company_slogan']; ?></a></li>
                  </ul>
                  <ul class="follow-me list-inline">
                    <li>1,299 Reviews</li>
                    <li><a href="#review-submit" class="btn-primary">Post Review</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <!--Timeline Menu for Large Screens End-->
          </div>
          <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-7" style="margin-top: 45px;">
              <h4>Information:</h4>
              <p><?php echo $company['company_information']; ?></p>
              <p>Address: <?php echo $company['company_address']; ?></p>
              <div class="line-divider"></div>
              <?php foreach ($reviews as $review): ?>

              <div class="row post-comment">
                <div class="col-md-1">
                  <img src="<?php echo URL; ?>images/users/user-11.jpg" alt="" class="profile-photo-sm">
                </div>
                <div class="col-md-11">
                  <p><a href="#"><?php echo $review['first_name']; ?> <?php echo $review['last_name']; ?>: </a><?php echo $review['review']; ?></p>
                </div>
              </div>
              <?php endforeach; ?>

              
              <div class="row post-comment">
                <div class="col-md-1">
                  <img src="<?php echo URL; ?>images/users/user-11.jpg" alt="" class="profile-photo-sm">
                </div>
                
                <div class="col-md-11">
                  <textarea id="review" class="form-control" placeholder="Post a review"></textarea>
                  <input type="hidden" id="company_id" name="company_id" value="<?php echo $company['company_id']; ?>">
                </div>
                <div class="col-md-1">
                </div>
                <div class="col-md-11">
                  <div class="mt-5 rating-wrapper">
                    <input type="radio" id="star1" name="rating" value="1" />
                    <label for="star1"></label>
                    <input type="radio" id="star2" name="rating" value="1"/>
                    <label for="star2"></label>
                    <input type="radio" id="star3" name="rating" value="1" checked="checked"/>
                    <label for="star3"></label>
                    <input type="radio" id="star4" name="rating" value="1" />
                    <label for="star4"></label>
                    <input type="radio" id="star5" name="rating" value="1" />
                    <label for="star5"></label>
                    <button style="margin: 3px 0 0 15px;" id="review-submit" class="btn btn-primary pull-right">Publish</button>
                  </div>

                </div>
                
              </div>
            </div>
            <div class="col-md-2 static">
            </div>
          </div>
        </div>
      </div>
    </div>
<script type="text/javascript">


  $(document).ready(function() {
      
    $("#review-submit").click(function() {

        if($("#user_review").val() != "" ) {
            $.ajax({
                method: "POST",
                url: url + "ajax/submitUserReview",
                dataType: 'json',
                data: {
                    company_id: $("#company_id").val(),
                    rating: $('input[name=rating]:checked').val(),
                    review: $("#review").val()
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

