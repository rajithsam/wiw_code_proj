# WiW Coding Project

Framework: Laravel

## User Stories
* Employees
  1. When do I work? (GET /employee/shifts)
  2. Who am I working with? (GET /employee/shift/{shiftID})
  3. How much have I worked? (GET /employee/hours)
  4. Who are my managers? (GET /employee/contact)
* Managers
  1. Create a shift for an employee (POST /manager/shift)
  2. See the schedule (GET /manager/shifts)
  3. Change a shift (PUT /manager/shift/{shiftID})
  4. Assign a shift (PUT /manager/shift/{shiftID})
  5. See Employee details (GET /manager/contact/{employeeID})

## Discussion

### Disclaimer
I would like to point out that this is not anywhere close to a "release-able" state for an application. It would need a lot of other features and design elements. Most importantly, it needs an actual authentication system (tokens or whatever), and it needs to decide whether it wants to be an API only, or if it will have an interface as well (it's kinda both right now for demo-sake). It also needs a lot of cleaning and security work if a real user were ever to see it. But, it does get the overall jist of this setup across.

### Hang-ups
1. Initially was using SQLite, but that has a very bizarre (strings) way of handling dates, which messed me up for a while before I went back to good ol' MySQL
2. My tendency to want everything to be "ideal" got in the way sometimes. A lot of things would need to be handled differently (in a "real world" application), especially auth, output, and clearing up some of the redundancy (contacting managers partially duplicates shift information, etc)
3. I keep mixing camelcase and underscores, as my brain is having trouble figuring out which one it seems to like best for this project
