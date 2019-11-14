<?php
function jsonplay($msg="",$code=0,$data=array()){
    if(empty($msg)){
        $msg='success';
    }
    
    $return = array('code'=>$code,'msg'=>$msg,'data'=>$data);
    return json_encode($return);
}
function doCurl($url)
{
    $curl = curl_init();
    // 使用curl_setopt()设置要获取的URL地址
    curl_setopt($curl, CURLOPT_URL, $url);
    // 设置是否输出header
    curl_setopt($curl, CURLOPT_HEADER, false);
    // 设置是否输出结果
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    // 设置是否检查服务器端的证书
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); 
	// 使用curl_exec()将CURL返回的结果转换成正常数据并保存到一个变量
	curl_setopt($curl, CURLOPT_CONNECTTIMEOUT,13);
    $data = curl_exec($curl);
    // 使用 curl_close() 关闭CURL会话
    curl_close($curl);
    return $data;
}

/*
	Utf-8、gb2312都支持的汉字截取函数
	cut_str(字符串, 截取长度, 开始长度, 编码);
	编码默认为 utf-8
	开始长度默认为 0
	 word为true表示以单词计算，否为按字母计算
	*/
  
function cut_str($sourcestr, $cutlength,$elipsis=1,$word=false)
{ 
	$sourcestr=strip_tags($sourcestr);
	$returnstr = '';
	   $i = 0;
	   $n = 0;
	   $str_length = strlen ( $sourcestr ); //字符串的字节数 
	   while ( ($n < $cutlength) and ($i <= $str_length) ) {
		$temp_str = substr ( $sourcestr, $i, 1 );
		$ascnum = Ord ( $temp_str ); //得到字符串中第$i位字符的ascii码 
		if ($ascnum >= 224) {//如果ASCII位高与224，
		   $returnstr = $returnstr . substr ( $sourcestr, $i, 3 ); //根据UTF-8编码规范，将3个连续的字符计为单个字符  
		   $i = $i + 3; //实际Byte计为3
		   $n ++; //字串长度计1
		} elseif ($ascnum >= 192){ //如果ASCII位高与192，
		   $returnstr = $returnstr . substr ( $sourcestr, $i, 2 ); //根据UTF-8编码规范，将2个连续的字符计为单个字符 
		   $i = $i + 2; //实际Byte计为2
		   $n ++; //字串长度计1
		} elseif ($ascnum >= 65 && $ascnum <= 90) {//如果是大写字母，
		 $returnstr = $returnstr . substr ( $sourcestr, $i, 1 );
		 $i = $i + 1; //实际的Byte数仍计1个
		 if(!$word){
			$n ++; //字串长度计1
		 }
		
		}elseif ($ascnum >= 97 && $ascnum <= 122) {
		  $returnstr = $returnstr . substr ( $sourcestr, $i, 1 );
		  $i = $i + 1; //实际的Byte数仍计1个 
		   if(!$word){
				$n ++; //字串长度计1
			}
		}elseif($ascnum<65){
			$returnstr = $returnstr . substr ( $sourcestr, $i, 1 );
			$i = $i + 1; 
			if($word){
				$n ++; //字串长度计1
			}
		} else {//其他情况下，半角标点符号，
		 $returnstr = $returnstr . substr ( $sourcestr, $i, 1 );
		 $i = $i + 1; 
		 $n = $n + 1; 
		}
	   }

	   if($i<$str_length && $elipsis){
		$returnstr.='...';   
	   }
	   return $returnstr;
}


 