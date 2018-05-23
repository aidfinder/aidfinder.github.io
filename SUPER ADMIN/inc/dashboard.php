 <?php include('inc/modal.php'); ?>
<div class="container-fluid">
                <div class="side-body padding-top">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <a href="admin.php?page=listServices">
                                <div class="card red summary-inline">
                                    <div class="card-body">
                                        <i class="icon fa fa-wrench fa-4x"></i>
                                        <div class="content">
                                            <div class="title"><?php echo $model->total_service_count(); ?></div>
                                            <div class="sub-title">Services</div>
                                        </div>
                                        <div class="clear-both"></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <a href="admin.php?page=listArchitect">
                                <div class="card yellow summary-inline">
                                    <div class="card-body">
                                        <i class="icon fa fa-male fa-4x"></i>
                                        <div class="content">
                                            <div class="title"><?php echo $model->total_architect_count(); ?></div>
                                            <div class="sub-title">Registered Architect</div>
                                        </div>
                                        <div class="clear-both"></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <a href="admin.php?page=listInterior">
                                <div class="card green summary-inline">
                                    <div class="card-body">
                                        <i class="icon fa fa-male fa-4x"></i>
                                        <div class="content">
                                            <div class="title"><?php echo $model->total_interiorDesigner_count(); ?></div>
                                            <div class="sub-title">Registered Interior Designer</div>
                                        </div>
                                        <div class="clear-both"></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <a href="admin.php?page=listUser">
                                <div class="card blue summary-inline">
                                    <div class="card-body">
                                        <i class="icon fa fa-users fa-4x"></i>
                                        <div class="content">
                                            <div class="title"><?php echo $model->total_user_count(); ?></div>
                                            <div class="sub-title">Client</div>
                                        </div>
                                        <div class="clear-both"></div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <a href="admin.php?page=listUser">
                                <div class="card blue summary-inline">
                                    <div class="card-body">
                                        <i class="icon fa fa-adjust fa-4x"></i>
                                        <div class="content">
                                            <div class="title"><?php echo $model->total_specialization_count(); ?></div>
                                            <div class="sub-title">Specializarion</div>
                                        </div>
                                        <div class="clear-both"></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <a href="admin.php?page=listBuildingCategory">
                                <div class="card green summary-inline">
                                    <div class="card-body">
                                        <i class="icon fa fa-list fa-4x"></i>
                                        <div class="content">
                                            <div class="title"><?php echo $model->total_buildingcategory_count(); ?></div>
                                            <div class="sub-title">Building Category</div>
                                        </div>
                                        <div class="clear-both"></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <a href="admin.php?page=listSubCategory">
                                <div class="card yellow summary-inline">
                                    <div class="card-body">
                                        <i class="icon fa fa-random fa-4x"></i>
                                        <div class="content">
                                            <div class="title"><?php echo $model->total_subcategory_count(); ?></div>
                                            <div class="sub-title">Sub Category</div>
                                        </div>
                                        <div class="clear-both"></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <a href="admin.php?page=adrequests">
                                <div class="card red summary-inline">
                                    <div class="card-body">
                                        <i class="icon fa fa-user fa-4x"></i>
                                        <div class="content">
                                            <div class="title">Ad</div>
                                            <div class="sub-title">Requests</div>
                                        </div>
                                        <div class="clear-both"></div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>


                    <div class="row  no-margin-bottom">
                        <div class="col-sm-6 col-xs-12">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="card primary">
                                        <div class="card-jumbotron no-padding">
                                            <canvas id="jumbotron-line-chart" class="chart no-padding"></canvas>
                                        </div>
                                        <div class="card-body half-padding">
                                            <h4 class="float-left no-margin font-weight-300">Profits</h4>
                                            <h2 class="float-right no-margin font-weight-300">$3200</h2>
                                            <div class="clear-both"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="thumbnail no-margin-bottom">
                                        <img src="../img/thumbnails/picjumbo.com_IMG_4566.jpg" class="img-responsive">
                                        <div class="caption">
                                            <h3 id="thumbnail-label">Thumbnail label<a class="anchorjs-link" href="#thumbnail-label"><span class="anchorjs-icon"></span></a></h3>
                                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                            <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="thumbnail no-margin-bottom">
                                        <img src="../img/thumbnails/picjumbo.com_IMG_3241.jpg" class="img-responsive">
                                        <div class="caption">
                                            <h3 id="thumbnail-label">Thumbnail label<a class="anchorjs-link" href="#thumbnail-label"><span class="anchorjs-icon"></span></a></h3>
                                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                            <p><a href="#" class="btn btn-success" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="card primary">
                                        <div class="card-jumbotron no-padding">
                                            <canvas id="jumbotron-bar-chart" class="chart no-padding"></canvas>
                                        </div>
                                        <div class="card-body half-padding">
                                            <h4 class="float-left no-margin font-weight-300">Orders</h4>
                                            <div class="clear-both"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="card primary">
                                        <div class="card-jumbotron no-padding">
                                            <canvas id="jumbotron-line-2-chart" class="chart no-padding"></canvas>
                                        </div>
                                        <div class="card-body half-padding">
                                            <h4 class="float-left no-margin font-weight-300">Pages view</h4>
                                            <div class="clear-both"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-success">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="title"><i class="fa fa-male"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Registered Architect</div>
                                    </div>
                                    <div class="clear-both"></div>
                                </div>
                                <div class="card-body no-padding">
                                    <ul class="message-list">
                                        <?php
                                        $count=0;
                                        $query = $model->all_builderArchitectLimit();  //FROM MODEL
                                        if( $result = $model->fetch($query) ){
                                        do{
                                        $count++;
                                        ?> 
                                        <a href="admin.php?page=listArchitect">
                                            <li>
                                                <img src="images/FI03.png" class="profile-img pull-left">
                                                <div class="message-block">
                                                    <div style="font-size:14pt"><span class="username"><?php echo $result['b_lname'].', '.$result['b_fname'].'&nbsp;&nbsp;'.$result['b_mname']; ?></span> <span class="message-datetime">12 min ago</span>
                                                    </div>
                                                    <div class="message">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i><i class="fa fa-map-marker"></i>&nbsp;&nbsp;<?php echo $result['b_address']; ?></div>
                                                    <div class="message">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-envelope"></i>&nbsp;&nbsp;<?php echo $result['b_email']; ?></div>
                                                    <div class="message">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-phone"></i>&nbsp;&nbsp;<?php echo $result['b_contact']; ?></i></div>
                                                </div>
                                            </li>
                                        </a>
                                        <?php 
                                            }while($result = $model->fetch($query));
                                            } 
                                            ?>
                                        
                                       
                                        <a href="#" id="message-load-more">
                                            <li class="text-center load-more">
                                                <i class="fa fa-refresh"></i> load more..
                                            </li>
                                        </a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
