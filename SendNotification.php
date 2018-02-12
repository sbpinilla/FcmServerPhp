<?PHP

ECHO "Sergio Pinilla";


use paragraph1\phpFCM\Client;
use paragraph1\phpFCM\Message;
use paragraph1\phpFCM\Recipient\Device;
use paragraph1\phpFCM\Notification;

require_once 'vendor/autoload.php';

$apiKey = 'AAAA1FmLp5A:APA91bGGu7dS82ZtOBMRLS-0PyLI38mK0bgDAqdNhr-EPo3WWkdhzmmxo3I_OFBpNhl3gVdBwgj8HaV1WP9MkaHSdl9MHvLN6tx8MdI2TOX2qewGlHvHLWRHuB70UV0JV-mDnQHU38FB';
$client = new Client();
$client->setApiKey($apiKey);
$client->injectHttpClient(new \GuzzleHttp\Client());

$note = new Notification('Hola desde php', 'Mensaje enviado desde el server php (Y)');
$note->setIcon('notification_icon_resource_name')
    ->setColor('#ffffff')
    ->setBadge(1);

$deviceToken = "d_yWhxyqi3E:APA91bEz1EMagD9padAXfiXA1gFPHE9fX1TR-3VsA_UKLjYz2Eh1ARcIMfd55kfbAm2Rp4P3-86Mxu9qqITX-ECeCIa7mBX0Gu1lGJYl-uilvbqdP_YSAypHUl-zxydjHNItigg1qU-w";

$id = 12;	

$data = array("someId" => 111 , 
			  "id" => $id );
	
$message = new Message();
$message->addRecipient(new Device($deviceToken));
$message->setNotification($note)
    ->setData($data);

$response = $client->send($message);
var_dump($response->getStatusCode());



?>