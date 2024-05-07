
<main id="main" class="main">
    <div class="pageTitle">
      <h1>Countries</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url();?>admin">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Countries</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section profile">

     <div class="row">
        

              <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
           <!-- <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#newCountryModal" type="button"><i class="bi bi-plus-circle"> New</i></button> -->

        </div>



          <div class="card-body">
            <div class="table-responsive">
              <table class="table datatable table-light" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Country Name</th>                  
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>
                <?php
                    
                    $i = 1;
                    foreach ($countries as $country) { ?>
                      <tr>
                        <td><?= $i;?></td>
                        <td><?= $country->name ?></td>
                       
                        <td>
                          <button type="button" id="edit_country_btn" data-id="<?= $country->country_id?>" class="btn btn-warning bi bi-pencil"> Modify</button>
                         <!--  <button type="button" class="btn btn-secondary bi bi-folder-symlink"> Archive</button> -->
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
  
  <div class="modal fade" id="newCountryModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">New Country</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" id="countryForm" >
                        <div class="card-body">

                          <div class="row">
                            <div class="col">
                                <label for="validationDefault01" class="form-label">Country Name</label>
                                <input type="text" class="form-control" id="country-name" name="country_name"  required> 
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

        <div class="modal fade" id="editCountryModal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Update Country</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form method="POST" id="upCountryForm" >
                    <input type="hidden" id="up-country-id" name="upCountryId">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <label for="validationDefault01" class="form-label">Country Name</label>
                                <input type="text" class="form-control" id="up-country-name" name="upCountryName"  required> 
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
        </div><!-- End Edit Modal-->

<!---------------end of all Modal---------------------->

  </main> <!------------- end of Main ----->
  <script type="text/javascript" src="<?= base_url();?>assets/js/admin-ajax/countries.js"></script>