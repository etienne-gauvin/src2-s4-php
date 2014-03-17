<?php
abstract class Manager extends DbConnexion {

    protected $entity;
    protected $table;

    public function find($req = array()) {
        // SELECT
        $sql = 'SELECT ';
        if(isset($req['fields'])) {
            if(is_array($req['fields'])) {
                $sql .= implode(', ', $req['fields']);
            } else {
                $sql .= $req['fields'];
            }
        } else {
            $sql .= '*';
        }

        // FROM
        $sql .= ' FROM '.$this->table.' ';

        // WHERE
        if(isset($req['conditions'])) {
            $sql .= 'WHERE ';
            if(!is_array($req['conditions'])) {
                $sql .= $req['conditions'];
            } else {
                $cond = array();
                foreach($req['conditions'] as $k => $v) {

                    $condition = array();
                    if(is_array($v)) {
                        $condition = array_merge($condition, $v);
                    } else {
                        $condition['field'] = $k;
                        $condition['operator'] = '=';
                        $condition['value'] = $v;
                    }

                    if($condition['value'] == 'null') {
                        $cond[] = $condition['field'] . ' IS NULL';
                    } else {
                        if(!is_numeric($condition['value'])) {
                            $condition['value'] = '"'.addslashes($condition['value']).'"';
                        }
                        $cond[] = $condition['field'] . $condition['operator'] . $condition['value'];
                    }
                }
                $sql .= implode(' AND ', $cond);
            }
        }

        // ORDER
        if(isset($req['order'])) {
            $sql .= ' ORDER BY '.$req['order'];
        }

        $r = self::getConnexion()->query($sql);
        $dbObjects = $r->fetchAll(PDO::FETCH_ASSOC);

        return $this->dbo_to_entities($dbObjects);
    }

    public function findFirst($req = array()) {
        return current($this->find($req));
    }

    public function save($data) {
        $fields = array();
        $values = array();

        if(isset($data->id) && empty($data->id)) {
            unset($data->id);
        }

        foreach($data as $k => $v) {
            $fields[] = "$k=:$k";
            $values[":$k"] = $v;
        }


        if(isset($data->id) && !empty($data->id)) {
            $sql = 'UPDATE ' . $this->table . ' SET ' . implode(', ', $fields) . ' WHERE id = :id';
        } else {
            $sql = 'INSERT INTO ' . $this->table . ' SET ' . implode(', ', $fields);
        }

        $pre = self::getConnexion()->prepare($sql);
        $result = $pre->execute($values);

        return $result;
    }

    public function delete($id) {
        $sql = 'DELETE FROM '. $this->table . ' WHERE id  = '. $id;
        return self::getConnexion()->exec($sql);
    }

    public function query($sql) {
        $r = self::getConnexion()->query($sql);
        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    protected function dbo_to_entities($db_objects) {
        $entities = array();

        foreach($db_objects as $dbo) {
            $entities[] = new $this->entity($dbo);
        }

        return $entities;
    }
}