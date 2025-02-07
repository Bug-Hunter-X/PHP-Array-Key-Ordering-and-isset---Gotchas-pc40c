In PHP, a common yet subtle error arises when dealing with array keys.  Consider this scenario:

```php
$myArray = [];
$myArray[1] = 'one';
$myArray[3] = 'three';
$myArray[2] = 'two';

foreach ($myArray as $key => $value) {
echo "Key: " . $key . ", Value: " . $value . "\n";
}
```

You might expect the output to be ordered as 1, 2, 3. However, PHP arrays are actually ordered maps and don't guarantee numerical key order.  The output will likely be 1, 3, 2, because PHP iterates based on the internal order of the hash table which isn't sorted by keys.

Another subtle issue with arrays is that `isset()` can behave unexpectedly with integer keys that are 0 or are evaluated to false:

```php
$myArray = [];
$myArray[0] = 'zero';

if (!isset($myArray[0])) {
echo "Key 0 is not set";
} else {
echo "Key 0 is set";
}

$myArray[false] = 'falsey';
if (!isset($myArray[false])) {
echo "Key false is not set";
} else {
echo "Key false is set";
}
```

In this case, `isset($myArray[0])` will be true (0 is set), but `isset($myArray[false])` will also be true because PHP converts `false` to `0` when used as an array key.
This can lead to errors if your code relies on `isset()` to check for the absence of a specific key, especially when expecting a certain key to be truly absent or null.