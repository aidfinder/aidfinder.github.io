
            <div class="container-fluid">
                <div class="side-body">
                    <div class="page-title">
                        <span class="title">Advertisement Requests</span>
                        
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
                                                <th>Advertiser Email</th>
                                                <th>Date Requested</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Action</th>
                                                <th>Advertiser Email</th>
                                                <th>Date Requested</th>
                                                
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $count=0;
                                            $query = $model->all_advertiser();  //FROM MODEL
                                            if( $result = $model->fetch($query) ){
                                            do{
                                            $count++;
                                            ?> 
                                            <tr>
                                                <td>
                                                    <div class="btn-group">
                                                      <?php if($result['advertiser_status']==1){ ?>  
                                                        <button type="button" class="btn btn-warning btn-xs"><i class="fa fa-user"></i></button>
                                                        <button type="button" class="btn btn-warning dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
                                                          <span class="caret"></span>
                                                          <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                          <li><a href="admin.php?page=adrequests&approveAdvertiser=<?php echo $result['advertiser_id']; ?>">Approve</a>
                                                          </li>
                                                          <li><a href="admin.php?page=adrequests&disApproveAdvertiser=<?php echo $result['advertiser_id']; ?>">Disapprove</a>
                                                          </li>
                                                        </ul>
                                                      <?php }else if($result['advertiser_status']==2){ ?>
                                                        <button type="button" class="btn btn-success btn-xs"><i class="fa fa-user"></i></button>
                                                        <button type="button" class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
                                                          <span class="caret"></span>
                                                          <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                          <li><a href="admin.php?page=postAdvertisement&advertiserID=<?php echo $result['advertiser_id']; ?>">Post Ad</a>
                                                          </li>
                                                        </ul>
                                                      <?php }else{ ?>
                                                        <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-user"></i></button>
                                                        <button type="button" class="btn btn-danger dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
                                                          <span class="caret"></span>
                                                          <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                      <?php } ?>
                                                    </div>
                                               </td>
                                                <td ><?php echo $result['advertiser_email']; ?></td>
                                                <td ><?php echo $result['date_requested']; ?></td>
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
    