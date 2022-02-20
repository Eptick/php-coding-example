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


## Example output
```
The time is 2029 hours. That's military time for you fresh out the academy.
The day has started, the soldiers are agited and that makes them more dangerous. A perfect oportunity for the brawlers.
It's raining outside, it's muddy and about to get bloody.
It's 7.8 °C outside.
A new AirForceArmy called Army 1 has appeared on the battlefield
A new ArmouredArmy called Army 2 has appeared on the battlefield
One of the soildiers peeks his head, the other army notices. Shots fired. People are yelling, this is a war alright
Applying effect AfternoonEffect to Army 1
Army 1 had it's damage incresed by 4.
Army 1 had it's body count incresed by 3.
Applying effect AfternoonEffect to Army 2
Army 2 had it's damage incresed by 4.
Army 2 had it's body count incresed by 3.
Applying effect RainEffect to Army 2
Army 2 had it's body count incresed by 4.
Army 1 dealt 10 points of damage to Army 2 and it has 37 soldiers left.
Army 2 dealt 10 points of damage to Army 1 and it has 23 soldiers left.
Army 1 dealt 12 points of damage to Army 2 and it has 25 soldiers left.
Army 2 dealt 9 points of damage to Army 1 and it has 14 soldiers left.
Army 1 dealt 12 points of damage to Army 2 and it has 13 soldiers left.
Army 2 dealt 10 points of damage to Army 1 and it has 4 soldiers left.
Army 1 dealt 11 points of damage to Army 2 and it has 2 soldiers left.
Army 2 dealt 9 points of damage to Army 1 and it has 0 soldiers left.
Army 2 wins with 2 soldiers left
```

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

### Disclaimer
Your solution will only be used for hiring evaluation purposes.