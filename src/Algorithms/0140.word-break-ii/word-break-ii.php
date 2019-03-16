class Solution {

    /**
     * @param String $s
     * @param String[] $wordDict
     * @return String[]
     */
    function wordBreak($s, $wordDict) {
        $map = [];
        self::wordBreakHelper($s, $wordDict, $map);
        return $map[$s];
    }
    
    function wordBreakHelper($s, $dict, &$map) {
        if (array_key_exists($s, $map)) {
            return $map[$s];   
        }
        
        $list = [];
        
        if ($s == "") {
            array_push($list, "");
            return $list;
        }

        foreach ($dict as $currStr) {
            if (self::startsWith($s, $currStr)) {
                $tempList = self::wordBreakHelper(substr($s, strlen($currStr)), $dict, $map);
                if (!empty($tempList)) {
                    foreach ($tempList as $tempStr) {
                       array_push($list, $currStr . ($tempStr == "" ? "" : " ") . $tempStr);
                    }
                }
            }
        }
        
        $map[$s] = $list;
        return $list;
    }
    
    function startsWith($haystack, $needle) {
        return strncmp($haystack, $needle, strlen($needle)) === 0;
    }
}
