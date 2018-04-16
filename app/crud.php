<?php
class Crud extends Database{

    public function GetData($query, $types, $values){

        //$sql = $this->dbConnection->query($query);

        $sql = $this->dbConnection->prepare($query);

        // for non simple quires
        if($types !== "" && $values !== ""){

          $bind_array[] = $types;
          $bindData ="";
          foreach ($values as $key => $value) {
            $bindData = $key;
            $$bindData = $value;
            $bind_array[] = &$$bindData;
          }
          call_user_func_array(array($sql,'bind_param'),$bind_array);

        }

        $sql -> execute();

        $hashmeta = $sql -> result_metadata();

        while($field = $hashmeta -> fetch_field()){
            $var = $field->name;
            $$var = null;
            $resultParameter[$field->name] = &$$var;

        }

        call_user_func_array(array($sql,'bind_result'),$resultParameter);

        while($sql -> fetch()){
          return $resultParameter;
        }

        $sql -> close();

    }

    public function AddData($query, $types, $values){

        $sql = $this->dbConnection->prepare($query);

        //$count = 0;

        $bind_array[] = $types;

        $bindData ="";

        foreach ($values as $key => $value) {

          $bindData = $key;
          $$bindData = $value;
          $bind_array[] = &$$bindData;

          //$count++;
        }


        call_user_func_array(array($sql,'bind_param'),$bind_array);

        if ($sql -> execute()) {
            return true;
            $sql -> free();
            $sql -> close();
        } else {

            return false;

            //return $sql -> error;
        }

    }

    public function UpdateData($query, $types, $values){

        $sql = $this->dbConnection->prepare($query);

        $bind_array[] = $types;

        $bindData ="";

        foreach ($values as $key => $value) {

          $bindData = $key;
          $$bindData = $value;
          $bind_array[] = &$$bindData;

        }

        call_user_func_array(array($sql,'bind_param'),$bind_array);

        if ($sql -> execute()) {
            return true;
            $sql -> free();
            $sql -> close();
        } else {

            return false;

            //return $sql -> error;
        }

    }


    public function DeleteData($query, $types, $values){

        $sql = $this->dbConnection->prepare($query);

        $bind_array[] = $types;

        $bindData ="";

        foreach ($values as $key => $value) {

          $bindData = $key;
          $$bindData = $value;
          $bind_array[] = &$$bindData;

        }


        call_user_func_array(array($sql,'bind_param'),$bind_array);

        if ($sql -> execute()) {
            return true;
            $sql -> free();
            $sql -> close();
        } else {

            return false;

            //return $sql -> error;
        }

    }

}
?>
