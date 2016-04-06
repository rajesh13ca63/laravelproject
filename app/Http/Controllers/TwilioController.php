<?php
namespace App\Http\Controllers;

use App\User;

use \SMS;
use Illuminate\Http\Request;
use App\Http\Requests;


/**
 * Class SendDeploymentAlert
 * @package App\Handlers\Events
 */
class TwilioController extends Controller {
    /**
     * Create the event handler.
     *
     */
    public function __construct()  {
    
    }
    
    public function sendmessage() {
     SMS::send('This is my message', [], function($sms) {
            $sms->to('+9199116956');
        });
    
    }
}
