class Solution {

    /**
     * @param Integer[][] $points
     * @param Integer $K
     * @return Integer[][]
     */
    function kClosest($points, $K) {
    if ($points == null || count($points) == 0 || $K == 0) {
      throw new Exception("Input should not be empty");
    }
    self::quickSelect($points, $K, 0, count($points) - 1);
    return array_slice($points, 0, $K);
  }

  function quickSelect(&$points, $K, $low, $high) {
    $partition = self::partition($points, $low, $high);
    if ($partition == $K || $partition == $K - 1) {
      // If the location is K after partition, the points before it can be used;
      // If the location is K-1, the points before it plus itself can be used.
      return;
    } else if ($partition < $K - 1) {
      self::quickSelect($points, $K,$partition + 1, $high);
    }
    else {
      self::quickSelect($points, $K, $low, $partition - 1);
    }
  }

  /**
   * The low is smaller
   * @param points
   * @param low
   * @param high
   * @@return The index that points are closer before it, and points are further after it.
   */
  function partition(&$points, $low, $high) {
    $pivotPoint = $points[$high];
    $partitionIndex = $low;

    for ($i = $low; $i < $high; $i++) {
      if (self::compare($points[$i], $pivotPoint) <= 0) {
        self::swap($points, $i, $partitionIndex);
        $partitionIndex++;
      }
    }
    self::swap($points, $partitionIndex, $high);
    return $partitionIndex;
  }

  function compare($point1, $point2) {
    return $point1[0] * $point1[0] + $point1[1] * $point1[1] -
        $point2[0] * $point2[0] - $point2[1] * $point2[1];
  }

  function swap(&$points, $location1, $location2) {
    $tempPoint = $points[$location1];
    $points[$location1] = $points[$location2];
    $points[$location2] = $tempPoint;
  }
}
