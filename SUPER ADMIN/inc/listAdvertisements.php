
            <div class="container-fluid">
                <div class="side-body">
                    <div class="page-title">
                        <span class="title">List of Posted Advertisements</span>
                        
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
                                                <th>Ad Image</th>
                                                <th>Ad Title</th>
                                                <th>Ad Details</th>
                                                <th>Date Posted</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Action</th>
                                                <th>Ad Image</th>
                                                <th>Ad Title</th>
                                                <th>Ad Details</th>
                                                <th>Date Posted</th>
                                                
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $count=0;
                                            $query = $model->all_advertisements();  //FROM MODEL
                                            if( $result = $model->fetch($query) ){
                                            do{
                                            $count++;
                                            ?> 
                                            <tr>
                                                <td>
                                                    <div class="btn-group">
                                                        <?php if($result['advertisement_status']==1){ ?>
                                                            <button type="button" style="background-color:#00C0EF"class="btn btn-success btn-xs"><i class="fa fa-user"></i></button>
                                                            <button type="button" style="background-color:#00C0EF"class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
                                                              <span class="caret"></span>
                                                              <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                              <li><a href="admin.php?page=listAdvertisements&deactAdvertisement=<?php echo $result['advertisement_id']; ?>">Deactivate</a>
                                                              </li>
                                                              <li><a href="admin.php?page=editService&ide=<?php echo $result['advertisement_id']; ?>">Edit</a>
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

                                                              <li><a href="admin.php?page=listAdvertisements&actAdvertisement=<?php echo $result['advertisement_id']; ?>">Activate</a>
                                                              </li>
                                                              <li><a href="admin.php?page=editService&ide=<?php echo $result['advertisement_id']; ?>">Edit</a>
                                                              </li>
                                                              <!--li><a href="" data-toggle="modal" data-target="#myMake">Add Make</a>
                                                              </li-->
                                                
                                                            </ul>
                                                         <?php } ?>
                                                    </div>
                                               </td>
                                                <td ><img src="advertisement_img/<?php echo $result['advertisement_id']; ?>.jpg" style="width:200px;height:130px;"/></td>
                                                <td ><?php echo $result['advertisement_title']; ?></td>
                                                <td ><?php echo $result['advertisement_details']; ?></td>
                                                <td ><?php echo $result['date_created']; ?></td>
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
    