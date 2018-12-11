    <div id="page-contents">
        <div class="container">
          <div class="row">

          <!-- Newsfeed Common Side Bar Left
          ================================================= -->
          <div class="col-md-3" style="position:static;">
            <div class="profile-card">
              <img src="<?php echo URL; ?>images/users/user-1.jpg" alt="user" class="profile-photo" />
              <h5><a href="#" class="text-white"><?php echo $_SESSION['user']['first_name'] .' '.$_SESSION['user']['last_name']; ?></a></h5>
              <a href="#" class="text-white"><i class="ion ion-android-person-add"></i>Role: Media Manager</a>
            </div><!--profile card ends-->

            <ul class="nav-news-feed">
              <li><i class="icon ion-android-person-add"></i><div><a href="<?php echo URL; ?>mediamanager/addnewcompany">Add Business</a></div></li>
              <li><i class="icon ion-ios-paper"></i><div><a href="<?php echo URL; ?>mediamanager/mycompany">My Business</a></div></li>
              <li><i class="icon ion-ios-people"></i><div><a href="mediamanager/nearby">Business Nearby</a></div></li>
              <li><i class="icon ion-ios-people-outline"></i><div><a href="<?php echo URL; ?>mediamanager/profile">Profile</a></div></li>
              <li><i class="icon ion-chatboxes"></i><div><a href="<?php echo URL; ?>mediamanager/reports">Reports</a></div></li>
            </ul><!--news-feed links ends-->

          </div>

          <!-- Company List
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
                            <h5><a href="<?php echo URL; ?>mediamanager/company/<?php echo $company['company_id']; ?>" class="profile-link"><?php echo $company['company_name']; ?></a></h5>
                            <p><?php echo $company['company_slogan']; ?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>
          </div>
        </div>
    </div>


