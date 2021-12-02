<?php
declare(strict_types=1);

namespace Dctx\Entity\Task;

use Dctx\Entity\EntityMain;
use Dctx\Entity\Main;
use pocketmine\scheduler\Task;
use pocketmine\{Server, Player};
use pocketmine\utils\TextFormat;

class NPC extends Task
{

	public function onRun(int $currentTick)
	{
		$level = Server::getInstance()->getDefaultLevel();
		foreach ($level->getEntities() as $entity)
		{
			if ($entity instanceof EntityMain)
			{
				$entity->setNameTag($this->setTag());
				$entity->setNameTagAlwaysVisible(true);
				$entity->setScale(1.0);
			}
		}
	}
	private function getTitle(){
		$title =["§b[Solo]", "§b[Doubles]", "§b[Squad]"];
		return $title[array_rand($title)];
		}

	private function setTag(): string
	{
		$logo = "§l§eNpc MiniGame Name"."\n";
		$title = "§l§bLEFT CLICK TO PLAY"."\n";
		$subtitle = "§eJOIN NOW! \n";
		return $logo . $title . $subtitle;
	}
}
?>