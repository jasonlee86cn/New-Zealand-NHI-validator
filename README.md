# New-Zealand-NHI-validator
New Zealand NHI validator

New Zealand NHI validator, v202306
Author: Jason Lee, jason.lee@auckland.ac.nz

NHI Number Validator (PHP,JavaScript)
====================================
PHP
Introduction:
-------------
The National Health Index (NHI) numbers are used as unique identifiers for patients in the healthcare system of New Zealand. These numbers have specific formats and this repository contains a PHP script that validates these NHI numbers based on their format.

NHI Number Formats:
-------------------
- Format 1: 3 alphabetical characters (excluding 'I' and 'O') followed by 4 numeric characters, where the last character is a check digit.
- Format 2: 3 alphabetical characters (excluding 'I' and 'O') followed by 2 numeric characters, followed by 2 alphabetical characters, where the last character is an alphabetic check digit.

Usage:
------
1. Clone this repository or download the 'nhi-validator.php' file.
2. Include the 'nhi-validator.php' in your PHP script.
3. Call the function `isNHIValid()` with the NHI number as an argument.

Example:
--------

```php
require 'nhi-validator.php';

echo isNHIValid('ZZZ0016'); // Should return true
echo isNHIValid('ZZZ00AC'); // Should return true
echo isNHIValid('ZZZ0044'); // Should return false
echo isNHIValid('ZVU27KE'); // Should return true
echo isNHIValid('ZAA7860'); // Should return true


# JavaScript

This repository contains a JavaScript function for validating New Zealand National Health Index (NHI) numbers. In New Zealand, NHI numbers are used as unique identifiers for patients in the healthcare system.

## Introduction

The National Health Index (NHI) number is used by various systems to provide a safe and secure reference key for patient data. The NHI number has a built-in validation routine designed to minimize typographical errors when NHI numbers are entered.

There are two formats for NHI numbers:
- Format 1: 3 alphabetical characters (excluding 'I' and 'O') followed by 4 numeric characters, where the last character is a check digit.
- Format 2: 3 alphabetical characters (excluding 'I' and 'O') followed by 2 numeric characters, followed by 2 alphabetical characters, where the last character is an alphabetic check digit.

## How to use

1. Clone this repository or copy the `nhi-validator.js` file into your project.
2. Include the script in your HTML file or import it in your JavaScript project.
3. Call the `isNHIValid` function with the NHI number as an argument.

```javascript
console.log(isNHIValid('ZZZ0016')); // Should return true
console.log(isNHIValid('ZZZ00AC')); // Should return true
console.log(isNHIValid('ZZZ0044')); // Should return false
console.log(isNHIValid('ZVU27KE')); // Should return true
console.log(isNHIValid('ZAA7860')); // Should return true


