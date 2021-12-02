<?php

use Dctx\Entity\task\NpcTask;
use Dctx\Entity\Entity\{EntityMain, EntityManager};

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class Command extends npccmd{

    public function onCommand(CommandSender $sender, Command $cmd, String $label, array $args) : bool {
		if(strtolower($cmd->getName()) == "nf"){
			if(!$sender instanceof Player){
			    $sender->sendMessage("§cPlease use this command In-Game!");
				return true;
			}
			if(isset($args[0])){
				switch(strtolower($args[0])){
				    case "help":
                    if(!$sender->hasPermission("nf.cmd") && !$sender->hasPermission("nf.cmd.help")){
                        $sender->sendMessage("§cYou do not have permission to use this command!");
                    return true;
                }
                $sender->sendMessage("§aNpc+Form Commands: \n" .
                    "§7/nf npc : Spawn the Npc \n" .
					break;
					case "npc":
					if($sender->hasPermission("nf.npc.cmd")){
						$npc = new EntityManager();
						$npc->setMainEntity($sender);
					} else {
						$sender->sendMessage("§cYou do not have permission to use this command!");
                    }
					break;
					default:
					$sender->sendMessage("§cUsage: /nf help");
					break;
				}
			} else {
				$sender->sendMessage("§cUsage: /nf help");
			}
		}
	return true;
	} 
  }
}