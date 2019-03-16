class Node{
    var $key;
    var $val;
    var $prev;
    var $next;
    function __construct($key, $val) {
        $this->key = $key;
        $this->val = $val;
        $this->prev = null;
        $this->next = null;
    }
}

class LRUCache {
    /**
     * @param Integer $capacity
     */
    function __construct($capacity) {
        $this->capacity = $capacity;
        $this->currentCapacity = 0;
        $this->head = new Node(0, 0);
        $this->tail = new Node(0, 0);
        $this->head->next = $this->tail;
        $this->tail->prev = $this->head;
        $this->map = [];
    }
  
    /**
     * @param Integer $key
     * @return Integer
     */
    function get($key) {
        if (array_key_exists($key, $this->map)) {
            $node = $this->map[$key];
            self::removeNode($node);
            self::addToTail($node);
            return $node->val;
        }
        return -1;
    }
  
    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    function put($key, $value) {
        if (array_key_exists($key, $this->map)) {
            $node = $this->map[$key];
            self::removeNode($node);
            $node->val = $value;
            $this->map[$key] = $node;
            self::addToTail($node);
        } else {
            if ($this->currentCapacity == $this->capacity) {
                $removeKey = $this->head->next->key;
                self::removeNode($this->head->next);
                unset($this->map[$removeKey]);
                $this->currentCapacity--;
            }
            $newNode = new Node($key, $value);
            $this->map[$key] = $newNode;
            self::addToTail($newNode);
            $this->currentCapacity++;
        }
    }
    
    function removeNode($node) {
        $node->prev->next = $node->next;
        $node->next->prev = $node->prev;
    }
    
    function addToTail($node) {
        $this->tail->prev->next = $node;
        $node->prev = $this->tail->prev;
        $node->next = $this->tail;
        $this->tail->prev = $node;
    }

}

/**
 * Your LRUCache object will be instantiated and called as such:
 * $obj = LRUCache($capacity);
 * $ret_1 = $obj->get($key);
 * $obj->put($key, $value);
 */
