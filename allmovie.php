<?php 
session_start();
//index.php

include('database_connection.php');

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php 
    include("head.php");
    ?>
</head>

<body>

    <?php 
    include("header.php");
    ?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
        	
            <div class="col-md-3">                				
				
				<div class="list-group">
					<h3 class="golden">Categroies</h3>
                    <div class="mt-2"></div>
                    <?php

                    $query = "
                    SELECT DISTINCT(categroy) FROM add_movie WHERE status = '1' ORDER BY categroy DESC
                    ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector categroy" value="<?php echo $row['categroy']; ?>" > <?php echo $row['categroy']; ?></label>
                    </div>
                    <?php    
                    }

                    ?>
                </div>
				
                <div class="mt-5"></div>
				<div class="list-group">
					<h3 class="golden"> Language</h3>
					<div class="mt-2"></div>
                    <?php
                    $query = "
                    SELECT DISTINCT(language) FROM add_movie WHERE status = '1' ORDER BY language DESC
                    ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector language" value="<?php echo $row['language']; ?>"  > <?php echo $row['language']; ?></label>
                    </div>
                    <?php
                    }
                    ?>	
                </div>
            </div>

            <div class="col-md-9">
            	<br />
                <div class="row filter_data">

                </div>
            </div>
        </div>

    </div>
    <?php

    include("footer.php");
    ?>
<style>

</style>

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
  
    <script src="js/main.js"></script>
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    
<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var directer = get_filter('directer');
        var categroy = get_filter('categroy');
        var language = get_filter('language');
        $.ajax({
            url:"allmovie_fetch.php",
            method:"POST",
            data:{action:action, directer:directer, categroy:categroy, language:language},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    $('#show_range').slider({
        range:true,
        min:1000,
        max:65000,
        values:[1000, 65000],
        step:500,
        stop:function(event, ui)
        {
            $('#show_show').html(ui.values[0] + ' - ' + ui.values[1]);
            filter_data();
        }
    });

});
</script>

</body>

</html>
