<?php

class Log
{
    private $fileName;
    private $handle;
    public $currentDate;
    public $currentTime;
    
    public function __construct($prefix = 'log')
    {
        // make a file name and use a string to say log.2016-05-19.log
        // $this->filename = "$prefix-$currentDate.log";
        $this->setFileName("$prefix-YYYY-MM-DD.log");

        // making the connection to the filename specified above
        $this->setHandle(fopen($this->fileName, 'a'));

    }

    public function setFileName($fileName)
    {
        
        $this->fileName = (string)$fileName;
    }

    public function setHandle($handle)
    {
        $this->handle = $handle;
    }

    public function getFileName()
    {
        return $this->fileName;
    }

    public function getHandle()
    {
        return $this->handle;
    }



    public function logMessage($logLevel, $message)
    {
        // get the date
        $this->currentDate = date("Y-m-d");
        // get the time
        $this->currentTime = date('h:i:s');
        // use handle for connection
        // $currentDate . $currentTime . then "[level]" (this comes from $loglevel)
        // $logLevel comes from the first value in the logmessage function, which is INFO or ERROR
        fwrite($this->handle, $this->currentDate . ' ' . $this->currentTime . "[$logLevel]" . $message . PHP_EOL);
        
    }
            
    // message will be provided when the function is called!
    public function logInfo($message)
    {
        $this->logMessage("INFO", $message);
    }

    // message will be provided when the function is called!
    public function logError($message)
    {
        $this->logMessage("ERROR", $message);
    }
        
    public function __destruct()
    {

        fclose($this->handle);
        echo "did it work?\n";
    }

}


?>