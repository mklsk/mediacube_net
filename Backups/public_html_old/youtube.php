<pre><?print_r($_SERVER['DOCUMENT_ROOT']);?></pre>
<?
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

//require_once $_SERVER['DOCUMENT_ROOT'].'/Google/Client.php';
//require_once $_SERVER['DOCUMENT_ROOT'].'/Google/Service.php';
?>

<?
// include your composer dependencies
require_once $_SERVER['DOCUMENT_ROOT'].'/Google/autoload.php';

$client = new Google_Client();
$client->setApplicationName("Client_Library_Examples");
$client->setDeveloperKey("YOUR_APP_KEY");

$service = new Google_Service_Books($client);
$optParams = array('filter' => 'free-ebooks');
$results = $service->volumes->listVolumes('Henry David Thoreau', $optParams);

foreach ($results as $item) {
  echo $item['volumeInfo']['title'], "<br /> \n";
}
?>
<!doctype html>
<html>
<head>
<title>Create a reporting job</title>
</head>
<body>
  <form method="GET">
    <div>
      Job Name: <input type="text" id="jobName" name="jobName" placeholder="Enter Job Name">
    </div>
    <br>
    <div>
      Report Type Id: <input type="text" id="reportTypeId" name="reportTypeId" placeholder="Enter Report Type Id">
    </div>
    <br>
    <input type="submit" value="Create!">
  </form>
  <?=$htmlBody?>
</body>
</html>