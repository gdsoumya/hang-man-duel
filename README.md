# Hang Man Duel

  Hang Man Duel is a simple Hang Man game developed using HTML, CSS, JavaScript and PHP.

## Features :

1. Let's users create Hang Man game sessions with custom words of their choice. Each session is active for 6 hrs after which they expire.
2. Each session is secured with a Game Id and a Password (as chosen by the challenger) to ensure that only users with access can play or monitor the game session.
3. Each person can play only once in a session(ip address tracking).
4. For each session a Dashboard is provided which has all the details of the current session like : 

      a. Challenger details.  b. Game Link.  c. Game Id  d. Session Password  e. Auto Updating Result List   
    
## Downloading and Playing on Local Machine :

  1. Download or clone the repository.
  2. Install a webserver like [XAMPP](https://www.apachefriends.org/download.html).
  3. Start the Apache and MySQL server.
  4. Place all the Files (except HangMan-Database.sql) int htdocs folder of your local server.
  5. Create a Database named HangMan.
  6. Import the Database Template HangMan-Database.sql into your database.
  7. Visit your local server from your webrowser to start playing.
