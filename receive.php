<!-- <?php 
require_once __DIR__.'/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('task_queue', false, false, false, false);

echo " [x] Waiting for message. To exit press CTRL+C\n";

$callback = function(AMQPMessage $msg){
    echo ' [x] Received ',$msg->getBody()."\n";
};

$channel->basic_consume('task_queue','',false,true, false,false, $callback);

try{
    $channel->basic_consume();
}catch(\Throwable $exception){
    echo $exception->getMessage();
}
?> -->