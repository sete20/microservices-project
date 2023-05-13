<?php

namespace App\Queues;

use Illuminate\Queue\Queue;
use Illuminate\Contracts\Queue\Queue as QueueContract;
use RdKafka\KafkaConsumer;

class KafkaQueue extends Queue implements QueueContract
{
    public function __construct(private KafkaConsumer $consumer)
    {
    }
    public function size($queue = null)
    {
    }
    public function push($job, $data = '', $queue = null)
    {
    }
    public function pushRaw($payload, $queue = null, $options = array())
    {
    }
    public function later($delay, $job,  $data = "", $queue = null)
    {
    }
    public function pop($queue = null)
    {
        while (true) {
            $this->consumer->subscribe(['defualt']);
            $message = $this->consumer->consume(120 * 1000);
            switch ($message->err) {
                case RD_KAFKA_RESP_ERR_NO_ERROR:
                    var_dump($message->payload);
                    break;
                case RD_KAFKA_RESP_ERR__PARTITION_EOF:
                    echo "no more messages; will eait for more\n";
                    break;
                case RD_KAFKA_RESP_ERR__TIMED_OUT:
                    echo "TIMED OUT\n";
                    break;
                default:
                    throw new\Exception($message->errstr(), $message->err);
                    break;
            }
        }
    }
}
