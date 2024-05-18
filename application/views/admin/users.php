
<main id="main" class="main">
    <div class="pageTitle">
      <h1>Users</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url();?>admin">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Users</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section profile">

     <div class="row">
        

              <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
           <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#newUserModal" type="button"><i class="bi bi-plus-circle"> New</i></button>

        </div>



          <div class="card-body">
            <div class="table-responsive">
              <table class="table datatable table-light" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Type</th>                 
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>
                  <?php 
                  $i = 1;

                  foreach ($sub_users as $user) { ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $user->name; ?></td>
                        <?php
                        $role = '';
                        if($user->role !== null || $user->role !== ''){
                          if($user->role == 2){
                            $role = 'SUB ADMIN';
                          }else{
                            $role = '';
                          }
                        }else{
                          $role = '';
                        }
                        
                        
                        ?>
                        <td><?= $role; ?></td>
                       
                        <td>
                          <button type="button" id="edit_user_btn" data-id="<?=$user->user_id; ?>" class="btn btn-warning btn-sm bi bi-pencil"> Modify</button>
                         <button type="button" data-id="<?=$user->user_id; ?>" id="remove-btn" class="btn btn-danger btn-sm bi bi-trash"> Remove</button>
                        </td>
                    </tr>


               <?php $i++;   }
                  
                  
                  ?>
                      
                </tbody>
              </table>
            </div>
          </div>
         
        </div>
      </div>
   
    </section>

<!--------------All Modal-------------------->
  
  <div class="modal fade" id="newUserModal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">New User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
                <div class="modal-body">
                  <form method="POST" id="userForm" enctype="multipart/form-data" >
                      <div class="card-body">

                      <div class="row">
                          <div class="col">
                          <img src="" id="display_avatar" alt="Profile" class=" w-25">
                          </div>
                        </div>

                        <div class="row mb-2">
                          <div class="col">
                            <label for="img">Avatar</label>
                            <input type="file" id="my-avatar" name="my_avatar" accept="image/png, image/jpeg" class="form-control" required>
                          </div>
                        </div>

                        <div class="row mb-2">                  
                            <div class="col">
                              <label for="validationDefault01" class="form-label">Name</label>
                              <input type="text" class="form-control"  name="name" placeholder="Name"  required>      
                            </div> 
                        </div>
                        <div class="row mb-2">                  
                            <div class="col">
                              <label for="validationDefault01" class="form-label">Email</label>
                              <input type="email" class="form-control" name="email" placeholder="E-mail"  required>      
                            </div> 
                        </div>
                        <div class="row mb-2">                  
                            <div class="col">
                              <label for="validationDefault01" class="form-label">Password</label>
                              <input type="password" class="form-control"  name="password" placeholder="password"  required>      
                            </div> 
                        </div>
                        <div class="row mb-2">                  
                            <div class="col">
                              <label for="validationDefault01" class="form-label">Role</label>
                              <select name="role"  class="form-select" required>
                                <option value="">Select</option>
                                <option value="1">Super Admin</option>
                                <option value="2">Sub Admin</option>
                                
                              </select>  
                            </div> 
                        </div>
                      </div>                                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <input type="submit" class="btn btn-primary" name="save" id="save" value="Save">
                </div>
            </form>
        </div>
      </div>
  </div><!-- End Add Modal-->

  <div class="modal fade" id="editUserModal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Update User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
                <div class="modal-body">
                  <form method="POST" id="updateForm" enctype="multipart/form-data">
                      <input type="hidden" id="id" name="id">

                    <div class="card-body">

                      <div class="row">
                          <div class="col">
                          <img src="" id="display_avatar2" alt="Profile" class=" w-25">
                          </div>
                        </div>

                        <div class="row mb-2">
                          <div class="col">
                            <label for="img">Avatar</label>
                            <input type="file" id="my-avatar2" name="my_avatar2" accept="image/png, image/jpeg" class="form-control">
                          </div>
                        </div>

                        

                        <div class="row mb-2">                  
                            <div class="col">
                              <label for="validationDefault01" class="form-label">Name</label>
                              <input type="text" class="form-control" id="name" name="name" placeholder="Name"  required>      
                            </div> 
                        </div>
                        <div class="row mb-2">                  
                            <div class="col">
                              <label for="validationDefault01" class="form-label">Email</label>
                              <input type="email" class="form-control" id="email" name="email" placeholder="E-mail"  required>      
                            </div> 
                        </div>
                        <div class="row mb-2">                  
                            <div class="col">
                              <label for="validationDefault01" class="form-label">Password</label>
                              <input type="password" class="form-control" id="password" name="password" placeholder="password">      
                            </div> 
                        </div>
                        <div class="row mb-2">                  
                            <div class="col">
                              <label for="validationDefault01" class="form-label">Role</label>
                              <select name="role" id="role" class="form-select" required>
                                <option value="" id="current-role"></option>
                                
                                <option value="1">Super Admin</option>
                                <option value="2">Sub Admin</option>
                                
                              </select>  
                            </div> 
                        </div>
                      </div>                                 
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <input type="submit" class="btn btn-primary" name="updateUser" id="update-user" value="Save">
                </div>
            </form>
        </div>
      </div>
  </div><!-- End edit Modal-->

<!---------------end of all Modal---------------------->

  </main> <!------------- end of Main ----->
  <script type="text/javascript" src="<?= base_url();?>assets/js/admin-ajax/user.js"></script>