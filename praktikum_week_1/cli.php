<?php

/**
 * Merge two sorted arrays into nums1
 * 
 * @param array $nums1 First sorted array with extra space for merging
 * @param int $m Number of actual elements in nums1
 * @param array $nums2 Second sorted array
 * @param int $n Number of elements in nums2
 * @return void (modifies nums1 in-place)
 */
function merge(&$nums1, $m, $nums2, $n)
{
    // Start from the end of both arrays
    $i = $m - 1;  // Last element in nums1
    $j = $n - 1;  // Last element in nums2
    $k = $m + $n - 1;  // Last position in nums1

    // Merge from the end to avoid overwriting elements
    while ($j >= 0) {
        if ($i >= 0 && $nums1[$i] > $nums2[$j]) {
            $nums1[$k] = $nums1[$i];
            $i--;
        } else {
            $nums1[$k] = $nums2[$j];
            $j--;
        }
        $k--;
    }
}

// Test cases
echo "Testing merge sorted arrays:\n\n";

// Example 1
echo "Example 1:\n";
$nums1 = [1, 2, 3, 0, 0, 0];
$m = 3;
$nums2 = [2, 5, 6];
$n = 3;
echo "Input: nums1 = [" . implode(",", $nums1) . "], m = $m, nums2 = [" . implode(",", $nums2) . "], n = $n\n";
merge($nums1, $m, $nums2, $n);
echo "Output: [" . implode(",", $nums1) . "]\n\n";

// Example 2
echo "Example 2:\n";
$nums1 = [1];
$m = 1;
$nums2 = [];
$n = 0;
echo "Input: nums1 = [" . implode(",", $nums1) . "], m = $m, nums2 = [" . implode(",", $nums2) . "], n = $n\n";
merge($nums1, $m, $nums2, $n);
echo "Output: [" . implode(",", $nums1) . "]\n\n";

// Example 3
echo "Example 3:\n";
$nums1 = [0];
$m = 0;
$nums2 = [1];
$n = 1;
echo "Input: nums1 = [" . implode(",", $nums1) . "], m = $m, nums2 = [" . implode(",", $nums2) . "], n = $n\n";
merge($nums1, $m, $nums2, $n);
echo "Output: [" . implode(",", $nums1) . "]\n\n";

// Additional test case
echo "Additional test case:\n";
$nums1 = [4, 5, 6, 0, 0, 0];
$m = 3;
$nums2 = [1, 2, 3];
$n = 3;
echo "Input: nums1 = [" . implode(",", $nums1) . "], m = $m, nums2 = [" . implode(",", $nums2) . "], n = $n\n";
merge($nums1, $m, $nums2, $n);
echo "Output: [" . implode(",", $nums1) . "]\n";
?>