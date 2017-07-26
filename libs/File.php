<?php
class File
{
    public $arr=array();

    public function ReadAll($patch)
    {
        $file = fopen("$patch","r");

        while(! feof($file))
        {
           $this->arr =  explode(' ',fgets($file). "<br />");
        }

        fclose($file);
        return $this->arr;
    }

    /*public function showFile($var){
        foreach ($var as $line_num => $line) {
            echo "Строка #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
        }
    }*/
}


?>