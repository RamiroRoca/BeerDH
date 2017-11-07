<?php

class JSONDB {

    public function find($id, $table, $class)
    {
        $registros = file_get_contents('../../db/usuarios.json');
        $registros = (!$registros)?[]:json_decode($registros, true);
        foreach ($registros[$table] as $registro) {
            if ($registro['id'] == $id) {
                $model = new $class([]);
                $model->toModel($registro);
                return $model;
            }
        }
        return null;
    }

    public function save($table, $model)
    {
        //pregunto si el modelo tiene un id
        if ($model->id) {
            //si lo tiene, es decir que ya existe en la base, por tanto lo actualizo
            $this->update($table, $model);
        } else {
            //ni no, creo uno nuevo
            $this->insert($table, $model);
        }
    }

    public function insert($table, $model)
    {
        $registros = file_get_contents('../../db/usuarios.json');
        $registros = (!$registros)?[]:json_decode($registros, true);
        $nuevoRegistro = [];
        foreach ($model->fillable as $column) {
            $nuevoRegistro[$column] = $model->$column;
        }
        //uso esto para emular el comportamiento que tiene mysql al generar ids
        //con uniqid garantizo que los ids de los registros no se repitan, aunque sacrifico el autoincrement
        $nuevoRegistro['id'] = uniqid();
        $registros[$table][] = $nuevoRegistro;
        $registros = json_encode($registros);
        file_put_contents('../../db/usuarios.json', $registros);
    }

    public function update($table, $model)
    {
        //Busco en la base el objeto que tengo que actualizar, utilizo la misma lógica que find
        $registros = file_get_contents('../../db/usuarios.json');
        $registros = (!$registros)?[]:json_decode($registros, true);
        //uso el for en vez del foreach para trabajar siempre con el array completo del json. Porque en el foreach recupero
        //el $registro como una variable nueva, independiente de $registros (plural). Eso hace que modificar $registro no tenga
        //incidencia en el array general. Es decir $registro['nombre'] = 'Nuevo nombre' no termina repercutiendo en $registros.
        //Pero si lo haría esto: $registros[4]['nombre'] = 'Nuevo nombre'
        for ($i=0, $l=count($registros[$table]); $i<$l; $i++) {
            //Si el registro actual tiene el mismo id que el modelo con el que estoy trabajando:
            //eso significa que ese va a ser el registro que voy a modificar
            if ($registros[$table][$i]['id'] == $model->id) {
                //ahora que encontré el registro que tengo que modificar en el json, seteo cada uno de sus propiedades
                //con los valores que tiene el modelo. Para saber que propiedes debo modificar me valgo del atributo $fillable
                foreach ($model->fillable as $column) {
                    $registros[$table][$i][$column] = $model->$column;
                }
                //finalmente guardo el registro
                //lo codifico a json
                $registros = json_encode($registros);
                //guardarlo en el archivo json
                file_put_contents('../../db/usuarios.json', $registros);
                //corto el bucle con el break
                break;
            }
        }
    }

}