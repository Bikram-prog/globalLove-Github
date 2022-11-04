<?php 

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotmanController extends Controller
{

    public function handle()
    {
        $botman = app('botman');

        $this->askVariousThings($bot);
   
        // $botman->hears('{message}', function($bot, $message) {

        //     // if ($message != '') {
        //     //     $this->askVariousThings($bot);
        //     // }
            
        //     // else {
        //     //     $bot->reply("write 'hi/hello' for start conversation with me 😀");
        //     // }
   
        // });
   
        $botman->listen();
    }
   
   	
    public function askName($botman)
    {
        $botman->ask('Hello! What is your Name?', function(Answer $answer) {
   
            $name = $answer->getText();
   
            $this->say('Nice to meet you '.$name);
        });
    }

    public function askVariousThings($botman) {

    	$botman->reply('Please choose any one from below');
    	$botman->reply('1. Would you like to sign up, this will only take a few minutes. 2. Would you like more information about our monthly and yearly cash And prize giveaways? 3. Would you like to download our app’s for your mobile? 4. Would you like to know a bit more about GlobalLove?');
    	$botman->ask('Please say (1/2/3/4)', function(Answer $answer) {
   
            $ans = $answer->getText();
            if($ans == '1') {
            	$this->say('Follow the Url to create your free account https://www.globallove.online/signup');
            	$this->say('Thank you! 🤝');
            } elseif ($ans == '2') {
            	$this->say('Follow the Url to find the information https://www.globallove.online/careers');
            	$this->say('Thank you! 🤝');
            } elseif ($ans == '3') {
            	$this->say('Follow the Url to download our Android app https://play.google.com/store/apps/details?id=com.globallove');
            	$this->say('Thank you! 🤝');
            } elseif ($ans == '4') {
            	$this->say('Sign up now and go in the running for these great cash and prizes');
                $this->say('Monthly cash giveaways space (up to $1000AUD)');
                $this->say('Monthly membership giveaways up to 1 years free membership');
                $this->say('Yearly major cash and prize giveaway');
                $this->say('A car to the of $15,000AUD (or cash equivalent)');
                $this->say('Yearly major cash giveaway of $5000 AUD');
            	$this->say('Thank you! 🤝');
            } else {
            	$this->say("Choose 1 Or, 2 😀");
            }
   
           
        });
    }
}


