<?php 

namespace Dctx\Entity;

use pocketmine\plugin\PluginBase;
use pocketmine\player\Player;;
use pocketmine\entity\EntityFactory;
use pocketmine\entity\EntityDataHelper;
use pocketmine\world\World;
use pocketmine\nbt\tag\CompoundTag;
use Dctx\Entity\{Form\Form, Form\FormAPI, Entity\EntityManager, Entity\EntityMain, Task\NpcTask, Command\NpcCommand};

class Main extends PluginBase{

	public function onEnable(): void{
        $this->getLogger()->info("Plugin Is Enabled!");
        $this->getServer()->getCommandMap()->register("mnpc", new NpcCommand($this));
	$entityfactory = EntityFactory::getInstance();
	$entityfactory->register(EntityMain::class, function(World $world, CompoundTag $nbt) :EntityMain{
		return new EntityMain(EntityDataHelper::parseLocation($nbt, $world), $nbt);
	}, ['EntityMain']);
    }
	
    public function onDisable(): void{
        $this->getLogger()->info("Disabling Plugin!");
	}

    public function onHitNPC(EntityDamageByEntityEvent $event) {
		if ($event->getEntity() instanceof MainEntity) {
			$player = $event->getDamager();
			if ($player instanceof Player) {
				$event->cancel();
				$form = new Form(function (Player $player, int $data = null) {
					switch($data) {
					    case 0:
					    break;
						case 1:
						$this->getPlugin()->getServer()->dispatchCommand($player, $this->getConfig()->get("Cmd-1"));
						break;
						case 2:
						$this->getPlugin()->getServer()->dispatchCommand($player, $this->getConfig()->get("Cmd-2"));
						break;
						case 3:
						$this->getPlugin()->getServer()->dispatchCommand($player, $this->getConfig()->get("Cmd-3"));
						break;
					}
				});
				$form->setTitle($this->getConfig()->get("Form-Title"));
				$form->setContent("§fSelect Mode!");
				$form->addButton("§l§cEXIT");
				$form->addButton("§eSOLO");
				$form->addButton("§eDOUBLES");
				$form->addButton("§eSQUAD");
				$player->sendForm($form);
			}
		}
    }
}
