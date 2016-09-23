import pymysql

try:
    conn = pymysql.connect(user="root", password="root", host="localhost", port="8889", database="myDatabase.db")
except:
    print("fail")
