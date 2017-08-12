<?php
class FileData
{
    protected $arr;
    protected $strChange;

    public function getData($filePath)
    {
        return $this->getDataFromFile($filePath);
    }

    public function readStringFile($filePath,$valStringNumber)
    {
        return $this->readByStringFile($filePath,$valStringNumber);
    }

    public function getByDigit($filePath,$numberString,$numberOfLetter)
    {
        return $this->getFromFileByDigits($filePath,$numberString,$numberOfLetter);
    }

    public function changeStringFile($filePath,$numberStringForChanging, $valForNewString)
    {
        return $this->changeStringInFile($filePath,$numberStringForChanging, $valForNewString);
    }

    public function changeDigitInFileByStringNumber($filePatch,$numberStringForChangingDigit,$numberDigitForChanging, $valForNewDigit)
    {
        return $this->changeSymbolInFile($filePatch,$numberStringForChangingDigit,$numberDigitForChanging, $valForNewDigit);
    }

    public function showByStringData($file)
    {
        return $this->showByString($file);
    }

    public function showByDigitsData($file)
    {
        return $this->showByDigits($file);
    }
    public function save($file)
    {
        return $this->saveToFileData($file);
    }


    protected function getDataFromFile($file)
    {
        try
        {
            if(is_file($file) && !empty($file) && isset($file))
            {
                $data = file($file);
                return  $data;
            }else
            {
                throw new Exception('It is not file');
            }
        }catch (Exception $getRowingFile)
        {
            echo $getRowingFile->getMessage();
        }

    }

    protected function readByStringFile($filePath,$valStringNumber)
    {
        try
        {
            if(empty($valStringNumber) || !isset($valStringNumber) || empty($filePath))
            {
                throw new Exception('readByStringFile Error params');
            }else
            {
                foreach ($this->getDataFromFile($filePath) as $key => $value)
                {
                    if ($key == $valStringNumber)
                    {
                        return $value;
                    }
                }
            }
        }catch (Exception $readByStringFile)
        {
            echo $readByStringFile->getMessage();
        }
    }

    protected function getFromFileByDigits($filePath,$numberString,$numberOfLetter)
    {
       try
       {
            if(!is_file($filePath) || empty($numberOfLetter) || empty($numberString) || !isset($numberString) || !isset($numberOfLetter))
            {
                throw new Exception('getFromFileByDigits error value params');
            }else
            {
                foreach ($this->getDataFromFile($filePath) as $keyFile => $valueFile)
                {
                    if ($keyFile == $numberString)
                    {
                        $this->arr = str_split($valueFile);
                        foreach ($this->arr as $key => $value)
                        {
                           if($key == $numberOfLetter)
                            {
                                return $value;
                            }
                        }
                    }
                }
            }
       }catch (Exception $getFromFileByDigits)
       {
           echo $getFromFileByDigits->getMessage();
       }
    }

    protected function changeStringInFile($filePatch,$numberStringForChanging, $valForNewString)
    {
       try
       {
            if(!is_file($filePatch) || empty($numberStringForChanging) || empty($valForNewString) || !isset($valForNewString) || !isset($numberStringForChanging))
            {
                throw new Exception('changeStringInFile error params');
            }else
            {
                $file=file("$filePatch");
                $open=fopen("$filePatch","w");

                for($i=0;$i<count($file);$i++)
                {
                    if(($i+1)!=$numberStringForChanging)
                    {
                        fwrite($open,$file[$i]);
                    }
                    else
                    {

                        fwrite($open,$valForNewString."\r\n");
                    }
                }
                fclose($open);
                return $this->getDataFromFile($filePatch);
            }
       }catch (Exception $changeStringInFile)
       {
           echo $changeStringInFile->getMessage();
       }
    }

    protected function changeSymbolInFile($filePatch,$numberString,$digit, $valForNewDigit)
    {
        try
        {
            if (!is_file($filePatch) || empty($numberString) || empty($digit) || empty($valForNewDigit))
            {
                throw new Exception('changeSymbolInFile error params');
            }else
            {
                foreach ($this->getDataFromFile($filePatch) as $keyFile => $valueFile)
                {
                    if ($keyFile == $numberString)
                    {
                        $this->arr = str_split($valueFile);
                        $strForIsxodnik = implode("",$this->arr);
                        foreach ($this->arr as $key => $value)
                        {
                            if($key == $digit)
                            {
                                $this->arr[$key] = $valForNewDigit;
                            }
                        }
                    }
                }
                $strForChange =  $this->arr;
                $this->strChange = implode("",$strForChange);
                $fopen=@file($filePatch);
                foreach($fopen as $key=>$value)
                {
                    $exam = str_replace($valForNewDigit,"",$strForIsxodnik);
                    if(substr_count($value,$exam))
                    {
                        array_splice($fopen, $key, 1,  $this->strChange);

                    }
                    $f=fopen($filePatch, "w");
                    for($i=0;$i<count($fopen);$i++)
                    {
                        fwrite($f,$fopen[$i]);
                    }
                    fclose($f);
                }
            }
            return $this->getDataFromFile($filePatch);
        }catch(Exception $changeSymbolInFile)
        {
            echo $changeSymbolInFile->getMessage();
        }
    }

    protected function showByString($pathToFile)
    {
        foreach ($this->getDataFromFile($pathToFile) as $key => $value)
        {
            $resultArray[$key] = $value;
        }

        return $resultArray;
    }

    protected function showByDigits($pathToFile)
    {
        try
        {
            if(!isset($pathToFile) || empty($pathToFile) || !is_file($pathToFile))
            {
                throw  new Exception('showByDigits error params');
            }else
            {
                $resultArray[] = str_split(implode(" ",$this->getDataFromFile($pathToFile)));
                return $resultArray;
            }
        }catch (Exception $showByDigits)
        {
            echo $showByDigits->getMessage();
        }

    }

    protected function saveToFileData($patchToFile)
    {
        try
        {
            if (!isset($patchToFile) || empty($patchToFile) || !is_file($patchToFile))
            {
                throw  new Exception('saveToFileData error');
            } else
            {
                file_put_contents($patchToFile, $this->getDataFromFile($patchToFile));
            }
        }catch (Exception $saveToFileData)
        {
            echo $saveToFileData->getMessage();
        }
    }
}





?>
