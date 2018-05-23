
            <div class="container-fluid">
                <div class="side-body">
                    <div class="page-title">
                        <span class="title">List of User</span>
                        
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">

                                    <div class="card-title">
                                    <div class="title"></div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="datatable table table-striped" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Name</th>
                                                <th>Phone #</th>
                                                <th>Email</th>
                                                <th>Gender</th>
                                                <th>Address</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Action</th>
                                                <th>Name</th>
                                                <th>Phone #</th>
                                                <th>Email</th>
                                                <th>Gender</th>
                                                <th>Address</th>
                                                
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $count=0;
                                            $query = $model->all_customer();  //FROM MODEL
                                            if( $result = $model->fetch($query) ){
                                            do{
                                            $count++;
                                            ?> 
                                            <tr>
                                                <td>
                                                    <div class="btn-group">
                                                        <?php if($result['user_status']==1){ ?>
                                                            <button type="button" style="background-color:#00C0EF"class="btn btn-success btn-xs"><i class="fa fa-user"></i></button>
                                                            <button type="button" style="background-color:#00C0EF"class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
                                                              <span class="caret"></span>
                                                              <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                              <li><a href="admin.php?page=listUser&deactCustomer=<?php echo $result['user_id']; ?>">Deactivate</a>
                                                              </li>
                                                              <li><a href="admin.php?page=editUser&id=<?php echo $result['user_id']; ?>">Edit</a>
                                                              </li>
                                                              <!--li><a href="" data-toggle="modal" data-target="#myMake">Add Make</a>
                                                              </li-->

                                                            </ul>
                                                        <?php }else{ ?>
                                                            <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-user-times"></i></button>
                                                            <button type="button" class="btn btn-danger dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
                                                              <span class="caret"></span>
                                                              <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">

                                                              <li><a href="admin.php?page=listUser&actCustomer=<?php echo $result['user_id']; ?>">Activate</a>
                                                              </li>
                                                              <li><a href="admin.php?page=editUser&id=<?php echo $result['user_id']; ?>">Edit</a>
                                                              </li>
                                                              <!--li><a href="" data-toggle="modal" data-target="#myMake">Add Make</a>
                                                              </li-->
                                                
                                                            </ul>
                                                         <?php } ?>
                                                    </div>
                                               </td>
                                                <td ><?php echo $result['user_title'].'&nbsp;&nbsp;'.$result['user_lname'].', '.$result['user_fname'].'&nbsp;&nbsp;'.$result['user_mname']; ?></td>
                                                <td ><?php echo $result['user_contact']; ?></td>
                                                <td ><?php echo $result['user_email']; ?></td>
                                                <td ><?php echo $result['user_gender']; ?></td>
                                                <td ><?php echo $result['user_address']; ?></td>
                                            </tr>
                                            <?php 
                                            }while($result = $model->fetch($query));
                                            } 
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    <div>
    