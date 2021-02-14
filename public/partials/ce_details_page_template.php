<?php

get_header();
?>

<div class="container-fluid">
    <div class="row">
    <div class="col-12">
        <h3 class="text-center text-uppercase"> Coin Details</h3> 
    </div>
        <div class="col-1">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active" data-toggle="tooltip" data-placement="top" title="Tooltip on right">
                <i class="fa fa-home"></i>
            </a>
            <a href="#" class="list-group-item list-group-item-action" data-toggle="tooltip" data-placement="right" title="Tooltip on right"><i class="fa fa-pie-chart"></i></a>
            <a href="#" class="list-group-item list-group-item-action" data-toggle="tooltip" data-placement="right" title="Tooltip on right"><i class="fa fa-line-chart"></i> </a>
            <a href="#" class="list-group-item list-group-item-action" data-toggle="tooltip" data-placement="right" title="Tooltip on right"><i class="fa fa-outdent"></i></a>
            <a href="#" class="list-group-item list-group-item-action" data-toggle="tooltip" data-placement="right" title="Tooltip on right"><i class="fa fa-bell"></i></a>
        </div>
        </div>
        <div class="col-8">
            <div class="row">
                <div class="col-12">
                    <!-- short code -->
                    <?php
                        $symbol = $_REQUEST['coin'];  
		                $api = new Crypto_exchange_Apicall();
                        $api->get_coin_details($symbol);

                    ?>
                </div>
            </div>
        </div>        
        <div class="col-3">
            <?php get_sidebar();?>
        </div>
    </div>
</div>

<br>
<?php
// get_sidebar();
get_footer();
?>