class Solution {

    /**
     * @param String $path
     * @return String
     */
    function simplifyPath($path) {
        if(null == $path || empty($path)) return "";
        $stack = new SplQueue();
        foreach(explode("/", $path) as $cur) {
            if($cur == "..") {if (!$stack->isEmpty()) $stack->pop();}
            else if($cur != "" && $cur != ".") $stack->push($cur);
        }
        
        if($stack->isEmpty()) return "/";
        $sb = "";
        while(!$stack->isEmpty()) $sb .= "/" . $stack->shift();
        return $sb;
    }
}
