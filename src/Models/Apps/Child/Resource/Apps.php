<?php

namespace JacobDeKeizer\Ccv\Models\Apps\Child\Resource;

use JacobDeKeizer\Ccv\Contracts\Model;
use JacobDeKeizer\Ccv\Traits\FromArray;
use JacobDeKeizer\Ccv\Traits\ToArray;

class Apps implements Model
{
    use FromArray, ToArray;

    /**
     * @var string Link to the apps of this categorie
     */
    private $href;

    /**
     * @return self
     */
    public static function fromArray(array $data): Model
    {
        return self::createFromArray($data);
    }

    /**
     * @return string Link to the apps of this categorie
     */
    public function getHref(): string
    {
        return $this->href;
    }

    /**
     * @param string $href Link to the apps of this categorie
     * @return self
     */
    public function setHref(string $href): self
    {
        $this->href = $href;
        $this->propertyFilled('href');
        return $this;
    }
}
