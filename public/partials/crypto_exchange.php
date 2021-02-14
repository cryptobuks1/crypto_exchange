<?php

get_header();
?>

<div class="container-fluid">
    <div class="row">
    <div class="col-12">
        <h3 class="text-center text-uppercase">  Crypto Exchange</h3> 
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
        <div class="col-11">
            <div class="row">
                <div class="col-12">
                    <!-- short code -->
                    <?php  do_shortcode("[crypto-exchange]");?>
                </div>
                <div class="col-12">
                    <div class="card">
                        <a href="#">
                            <div class="card-body">
                                <p>Get Rewards</p>
                                <h4>How do you get free crypto on Coinbase?</h4>
                                <button class="btn btn-primary">View Tutorial</button>
                            </div>
                        </a>
                    </div>
                    <br>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <p class="text-left">
                                <b>Watchlist </b>
                                <span class="float-right">
                                    <a href="#">Edit</a>
                                    <a href="#"><i class="fa fa-th-large"></i></a>
                                    <a href="#"><i class="fa fa-th-list"></i></a>
                                </span>
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <img src="<?php echo CRYPTO_EXCHANGE_PLUGIN_URL.'assest/img/coin.png';?>" class="img-fluid" alt="">
                                </div>
                                <div class="col-4">
                                    <img src="<?php echo CRYPTO_EXCHANGE_PLUGIN_URL.'assest/img/coin.png';?>" class="img-fluid" alt="">
                                </div>
                                <div class="col-4">
                                    <img src="<?php echo CRYPTO_EXCHANGE_PLUGIN_URL.'assest/img/coin.png';?>" class="img-fluid" alt="">
                                </div>
                                <div class="col-4">
                                    <img src="<?php echo CRYPTO_EXCHANGE_PLUGIN_URL.'assest/img/coin.png';?>" class="img-fluid" alt="">
                                </div>
                                <div class="col-4">
                                    <img src="<?php echo CRYPTO_EXCHANGE_PLUGIN_URL.'assest/img/coin.png';?>" class="img-fluid" alt="">
                                </div>
                                <div class="col-4">
                                    <img src="<?php echo CRYPTO_EXCHANGE_PLUGIN_URL.'assest/img/coin.png';?>" class="img-fluid" alt="">
                                </div>
                                <div class="col-4">
                                    <img src="<?php echo CRYPTO_EXCHANGE_PLUGIN_URL.'assest/img/coin.png';?>" class="img-fluid" alt="">
                                </div>
                                <div class="col-4">
                                    <img src="<?php echo CRYPTO_EXCHANGE_PLUGIN_URL.'assest/img/coin.png';?>" class="img-fluid" alt="">
                                </div>
                                <div class="col-4">
                                    <img src="<?php echo CRYPTO_EXCHANGE_PLUGIN_URL.'assest/img/coin.png';?>" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-3">
            <?php get_sidebar();?>
        </div> -->
    </div>
</div>

<br>
<?php
// get_sidebar();
get_footer();
?>