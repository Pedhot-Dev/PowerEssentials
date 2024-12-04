<?php

namespace angga7togk\poweressentials\commands;

use angga7togk\poweressentials\i18n\PELang;
use pocketmine\command\CommandSender;

class TPACommand extends PECommand {


    public function __construct() {
        parent::__construct('tpa', 'Request teleport to player', '/tpa <to, here, accept, deny, cancel> <player>');

        $this->setPrefix('tpa.prefix');
        $this->setPermission('tpa');
    }

    public function run(CommandSender $sender, string $prefix, PELang $lang, array $args): void {
        // TODO: Implement run() method.
    }
}