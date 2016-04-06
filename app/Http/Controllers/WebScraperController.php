<?php
namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use App\Http\Requests;
use \Yangqi\Htmldom\Htmldom;

class WebScraperController extends Controller {
    public function index(Request $request) {
        $i = 0;
        $search = $request['search'];
       
        //Create a new Goutte client instance
        $client = new Client();

        //Hackery to allow HTTPS
        $guzzleclient = new \GuzzleHttp\Client([
            'timeout' => 60,
            'verify' => false,
        ]);
           
        // Create DOM from URL or file http://www.amazon.in/ref=nb_sb_noss_null
        if ($search && $search != '') {
            $html = new \Yangqi\Htmldom\Htmldom('http://www.amazon.in/s/ref=nb_sb_noss?url=search-alias%3Daps&field-keywords='. $search);
        }
       
        //This is use for pagination go to the next pages
        if ($request['page'] && $request['search']) {
            $html = new \Yangqi\Htmldom\Htmldom('http://www.amazon.in/s/ref=sr_pg_4?fst=as:on&rh=n:976419031,n:1389401031,n:1389432031,k:mobile&page='.$request['page'].' &keywords='.$request['search']);
            
        }

        //Scraping only mobile phone information from amazon.in
        $pname = $html->find('//li[@class="s-result-item  celwidget"]');
        
        $count = 0;

        foreach ($pname as $data) {
            $asin = $data->attr;
            $img = $data->find('//img[@class="s-access-image cfMarker"]');
            $name = $data->find('h2');
            $url = $data->find('a');
            $price = $data->find('//span[@class="a-size-base a-color-price s-price a-text-bold"]');
            $atr = 'data-attribute';
            
            $product_data[$count]['image'] = $img[0]->src;
            $product_data[$count]['name'] = $name[0]->$atr;
            $product_data[$count]['url'] = $url[0]->href;
            $product_data[$count]['dasin'] = $asin['data-asin'];

            /* First Checking the database if data is present then
            |  Select the data_asin value from database
            */
            $keydata = DB::table('storedata')
                         ->where('data_asin', $asin['data-asin'])
                         ->select('data_asin')
                         ->first();
            
            /* Here Checking the condistion for if keyvalue is already 
            ! exist the updata the data otherwise insert the new data
            */
            if (!empty($keydata) && $keydata->data_asin == $asin['data-asin']) {
                DB::table('storedata')
                  ->where('data_asin', $asin['data-asin'] )
                  ->Update([
                       'product_name' => $product_data[$count]['name'],
                       'product_price' => $data->currencyINR,
                       'link' => $product_data[$count]['url'],
                       'image' => $product_data[$count]['image'],
                       'data_asin' => $product_data[$count]['dasin']
                    ]);
            
            } else {
            
            //Storing the data into the database
            DB::table('storedata')
              ->Insert([
                       'product_name' => $product_data[$count]['name'],
                       'product_price' => $data->currencyINR,
                       'link' => $product_data[$count]['url'],
                       'image' => $product_data[$count]['image'],
                       'data_asin' => $product_data[$count]['dasin']
                    ]);
            }

            $count = $count + 1;
        }
        
        if ($product_data) {            
           
           return view('joblist', array('product' => $product_data, 'search' => $search));
        } else {

            return view('searchjob');
        }
    }
}