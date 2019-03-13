/*
// Definition for a Node.
class Node {
    public $val;
    public $neighbors;

    @param Integer $val 
    @param list<Node> $neighbors 
    function __construct($val, $neighbors) {
        $this->val = $val;
        $this->neighbors = $neighbors;
    }
}
*/
class Solution {

    /**
     * @param Node $node
     * @return Node
     */
    function cloneGraph($node) {
        $seen = [];
        return self::cloneHelper($node, $seen);
    }
        
    function cloneHelper(&$origNode, &$seen) {
        if ($origNode == null)
            return null;
        $iter = $seen[$origNode->val];
        if ($iter != null)
            return $iter;

        $newNode = new Node($origNode->val, []);
        $seen[$origNode->val] = $newNode;
        foreach ($origNode->neighbors as $neigh)
            array_push($newNode->neighbors, self::cloneHelper($neigh, $seen));
        return $newNode;
    }
}
