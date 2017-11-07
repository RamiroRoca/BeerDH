<?php
require_once 'DBFactory.php';

class Model {

    public function __construct($data)
    {
        $this->toModel($data);
    }

    public static function find($id)
    {
        return DBFactory::getDB()->find($id, static::$table, get_called_class());
    }

    public function toModel($data)
    {
        if (isset($data['id'])) $this->id = $data['id'];
        foreach ($data as $key => $value) {
            if (in_array($key, $this->fillable)) {
                $this->$key = $value;
            }
        }
    }

    public function save()
    {
        return DBFactory::getDB()->save(static::$table, $this);
    }

}
