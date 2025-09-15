<!-- <?php 
require_once __DIR__.'/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('task_queue', false, false, false, false);

$data = 'Test Message';
$msg = new AMQPMessage($data);
$channel->basic_publish($msg, '', 'task_queue');

echo " [x] Sent '", $data, "'\n";

//Закрытие канала и соединения
$channel->close();
$connection->close();
?> -->