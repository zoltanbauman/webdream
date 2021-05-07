<?php

namespace BaumanZoltan;

class BaseModel
{

    public function __construct(array $attributes = [])
    {
        foreach ($attributes as $attribute => $value) {
            $setter = 'set' . ucfirst($attribute);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
    }
}
