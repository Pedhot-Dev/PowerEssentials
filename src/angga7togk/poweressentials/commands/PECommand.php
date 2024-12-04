<?php

namespace angga7togk\poweressentials\commands;

use angga7togk\poweressentials\i18n\PELang;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\lang\Translatable;
use pocketmine\utils\TextFormat;

abstract class PECommand extends Command {
    const PREFIX_PERMISSION = "poweressentials.";
    private string $prefix;

    public function __construct(string $name, Translatable|string $description = "", Translatable|string|null $usageMessage = null, array $aliases = []) {
        parent::__construct($name, $description, $usageMessage, $aliases);
    }

    public function setPermission(?string $permission): void {
        parent::setPermission(self::PREFIX_PERMISSION . $permission);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): void {
        if (!$this->testPermission($sender)) return;
        $this->run($sender, $this->getPrefix(), PELang::fromConsole(), $args);
    }

    abstract public function run(CommandSender $sender, string $prefix, PELang $lang, array $args): void;

    public function getPrefix(): string {
        return $this->prefix;
    }

    public function setPrefix(string $prefixLang): void {
        $this->prefix = TextFormat::GOLD . PELang::fromConsole()->translateString($prefixLang) . " ";
    }
}
