<?php
//function declararion
function name($firstName, $lastName = 'defaultvalue') {
    return "$firstName $lastName";
}

//function call
name('Mike', 'Taylor');

//function call with named parameters (PHP 8)
name(firstName: 'Mike', lastName: 'Taylor'); // order can change

//function variables params
function nameWithParams(...$params) {
    return $params[0] . " " . $params[1];
}

// Closure function (example without Route dependency)
$closure = function () {
     return 'welcome view';
};

// Arrow functions (example without Route dependency)
$arrow = fn () => 'welcome view';


// Typed parameter and typed return
function display(string $first, string $last) : string {
    return "$first $last";
}

// Typed or null
function displayNullable(?string $name) {
    return $name ?? 'No name provided';
}

// Union type (or)
function displayUnion(string|int $data) {
    return (string)$data;
}

// Intersection type (and)
function count_and_interate(Iterator&Countable $value) {
    return count($value);
}

// Return any type (mixed)
function logInfoMixed(string $info) : mixed {
    return $info;
}

// No return (void)
function logInfoVoid(string $info) : void {
    echo $info;
}
?>