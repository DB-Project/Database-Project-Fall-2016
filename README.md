# Find Folks
Find people who have similar interest in your area.  
Join group and participate in events!

Sign up today.

---

# Tutorial for login

[Click here for tutorial ] (https://www.youtube.com/playlist?list=PL712637B6CB66DB50)

---
### Small Note:
As of now, MAMP is using a different file location to run it's server.  
The default location was the following:
`/Applications/MAMP/htdocs`

---
### Problems sending data to DB
If you have problem sending data to the DB, check if your output buffering is on.
To do this, first locate your php.ini file.
It should be in the following location: `/Applications/MAMP/bin/php/php7.0.12/conf/php.ini`
---
### Problems with auto-increment:
Make sure to check the table info and see what the next auto increment value.
Note that the max increment number is: `2^32 - 1 = 2,147,483,647`.
In addition, when deleting a row, it does not affect the next increment values.
You can reset the auto increment value in the DB settings.