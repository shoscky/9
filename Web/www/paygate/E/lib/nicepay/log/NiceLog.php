<?php
/*____________________________________________________________

*	@ description		: 로그 사용을 위한 클래스
*	@ name				: NicepayLiteLog.php
*	@ auther			: NICEPAY I&T (tech@nicepay.co.kr)
*	@ date				: 
*	@ modify			
	
	2013.05.24			Update Log
	
*____________________________________________________________
*/
class NICELog 
{
	var $handle;
	var $type;
	var $log;
	var $debug_mode;
	var	$array_key;
	var $debug_msg;
	var $starttime;
	var $debug;
	
	
  function NICELog($mode, $type )
  {
	    $this->log = "true";
		$this->debug_msg = array( "", "CRITICAL", "ERROR", "NOTICE", "4", "INFO", "6", "DEBUG", "8"  );
		$this->debug_mode = $mode;
		$this->type = $type;
		//$this->starttime= $this->GetMicroTime();
		$debug = 5;

	}
  function StartLog($dir) 
	{
		$logfile = $dir. "/".$this->type."_".date("ymd").".log";
		$this->handle = fopen( $logfile, "a+" );
		if( !$this->handle )
		{
			return false;
		}
		if($this->debug_mode != "INFO"){
			$this->WriteLog( "START NICEPAY TX 1.0 (OS:".php_uname('s').php_uname('r').",PHP:".phpversion()."))" );
		}
		return true;
	}
	
	function WriteLog($data) 
	{
		if( !$this->handle || $this->log == "false" ) return;
		

		$pfx = " [" . date("Y-m-d H:i:s") . "] <" . getmypid() . "> ";
    
		$this->printArray($data);

		if( is_array( $data ) ){
			foreach ($data as $key => $val){
				if( $key == "key" )
            	fwrite( $this->handle, $pfx . $key . ":[" . substr_replace($val, '******', 2, 6) . "]\r\n");
				else
            	fwrite( $this->handle, $pfx . $key . ":[" . $val . "]\r\n");
			}
		} else {
			fwrite( $this->handle, $pfx . $data . "\r\n" );
		}
			fflush( $this->handle );
	}
	
	function CloseLog($msg){
		if( $this->log == "false" ) return;

		//$laptime=GetMicroTime()-$this->starttime;
		//$this->WriteLog( INFO, "END ".$this->type." ".$msg ." Laptime:[".round($laptime,3)."sec]" );
		//$this->WriteLog( INFO, "===============================================================" );
		fclose( $this->handle );
	}

	function WriteArrayLog($data)
	{
		if( !$this->handle || $this->log == "false" ) return;
		
		$pfx = $this->debug_msg[$debug]." [" . date("Y-m-d H:i:s") . "] <" . getmypid() . "> ";
    
		$this->printArray($data,$pfx);
		fflush( $this->handle );
	}

	
	function printArray($array, $pfx=''){
		
		if(!empty($array)){
			if (is_array($array)){
			foreach ($array as $key => $val){
				
				if( $key == "CardNo" && strlen($val)>14){
            		fwrite( $this->handle, $pfx . $key . ":[" .substr($val,0,12)."****" . "]\r\n");
				}else if( $key == "CardPw" && strlen($val)==2){
            		fwrite( $this->handle, $pfx . $key . ":[" ."**" . "]\r\n");
				}else{ 
					fwrite( $this->handle, $pfx . $key . ":[" . $val . "]\r\n");
				}
				if(is_array($val)){
					$this->printArray($value, $pfx.' ');
				}  
			} 
			}
		}
	}


	function Base64Encode( $str )
	{   
	  return substr(chunk_split(base64_encode( $str ),64,"\n"),0,-1)."\n";
	}   
	function GetMicroTime()
	{
		//list($usec, $sec) = explode(" ", microtime(true));
		//return (float)$usec + (float)$sec;
	}
	function SetTimestamp()
	{
		$m = explode(' ',microtime());
		list($totalSeconds, $extraMilliseconds) = array($m[1], (int)round($m[0]*1000,3));
		return date("Y-m-d H:i:s", $totalSeconds) . ":$extraMilliseconds";
	}
	function SetTimestamp1()
	{
		$m = explode(' ',microtime());
		list($totalSeconds, $extraMilliseconds) = array($m[1], (int)round($m[0]*10000,4));
		return date("ymdHis", $totalSeconds) . "$extraMilliseconds";
	}

}

?>