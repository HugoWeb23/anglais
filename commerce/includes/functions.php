<?PHP





# Nombre de Fonction: 11 #
 
function smileys($texte){
$texte= stripslashes($texte);
$in=array(
           ";)" , 
           ":$" ,
           ":o",
           ":)",
           ":x",
		   ":p",
		   ":'(",
		   ":D",
		   ":jap:",
		   "8)",
		   ":rire:",
		   ":evil:",
		   ":twisted:",
		   ":rool:",
		   ":|",
		   ":suspect:",
		   ":no:",
		   ":coeur:",
		   ":hap:",
		   ":bave:",
		   ":areuh:",
		   ":bandit:",
		   ":help:",
		   ":buzz:",
           );
$out=array(
           '<img src="./web-gallery/smileys/clindoeil.gif" alt=";)" title=";)"/>',
           '<img src="./web-gallery/smileys/embarrase.gif" alt=":$" title=":$"/>',
           '<img src="./web-gallery/smileys/etonne.gif" alt=":o" title=":o"/>',
           '<img src="./web-gallery/smileys/happy.gif" alt=":)" title=":)"/>',
           '<img src="./web-gallery/smileys/icon_silent.png" alt=":x" title=":x"/>',
		   '<img src="./web-gallery/smileys/langue.gif" alt=":p" title=":p"/>',
		   '<img src="./web-gallery/smileys/sad.gif" alt=":\'(" title=":\'("/>',
		   '<img src="./web-gallery/smileys/veryhappy.gif" alt=":D" title=":D"/>',
		   '<img src="./web-gallery/smileys/jap.png" alt=":jap:" title=":jap:"/>',
		   '<img src="./web-gallery/smileys/cool.gif" alt="8)" title="8)"/>',
		   '<img src="./web-gallery/smileys/rire.gif" alt=":rire:" title=":rire:"/>',
		   '<img src="./web-gallery/smileys/icon_evil.gif" alt=":evil:" title=":evil:"/>',
		   '<img src="./web-gallery/smileys/icon_twisted.gif" alt=":twisted:" title=":twisted:"/>',
		   '<img src="./web-gallery/smileys/roll.gif" alt=":rool:" title=":rool:"/>',
		   '<img src="./web-gallery/smileys/neutre.gif" alt=":|" title=":|"/>',
		   '<img src="./web-gallery/smileys/suspect.gif" alt=":suspect:" title=":suspect:"/>',
		   '<img src="./web-gallery/smileys/no.gif" alt=":no:" title=":no:"/>',
		   '<img src="./web-gallery/smileys/coeur.gif" alt=":coeur:" title=":coeur:"/>',
		   '<img src="./web-gallery/smileys/hap.gif" alt=":hap:" title=":hap:" />',
		   '<img src="./web-gallery/smileys/bave.gif" alt=":bave:" title=":bave:" />',
		   '<img src="./web-gallery/smileys/areuh.gif" alt=":areuh:" title=":areuh:" />',
		   '<img src="./web-gallery/smileys/bandit.gif" alt=":bandit:" title=":bandit:" />',
		   '<img src="./web-gallery/smileys/help.gif" alt=":help:" title=":help:" />',
		   '<img src="./web-gallery/smileys/buzz.gif" alt=":buzz:" title=":buzz:" />',
           );
         return str_ireplace($in,$out,$texte);}
		 
function smileystaff($texte){
$texte= stripslashes($texte);
$in=array(
           ";)" , 
           ":$" ,
           ":o",
           ":)",
           ":x",
		   ":p",
		   ":'(",
		   ":D",
		   ":jap:",
		   "8)",
		   ":rire:",
		   ":evil:",
		   ":twisted:",
		   ":rool:",
		   ":|",
		   ":suspect:",
		   ":no:",
		   ":coeur:",
		   ":hap:",
		   ":bave:",
		   ":areuh:",
		   ":bandit:",
		   ":help:",
		   ":buzz:",
		   ":contrat:",
		   ":favo:",
		   ":contre:",
           );
$out=array(
           '<img src="../web-gallery/smileys/clindoeil.gif" alt=";)" title=";)"/>',
           '<img src="../web-gallery/smileys/embarrase.gif" alt=":$" title=":$"/>',
           '<img src="../web-gallery/smileys/etonne.gif" alt=":o" title=":o"/>',
           '<img src="../web-gallery/smileys/happy.gif" alt=":)" title=":)"/>',
           '<img src="../web-gallery/smileys/icon_silent.png" alt=":x" title=":x"/>',
		   '<img src="../web-gallery/smileys/langue.gif" alt=":p" title=":p"/>',
		   '<img src="../web-gallery/smileys/sad.gif" alt=":\'(" title=":\'("/>',
		   '<img src="../web-gallery/smileys/veryhappy.gif" alt=":D" title=":D"/>',
		   '<img src="../web-gallery/smileys/jap.png" alt=":jap:" title=":jap:"/>',
		   '<img src="../web-gallery/smileys/cool.gif" alt="8)" title="8)"/>',
		   '<img src="../web-gallery/smileys/rire.gif" alt=":rire:" title=":rire:"/>',
		   '<img src="../web-gallery/smileys/icon_evil.gif" alt=":evil:" title=":evil:"/>',
		   '<img src="../web-gallery/smileys/icon_twisted.gif" alt=":twisted:" title=":twisted:"/>',
		   '<img src="../web-gallery/smileys/roll.gif" alt=":rool:" title=":rool:"/>',
		   '<img src="../web-gallery/smileys/neutre.gif" alt=":|" title=":|"/>',
		   '<img src="../web-gallery/smileys/suspect.gif" alt=":suspect:" title=":suspect:"/>',
		   '<img src="../web-gallery/smileys/no.gif" alt=":no:" title=":no:"/>',
		   '<img src="../web-gallery/smileys/coeur.gif" alt=":coeur:" title=":coeur:"/>',
		   '<img src="../web-gallery/smileys/hap.gif" alt=":hap:" title=":hap:" />',
		   '<img src="../web-gallery/smileys/bave.gif" alt=":bave:" title=":bave:" />',
		   '<img src="../web-gallery/smileys/areuh.gif" alt=":areuh:" title=":areuh:" />',
		   '<img src="../web-gallery/smileys/bandit.gif" alt=":bandit:" title=":bandit:" />',
		   '<img src="../web-gallery/smileys/help.gif" alt=":help:" title=":help:" />',
		   '<img src="../web-gallery/smileys/buzz.gif" alt=":buzz:" title=":buzz:" />',
		   '<img src="../web-gallery/smileys/contrat.gif" alt=":contrat:" title=":contrat:" />',
		   '<img src="../web-gallery/smileys/pour.gif" alt=":favo:" title=":favo:" />',
		   '<img src="../web-gallery/smileys/contre.gif" alt=":contre:" title=":contre:" />',
           );
         return str_ireplace($in,$out,$texte);}

		function SystemConfig($str)
			{
				$tmp = mysql_query("SELECT ".$str." FROM server_status LIMIT 1") or die(mysql_error());
				$tmp = mysql_fetch_assoc($tmp);
				return $tmp[$str];
			}
			
		function Redirect($url)
			{
				echo "<SCRIPT LANGUAGE=\"JavaScript\"> document.location.href=\"".$url."\" </SCRIPT>";
			}
			
		function AkinatorHash($str)
			{
				$config_hash = "xCg532%@%gdvf^5DGaa6&*rFTfg^FD4\$OIFThrR_gh(ugf*/";
				$str = Securise(sha1($str . $config_hash));
				return $str;
			}
		
		function SecuriseSQL($str, $avancee=false) 
			{
				if($avancee== true){ return mysql_real_escape_string($str); }
				$str = mysql_real_escape_string(htmlspecialchars($str));
				return $str;
			}
		
		function Securise($str)
			{
				$str = mysql_real_escape_string(htmlspecialchars(stripslashes(nl2br(trim($str)))));
				return $str;
			}
			
		function SecuriseText($str, $avancee=false, $codeforum=false) 
			{
				if($avancee == true){ return stripslashes($str); }
				$str = stripslashes(nl2br(htmlspecialchars($str)));
				if($codeforum == true){$str = bbcode_format($str); }
				return $str;
			}

		function FullDate($str)
			{
				$H = date('H');
				$i = date('i');
				$s = date('s');
				$m = date('m');
				$d = date('d');
				$Y = date('Y');
				$j = date('j');
				$n = date('n');
				
				switch ($str)
					{
						case "day":
							$str = $j;
							break;
						case "month":
							$str = $m;
							break;
						case "year":
							$str = $Y;
							break;
						case "today":
							$str = $d;
							break;
						case "full":
							$str = date('d/m/Y à H:i:s',mktime($H,$i,$s,$m,$d,$Y));
							break;
						case "datehc":
							$str = "".$d."/".$m."/".$Y."";
							break;
						default:
							$str = date('d/m/Y',mktime($m,$d,$Y));
							break;
					}
					
				return $str;
			}
			
		function IsEven($int)
			{
				if($int % 2 == 0)
					{
						return true;
					} 
					else 
					{
						return false;
					}
			}
		function TicketRefresh($username)
			{
				$base = "AkinatorCMS-";
				
					for($i = 1; $i <= 3; $i++):
						{
							$base = $base . rand(0,99);
							$base = uniqid($base);
						}
					endfor;
					$base = $base . "-AkinatorCMS";
				
				$request = mysql_query("UPDATE users SET auth_ticket = '".$base."' WHERE username = '".$username."' LIMIT 1") or die(mysql_error());
				return $base;
			}	
			
			function GetUserGroupBadge($id){
	$check = mysql_query("SELECT groupid FROM groups_memberships WHERE userid = '".$id."' AND is_current = '1' LIMIT 1") or die(mysql_error());
	$has_badge = mysql_num_rows($check);

	if($has_badge > 0){

		$row = mysql_fetch_assoc($check);
		$groupid = $row['groupid'];

		$check = mysql_query("SELECT badge FROM groups_details WHERE id = '".$groupid."' LIMIT 1") or die(mysql_error());

		$row = mysql_fetch_assoc($check);
		$badge = $row['badge'];

		return $badge;

	} else {

		return false;

	}
}
	
	function GetUserBadge($username){ // supports user IDs also

	if(is_numeric($username)){
		$check = mysql_query("SELECT id FROM users WHERE id = '".$username."' AND badge_status = '1' LIMIT 1") or die(mysql_error());
	} else {
		$check = mysql_query("SELECT id FROM users WHERE username = '".Filter($username)."' AND badge_status = '1' LIMIT 1") or die(mysql_error());
	}

	$exists = mysql_num_rows($check);

		if($exists > 0){
			$usrrow = mysql_fetch_assoc($check);
			$check = mysql_query("SELECT * FROM user_badges WHERE user_id = '".$usrrowusrrow['id']."' AND badge_slot = '1' LIMIT 1") or die(mysql_error());
			$hasbadge = mysql_num_rows($check);
			if($hasbadge > 0){
				$badgerow = mysql_fetch_assoc($check);
				return $badgerow['badge_id'];
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
		function GetUserGroup($id){
		$check = mysql_query("SELECT groupid FROM groups_memberships WHERE userid = '".$id."' AND is_current = '1' LIMIT 1") or die(mysql_error());
		$has_fave = mysql_num_rows($check);

		if($has_fave > 0){

			$row = mysql_fetch_assoc($check);
			$groupid = $row['groupid'];

			return $groupid;

		} else {

			return false;

		}
}

	function NLBText($str, $advanced=false) {
		$str = stripslashes($str);
		if($advanced != true){ $str = htmlspecialchars($str,ENT_COMPAT,"UTF-8"); }
		return $str;
	}
		function getContent($strKey){

	$tmp = mysql_query("SELECT contentvalue FROM site_content WHERE contentkey = '".Filter($strKey)."' LIMIT 1") or die(mysql_error());
	$tmp = mysql_fetch_assoc($tmp);
	return $tmp['contentvalue'];
	}
		function Filter($str, $advanced=false) {
		if($advanced == true){ return mysql_real_escape_string($str); }
		$str = mysql_real_escape_string(htmlspecialchars($str));
		return $str;
	}

		function mysql_evaluate($query, $default_value="undefined") 
	{
		$result = mysql_query($query) or die(mysql_error());

		if(mysql_num_rows($result) < 1){
		return $default_value;
		} else {
		return mysql_result($result, 0);
		}
	}
	

	
		function bbcode_format($str){

	
		// Parse BB code
	        $simple_search = array(
	                                '/\[b\](.*?)\[\/b\]/is',
	                                '/\[i\](.*?)\[\/i\]/is',
	                                '/\[u\](.*?)\[\/u\]/is',
	                                '/\[s\](.*?)\[\/s\]/is',
	                                '/\[quote\](.*?)\[\/quote\]/is',
	                                '/\[link\=(.*?)\](.*?)\[\/link\]/is',
	                                '/\[url\=(.*?)\](.*?)\[\/url\]/is',
									'/\[img\](.*?)\[\/img\]/is',
									'/\[video_adm\](.*?)\[\/video_adm\]/is',
									'/\[center\](.*?)\[\/center\]/is',
	                                '/\[color\=(.*?)\](.*?)\[\/color\]/is',
	                                '/\[size=small\](.*?)\[\/size\]/is',
	                                '/\[size=large\](.*?)\[\/size\]/is',
	                                '/\[code\](.*?)\[\/code\]/is',
	                                '/\[habbo\=(.*?)\](.*?)\[\/habbo\]/is',
	                                '/\[room\=(.*?)\](.*?)\[\/room\]/is',
	                                '/\[group\=(.*?)\](.*?)\[\/group\]/is'
	                                );

	        $simple_replace = array(
	                                "<b>$1</b>",
	                                "<i>$1</i>",
	                                "<u>$1</u>",
	                                "<s>$1</s>",
	                                "<div class=\"bbcode-quote\">$1</div>",
	                                "<a href=\"$1\">$2</a>",
	                                "<a href=\"$1\">$2</a>",
	                                "<img src=\"$1\">$2</img>",
									"<iframe width=\"250\" height=\"157\" src=\"$1\" frameborder=\"0\">$2</iframe>",
									"<center>$1</center>",
	                                "<span style=\"color: $1;\">$2</span>",
	                                "<span style=\"font-size: 9px;\">$1</span>",
	                                "<span style=\"font-size: 14px;\">$1</span>",
	                                "<pre>$1</pre>",
	                                "<a href=\"./home/$1/id\">$2</a>",
	                                "<a onclick=\"roomForward(this, '$1', 'private'); return false;\" target=\"client\" href=\"./client?forwardId=2&roomId=$1\">$2</a>",
	                                "<a href=\"./groups/$1/id\">$2</a>"
	                                );

	        $str = preg_replace ($simple_search, $simple_replace, $str);
 
	        return $str;
	}
?>