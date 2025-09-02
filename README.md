# PHP Web Development Learning Repository

A comprehensive PHP learning repository containing fundamental concepts, practical examples, and a merge sorted arrays project. This repository is designed for learning PHP programming concepts from basic syntax to object-oriented programming.

## 📁 Project Structure

### 📚 Module 1 - PHP Fundamentals (`modul_1/`)

Core PHP concepts and syntax examples:

- **`variables_declaration.php`** - Variable types, constants, type conversion, and type checking
- **`arrays.php`** - Array operations, associative arrays, array functions, filtering, and mapping
- **`functions.php`** - Function declaration, parameters, closures, arrow functions, and type hints
- **`oop.php`** - Object-oriented programming: classes, inheritance, interfaces, traits, and static methods
- **`conditionals.php`** - Conditional statements, comparison operators, ternary operator, and match expressions
- **`loops_iterations.php`** - For, while, do-while, and foreach loops with break/continue
- **`strings.php`** - String manipulation, concatenation, interpolation, and common string functions
- **`output_input.php`** - Output methods and console input handling
- **`files.php`** - File operations: reading, writing, CSV handling, and file existence checks
- **`errors.php`** - Exception handling with try-catch blocks
- **`numbers.php`** - Numeric operations and calculations
- **`comments.php`** - PHP commenting standards and best practices
- **`naming_conventions.php`** - PHP naming conventions and coding standards
- **`enumerations.php`** - PHP enumerations (PHP 8.1+)

### 🎯 Practical Projects (`praktikum_week_1/`)

#### Merge Sorted Arrays Application

A complete implementation of the merge sorted arrays algorithm with both CLI and web interfaces:

- **`cli.php`** - Command-line interface with test cases
- **`index.php`** - Full-featured web application with:
  - Interactive HTML form
  - Input validation and error handling
  - Responsive CSS styling
  - JavaScript enhancements
  - Multiple test case examples
  - Real-time result display

**Features:**

- Merges two sorted arrays efficiently using in-place algorithm
- Supports arrays of any size with proper validation
- Comprehensive error handling for edge cases
- User-friendly web interface with examples
- Mobile-responsive design

## 🚀 Getting Started

### Prerequisites

- PHP 7.4 or higher
- Web server (Apache, Nginx) or PHP built-in server
- For XAMPP users: Place in `htdocs` directory

### Running the Applications

#### Web Interface

1. Start your web server
2. Navigate to `http://localhost/praktikum_week_1/index.php`
3. Use the interactive form to test the merge algorithm

#### Command Line Interface

```bash
php praktikum_week_1/cli.php
```

#### Learning Examples

Run any module file to see PHP concepts in action:

```bash
php modul_1/arrays.php
php modul_1/functions.php
# ... etc
```

## 📖 Learning Path

1. **Start with basics**: `variables_declaration.php`, `output_input.php`
2. **Data structures**: `arrays.php`, `strings.php`
3. **Control flow**: `conditionals.php`, `loops_iterations.php`
4. **Functions**: `functions.php`
5. **OOP concepts**: `oop.php`
6. **Advanced topics**: `errors.php`, `files.php`
7. **Practical application**: Explore the merge arrays project

## 🛠 Technologies Used

- **PHP 8+** - Core programming language
- **HTML5** - Web interface structure
- **CSS3** - Styling and responsive design
- **JavaScript** - Client-side enhancements
- **File I/O** - File handling operations

## 🎯 Key Learning Objectives

- Master PHP syntax and fundamentals
- Understand object-oriented programming in PHP
- Learn array manipulation and algorithms
- Practice error handling and debugging
- Build interactive web applications
- Implement clean, maintainable code

## 📝 Example Usage

### Merge Sorted Arrays

```php
$nums1 = [1, 2, 3, 0, 0, 0];
$nums2 = [2, 5, 6];
merge($nums1, 3, $nums2, 3);
// Result: [1, 2, 2, 3, 5, 6]
```

## 🤝 Contributing

This is a learning repository. Feel free to:

- Add more examples
- Improve documentation
- Fix bugs or typos
- Suggest new learning modules

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🎓 About

Created as part of a PHP web development learning curriculum, covering essential programming concepts and practical application development.
