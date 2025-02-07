To address the array ordering issue, if you need to maintain order, use an array that preserves it. For example, a simple approach if you're expecting integers from 1 would be to use an array with explicit keys and populate it iteratively or create it based on a range function. A more general solution would be to use other data structures like SplFixedArray, but at the cost of added complexity:

```php
//Solution to ordering problem:
$myArray = [];
for ($i = 1; $i <= 3; $i++) {
  $myArray[$i] = strval($i);
}

foreach ($myArray as $key => $value) {
echo "Key: " . $key . ", Value: " . $value . "\n";
}

//Alternative using range
$myArray = array_combine(range(1,3), range(1,3));
foreach($myArray as $key => $value){
echo "Key: " . $key . ", Value: " . $value . "\n";
}

```

For the `isset()` issue, explicitly check for both the key's presence and its value, or use `array_key_exists()` to test for the key's existence only:

```php
//Solution to isset problem
$myArray = [];
$myArray[0] = 'zero';
$myArray[false] = 'falsey';

if (!array_key_exists(0, $myArray)) {
echo "Key 0 is not set";
} else {
echo "Key 0 is set";
}


if (!array_key_exists(false, $myArray) || $myArray[false] === null) {
echo "Key false is not set or is null";
} else {
echo "Key false is set";
}
```
These solutions provide more robust and predictable handling of PHP arrays.