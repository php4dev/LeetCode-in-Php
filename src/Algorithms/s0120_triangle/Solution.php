class Solution {

    function minimumTotalOfLayer(
        $triangle, &$cache, $layer, $totalLayerSize) {
        $currentLayer = $triangle[$layer];
        if ($layer == $totalLayerSize - 1) {
          for ($i = 0; $i < $totalLayerSize; $i++) $cache[$i] = $currentLayer[$i];
          return;
        }
        self::minimumTotalOfLayer($triangle, $cache, $layer + 1, $totalLayerSize);
        $currentLayerSize = count($currentLayer);
        for ($i = 0; $i < $currentLayerSize; $i++) {
          $cache[$i] = min($cache[$i], $cache[$i + 1]) + $currentLayer[$i];
        }
    }

    /**
     * @param Integer[][] $triangle
     * @return Integer
     */
    function minimumTotal($triangle) {
        if (empty($triangle)) return 0;
        $cache = array_fill(0, count($triangle) + 1, 0);
        self::minimumTotalOfLayer($triangle, $cache, 0, count($triangle));
        return $cache[0];
    }
}
