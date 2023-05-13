<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ConsumeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'consume';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $conf = new \RdKafka\Conf();
        $conf->set('bootstrap.servers', 'pkc-3w22w.us-central1.gcp.confluent.cloud:9092');
        $conf->set('security.protocol', 'SASL_SSL');
        $conf->set('sasl.mechanism', 'PLAIN');
        $conf->set('sasl.username', 'MCBX2HOBKEWJKVDV');
        $conf->set('sasl.password', 'TcIIT7Kpx/MWCWA7EgLm0XuEj0So3RmgOFGJM9PS59jZnQv8rvKIfyfM+h3yZJlF');
        $conf->set('group.id', 'myGroup');
        $conf->set('auto.offset.reset', 'earliest');
        $consumer = new \RdKafka\KafkaConsumer($conf);
    }
}
