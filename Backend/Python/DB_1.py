import mysql.connector
# import sqlite3
import sqlite3 as lite

conn = lite.connect('../myDatabase.db')
cur = conn.cursor()

# def get_posts():
#     cur.execute("SELECT * FROM students")
#     print(cur.fetchall())

#get_posts()


# Example of how to create a table
# cur.execute('''CREATE TABLE schedule
#              (courseCode, courseName, classType, classDay, startTime, endTime)''')
# cur.execute("INSERT INTO schedule VALUES ('BCEE231','Computer Applicaitons','Lecture', 'Friday', '12:00', '14:00')")
# conn.commit()

#Todo: Create a new table in phpMyAdmin

def getSchedule():
    cur.execute("SELECT * FROM courses")
    print(cur.fetchall())

getSchedule()

conn.commit()
conn.close()

