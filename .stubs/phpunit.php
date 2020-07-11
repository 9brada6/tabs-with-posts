<?php

namespace PHPUnit\Framework;

/**
 * Interface for classes that can return a description of itself.
 */
interface SelfDescribing
{
    /**
     * Returns a string representation of the object.
     */
    public function toString() : string;
}
/**
 * A Test can be run and collect its results.
 */
interface Test extends \Countable
{
    /**
     * Runs a test and collects its result in a TestResult instance.
     */
    public function run(\PHPUnit\Framework\TestResult $result = null) : \PHPUnit\Framework\TestResult;
}
/**
 * A set of assertion methods.
 */
abstract class Assert
{
    /**
     * @var int
     */
    private static $count = 0;
    /**
     * Asserts that an array has a specified key.
     *
     * @param int|string        $key
     * @param array|ArrayAccess $array
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertArrayHasKey($key, $array, string $message = '') : void
    {
    }
    /**
     * Asserts that an array has a specified subset.
     *
     * @param array|ArrayAccess $subset
     * @param array|ArrayAccess $array
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3494
     */
    public static function assertArraySubset($subset, $array, bool $checkForObjectIdentity = false, string $message = '') : void
    {
    }
    /**
     * Asserts that an array does not have a specified key.
     *
     * @param int|string        $key
     * @param array|ArrayAccess $array
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertArrayNotHasKey($key, $array, string $message = '') : void
    {
    }
    /**
     * Asserts that a haystack contains a needle.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertContains($needle, $haystack, string $message = '', bool $ignoreCase = false, bool $checkForObjectIdentity = true, bool $checkForNonObjectIdentity = false) : void
    {
    }
    /**
     * Asserts that a haystack that is stored in a static attribute of a class
     * or an attribute of an object contains a needle.
     *
     * @param object|string $haystackClassOrObject
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     */
    public static function assertAttributeContains($needle, string $haystackAttributeName, $haystackClassOrObject, string $message = '', bool $ignoreCase = false, bool $checkForObjectIdentity = true, bool $checkForNonObjectIdentity = false) : void
    {
    }
    /**
     * Asserts that a haystack does not contain a needle.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertNotContains($needle, $haystack, string $message = '', bool $ignoreCase = false, bool $checkForObjectIdentity = true, bool $checkForNonObjectIdentity = false) : void
    {
    }
    /**
     * Asserts that a haystack that is stored in a static attribute of a class
     * or an attribute of an object does not contain a needle.
     *
     * @param object|string $haystackClassOrObject
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     */
    public static function assertAttributeNotContains($needle, string $haystackAttributeName, $haystackClassOrObject, string $message = '', bool $ignoreCase = false, bool $checkForObjectIdentity = true, bool $checkForNonObjectIdentity = false) : void
    {
    }
    /**
     * Asserts that a haystack contains only values of a given type.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertContainsOnly(string $type, iterable $haystack, ?bool $isNativeType = null, string $message = '') : void
    {
    }
    /**
     * Asserts that a haystack contains only instances of a given class name.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertContainsOnlyInstancesOf(string $className, iterable $haystack, string $message = '') : void
    {
    }
    /**
     * Asserts that a haystack that is stored in a static attribute of a class
     * or an attribute of an object contains only values of a given type.
     *
     * @param object|string $haystackClassOrObject
     * @param bool          $isNativeType
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     */
    public static function assertAttributeContainsOnly(string $type, string $haystackAttributeName, $haystackClassOrObject, ?bool $isNativeType = null, string $message = '') : void
    {
    }
    /**
     * Asserts that a haystack does not contain only values of a given type.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertNotContainsOnly(string $type, iterable $haystack, ?bool $isNativeType = null, string $message = '') : void
    {
    }
    /**
     * Asserts that a haystack that is stored in a static attribute of a class
     * or an attribute of an object does not contain only values of a given
     * type.
     *
     * @param object|string $haystackClassOrObject
     * @param bool          $isNativeType
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     */
    public static function assertAttributeNotContainsOnly(string $type, string $haystackAttributeName, $haystackClassOrObject, ?bool $isNativeType = null, string $message = '') : void
    {
    }
    /**
     * Asserts the number of elements of an array, Countable or Traversable.
     *
     * @param Countable|iterable $haystack
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertCount(int $expectedCount, $haystack, string $message = '') : void
    {
    }
    /**
     * Asserts the number of elements of an array, Countable or Traversable
     * that is stored in an attribute.
     *
     * @param object|string $haystackClassOrObject
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     */
    public static function assertAttributeCount(int $expectedCount, string $haystackAttributeName, $haystackClassOrObject, string $message = '') : void
    {
    }
    /**
     * Asserts the number of elements of an array, Countable or Traversable.
     *
     * @param Countable|iterable $haystack
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertNotCount(int $expectedCount, $haystack, string $message = '') : void
    {
    }
    /**
     * Asserts the number of elements of an array, Countable or Traversable
     * that is stored in an attribute.
     *
     * @param object|string $haystackClassOrObject
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     */
    public static function assertAttributeNotCount(int $expectedCount, string $haystackAttributeName, $haystackClassOrObject, string $message = '') : void
    {
    }
    /**
     * Asserts that two variables are equal.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertEquals($expected, $actual, string $message = '', float $delta = 0.0, int $maxDepth = 10, bool $canonicalize = false, bool $ignoreCase = false) : void
    {
    }
    /**
     * Asserts that two variables are equal (canonicalizing).
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertEqualsCanonicalizing($expected, $actual, string $message = '') : void
    {
    }
    /**
     * Asserts that two variables are equal (ignoring case).
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertEqualsIgnoringCase($expected, $actual, string $message = '') : void
    {
    }
    /**
     * Asserts that two variables are equal (with delta).
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertEqualsWithDelta($expected, $actual, float $delta, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is equal to an attribute of an object.
     *
     * @param object|string $actualClassOrObject
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     */
    public static function assertAttributeEquals($expected, string $actualAttributeName, $actualClassOrObject, string $message = '', float $delta = 0.0, int $maxDepth = 10, bool $canonicalize = false, bool $ignoreCase = false) : void
    {
    }
    /**
     * Asserts that two variables are not equal.
     *
     * @param float $delta
     * @param int   $maxDepth
     * @param bool  $canonicalize
     * @param bool  $ignoreCase
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertNotEquals($expected, $actual, string $message = '', $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false) : void
    {
    }
    /**
     * Asserts that two variables are not equal (canonicalizing).
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertNotEqualsCanonicalizing($expected, $actual, string $message = '') : void
    {
    }
    /**
     * Asserts that two variables are not equal (ignoring case).
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertNotEqualsIgnoringCase($expected, $actual, string $message = '') : void
    {
    }
    /**
     * Asserts that two variables are not equal (with delta).
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertNotEqualsWithDelta($expected, $actual, float $delta, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is not equal to an attribute of an object.
     *
     * @param object|string $actualClassOrObject
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     */
    public static function assertAttributeNotEquals($expected, string $actualAttributeName, $actualClassOrObject, string $message = '', float $delta = 0.0, int $maxDepth = 10, bool $canonicalize = false, bool $ignoreCase = false) : void
    {
    }
    /**
     * Asserts that a variable is empty.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertEmpty($actual, string $message = '') : void
    {
    }
    /**
     * Asserts that a static attribute of a class or an attribute of an object
     * is empty.
     *
     * @param object|string $haystackClassOrObject
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     */
    public static function assertAttributeEmpty(string $haystackAttributeName, $haystackClassOrObject, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is not empty.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertNotEmpty($actual, string $message = '') : void
    {
    }
    /**
     * Asserts that a static attribute of a class or an attribute of an object
     * is not empty.
     *
     * @param object|string $haystackClassOrObject
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     */
    public static function assertAttributeNotEmpty(string $haystackAttributeName, $haystackClassOrObject, string $message = '') : void
    {
    }
    /**
     * Asserts that a value is greater than another value.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertGreaterThan($expected, $actual, string $message = '') : void
    {
    }
    /**
     * Asserts that an attribute is greater than another value.
     *
     * @param object|string $actualClassOrObject
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     */
    public static function assertAttributeGreaterThan($expected, string $actualAttributeName, $actualClassOrObject, string $message = '') : void
    {
    }
    /**
     * Asserts that a value is greater than or equal to another value.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertGreaterThanOrEqual($expected, $actual, string $message = '') : void
    {
    }
    /**
     * Asserts that an attribute is greater than or equal to another value.
     *
     * @param object|string $actualClassOrObject
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     */
    public static function assertAttributeGreaterThanOrEqual($expected, string $actualAttributeName, $actualClassOrObject, string $message = '') : void
    {
    }
    /**
     * Asserts that a value is smaller than another value.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertLessThan($expected, $actual, string $message = '') : void
    {
    }
    /**
     * Asserts that an attribute is smaller than another value.
     *
     * @param object|string $actualClassOrObject
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     */
    public static function assertAttributeLessThan($expected, string $actualAttributeName, $actualClassOrObject, string $message = '') : void
    {
    }
    /**
     * Asserts that a value is smaller than or equal to another value.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertLessThanOrEqual($expected, $actual, string $message = '') : void
    {
    }
    /**
     * Asserts that an attribute is smaller than or equal to another value.
     *
     * @param object|string $actualClassOrObject
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     */
    public static function assertAttributeLessThanOrEqual($expected, string $actualAttributeName, $actualClassOrObject, string $message = '') : void
    {
    }
    /**
     * Asserts that the contents of one file is equal to the contents of another
     * file.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertFileEquals(string $expected, string $actual, string $message = '', bool $canonicalize = false, bool $ignoreCase = false) : void
    {
    }
    /**
     * Asserts that the contents of one file is not equal to the contents of
     * another file.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertFileNotEquals(string $expected, string $actual, string $message = '', bool $canonicalize = false, bool $ignoreCase = false) : void
    {
    }
    /**
     * Asserts that the contents of a string is equal
     * to the contents of a file.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertStringEqualsFile(string $expectedFile, string $actualString, string $message = '', bool $canonicalize = false, bool $ignoreCase = false) : void
    {
    }
    /**
     * Asserts that the contents of a string is not equal
     * to the contents of a file.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertStringNotEqualsFile(string $expectedFile, string $actualString, string $message = '', bool $canonicalize = false, bool $ignoreCase = false) : void
    {
    }
    /**
     * Asserts that a file/dir is readable.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertIsReadable(string $filename, string $message = '') : void
    {
    }
    /**
     * Asserts that a file/dir exists and is not readable.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertNotIsReadable(string $filename, string $message = '') : void
    {
    }
    /**
     * Asserts that a file/dir exists and is writable.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertIsWritable(string $filename, string $message = '') : void
    {
    }
    /**
     * Asserts that a file/dir exists and is not writable.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertNotIsWritable(string $filename, string $message = '') : void
    {
    }
    /**
     * Asserts that a directory exists.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertDirectoryExists(string $directory, string $message = '') : void
    {
    }
    /**
     * Asserts that a directory does not exist.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertDirectoryNotExists(string $directory, string $message = '') : void
    {
    }
    /**
     * Asserts that a directory exists and is readable.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertDirectoryIsReadable(string $directory, string $message = '') : void
    {
    }
    /**
     * Asserts that a directory exists and is not readable.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertDirectoryNotIsReadable(string $directory, string $message = '') : void
    {
    }
    /**
     * Asserts that a directory exists and is writable.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertDirectoryIsWritable(string $directory, string $message = '') : void
    {
    }
    /**
     * Asserts that a directory exists and is not writable.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertDirectoryNotIsWritable(string $directory, string $message = '') : void
    {
    }
    /**
     * Asserts that a file exists.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertFileExists(string $filename, string $message = '') : void
    {
    }
    /**
     * Asserts that a file does not exist.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertFileNotExists(string $filename, string $message = '') : void
    {
    }
    /**
     * Asserts that a file exists and is readable.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertFileIsReadable(string $file, string $message = '') : void
    {
    }
    /**
     * Asserts that a file exists and is not readable.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertFileNotIsReadable(string $file, string $message = '') : void
    {
    }
    /**
     * Asserts that a file exists and is writable.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertFileIsWritable(string $file, string $message = '') : void
    {
    }
    /**
     * Asserts that a file exists and is not writable.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertFileNotIsWritable(string $file, string $message = '') : void
    {
    }
    /**
     * Asserts that a condition is true.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertTrue($condition, string $message = '') : void
    {
    }
    /**
     * Asserts that a condition is not true.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertNotTrue($condition, string $message = '') : void
    {
    }
    /**
     * Asserts that a condition is false.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertFalse($condition, string $message = '') : void
    {
    }
    /**
     * Asserts that a condition is not false.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertNotFalse($condition, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is null.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertNull($actual, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is not null.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertNotNull($actual, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is finite.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertFinite($actual, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is infinite.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertInfinite($actual, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is nan.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertNan($actual, string $message = '') : void
    {
    }
    /**
     * Asserts that a class has a specified attribute.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertClassHasAttribute(string $attributeName, string $className, string $message = '') : void
    {
    }
    /**
     * Asserts that a class does not have a specified attribute.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertClassNotHasAttribute(string $attributeName, string $className, string $message = '') : void
    {
    }
    /**
     * Asserts that a class has a specified static attribute.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertClassHasStaticAttribute(string $attributeName, string $className, string $message = '') : void
    {
    }
    /**
     * Asserts that a class does not have a specified static attribute.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertClassNotHasStaticAttribute(string $attributeName, string $className, string $message = '') : void
    {
    }
    /**
     * Asserts that an object has a specified attribute.
     *
     * @param object $object
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertObjectHasAttribute(string $attributeName, $object, string $message = '') : void
    {
    }
    /**
     * Asserts that an object does not have a specified attribute.
     *
     * @param object $object
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertObjectNotHasAttribute(string $attributeName, $object, string $message = '') : void
    {
    }
    /**
     * Asserts that two variables have the same type and value.
     * Used on objects, it asserts that two variables reference
     * the same object.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertSame($expected, $actual, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable and an attribute of an object have the same type
     * and value.
     *
     * @param object|string $actualClassOrObject
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     */
    public static function assertAttributeSame($expected, string $actualAttributeName, $actualClassOrObject, string $message = '') : void
    {
    }
    /**
     * Asserts that two variables do not have the same type and value.
     * Used on objects, it asserts that two variables do not reference
     * the same object.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertNotSame($expected, $actual, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable and an attribute of an object do not have the
     * same type and value.
     *
     * @param object|string $actualClassOrObject
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     */
    public static function assertAttributeNotSame($expected, string $actualAttributeName, $actualClassOrObject, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is of a given type.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertInstanceOf(string $expected, $actual, string $message = '') : void
    {
    }
    /**
     * Asserts that an attribute is of a given type.
     *
     * @param object|string $classOrObject
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     */
    public static function assertAttributeInstanceOf(string $expected, string $attributeName, $classOrObject, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is not of a given type.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertNotInstanceOf(string $expected, $actual, string $message = '') : void
    {
    }
    /**
     * Asserts that an attribute is of a given type.
     *
     * @param object|string $classOrObject
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     */
    public static function assertAttributeNotInstanceOf(string $expected, string $attributeName, $classOrObject, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is of a given type.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3369
     */
    public static function assertInternalType(string $expected, $actual, string $message = '') : void
    {
    }
    /**
     * Asserts that an attribute is of a given type.
     *
     * @param object|string $classOrObject
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     */
    public static function assertAttributeInternalType(string $expected, string $attributeName, $classOrObject, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is of type array.
     */
    public static function assertIsArray($actual, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is of type bool.
     */
    public static function assertIsBool($actual, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is of type float.
     */
    public static function assertIsFloat($actual, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is of type int.
     */
    public static function assertIsInt($actual, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is of type numeric.
     */
    public static function assertIsNumeric($actual, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is of type object.
     */
    public static function assertIsObject($actual, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is of type resource.
     */
    public static function assertIsResource($actual, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is of type string.
     */
    public static function assertIsString($actual, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is of type scalar.
     */
    public static function assertIsScalar($actual, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is of type callable.
     */
    public static function assertIsCallable($actual, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is of type iterable.
     */
    public static function assertIsIterable($actual, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is not of a given type.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3369
     */
    public static function assertNotInternalType(string $expected, $actual, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is not of type array.
     */
    public static function assertIsNotArray($actual, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is not of type bool.
     */
    public static function assertIsNotBool($actual, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is not of type float.
     */
    public static function assertIsNotFloat($actual, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is not of type int.
     */
    public static function assertIsNotInt($actual, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is not of type numeric.
     */
    public static function assertIsNotNumeric($actual, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is not of type object.
     */
    public static function assertIsNotObject($actual, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is not of type resource.
     */
    public static function assertIsNotResource($actual, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is not of type string.
     */
    public static function assertIsNotString($actual, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is not of type scalar.
     */
    public static function assertIsNotScalar($actual, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is not of type callable.
     */
    public static function assertIsNotCallable($actual, string $message = '') : void
    {
    }
    /**
     * Asserts that a variable is not of type iterable.
     */
    public static function assertIsNotIterable($actual, string $message = '') : void
    {
    }
    /**
     * Asserts that an attribute is of a given type.
     *
     * @param object|string $classOrObject
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     */
    public static function assertAttributeNotInternalType(string $expected, string $attributeName, $classOrObject, string $message = '') : void
    {
    }
    /**
     * Asserts that a string matches a given regular expression.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertRegExp(string $pattern, string $string, string $message = '') : void
    {
    }
    /**
     * Asserts that a string does not match a given regular expression.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertNotRegExp(string $pattern, string $string, string $message = '') : void
    {
    }
    /**
     * Assert that the size of two arrays (or `Countable` or `Traversable` objects)
     * is the same.
     *
     * @param Countable|iterable $expected
     * @param Countable|iterable $actual
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertSameSize($expected, $actual, string $message = '') : void
    {
    }
    /**
     * Assert that the size of two arrays (or `Countable` or `Traversable` objects)
     * is not the same.
     *
     * @param Countable|iterable $expected
     * @param Countable|iterable $actual
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertNotSameSize($expected, $actual, string $message = '') : void
    {
    }
    /**
     * Asserts that a string matches a given format string.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertStringMatchesFormat(string $format, string $string, string $message = '') : void
    {
    }
    /**
     * Asserts that a string does not match a given format string.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertStringNotMatchesFormat(string $format, string $string, string $message = '') : void
    {
    }
    /**
     * Asserts that a string matches a given format file.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertStringMatchesFormatFile(string $formatFile, string $string, string $message = '') : void
    {
    }
    /**
     * Asserts that a string does not match a given format string.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertStringNotMatchesFormatFile(string $formatFile, string $string, string $message = '') : void
    {
    }
    /**
     * Asserts that a string starts with a given prefix.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertStringStartsWith(string $prefix, string $string, string $message = '') : void
    {
    }
    /**
     * Asserts that a string starts not with a given prefix.
     *
     * @param string $prefix
     * @param string $string
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertStringStartsNotWith($prefix, $string, string $message = '') : void
    {
    }
    public static function assertStringContainsString(string $needle, string $haystack, string $message = '') : void
    {
    }
    public static function assertStringContainsStringIgnoringCase(string $needle, string $haystack, string $message = '') : void
    {
    }
    public static function assertStringNotContainsString(string $needle, string $haystack, string $message = '') : void
    {
    }
    public static function assertStringNotContainsStringIgnoringCase(string $needle, string $haystack, string $message = '') : void
    {
    }
    /**
     * Asserts that a string ends with a given suffix.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertStringEndsWith(string $suffix, string $string, string $message = '') : void
    {
    }
    /**
     * Asserts that a string ends not with a given suffix.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertStringEndsNotWith(string $suffix, string $string, string $message = '') : void
    {
    }
    /**
     * Asserts that two XML files are equal.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertXmlFileEqualsXmlFile(string $expectedFile, string $actualFile, string $message = '') : void
    {
    }
    /**
     * Asserts that two XML files are not equal.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertXmlFileNotEqualsXmlFile(string $expectedFile, string $actualFile, string $message = '') : void
    {
    }
    /**
     * Asserts that two XML documents are equal.
     *
     * @param DOMDocument|string $actualXml
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertXmlStringEqualsXmlFile(string $expectedFile, $actualXml, string $message = '') : void
    {
    }
    /**
     * Asserts that two XML documents are not equal.
     *
     * @param DOMDocument|string $actualXml
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertXmlStringNotEqualsXmlFile(string $expectedFile, $actualXml, string $message = '') : void
    {
    }
    /**
     * Asserts that two XML documents are equal.
     *
     * @param DOMDocument|string $expectedXml
     * @param DOMDocument|string $actualXml
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertXmlStringEqualsXmlString($expectedXml, $actualXml, string $message = '') : void
    {
    }
    /**
     * Asserts that two XML documents are not equal.
     *
     * @param DOMDocument|string $expectedXml
     * @param DOMDocument|string $actualXml
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertXmlStringNotEqualsXmlString($expectedXml, $actualXml, string $message = '') : void
    {
    }
    /**
     * Asserts that a hierarchy of DOMElements matches.
     *
     * @throws AssertionFailedError
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertEqualXMLStructure(\DOMElement $expectedElement, \DOMElement $actualElement, bool $checkAttributes = false, string $message = '') : void
    {
    }
    /**
     * Evaluates a PHPUnit\Framework\Constraint matcher object.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertThat($value, \PHPUnit\Framework\Constraint\Constraint $constraint, string $message = '') : void
    {
    }
    /**
     * Asserts that a string is a valid JSON string.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertJson(string $actualJson, string $message = '') : void
    {
    }
    /**
     * Asserts that two given JSON encoded objects or arrays are equal.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertJsonStringEqualsJsonString(string $expectedJson, string $actualJson, string $message = '') : void
    {
    }
    /**
     * Asserts that two given JSON encoded objects or arrays are not equal.
     *
     * @param string $expectedJson
     * @param string $actualJson
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertJsonStringNotEqualsJsonString($expectedJson, $actualJson, string $message = '') : void
    {
    }
    /**
     * Asserts that the generated JSON encoded object and the content of the given file are equal.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertJsonStringEqualsJsonFile(string $expectedFile, string $actualJson, string $message = '') : void
    {
    }
    /**
     * Asserts that the generated JSON encoded object and the content of the given file are not equal.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertJsonStringNotEqualsJsonFile(string $expectedFile, string $actualJson, string $message = '') : void
    {
    }
    /**
     * Asserts that two JSON files are equal.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertJsonFileEqualsJsonFile(string $expectedFile, string $actualFile, string $message = '') : void
    {
    }
    /**
     * Asserts that two JSON files are not equal.
     *
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public static function assertJsonFileNotEqualsJsonFile(string $expectedFile, string $actualFile, string $message = '') : void
    {
    }
    public static function logicalAnd() : \PHPUnit\Framework\Constraint\LogicalAnd
    {
    }
    public static function logicalOr() : \PHPUnit\Framework\Constraint\LogicalOr
    {
    }
    public static function logicalNot(\PHPUnit\Framework\Constraint\Constraint $constraint) : \PHPUnit\Framework\Constraint\LogicalNot
    {
    }
    public static function logicalXor() : \PHPUnit\Framework\Constraint\LogicalXor
    {
    }
    public static function anything() : \PHPUnit\Framework\Constraint\IsAnything
    {
    }
    public static function isTrue() : \PHPUnit\Framework\Constraint\IsTrue
    {
    }
    public static function callback(callable $callback) : \PHPUnit\Framework\Constraint\Callback
    {
    }
    public static function isFalse() : \PHPUnit\Framework\Constraint\IsFalse
    {
    }
    public static function isJson() : \PHPUnit\Framework\Constraint\IsJson
    {
    }
    public static function isNull() : \PHPUnit\Framework\Constraint\IsNull
    {
    }
    public static function isFinite() : \PHPUnit\Framework\Constraint\IsFinite
    {
    }
    public static function isInfinite() : \PHPUnit\Framework\Constraint\IsInfinite
    {
    }
    public static function isNan() : \PHPUnit\Framework\Constraint\IsNan
    {
    }
    /**
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     */
    public static function attribute(\PHPUnit\Framework\Constraint\Constraint $constraint, string $attributeName) : \PHPUnit\Framework\Constraint\Attribute
    {
    }
    public static function contains($value, bool $checkForObjectIdentity = true, bool $checkForNonObjectIdentity = false) : \PHPUnit\Framework\Constraint\TraversableContains
    {
    }
    public static function containsOnly(string $type) : \PHPUnit\Framework\Constraint\TraversableContainsOnly
    {
    }
    public static function containsOnlyInstancesOf(string $className) : \PHPUnit\Framework\Constraint\TraversableContainsOnly
    {
    }
    /**
     * @param int|string $key
     */
    public static function arrayHasKey($key) : \PHPUnit\Framework\Constraint\ArrayHasKey
    {
    }
    public static function equalTo($value, float $delta = 0.0, int $maxDepth = 10, bool $canonicalize = false, bool $ignoreCase = false) : \PHPUnit\Framework\Constraint\IsEqual
    {
    }
    /**
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     */
    public static function attributeEqualTo(string $attributeName, $value, float $delta = 0.0, int $maxDepth = 10, bool $canonicalize = false, bool $ignoreCase = false) : \PHPUnit\Framework\Constraint\Attribute
    {
    }
    public static function isEmpty() : \PHPUnit\Framework\Constraint\IsEmpty
    {
    }
    public static function isWritable() : \PHPUnit\Framework\Constraint\IsWritable
    {
    }
    public static function isReadable() : \PHPUnit\Framework\Constraint\IsReadable
    {
    }
    public static function directoryExists() : \PHPUnit\Framework\Constraint\DirectoryExists
    {
    }
    public static function fileExists() : \PHPUnit\Framework\Constraint\FileExists
    {
    }
    public static function greaterThan($value) : \PHPUnit\Framework\Constraint\GreaterThan
    {
    }
    public static function greaterThanOrEqual($value) : \PHPUnit\Framework\Constraint\LogicalOr
    {
    }
    public static function classHasAttribute(string $attributeName) : \PHPUnit\Framework\Constraint\ClassHasAttribute
    {
    }
    public static function classHasStaticAttribute(string $attributeName) : \PHPUnit\Framework\Constraint\ClassHasStaticAttribute
    {
    }
    public static function objectHasAttribute($attributeName) : \PHPUnit\Framework\Constraint\ObjectHasAttribute
    {
    }
    public static function identicalTo($value) : \PHPUnit\Framework\Constraint\IsIdentical
    {
    }
    public static function isInstanceOf(string $className) : \PHPUnit\Framework\Constraint\IsInstanceOf
    {
    }
    public static function isType(string $type) : \PHPUnit\Framework\Constraint\IsType
    {
    }
    public static function lessThan($value) : \PHPUnit\Framework\Constraint\LessThan
    {
    }
    public static function lessThanOrEqual($value) : \PHPUnit\Framework\Constraint\LogicalOr
    {
    }
    public static function matchesRegularExpression(string $pattern) : \PHPUnit\Framework\Constraint\RegularExpression
    {
    }
    public static function matches(string $string) : \PHPUnit\Framework\Constraint\StringMatchesFormatDescription
    {
    }
    public static function stringStartsWith($prefix) : \PHPUnit\Framework\Constraint\StringStartsWith
    {
    }
    public static function stringContains(string $string, bool $case = true) : \PHPUnit\Framework\Constraint\StringContains
    {
    }
    public static function stringEndsWith(string $suffix) : \PHPUnit\Framework\Constraint\StringEndsWith
    {
    }
    public static function countOf(int $count) : \PHPUnit\Framework\Constraint\Count
    {
    }
    /**
     * Fails a test with the given message.
     *
     * @throws AssertionFailedError
     */
    public static function fail(string $message = '') : void
    {
    }
    /**
     * Returns the value of an attribute of a class or an object.
     * This also works for attributes that are declared protected or private.
     *
     * @param object|string $classOrObject
     *
     * @throws Exception
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     */
    public static function readAttribute($classOrObject, string $attributeName)
    {
    }
    /**
     * Returns the value of a static attribute.
     * This also works for attributes that are declared protected or private.
     *
     * @throws Exception
     * @throws ReflectionException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     */
    public static function getStaticAttribute(string $className, string $attributeName)
    {
    }
    /**
     * Returns the value of an object's attribute.
     * This also works for attributes that are declared protected or private.
     *
     * @param object $object
     *
     * @throws Exception
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     */
    public static function getObjectAttribute($object, string $attributeName)
    {
    }
    /**
     * Mark the test as incomplete.
     *
     * @throws IncompleteTestError
     */
    public static function markTestIncomplete(string $message = '') : void
    {
    }
    /**
     * Mark the test as skipped.
     *
     * @throws SkippedTestError
     */
    public static function markTestSkipped(string $message = '') : void
    {
    }
    /**
     * Return the current assertion count.
     */
    public static function getCount() : int
    {
    }
    /**
     * Reset the assertion counter.
     */
    public static function resetCount() : void
    {
    }
    private static function isValidObjectAttributeName(string $attributeName) : bool
    {
    }
    private static function isValidClassAttributeName(string $attributeName) : bool
    {
    }
    private static function createWarning(string $warning) : void
    {
    }
}
abstract class TestCase extends \PHPUnit\Framework\Assert implements \PHPUnit\Framework\SelfDescribing, \PHPUnit\Framework\Test
{
    private const LOCALE_CATEGORIES = [\LC_ALL, \LC_COLLATE, \LC_CTYPE, \LC_MONETARY, \LC_NUMERIC, \LC_TIME];
    /**
     * @var bool
     */
    protected $backupGlobals;
    /**
     * @var array
     */
    protected $backupGlobalsBlacklist = [];
    /**
     * @var bool
     */
    protected $backupStaticAttributes;
    /**
     * @var array
     */
    protected $backupStaticAttributesBlacklist = [];
    /**
     * @var bool
     */
    protected $runTestInSeparateProcess;
    /**
     * @var bool
     */
    protected $preserveGlobalState = true;
    /**
     * @var bool
     */
    private $runClassInSeparateProcess;
    /**
     * @var bool
     */
    private $inIsolation = false;
    /**
     * @var array
     */
    private $data;
    /**
     * @var string
     */
    private $dataName;
    /**
     * @var bool
     */
    private $useErrorHandler;
    /**
     * @var null|string
     */
    private $expectedException;
    /**
     * @var null|string
     */
    private $expectedExceptionMessage;
    /**
     * @var null|string
     */
    private $expectedExceptionMessageRegExp;
    /**
     * @var null|int|string
     */
    private $expectedExceptionCode;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string[]
     */
    private $dependencies = [];
    /**
     * @var array
     */
    private $dependencyInput = [];
    /**
     * @var array
     */
    private $iniSettings = [];
    /**
     * @var array
     */
    private $locale = [];
    /**
     * @var array
     */
    private $mockObjects = [];
    /**
     * @var MockGenerator
     */
    private $mockObjectGenerator;
    /**
     * @var int
     */
    private $status = \PHPUnit\Runner\BaseTestRunner::STATUS_UNKNOWN;
    /**
     * @var string
     */
    private $statusMessage = '';
    /**
     * @var int
     */
    private $numAssertions = 0;
    /**
     * @var TestResult
     */
    private $result;
    /**
     * @var mixed
     */
    private $testResult;
    /**
     * @var string
     */
    private $output = '';
    /**
     * @var string
     */
    private $outputExpectedRegex;
    /**
     * @var string
     */
    private $outputExpectedString;
    /**
     * @var mixed
     */
    private $outputCallback = false;
    /**
     * @var bool
     */
    private $outputBufferingActive = false;
    /**
     * @var int
     */
    private $outputBufferingLevel;
    /**
     * @var Snapshot
     */
    private $snapshot;
    /**
     * @var Prophecy\Prophet
     */
    private $prophet;
    /**
     * @var bool
     */
    private $beStrictAboutChangesToGlobalState = false;
    /**
     * @var bool
     */
    private $registerMockObjectsFromTestArgumentsRecursively = false;
    /**
     * @var string[]
     */
    private $warnings = [];
    /**
     * @var array
     */
    private $groups = [];
    /**
     * @var bool
     */
    private $doesNotPerformAssertions = false;
    /**
     * @var Comparator[]
     */
    private $customComparators = [];
    /**
     * Returns a matcher that matches when the method is executed
     * zero or more times.
     */
    public static function any() : \PHPUnit\Framework\MockObject\Matcher\AnyInvokedCount
    {
    }
    /**
     * Returns a matcher that matches when the method is never executed.
     */
    public static function never() : \PHPUnit\Framework\MockObject\Matcher\InvokedCount
    {
    }
    /**
     * Returns a matcher that matches when the method is executed
     * at least N times.
     */
    public static function atLeast(int $requiredInvocations) : \PHPUnit\Framework\MockObject\Matcher\InvokedAtLeastCount
    {
    }
    /**
     * Returns a matcher that matches when the method is executed at least once.
     */
    public static function atLeastOnce() : \PHPUnit\Framework\MockObject\Matcher\InvokedAtLeastOnce
    {
    }
    /**
     * Returns a matcher that matches when the method is executed exactly once.
     */
    public static function once() : \PHPUnit\Framework\MockObject\Matcher\InvokedCount
    {
    }
    /**
     * Returns a matcher that matches when the method is executed
     * exactly $count times.
     */
    public static function exactly(int $count) : \PHPUnit\Framework\MockObject\Matcher\InvokedCount
    {
    }
    /**
     * Returns a matcher that matches when the method is executed
     * at most N times.
     */
    public static function atMost(int $allowedInvocations) : \PHPUnit\Framework\MockObject\Matcher\InvokedAtMostCount
    {
    }
    /**
     * Returns a matcher that matches when the method is executed
     * at the given index.
     */
    public static function at(int $index) : \PHPUnit\Framework\MockObject\Matcher\InvokedAtIndex
    {
    }
    public static function returnValue($value) : \PHPUnit\Framework\MockObject\Stub\ReturnStub
    {
    }
    public static function returnValueMap(array $valueMap) : \PHPUnit\Framework\MockObject\Stub\ReturnValueMap
    {
    }
    public static function returnArgument(int $argumentIndex) : \PHPUnit\Framework\MockObject\Stub\ReturnArgument
    {
    }
    public static function returnCallback($callback) : \PHPUnit\Framework\MockObject\Stub\ReturnCallback
    {
    }
    /**
     * Returns the current object.
     *
     * This method is useful when mocking a fluent interface.
     */
    public static function returnSelf() : \PHPUnit\Framework\MockObject\Stub\ReturnSelf
    {
    }
    public static function throwException(\Throwable $exception) : \PHPUnit\Framework\MockObject\Stub\Exception
    {
    }
    public static function onConsecutiveCalls(...$args) : \PHPUnit\Framework\MockObject\Stub\ConsecutiveCalls
    {
    }
    /**
     * @param string $name
     * @param string $dataName
     */
    public function __construct($name = null, array $data = [], $dataName = '')
    {
    }
    /**
     * This method is called before the first test of this test class is run.
     */
    public static function setUpBeforeClass()
    {
    }
    /**
     * This method is called after the last test of this test class is run.
     */
    public static function tearDownAfterClass()
    {
    }
    /**
     * This method is called before each test.
     */
    protected function setUp()
    {
    }
    /**
     * This method is called after each test.
     */
    protected function tearDown()
    {
    }
    /**
     * Returns a string representation of the test case.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws \ReflectionException
     */
    public function toString() : string
    {
    }
    public function count() : int
    {
    }
    public function getGroups() : array
    {
    }
    public function setGroups(array $groups) : void
    {
    }
    public function getAnnotations() : array
    {
    }
    /**
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function getName(bool $withDataSet = true) : ?string
    {
    }
    /**
     * Returns the size of the test.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function getSize() : int
    {
    }
    /**
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function hasSize() : bool
    {
    }
    /**
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function isSmall() : bool
    {
    }
    /**
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function isMedium() : bool
    {
    }
    /**
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function isLarge() : bool
    {
    }
    public function getActualOutput() : string
    {
    }
    public function hasOutput() : bool
    {
    }
    public function doesNotPerformAssertions() : bool
    {
    }
    public function expectOutputRegex(string $expectedRegex) : void
    {
    }
    public function expectOutputString(string $expectedString) : void
    {
    }
    public function hasExpectationOnOutput() : bool
    {
    }
    public function getExpectedException() : ?string
    {
    }
    /**
     * @return null|int|string
     */
    public function getExpectedExceptionCode()
    {
    }
    public function getExpectedExceptionMessage() : ?string
    {
    }
    public function getExpectedExceptionMessageRegExp() : ?string
    {
    }
    public function expectException(string $exception) : void
    {
    }
    /**
     * @param int|string $code
     */
    public function expectExceptionCode($code) : void
    {
    }
    public function expectExceptionMessage(string $message) : void
    {
    }
    public function expectExceptionMessageRegExp(string $messageRegExp) : void
    {
    }
    /**
     * Sets up an expectation for an exception to be raised by the code under test.
     * Information for expected exception class, expected exception message, and
     * expected exception code are retrieved from a given Exception object.
     */
    public function expectExceptionObject(\Exception $exception) : void
    {
    }
    public function expectNotToPerformAssertions()
    {
    }
    public function setRegisterMockObjectsFromTestArgumentsRecursively(bool $flag) : void
    {
    }
    public function setUseErrorHandler(bool $useErrorHandler) : void
    {
    }
    public function getStatus() : int
    {
    }
    public function markAsRisky() : void
    {
    }
    public function getStatusMessage() : string
    {
    }
    public function hasFailed() : bool
    {
    }
    /**
     * Runs the test case and collects the results in a TestResult object.
     * If no TestResult object is passed a new one will be created.
     *
     * @throws CodeCoverageException
     * @throws ReflectionException
     * @throws \SebastianBergmann\CodeCoverage\CoveredCodeNotExecutedException
     * @throws \SebastianBergmann\CodeCoverage\InvalidArgumentException
     * @throws \SebastianBergmann\CodeCoverage\MissingCoversAnnotationException
     * @throws \SebastianBergmann\CodeCoverage\RuntimeException
     * @throws \SebastianBergmann\CodeCoverage\UnintentionallyCoveredCodeException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function run(\PHPUnit\Framework\TestResult $result = null) : \PHPUnit\Framework\TestResult
    {
    }
    /**
     * @throws \Throwable
     */
    public function runBare() : void
    {
    }
    public function setName(string $name) : void
    {
    }
    /**
     * @param string[] $dependencies
     */
    public function setDependencies(array $dependencies) : void
    {
    }
    public function getDependencies() : array
    {
    }
    public function hasDependencies() : bool
    {
    }
    public function setDependencyInput(array $dependencyInput) : void
    {
    }
    public function setBeStrictAboutChangesToGlobalState(?bool $beStrictAboutChangesToGlobalState) : void
    {
    }
    public function setBackupGlobals(?bool $backupGlobals) : void
    {
    }
    public function setBackupStaticAttributes(?bool $backupStaticAttributes) : void
    {
    }
    public function setRunTestInSeparateProcess(bool $runTestInSeparateProcess) : void
    {
    }
    public function setRunClassInSeparateProcess(bool $runClassInSeparateProcess) : void
    {
    }
    public function setPreserveGlobalState(bool $preserveGlobalState) : void
    {
    }
    public function setInIsolation(bool $inIsolation) : void
    {
    }
    public function isInIsolation() : bool
    {
    }
    public function getResult()
    {
    }
    public function setResult($result) : void
    {
    }
    public function setOutputCallback(callable $callback) : void
    {
    }
    public function getTestResultObject() : ?\PHPUnit\Framework\TestResult
    {
    }
    public function setTestResultObject(\PHPUnit\Framework\TestResult $result) : void
    {
    }
    public function registerMockObject(\PHPUnit\Framework\MockObject\MockObject $mockObject) : void
    {
    }
    /**
     * Returns a builder object to create mock objects using a fluent interface.
     *
     * @param string|string[] $className
     */
    public function getMockBuilder($className) : \PHPUnit\Framework\MockObject\MockBuilder
    {
    }
    public function addToAssertionCount(int $count) : void
    {
    }
    /**
     * Returns the number of assertions performed by this test.
     */
    public function getNumAssertions() : int
    {
    }
    public function usesDataProvider() : bool
    {
    }
    public function dataDescription() : string
    {
    }
    /**
     * @return int|string
     */
    public function dataName()
    {
    }
    public function registerComparator(\SebastianBergmann\Comparator\Comparator $comparator) : void
    {
    }
    public function getDataSetAsString(bool $includeData = true) : string
    {
    }
    /**
     * Gets the data set of a TestCase.
     */
    public function getProvidedData() : array
    {
    }
    public function addWarning(string $warning) : void
    {
    }
    /**
     * Override to run the test and assert its state.
     *
     * @throws AssertionFailedError
     * @throws Exception
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\ObjectEnumerator\InvalidArgumentException
     * @throws Throwable
     */
    protected function runTest()
    {
    }
    /**
     * This method is a wrapper for the ini_set() function that automatically
     * resets the modified php.ini setting to its original value after the
     * test is run.
     *
     * @throws Exception
     */
    protected function iniSet(string $varName, $newValue) : void
    {
    }
    /**
     * This method is a wrapper for the setlocale() function that automatically
     * resets the locale to its original value after the test is run.
     *
     * @throws Exception
     */
    protected function setLocale(...$args) : void
    {
    }
    /**
     * Returns a test double for the specified class.
     *
     * @param string|string[] $originalClassName
     *
     * @throws Exception
     * @throws \InvalidArgumentException
     */
    protected function createMock($originalClassName) : \PHPUnit\Framework\MockObject\MockObject
    {
    }
    /**
     * Returns a configured test double for the specified class.
     *
     * @param string|string[] $originalClassName
     *
     * @throws Exception
     * @throws \InvalidArgumentException
     */
    protected function createConfiguredMock($originalClassName, array $configuration) : \PHPUnit\Framework\MockObject\MockObject
    {
    }
    /**
     * Returns a partial test double for the specified class.
     *
     * @param string|string[] $originalClassName
     * @param string[]        $methods
     *
     * @throws Exception
     * @throws \InvalidArgumentException
     */
    protected function createPartialMock($originalClassName, array $methods) : \PHPUnit\Framework\MockObject\MockObject
    {
    }
    /**
     * Returns a test proxy for the specified class.
     *
     * @throws Exception
     * @throws \InvalidArgumentException
     */
    protected function createTestProxy(string $originalClassName, array $constructorArguments = []) : \PHPUnit\Framework\MockObject\MockObject
    {
    }
    /**
     * Mocks the specified class and returns the name of the mocked class.
     *
     * @param string $originalClassName
     * @param array  $methods
     * @param string $mockClassName
     * @param bool   $callOriginalConstructor
     * @param bool   $callOriginalClone
     * @param bool   $callAutoload
     * @param bool   $cloneArguments
     *
     * @throws Exception
     * @throws ReflectionException
     * @throws \InvalidArgumentException
     */
    protected function getMockClass($originalClassName, $methods = [], array $arguments = [], $mockClassName = '', $callOriginalConstructor = false, $callOriginalClone = true, $callAutoload = true, $cloneArguments = false) : string
    {
    }
    /**
     * Returns a mock object for the specified abstract class with all abstract
     * methods of the class mocked. Concrete methods are not mocked by default.
     * To mock concrete methods, use the 7th parameter ($mockedMethods).
     *
     * @param string $originalClassName
     * @param string $mockClassName
     * @param bool   $callOriginalConstructor
     * @param bool   $callOriginalClone
     * @param bool   $callAutoload
     * @param array  $mockedMethods
     * @param bool   $cloneArguments
     *
     * @throws Exception
     * @throws ReflectionException
     * @throws \InvalidArgumentException
     */
    protected function getMockForAbstractClass($originalClassName, array $arguments = [], $mockClassName = '', $callOriginalConstructor = true, $callOriginalClone = true, $callAutoload = true, $mockedMethods = [], $cloneArguments = false) : \PHPUnit\Framework\MockObject\MockObject
    {
    }
    /**
     * Returns a mock object based on the given WSDL file.
     *
     * @param string $wsdlFile
     * @param string $originalClassName
     * @param string $mockClassName
     * @param bool   $callOriginalConstructor
     * @param array  $options                 An array of options passed to SOAPClient::_construct
     *
     * @throws Exception
     * @throws ReflectionException
     * @throws \InvalidArgumentException
     */
    protected function getMockFromWsdl($wsdlFile, $originalClassName = '', $mockClassName = '', array $methods = [], $callOriginalConstructor = true, array $options = []) : \PHPUnit\Framework\MockObject\MockObject
    {
    }
    /**
     * Returns a mock object for the specified trait with all abstract methods
     * of the trait mocked. Concrete methods to mock can be specified with the
     * `$mockedMethods` parameter.
     *
     * @param string $traitName
     * @param string $mockClassName
     * @param bool   $callOriginalConstructor
     * @param bool   $callOriginalClone
     * @param bool   $callAutoload
     * @param array  $mockedMethods
     * @param bool   $cloneArguments
     *
     * @throws Exception
     * @throws ReflectionException
     * @throws \InvalidArgumentException
     */
    protected function getMockForTrait($traitName, array $arguments = [], $mockClassName = '', $callOriginalConstructor = true, $callOriginalClone = true, $callAutoload = true, $mockedMethods = [], $cloneArguments = false) : \PHPUnit\Framework\MockObject\MockObject
    {
    }
    /**
     * Returns an object for the specified trait.
     *
     * @param string $traitName
     * @param string $traitClassName
     * @param bool   $callOriginalConstructor
     * @param bool   $callOriginalClone
     * @param bool   $callAutoload
     *
     * @throws Exception
     * @throws ReflectionException
     * @throws \InvalidArgumentException
     *
     * @return object
     */
    protected function getObjectForTrait($traitName, array $arguments = [], $traitClassName = '', $callOriginalConstructor = true, $callOriginalClone = true, $callAutoload = true)
    {
    }
    /**
     * @param null|string $classOrInterface
     *
     * @throws Prophecy\Exception\Doubler\ClassNotFoundException
     * @throws Prophecy\Exception\Doubler\DoubleException
     * @throws Prophecy\Exception\Doubler\InterfaceNotFoundException
     */
    protected function prophesize($classOrInterface = null) : \Prophecy\Prophecy\ObjectProphecy
    {
    }
    /**
     * Creates a default TestResult object.
     */
    protected function createResult() : \PHPUnit\Framework\TestResult
    {
    }
    /**
     * Performs assertions shared by all tests of a test case.
     *
     * This method is called between setUp() and test.
     */
    protected function assertPreConditions()
    {
    }
    /**
     * Performs assertions shared by all tests of a test case.
     *
     * This method is called between test and tearDown().
     */
    protected function assertPostConditions()
    {
    }
    /**
     * This method is called when a test method did not execute successfully.
     *
     * @throws Throwable
     */
    protected function onNotSuccessfulTest(\Throwable $t)
    {
    }
    private function setExpectedExceptionFromAnnotation() : void
    {
    }
    private function setUseErrorHandlerFromAnnotation() : void
    {
    }
    private function checkRequirements() : void
    {
    }
    private function verifyMockObjects() : void
    {
    }
    private function handleDependencies() : bool
    {
    }
    private function markSkippedForMissingDependecy(string $dependency) : void
    {
    }
    private function markWarningForUncallableDependency(string $dependency) : void
    {
    }
    /**
     * Get the mock object generator, creating it if it doesn't exist.
     */
    private function getMockObjectGenerator() : \PHPUnit\Framework\MockObject\Generator
    {
    }
    private function startOutputBuffering() : void
    {
    }
    /**
     * @throws RiskyTestError
     */
    private function stopOutputBuffering() : void
    {
    }
    private function snapshotGlobalState() : void
    {
    }
    /**
     * @throws RiskyTestError
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws \InvalidArgumentException
     */
    private function restoreGlobalState() : void
    {
    }
    private function createGlobalStateSnapshot(bool $backupGlobals) : \SebastianBergmann\GlobalState\Snapshot
    {
    }
    /**
     * @throws RiskyTestError
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws \InvalidArgumentException
     */
    private function compareGlobalStateSnapshots(\SebastianBergmann\GlobalState\Snapshot $before, \SebastianBergmann\GlobalState\Snapshot $after) : void
    {
    }
    /**
     * @throws RiskyTestError
     */
    private function compareGlobalStateSnapshotPart(array $before, array $after, string $header) : void
    {
    }
    private function getProphet() : \Prophecy\Prophet
    {
    }
    /**
     * @throws \SebastianBergmann\ObjectEnumerator\InvalidArgumentException
     */
    private function shouldInvocationMockerBeReset(\PHPUnit\Framework\MockObject\MockObject $mock) : bool
    {
    }
    /**
     * @throws \SebastianBergmann\ObjectEnumerator\InvalidArgumentException
     * @throws \SebastianBergmann\ObjectReflector\InvalidArgumentException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    private function registerMockObjectsFromTestArguments(array $testArguments, array &$visited = []) : void
    {
    }
    private function setDoesNotPerformAssertionsFromAnnotation() : void
    {
    }
    private function isCloneable(\PHPUnit\Framework\MockObject\MockObject $testArgument) : bool
    {
    }
    private function unregisterCustomComparators() : void
    {
    }
    private function cleanupIniSettings() : void
    {
    }
    private function cleanupLocaleSettings() : void
    {
    }
    /**
     * @throws ReflectionException
     */
    private function checkExceptionExpectations(\Throwable $throwable) : bool
    {
    }
    private function runInSeparateProcess() : bool
    {
    }
}