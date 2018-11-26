<?php

namespace CustomHeal;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener{

	public function onEnable(): void{
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool{
		switch(strtolower($label)){
			case "heal":
				if(!$sender instanceof Player) return false;
				if($sender->hasPermission("server.heal")){
					$sender->setHealth(20);
					$sender->sendMessage("You've been healed");
				}else{
					$sender->sendMessage("Sorry, you do not have permission to use this command");

				}
				break;
		}
		return true;
	}
}