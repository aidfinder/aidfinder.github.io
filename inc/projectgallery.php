<div class="divPanel page-content">

        <div class="breadcrumbs">
                <a href="index.html">Home</a> &nbsp;/&nbsp; <span>Project Gallery</span>
            </div> 

        <div class="row-fluid">
                <div class="span12">

                    <h1>Gallery</h1>

                    <div id="gridArea">
                        <ul id="tiles">
                            <?php 
                                            $query = $model->projectgallery();  
                                            if( $result = $model->fetch($query) ){
                                                do{
                                        ?>
                            <li>
                                <a href="project gallery/<?php echo $result['archi_proj_id']; ?>.jpg" title="Sticky" rel="prettyPhoto[gallery1]"><img src="project gallery/<?php echo $result['archi_proj_id']; ?>.jpg" class="okay" alt="Sticky" title="Sticky"/></a>
                                <div class="meta"><span>Designed by</span><span class="pull-right"><?php echo $result['b_fname']; ?> <?php echo $result['b_lname']; ?></span></div>
                                <h4><a href="#"><?php echo $result['archiproj_title']; ?></a></h4>
                                <p>A<?php echo $result['archiproj_details']; ?></p>
                            </li>        
                            <?php 
                                                    }while($result = $model->fetch($query));
                                                } 
                                            ?>
                        </ul>
                    </div>

                </div>
            </div>

        <div id="footerInnerSeparator"></div>
    </div>
 <style>
      .okay:hover {
        opacity: 0.5;
        filter: alpha(opacity=50); 
      }
      </style>