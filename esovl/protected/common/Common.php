<?php
class Common{
    /**
     *截取字符串
     * @param <type> $string 输入字符串
     * @param <type> $length 长度
     * @param <type> $dot 超过长度时后缀
     * @param <type> $charset编码
     * @return <type> 
     */
    public static function strCut($string, $length, $dot = '...',$charset='utf-8'){
        $strlen = strlen($string);
        if($strlen <= $length) {
            return $string;
        }
        $strcut = '';
        if(strtolower($charset) == 'utf-8'){
            $n = $tn = $noc = 0;
            while($n < $strlen){
                $t = ord($string[$n]);
                if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
                    $tn = 1; $n++; $noc++;
                }else if(194 <= $t && $t <= 223) {
                    $tn = 2; $n += 2; $noc += 2;
                }else if(224 <= $t && $t <= 239) {
                    $tn = 3; $n += 3; $noc += 3;
                }else if(240 <= $t && $t <= 247) {
                    $tn = 4; $n += 4; $noc += 4;
                }else if(248 <= $t && $t <= 251) {
                    $tn = 5; $n += 5; $noc += 5;
                }else if($t == 252 || $t == 253){
                    $tn = 6; $n += 6; $noc += 6;
                }else{
                    $n++;
                }
                if($noc >= $length) {
                    break;
                }
            }
            if($noc > $length){
                $n -= $tn;
            }
            $strcut = substr($string, 0, $n);
            $strcut = $strcut.$dot;
        }else{
            $dotlen = strlen($dot);
            $maxi = $length - $dotlen - 1;
            for($i = 0; $i < $maxi; $i++){
                $strcut .= ord($string[$i]) > 127 ? $string[$i].$string[++$i] : $string[$i];
            }
        }
        return $strcut;
    }
	 	   /**
     *截取字符串并去除标签
     * @param <type> $string 输入字符串
     * @param <type> $length 长度
     * @param <type> $dot 超过长度时后缀
     * @param <type> $charset编码
     * @return <type> 
     */
    public  static function strCutAndTags($string, $length, $dot = '...',$charset='utf-8'){
	
        $strcut=self::strCut(self::strTags($string), $length, $dot,$charset);
        return $strcut;
    }
	    /**
     *去除标签
     * @param <type> $string 输入字符串
     * @param <type> $length 长度
     * @param <type> $dot 超过长度时后缀
     * @param <type> $charset编码
     * @return <type> 
     */
    public  static function strTags($string){
		$string=preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",$string);  	 
        $strcut=htmlspecialchars_decode(strip_tags($string));
        return $strcut;
    }
	
    public  static function getImage($string){
		$return=$string&&file_exists(IMAGEPATH.$string)?"/admin_root/".$string:DEFAULTIMAGE;
		$return=CHtml::image($return);
        return $return;
    }
}
?>