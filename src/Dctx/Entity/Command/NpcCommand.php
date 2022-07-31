<?php

namespace Dctx\Entity\Command;

use Dctx\Entity\task\NpcTask;
use Dctx\Entity\Main;
use Dctx\Entity\Entity\{EntityMain, EntityManager};

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class NpcCommand extends Command{
  
    public $plugin;

    public function __construct(Main $plugin)
    {
        $this->plugin = $plugin;
        
        parent::__construct("mnpc", "§r§fSpawn Ur Own MiniGame NPC, Plugin By ItsToxicGG", "§cUse: /mnpc", ["mnpc"]);
	$this->setPermission("spawn.mnpc");
        $this->setAliases(["mn"]);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
       if($sender instanceof Player){
           
       } else {
           $sender->sendMessage("You not a player");
       }
    }	
}
