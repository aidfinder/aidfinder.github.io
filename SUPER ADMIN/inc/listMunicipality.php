
            <div class="container-fluid">
                <div class="side-body">
                    <div class="page-title">
                        <span class="title">List of Municipality</span>
                        
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
                                                
                                                <th>Municipality</th>
                                                <th>Zipcode</th>
                                                <th>Latitude</th>
                                                <th>Longitude</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Action</th>
                                                
                                                <th>Municipality</th>
                                                <th>Zipcode</th>
                                                <th>Latitude</th>
                                                <th>Longitude</th>
                                                
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $count=0;
                                            $query = $model->all_municipality();  //FROM MODEL
                                            if( $result = $model->fetch($query) ){
                                            do{
                                            $count++;
                                            ?> 
                                            <tr>
                                                <td>
                                                    <div class="btn-group">
                                                        <?php if($result['mun_status']==1){ ?>
                                                            <button type="button" style="background-color:#00C0EF"class="btn btn-success btn-xs"><i class="fa fa-user"></i></button>
                                                            <button type="button" style="background-color:#00C0EF"class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
                                                              <span class="caret"></span>
                                                              <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                              <li> <a href="admin.php?page=listMunicipality&deactMun=<?php echo $result['mun_id']; ?>">Deactivate</a>
                                                              </li>
                                                              <li><a href="admin.php?page=editMun&id=<?php echo $result['mun_id']; ?>">Edit</a>
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

                                                              <li> <a href="admin.php?page=listMunicipality&actMun=<?php echo $result['mun_id']; ?>">Activate</a>
                                                              <li><a href="admin.php?page=editMun&id=<?php echo $result['mun_id']; ?>">Edit</a>
                                                              </li>
                                                              <!--li><a href="" data-toggle="modal" data-target="#myMake">Add Make</a>
                                                              </li-->
                                                
                                                            </ul>
                                                         <?php } ?>
                                                    </div>
                                               </td>
                                                
                                             
                                                <td ><?php echo $result['name']; ?></td>
                                                
                                                <td ><?php echo $result['zipcode_id']; ?></td>
                                                <td ><?php echo $result['lat']; ?></td>
                                                <td ><?php echo $result['long']; ?></td>
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
    