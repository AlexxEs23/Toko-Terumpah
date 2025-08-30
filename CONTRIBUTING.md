# Contributing to Terumpah Kulit

First off, thank you for considering contributing to Terumpah Kulit! It's people like you that make this project such a great tool.

## Code of Conduct

This project and everyone participating in it is governed by our Code of Conduct. By participating, you are expected to uphold this code.

## How Can I Contribute?

### Reporting Bugs

Before creating bug reports, please check the existing issues to see if the problem has already been reported. When you are creating a bug report, please include as many details as possible:

* **Use a clear and descriptive title**
* **Describe the exact steps which reproduce the problem**
* **Provide specific examples to demonstrate the steps**
* **Describe the behavior you observed after following the steps**
* **Explain which behavior you expected to see instead and why**
* **Include screenshots and animated GIFs if possible**

### Suggesting Enhancements

Enhancement suggestions are tracked as GitHub issues. When creating an enhancement suggestion, please include:

* **Use a clear and descriptive title**
* **Provide a step-by-step description of the suggested enhancement**
* **Provide specific examples to demonstrate the steps**
* **Describe the current behavior and explain which behavior you expected to see instead**
* **Explain why this enhancement would be useful**

### Pull Requests

1. Fork the repo
2. Create a new branch (`git checkout -b feature/amazing-feature`)
3. Make your changes
4. Run the tests to ensure everything works
5. Commit your changes (`git commit -m 'Add some amazing feature'`)
6. Push to the branch (`git push origin feature/amazing-feature`)
7. Open a Pull Request

### Development Setup

1. Clone your fork
2. Install dependencies: `composer install && npm install`
3. Copy `.env.example` to `.env`
4. Generate application key: `php artisan key:generate`
5. Run migrations: `php artisan migrate`
6. Build assets: `npm run dev`
7. Start server: `php artisan serve`

### Coding Standards

* Follow PSR-12 coding standards for PHP
* Use meaningful variable and function names
* Add comments for complex logic
* Write tests for new features
* Ensure your code passes existing tests

### Commit Messages

* Use the present tense ("Add feature" not "Added feature")
* Use the imperative mood ("Move cursor to..." not "Moves cursor to...")
* Limit the first line to 72 characters or less
* Reference issues and pull requests liberally after the first line

## Styleguides

### PHP Styleguide

* Follow Laravel conventions
* Use Eloquent ORM for database operations
* Use form requests for validation
* Follow PSR-12 standards

### Frontend Styleguide

* Use Bootstrap classes consistently
* Follow mobile-first responsive design
* Use semantic HTML elements
* Optimize for accessibility

## Additional Notes

### Issue and Pull Request Labels

* `bug` - Something isn't working
* `enhancement` - New feature or request
* `good first issue` - Good for newcomers
* `help wanted` - Extra attention is needed
* `question` - Further information is requested

Thank you for contributing! 🎉
