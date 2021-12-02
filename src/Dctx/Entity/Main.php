<?php 

namespace Dctx\Entity;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use Dctx\Entity\{Form\Form, Form\FormAPI, Entity\EntityManager, Entity\EntityMain, Task\NpcTask};

class Main extends PluginBase{

	public function onEnable(){
        $this->getLogger()->info("Plugin Is Enabled!");
		Entity::registerEntity(MainEntity::class, true);
    }
	
    public function onDisable(){
        $this->getLogger()->info("Disabling Plugin!");
		$this->close();
	}

    public function onHitNPC(EntityDamageByEntityEvent $event) {
		if ($event->getEntity() instanceof MainEntity) {
			$player = $event->getDamager();
			if ($player instanceof Player) {
				$event->setCancelled(true);
				$form = new Form(function (Player $player, int $data = null) {
					switch($data) {
					    case 0:
					    break;
						case 1:
						$this->getPlugin()->getServer()->dispatchCommand($player, "say Set Command");
						break;
						case 2:
						$this->getPlugin()->getServer()->dispatchCommand($player, "say Set Command");
						break;
						case 3:
						$this->getPlugin()->getServer()->dispatchCommand($player, "say Set Command");
						break;
					}
				});
				$form->setTitle("§l§eMINIGAME NAME!");
				$form->setContent("§fSelect Mode!");
				$form->addButton("§l§cEXIT");
				$form->addButton("§eSOLO");
				$form->addButton("§eDOUBLES");
				$form->addButton("§eSQUAD");
				$player->sendForm($form);
            }
        }
    } 