import time
from grove.grove_moisture_sensor import GroveMoistureSensor
import mysql.connector
mydb = mysql.connector.connect( host='localhost', user='root', passwd='new_password', database='temp')

sensor = GroveMoistureSensor(0)

 
while True:
        mois = sensor.moisture
        if 0 <= mois and mois < 300:
            level = 'dry'
        elif 300 <= mois and mois < 600:
            level = 'moist'
        else:
            level = 'wet'
 
        print('moisture: {}, {}'.format(mois, level))
        mycursor = mydb.cursor()
        sql = "INSERT INTO moist (mois, level) VALUES (%s, %s)"
        val = mois
        mycursor.execute(sql, val)
        mydb.commit()
        time.sleep(1)