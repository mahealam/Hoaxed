    <div id="page-contents">
    	<div class="container">
    		<div class="row">

    			<!-- Newsfeed Common Side Bar Left
          ================================================= -->
    			<div class="col-md-3" style="position:static;">
            <div class="profile-card">
            	<img src="<?php echo URL; ?>images/users/user-1.jpg" alt="user" class="profile-photo" />
            	<h5><a href="#" class="text-white"><?php echo $_SESSION['user']['first_name'] .' '.$_SESSION['user']['last_name']; ?></a></h5>
            	<a href="#" class="text-white"><i class="ion ion-android-person-add"></i>Role: Customer</a>
            </div><!--profile card ends-->
            <ul class="nav-news-feed">
              <li><i class="icon ion-ios-paper"></i><div><a href="<?php echo URL; ?>customer">My Newsfeed</a></div></li>
              <li><i class="icon ion-ios-people"></i><div><a href="<?php echo URL; ?>customer">Business Nearby</a></div></li>
              <li><i class="icon ion-ios-people-outline"></i><div><a href="#">Recent Reviews</a></div></li>
              <li><i class="icon ion-chatboxes"></i><div><a href="#">Messages</a></div></li>

            </ul><!--news-feed links ends-->
          </div>

           <!-- Friend List
            ================================================= -->
    			<div class="col-md-7">
            <div class="company-list">
            	<div class="row">
                  <?php foreach ($data['companies'] as $company): ?>
                  <div class="col-md-6 col-sm-6">
                    <div class="friend-card">
                      <img src="<?php echo URL; ?>images/covers/1.jpg" alt="profile-cover" class="img-responsive cover" />
                      <div class="card-info">
                        <img src="<?php echo $company['company_logo']; ?>" alt="<?php echo $company['company_name']; ?>" class="profile-photo-lg" />
                        <div class="friend-info">
                          <a href="#" class="pull-right text-green"><?php echo $company['company_type']; ?></a>
                          <h5><a href="<?php echo URL; ?>customer/company/<?php echo $company['company_id']; ?>" class="profile-link"><?php echo $company['company_name']; ?></a></h5>
                          <p><?php echo $company['company_slogan']; ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php endforeach; ?>
            	</div>
            </div>
          </div>

    			<!-- Newsfeed Common Side Bar Right
          ================================================= -->
    			<div class="col-md-2 static">
            <div class="suggestions" id="sticky-sidebar">
              <h4 class="grey">Who to Follow</h4>
              <div class="follow-user">
                <img src="<?php echo URL; ?>images/users/user-11.jpg" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">Diana Amber</a></h5>
                  <a href="#" class="text-green">Add friend</a>
                </div>
              </div>
              <div class="follow-user">
                <img src="<?php echo URL; ?>images/users/user-12.jpg" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">Cris Haris</a></h5>
                  <a href="#" class="text-green">Add friend</a>
                </div>
              </div>
              <div class="follow-user">
                <img src="<?php echo URL; ?>images/users/user-13.jpg" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">Brian Walton</a></h5>
                  <a href="#" class="text-green">Add friend</a>
                </div>
              </div>
              <div class="follow-user">
                <img src="<?php echo URL; ?>images/users/user-14.jpg" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">Olivia Steward</a></h5>
                  <a href="#" class="text-green">Add friend</a>
                </div>
              </div>
              <div class="follow-user">
                <img src="<?php echo URL; ?>images/users/user-15.jpg" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">Sophia Page</a></h5>
                  <a href="#" class="text-green">Add friend</a>
                </div>
              </div>
            </div>
          </div>
    		</div>
    	</div>
    </div>


