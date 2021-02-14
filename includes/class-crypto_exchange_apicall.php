<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://github.com/manishankarvakta
 * @since      1.0.0
 *
 * @package    Crypto_exchange
 * @subpackage Crypto_exchange/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Crypto_exchange
 * @subpackage Crypto_exchange/includes
 * @author     Manishankar Vakta <manishankarvakta@gmail.com>
 */
class Crypto_exchange_Apicall {
    
    public function get_api_key(){
        //get api data form database
        
    global $wpdb;

    // get api 
    $api = $wpdb->get_row(
        $wpdb->prepare('SELECT * FROM '.$wpdb->prefix.'crypto_exchange')
    );
    
    return $api->api_key;
    // foreach($api as $a){
    //     echo $a->api_site .' - ';
    //     echo $a->api_key.'<br>';
    // }
    // echo 'This shortcode after load coin info';
	
    }

    public function get_coin(){

        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
        $parameters = [
        'start' => '1',
        'limit' => '5000',
        'convert' => 'USD'
        ];

        $headers = [
        'Accepts: application/json',
        'X-CMC_PRO_API_KEY: '.$this::get_api_key() //90cfef0b-6b58-4768-ac3b-cddf200f5867'
        ];
        $qs = http_build_query($parameters); // query string encode the parameters
        $request = "{$url}?{$qs}"; // create the request URL


        $curl = curl_init(); // Get cURL resource
        // Set cURL options
        curl_setopt_array($curl, array(
        CURLOPT_URL => $request,            // set the request URL
        CURLOPT_HTTPHEADER => $headers,     // set the headers 
        CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
        ));

        $response = curl_exec($curl); // Send the request, save the response
        $coin = json_decode($response); // print json decoded response


        $print = "";
        $i = 1;
        $print .= '<table class="table" id="coin_list">';
		$print .= '<thead>';
		$print .= '<tr>';
		$print .= '<th>SL</th><th>Name</th><th>Price</th><th>24h</th><th>7d</th><th>Market cap</th><th>Circulating Supply</th>';
		$print .= '</tr>';
		$print .= '</thead>';
		$print .= '<tbody>';

        foreach($coin->data as $coin){
            $print .= '<tr>';
            $print .= '<td><b>'. $i++ .'</b></td>';
            $print .= '<td><a href="'.site_url().'/coin-view/?coin='.$coin->symbol.'"> '. $coin->name.' <b>('. $coin->symbol.')</b></a></td>';
            // $print .= '<td>'. $coin->name.' <b>('. $coin->symbol.')</b></td>';
                $c = $coin->quote; 
                foreach($c as $c){
                    $print .= '<td><b>$</b>'. $c->price.'</td>';
                    $print .= '<td>'. $c->percent_change_24h.'<b>%</b></td>';
                    $print .= '<td>'. $c->percent_change_7d.'<b>%</b></td>';
                    $print .= '<td><b>$</b>'. $c->market_cap.'</td>';
                }
            // $print .= '<td>'. $coin->circulating_supply.' <b>('. $coin->symbol.')</b></td>';
            $print .= '<td>'. $coin->circulating_supply.' <b>('. $coin->symbol.')</b></td>';
            $print .= '</tr>';
        }

        $print .= '</tbody>';
		$print .= '</table>';


        echo $print;
        curl_close($curl); // Close request
    }

    public function get_coin_details($symbol = NULL){
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/info';
        $parameters = [
        'symbol' => $symbol,
        ];

        $headers = [
        'Accepts: application/json',
        'X-CMC_PRO_API_KEY: '.$this::get_api_key()   //90cfef0b-6b58-4768-ac3b-cddf200f5867
        ];
        $qs = http_build_query($parameters); // query string encode the parameters
        $request = "{$url}?{$qs}"; // create the request URL


        $curl = curl_init(); // Get cURL resource
        // Set cURL options
        curl_setopt_array($curl, array(
        CURLOPT_URL => $request,            // set the request URL
        CURLOPT_HTTPHEADER => $headers,     // set the headers 
        CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
        ));

        $response = curl_exec($curl); // Send the request, save the response
        $result = json_decode($response); // print json decoded response

        // echo '<pre>';
        // // // var_dump($result->data);
        // print_r($result->data);
        // echo '</pre>';


        if($result->data): foreach($result->data as $coin ):
        ?>

        <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
            <img class="mx-auto d-block" src="<?php echo $coin->logo; ?>" alt="<?php echo 'logo'; ?>">
            <h2 class=text-center style="font-size: 2.5rem;margin: 3rem 0em "><?php echo $coin->name; ?> <small><?php echo $coin->symbol; ?></small></h2>
            <p><b>Category: </b><?php echo $coin->category; ?></p>
            <p><b>Tags: </b>
            <?php
                foreach($coin->tags as $tag){
                    echo $tag.', '; 
                }
            ?>
            </p>
            <p><i class="fa fa-globe"> </i> <a href="<?php echo $coin->urls->website['0']?>" target="_blank"><?php echo $coin->name; ?> website</a></p>
            <p>
                <a class="social-link" href="<?php echo $coin->urls->twitter['0']?>" target="_blank"> <i class="fa fa-twitter"> </i>  </a>
                <a class="social-link" href="<?php echo $coin->urls->chat['0']?>" target="_blank"> <i class="fa fa-telegram"></i>  </a>
                <a class="social-link" href="<?php echo $coin->urls->reddit['0']?>" target="_blank"> <i class="fa fa-reddit"></i>  </a>
            </p>
            </div>
            <div class="col-md-9">      
                <p class="text-left"><b>Description: </b><?php echo $coin->description; ?></p>
                <hr style="margin: 3em 0 1rem auto;">
                <p><b>Documentation:</b></p>
                <p>
                <?php
                    foreach($coin->urls->explorer as $link):
                        $url = explode('/', $link);
                        ?>
                   <span class="float-left"><i class="fa fa-link"> </i>  <a href="<?php echo  $link?>" style="margin-right:10px"><?php echo $url[2]?></a></span>
                <?php 
                    endforeach;
                    ?>
                </p>
                <br>
                <br>
                <br>
                <p class="float-left"><i class="fa fa-copy"></i> <a href="<?php echo $coin->urls->technical_doc['0']?>" target="_blank">Technical Document </a></p>
            </div>
        </div>
        </div>
        <?php
        endforeach;
        endif;
        curl_close($curl); // Close request
    }
}
