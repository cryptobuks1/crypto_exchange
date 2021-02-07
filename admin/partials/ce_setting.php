<div class="container">
    <div class="row">
        <div class="col-12">
            <br>
            <h4 class="text-info">Welcome to API Setting</h4>
            <hr>
        </div>
        <div class="col-md-6">
           
            <!-- card -->
            <div class="card  border-info">
                <div class="card-header bg-info text-white">
                    <b><i class="fa fa-plus fa-fw"> </i> Add API</b>
                </div>
                <div class="card-body">
                    <form id="add_api">
                        <div class="form-group">
                            <label for="website">Example select</label>
                            <select class="form-control" name="api_site" id="website" style="width:100%">
                                <option selected>Select API Website</option>
                                <option value="Binance API">Binance API</option>
                                <option value="Coin Market Cap">Coin Market Cap</option>
                                <option value="Bittrex API">Bittrex API</option>
                                <option value="Poloniex API">Poloniex API</option>
                                <option value="Coinbase API">Coinbase API</option>
                                <option value="Hitbtc API">Hitbtc API</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="api_key">API KEY</label>
                            <input type="text" class="form-control" name="api_key" id="api_key" aria-describedby="api_key_help" placeholder="Enter API Key">
                            <small id="api_key_help" class="form-text text-muted">Your API Key.</small>
                        </div>
                        <div class="form-group">
                            <label for="api_secret">API Secret</label>
                            <input type="text" class="form-control" name="api_secret" id="api_secret" aria-describedby="api_secret_help" placeholder="Enter API secret">
                            <small id="api_secret_help" class="form-text text-muted">Your API Secret.</small>
                        </div>
                        <div class="form-group">
                            <label for="website">Status</label>
                            <select class="form-control" name="status" id="status" style="width:100%">
                                <option selected value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                        </div>
                        <button type="submit" id="ajax_submit" class="btn btn-info float-right    ">Submit</button>
                    </form>
                            


                </div>
            </div>

            
           
        </div>
        <div class="col-md-6">
            
            <!-- card -->
            <div class="card border-info">
                <div class="card-header bg-info text-white">
                    <b><i class="fa fa-list fa-fw"> </i> API List</b>
                </div>
                <div class="card-body" style="padding:0px">
                <?php 
                    // echo "<pre>";
                    // print_r($wp_post);
                    // echo "</pre>";
                ?>
                    <table class="table table-striped" id="api_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Site</th>
                                <th>AIP</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if($wp_post):
                                $i = 1;
                                foreach($wp_post as $ce):?>
                            <tr>
                                <td><b class="text-info"><?php echo $i++;?> .</b></td>
                                <td><?php echo $ce->api_site;?></td>
                                <td><?php echo $ce->api_key;?></td>
                                <td><i class="fa fa-fw <?php echo $status = ($ce->status == 1)? 'fa-toggle-on': 'fa-toggle-off';?> fa-2x text-info"> </i><i class="fa fa-fw fa-edit fa-2x text-info"> </i></td>
                            </tr>
                            
                            <?php endforeach;
                                else:
                            ?>
                            <tr>
                                <td><i class="fa fa-fw exclamation fa-2x text-info"> </i> Sorry! We Could no find and saved API key. </td>
                            </tr>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
            </div>

            
           
        </div>
    </div>
</div>