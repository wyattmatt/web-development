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

// Process form submission
$result = null;
$error = null;
$input_nums1 = '';
$input_m = '';
$input_nums2 = '';
$input_n = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Get form data
        $input_nums1 = trim($_POST['nums1'] ?? '');
        $input_m = trim($_POST['m'] ?? '');
        $input_nums2 = trim($_POST['nums2'] ?? '');
        $input_n = trim($_POST['n'] ?? '');

        // Validate inputs
        if (empty($input_nums1) || empty($input_m) || empty($input_n)) {
            throw new Exception("Please fill in all required fields.");
        }

        // Parse arrays
        $nums1_str = preg_replace('/[^\d,\-\s]/', '', $input_nums1);
        $nums2_str = preg_replace('/[^\d,\-\s]/', '', $input_nums2);

        $nums1_parts = array_filter(array_map('trim', explode(',', $nums1_str)));
        $nums2_parts = empty($input_nums2) ? [] : array_filter(array_map('trim', explode(',', $nums2_str)));

        $m = (int)$input_m;
        $n = (int)$input_n;

        // Convert to integers
        $nums1 = array_map('intval', $nums1_parts);
        $nums2 = array_map('intval', $nums2_parts);

        // Validate array sizes
        if (count($nums1) < $m + $n) {
            throw new Exception("nums1 array must have at least m + n elements (you provided " . count($nums1) . " elements, need " . ($m + $n) . ")");
        }

        if (count($nums2) != $n) {
            throw new Exception("nums2 array must have exactly n elements (you provided " . count($nums2) . " elements, expected $n)");
        }

        if ($m > count($nums1)) {
            throw new Exception("m cannot be greater than the total number of elements in nums1");
        }

        // Create a copy for display
        $original_nums1 = array_slice($nums1, 0); // Copy array
        $original_nums2 = array_slice($nums2, 0); // Copy array

        // Perform merge
        merge($nums1, $m, $nums2, $n);

        $result = [
            'original_nums1' => $original_nums1,
            'original_nums2' => $original_nums2,
            'm' => $m,
            'n' => $n,
            'merged' => $nums1
        ];
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merge Sorted Arrays - Web Version</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #4CAF50;
            outline: none;
        }

        .help-text {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        .result {
            margin-top: 30px;
            padding: 20px;
            background-color: #e8f5e8;
            border-left: 4px solid #4CAF50;
            border-radius: 5px;
        }

        .error {
            margin-top: 20px;
            padding: 15px;
            background-color: #ffe6e6;
            border-left: 4px solid #f44336;
            border-radius: 5px;
            color: #d32f2f;
        }

        .example {
            background-color: #f8f9fa;
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
            border-left: 4px solid #007bff;
        }

        .example h3 {
            margin-top: 0;
            color: #007bff;
        }

        .array-display {
            font-family: 'Courier New', monospace;
            background-color: #f4f4f4;
            padding: 8px;
            border-radius: 3px;
            display: inline-block;
            margin: 2px 0;
        }

        .step {
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>🔄 Merge Sorted Arrays</h1>

        <div class="example">
            <h3>How it works:</h3>
            <p>This algorithm merges two sorted arrays. The first array (nums1) should have enough space to hold all elements from both arrays.</p>
            <ul>
                <li><strong>nums1:</strong> First sorted array with extra space (e.g., [1,2,3,0,0,0])</li>
                <li><strong>m:</strong> Number of actual elements in nums1 (e.g., 3)</li>
                <li><strong>nums2:</strong> Second sorted array (e.g., [2,5,6])</li>
                <li><strong>n:</strong> Number of elements in nums2 (e.g., 3)</li>
            </ul>
        </div>

        <form method="POST">
            <div class="form-group">
                <label for="nums1">First Array (nums1):</label>
                <input type="text" id="nums1" name="nums1" value="<?= htmlspecialchars($input_nums1) ?>"
                    placeholder="e.g., 1,2,3,0,0,0" required>
                <div class="help-text">Enter comma-separated integers. Include extra zeros for merging space.</div>
            </div>

            <div class="form-group">
                <label for="m">Number of actual elements in nums1 (m):</label>
                <input type="number" id="m" name="m" value="<?= htmlspecialchars($input_m) ?>"
                    placeholder="e.g., 3" min="0" required>
                <div class="help-text">How many real elements (not including zeros for merging space).</div>
            </div>

            <div class="form-group">
                <label for="nums2">Second Array (nums2):</label>
                <input type="text" id="nums2" name="nums2" value="<?= htmlspecialchars($input_nums2) ?>"
                    placeholder="e.g., 2,5,6">
                <div class="help-text">Enter comma-separated integers. Leave empty if n=0.</div>
            </div>

            <div class="form-group">
                <label for="n">Number of elements in nums2 (n):</label>
                <input type="number" id="n" name="n" value="<?= htmlspecialchars($input_n) ?>"
                    placeholder="e.g., 3" min="0" required>
                <div class="help-text">Number of elements in the second array.</div>
            </div>

            <button type="submit">🚀 Merge Arrays</button>
        </form>

        <?php if ($error): ?>
            <div class="error">
                <strong>❌ Error:</strong> <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <?php if ($result): ?>
            <div class="result">
                <h3>✅ Merge Result:</h3>
                <div class="step">
                    <strong>Input:</strong><br>
                    nums1 = <span class="array-display">[<?= implode(',', $result['original_nums1']) ?>]</span>, m = <?= $result['m'] ?><br>
                    nums2 = <span class="array-display">[<?= implode(',', $result['original_nums2']) ?>]</span>, n = <?= $result['n'] ?>
                </div>
                <div class="step">
                    <strong>Output:</strong><br>
                    <span class="array-display">[<?= implode(',', $result['merged']) ?>]</span>
                </div>
            </div>
        <?php endif; ?>

        <div class="example">
            <h3>📝 Example Test Cases:</h3>
            <p><strong>Example 1:</strong> nums1=[1,2,3,0,0,0], m=3, nums2=[2,5,6], n=3 → [1,2,2,3,5,6]</p>
            <p><strong>Example 2:</strong> nums1=[1], m=1, nums2=[], n=0 → [1]</p>
            <p><strong>Example 3:</strong> nums1=[0], m=0, nums2=[1], n=1 → [1]</p>
            <p><strong>Example 4:</strong> nums1=[4,5,6,0,0,0], m=3, nums2=[1,2,3], n=3 → [1,2,3,4,5,6]</p>
        </div>
    </div>

    <script>
        // Auto-fill example when page loads for first time
        if (!document.querySelector('input[name="nums1"]').value) {
            document.querySelector('input[name="nums1"]').value = '1,2,3,0,0,0';
            document.querySelector('input[name="m"]').value = '3';
            document.querySelector('input[name="nums2"]').value = '2,5,6';
            document.querySelector('input[name="n"]').value = '3';
        }

        // Save scroll position before form submission
        document.querySelector('form').addEventListener('submit', function() {
            sessionStorage.setItem('scrollPosition', window.pageYOffset);
        });

        // Restore scroll position after page reload
        window.addEventListener('load', function() {
            const savedPosition = sessionStorage.getItem('scrollPosition');
            if (savedPosition) {
                window.scrollTo(0, parseInt(savedPosition));
                // Clear the saved position after restoring
                sessionStorage.removeItem('scrollPosition');
            }
        });

        // Also handle page refresh/reload with beforeunload
        window.addEventListener('beforeunload', function() {
            sessionStorage.setItem('scrollPosition', window.pageYOffset);
        });
    </script>
</body>

</html>