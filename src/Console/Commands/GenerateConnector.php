<?php

namespace Crenata\AffiliateConnector\Console\Commands;

use Illuminate\Console\Command;
use kornrunner\Ethereum\Address;

class GenerateConnector extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "connector:generate";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Generate private key for connector.";

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {
        $address = new Address();
        $this->warn("Server : CONNECTOR_SERVER={$address->get()}");
        $this->warn("Client : CONNECTOR_CLIENT={$address->getPrivateKey()}");
        $this->warn(PHP_EOL . "Copy the key to the .env file each projects.");
    }
}
