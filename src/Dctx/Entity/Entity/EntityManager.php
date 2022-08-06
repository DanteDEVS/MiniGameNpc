<?php
declare(strict_types=1);

namespace Dctx\Entity\Entity;
use pocketmine\utils\TextFormat;
use pocketmine\world\World;
use pocketmine\entity\Skin;
use pocketmine\entity\Entity;
use pocketmine\math\Vector3;
use pocketmine\{Server, player\Player};
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\entity\Entity;
use pocketmine\nbt\tag\StringTag;
use pocketmine\nbt\tag\DoubleTag;
use pocketmine\nbt\tag\FloatTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\nbt\tag\ByteArrayTag;
use pocketmine\entity\Location;
use pocketmine\player\GameMode;

final class EntityManager
{
	
	public function setEntityMain(Player $player)
	{
		$nbt = $this->createBaseNBT(new Vector3((float)$player->getPosition()->getX(), (float)$player->getPosition()->getY(), (float)$player->getPosition()->getZ()));
		$nbt->setTag(clone $player->getSkin()->getSkinId());
		$human = new MainEntity($player->getWorld(), $nbt);
		$human->setNameTag("");
		$human->setNameTagVisible(true);
		$human->setNameTagAlwaysVisible(true);
		$human->yaw = $player->getYaw();
		$human->pitch = $player->getPitch();
		$human->spawnToAll();
	}
	
	public static function createBaseNBT(Vector3 $pos, ?Vector3 $motion = null, float $yaw = 0.0, float $pitch = 0.0) : CompoundTag{
		return new CompoundTag("", [
			new ListTag("Pos", [
				new DoubleTag("", $pos->x),
				new DoubleTag("", $pos->y),
				new DoubleTag("", $pos->z)
			]),
			new ListTag("Motion", [
				new DoubleTag("", $motion !== null ? $motion->x : 0.0),
				new DoubleTag("", $motion !== null ? $motion->y : 0.0),
				new DoubleTag("", $motion !== null ? $motion->z : 0.0)
			]),
			new ListTag("Rotation", [
				new FloatTag("", $yaw),
				new FloatTag("", $pitch)
			])
		]);
	}
}
