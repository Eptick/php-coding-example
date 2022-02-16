## Setup
PHP version 8.1.3
```
composer install
```
Run a web server using the `public` folder
For testing purposes I used the VS code live server ( it runs `php -S ` with
preconfigured runtime arguments)

### Run tests
Make sure to run `composer install` first
then run `vendor\bin\phpunit tests` if you are on windows

## The Battle of 2 Armies assignment
### Requirements
Create a program that simulates a battle between two armies.
Input parameters are numbers of soldiers in each army.
Output is the winning army.
- Implement 1 element of randomness (e.g. generals, earthquakes, soldiers disease).
- Input parameters must be passed as url GET variables, e.g. ?army1=50&army2=45.
- Everything else is up to you.

### Limitations
- You are NOT allowed to use a PHP framework (Symfony, Laravel, etc.).

### What will be evaluated
- Functional requirements
- OOP
- Programming best practices

### What will NOT be evaluated
- Frontend part of the solution (visual design, layout). Simple output is enough.

### Extra points
- Write some tests
- Use a linter
### Time
- You will receive a deadline via email, it will be more than enough to complete the task.

### How to submit your solution
1. Create a private Github repository that will contain your solution.
2. Add Github account https://github.com/bornfightdev as collaborator on the repository.

### Disclaimer
Your solution will only be used for hiring evaluation purposes.