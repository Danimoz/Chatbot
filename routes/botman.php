<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('.*Hi|Hello.*', function ($bot) {
	$bot->typesAndWaits(2);
    $bot->reply('Hello!');
	$bot->reply('What is your name?');
});

$botman->hears('my name is {name}', function ($bot, $name) {
    $bot->typesAndWaits(2);
    $bot->reply('Nice to meet you '.$name);
	$bot->reply('Would you like to learn about Music Composition?');
});

$botman->hears('.*Yes|Yeah.*', function ($bot) {
	$bot->typesAndWaits(2);
	$bot->reply('Good!! Go to https://dflat.com.ng to learn');
	$bot->reply('Have a Nice Day');
});

$botman->fallback(function($bot) {
    $bot->reply('Sorry, I did not understand these commands. Here is a list of commands I understand: ...');
});

$botman->hears('Start conversation', BotManController::class.'@startConversation');

