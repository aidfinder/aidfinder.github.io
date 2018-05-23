<div class="agile_inner_banner_info">
       
   <?php 
      if(isset($_GET['search'])||isset($_GET['searchArchitect']))
      {
        if(isset($_GET['search']))
        {
        ?>
            <h2>INTERIOR DESIGNER within <?php echo $_GET['search']; ?></h2>
        <?php 
        }else if(isset($_GET['searchArchitect'])){
    ?>
            <h2>ARCHITECTS within <?php echo $_GET['searchArchitect']; ?></h2>
    <?php 
        }
      }
    ?>
    <p><b>CHOOSE YOUR DESIGNER</b></p>
</div>