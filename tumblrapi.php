<?php

//Keys should be stored off the web root
$consumerKey = 'fSPkU655oQ9PxgFqStyD1meOElA0MvON3ecjVU4UvVNmVrYcaS';
$consumerSecret = '1P58S5DwqaKPAmzm2ZplXfwqQiLaLkNBrygos6PPnyB2rnfZdC';

$client = new Tumblr\API\Client($consumerKey,$consumerSecret);

//Settinga an array to store results from API call
$tumblr_results = [];

//Aggregating over the results from the last "featured_timestamp" and storing them to be used for display
$tumblr_json = $client->getTaggedPosts('lol', array('limit' => 20));
$tumblr_results = array_merge($tumblr_results, $tumblr_json);
$lastElement =  end($tumblr_json);

$tumblr_json = $client->getTaggedPosts('lol', array('before' => $lastElement->featured_timestamp));
$tumblr_results = array_merge($tumblr_results, $tumblr_json);
$lastElement =  end($tumblr_json);

$tumblr_json = $client->getTaggedPosts('lol', array('before' => $lastElement->featured_timestamp));
$tumblr_results = array_merge($tumblr_results, $tumblr_json);
$lastElement =  end($tumblr_json);

$tumblr_json = $client->getTaggedPosts('lol', array('before' => $lastElement->featured_timestamp));
$tumblr_results = array_merge($tumblr_results, $tumblr_json);
$lastElement =  end($tumblr_json);

$tumblr_json = $client->getTaggedPosts('lol', array('before' => $lastElement->featured_timestamp));
$tumblr_results = array_merge($tumblr_results, $tumblr_json);

//Calculating the number of pages needed to display 16 items per page
$total_results = count($tumblr_results);
$total_pages = ceil($total_results / 16);

//Here I will be using the $_GET global array to create links for each page used for pagination.
$page = $_GET["page"];
if($page == "" || $page == "1"){
	$page1 = 0;
} else {
	$page1 = ($page * 16) - 16;
}