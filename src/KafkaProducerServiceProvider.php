<?php
namespace LaravelKafka\Producer;

use Illuminate\Support\ServiceProvider;
use RdKafka\Conf;
use RdKafka\Producer;

class KafkaProducerServiceProvider extends ServiceProvider {
    const PRODUCER_ONLY_CONFIG_OPTIONS = [
        'security.protocol'  => 'ssl',
        'compression.type'   => 'snappy',
        'log_level'          => LOG_ERR,
        'debug'              => 'broker,topic,msg',
        'enable.idempotence' => true,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register() {}

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        $conf = $this->setConf(self::PRODUCER_ONLY_CONFIG_OPTIONS);

        $this->app->bind(Producer::class, function () use ($conf) {
            return new Producer($conf);
        });
    }

    /**
     * Set the Kafka Configuration.
     *
     * @param  array           $options
     * @return \RdKafka\Conf
     */
    private function setConf($options) {
        $conf = new Conf();

        foreach ($options as $key => $value) {
            $conf->set($key, $value);
        }

        # Custom Brokers
        $conf->set('metadata.broker.list', env("KAFKA_BROKERS"));

        if (env('KAFKA_DEBUG', false)) {
            $conf->set('log_level', LOG_DEBUG);
            $conf->set('debug', 'all');
        }

        return $conf;
    }
}
