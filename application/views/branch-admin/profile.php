
<?php

#Name

if(!$this->session->userdata['emp_id']){
  redirect(base_url());
}

$name = $this->session->userdata('emp_name');
$fname = $this->session->userdata('fname');
$lname = $this->session->userdata('lname');
$job_title = $this->session->userdata['job_title'];
if($job_title == 'BM'){
  $job_name = 'Branch Manager';
}else{
  $job_name = '';
}


 #avatar
 $avatar = $this->session->userdata('avatar');
 $avatar_path = FCPATH . 'uploads/avatar/' . $avatar;
 $default_avatar = base_url('assets/admin-assets/avatar/no_avatar.png');

 if (file_exists($avatar_path) && !empty($avatar)) {
     $avatar_url = base_url('uploads/avatar/' . $avatar);
 } else {
     $avatar_url = $default_avatar;
 }





?>



<main id="main" class="main">

    <div class="pagetitle">
      <h1>My Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url();?>branch-admin">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">My Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="<?= $avatar_url; ?>" alt="Profile" class="rounded-circle">
              <h2><?= $name; ?></h2>
              <h3>Branch Manager</h3>
             
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?= $name; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Job</div>
                    <div class="col-lg-9 col-md-8">Branch Manager</div>
                  </div>

                 

               
                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

              


                  <!-- Profile Edit Form -->
                  <form method="POST" id="profileAvatarForm" enctype="multipart/form-data">
                   
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="<?= $avatar_url; ?>" id="display_avatar" alt="Profile">
                        <div class="pt-2">

                          <input type="file" id="my-avatar" name="my_avatar"  accept="image/png, image/jpeg" class="form-control" title="Upload new profile image">
                          <!-- <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a> -->
                        </div>
                      </div>
                    </div>

                    
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fname" type="text" class="form-control" id="fname" value="<?=$fname; ?>">
                      </div>

                      <label  for="lastName" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                      <div class="col-md-8 col-lg-9 mt-2">
                        <input name="lname" type="text" class="form-control" id="lname" value="<?=$lname; ?>">
                      </div>
                    </div>

                   

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                      <div class="col-md-8 col-lg-9">
                          <input type="text" class="form-control" readonly value="Branch Manager">                      
                      </div>
                    </div>


                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                  </form><!-- End Profile Edit Form -->
                  <div id="status" class="alert" role="alert" style="display: none;"></div>

                </div>


                  

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form method="POST" id="changePassForm">

                

                    <div class="row mb-3">
                      <label for="current_Password" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input  type="password" name="currentPassword" class="form-control" id="currentPassword" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input  type="password" name="newPassword" class="form-control" id="newPassword" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label >
                      <div class="col-md-8 col-lg-9">
                        <input  type="password" name="re_Password" class="form-control" id="re-password"required>
                      </div>
                    </div>
                    <span id="error_message"></span>

                    <div class="text-center">
                      <button type="submit" id="change-pass-btn" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  
  <script type="text/javascript" src="<?= base_url();?>assets/js/branch-manager/profile.js"></script>
