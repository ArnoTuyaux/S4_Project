<?php
class Type_plats
{
    private $type_plat;

    public function __construct($type_plat)
    {
        $this->type_plat = $type_plat;
    }

    public function getTypePlat()
    {
        return $this->type_plat;
    }

    // Ajouter la méthode toArray()
    public function toArray()
    {
        return [
            'TYPE_PLAT' => $this->getTypePlat()
        ];
    }
}
