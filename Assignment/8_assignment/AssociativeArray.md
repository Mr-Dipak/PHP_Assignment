In PHP, associative arrays can be accessed and manipulated using various methods and functions. Here are some common methods and functions to work with associative arrays:

### Declaration of Associative Arrays
1. **Using array() function:**
    ```php
    $arr = array(
        "name" => "dipak",
        "age" => "22",
        "course" => "MCA",
        "year" => "2nd",
        "email" => "dipak@gmail.com"
    );
    ```

2. **Using short array syntax (PHP 5.4+):**
    ```php
    $arr = [
        "name" => "dipak",
        "age" => "22",
        "course" => "MCA",
        "year" => "2nd",
        "email" => "dipak@gmail.com"
    ];
    ```

### Accessing and Manipulating Associative Arrays
1. **Accessing elements:**
    ```php
    echo $arr['name']; // Outputs: dipak
    ```

2. **Adding elements:**
    ```php
    $arr['address'] = '123 Main St';
    ```

3. **Modifying elements:**
    ```php
    $arr['age'] = '23';
    ```

4. **Removing elements:**
    ```php
    unset($arr['email']);
    ```

5. **Checking if a key exists:**
    ```php
    if (array_key_exists('name', $arr)) {
        echo "Key 'name' exists in the array.";
    }
    ```

6. **Getting all keys:**
    ```php
    $keys = array_keys($arr);
    ```

7. **Getting all values:**
    ```php
    $values = array_values($arr);
    ```

8. **Looping through an associative array:**
    ```php
    foreach ($arr as $key => $value) {
        echo "$key: $value<br>";
    }
    ```

9. **Merging arrays:**
    ```php
    $arr2 = ["gender" => "male"];
    $merged = array_merge($arr, $arr2);
    ```

10. **Sorting arrays by keys:**
    ```php
    ksort($arr);
    ```

11. **Sorting arrays by values:**
    ```php
    asort($arr);
    ```

These are some of the common methods and functions to work with associative arrays in PHP.