# function that downloads new posts from reddit api
function get_reddit_posts($subreddit, $limit, $sort, $timeframe)
{
    # get json from reddit api
    $json = file_get_contents("https://www.reddit.com/r/" . $subreddit . "/" . $sort . ".json?limit=" . $limit . "&t=" . $timeframe);
    # decode json
    $json = json_decode($json, true);
    # get data from json
    $data = $json['data']['children'];
    # return data
    return $data;
}

# use
$reddit_results =  get_reddit_posts("de", 3, "top", "week");

# get the first post
$reddit_results = $reddit_results[0]['data'];

# print info
echo $reddit_results['title'];
echo $reddit_results['selftext'];
echo $reddit_results['url'];

#echo "<pre>";
#print_r($reddit_results);
#echo "</pre>";
