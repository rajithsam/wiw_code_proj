# WiW Coding Project

Framework: Laravel

## User Stories
* Employees
  1. When do I work?
  2. Who am I working with?
  3. How much have I worked?
  4. Who are my managers?
* Managers
  1. Create a shift for an employee
  2. See the schedule
  3. Change a shift
  4. Assign a shift
  5. See Employee details

Check out the index page for a demo

## Discussion

### Hang-ups
1. Initially was using SQLite, but that has a very bizarre (strings) way of handling dates, which messed me up for a while before I went back to good ol' MySQL
2. My tendency to want everything to be "ideal" got in the way sometimes. A lot of things would need to be handled differently (in a "real world" application), especially auth, output, and clearing up some of the redundancy (contacting managers partially duplicates shift information, etc)
3. I keep mixing camelcase and underscores, as my brain is having trouble figuring out which one it seems like best for this project
