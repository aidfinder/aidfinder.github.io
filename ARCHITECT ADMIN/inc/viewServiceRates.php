<div id="content-header">
    <div id="breadcrumb"> <a href="admin.php?page=dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">View Service Rate</a> </div>
    <h1>View Service Rate</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
          <h5>Service Rate</h5>
        </div>
        <div class="widget-content nopadding">
          <table class="table table-bordered data-table">
            <thead>
              <tr>
                
                <th>Action</th>
                <th>Service Tier</th> 
                <th>Cost</th> 
                <th>Details</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $count=0;
              $query = $model->all_service();  //FROM MODEL
              if( $result = $model->fetch($query) ){
              do{
              $count++;
              ?> 
              <tr class="gradeX">
                
                <td>
                  <div class="btn-group">
                    <button type="button"class="btn btn-success btn-xs"><i class="icon-legal"></i></button>
                    <button type="button"class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <!--li><input type="button" name="view" value="Edit" id="<?php echo $result['builder_service_id']; ?>" data-toggle="modal" class="btn btn-info btn-xs edit_data"/></li-->
                      <li><a href="admin.php?page=editServiceRate&ide=<?php echo $result['builder_service_id']; ?>" >Edit Cost & Details</a></li>
                    </ul>
                  </div>
                </td>
                
                <td><?php echo $result['tier_name']; ?></td> 
                <td><?php echo $result['service_cost_rangefrom']; ?></td> 
                <td><?php echo $result['builder_service_details']; ?></td> 
                
              </tr>
              <?php }while($result = $model->fetch($query)); }?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!--script>
$(document).ready(function(){
 $(document).on('click','.edit_data', function(){
   var build_serv_id= $(this).attr("id");
   $.ajax({
    url:"fetch.php",
    method:"POST",
    data:{build_serv_id:build_serv_id},
    dataType:"json",
    success:function(data){
      $('#cost').val(data.cost);
      $('#details').val(data.details);
      $('#build_serv_id').val(data.id);

      $('#insert').val("Update");
      $('#add_date_Modal').modal('show');
    }
   })
 });
});
</script-->




<div class="edit_data fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <form method="post" id="insert_form">
            <input type="text" name="cost" id="cost"/>
            <textarea name="details" id="details"/></textarea>
            <input type="hidden" name="build_serv_id" id="build_serv_id"/>
             <input type="submit" name="insert" id="insert"/>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>