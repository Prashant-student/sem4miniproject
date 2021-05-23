import pandas as pd
import numpy as np
import matplotlib.pyplot as plt
from matplotlib import style
style.use('ggplot')


if __name__ == '__main__':
    df = pd.read_excel('PL_2019-2020.xlsx')

a = df[ (df.VILLAGE_NAME=='AKKIMARADI')].F_NAME.to_numpy()
print(len(a))
#print(a)
b = df[(df.VILLAGE_NAME=='AKKIMARADI')].DIVERSION_CENTER_NAME
d = df[(df.VILLAGE_NAME=='AKKIMARADI')].AGE_IN_DAYS.to_numpy()
e = df[(df.VILLAGE_NAME=='AKKIMARADI')].CV_NAME.to_numpy()

print(b)
c =[]
for n in range(0,len(a)):
    if ((b[n] != 'GSM_HARVEST') & (d[n]>300)):
       c.append(a[n])

       c.append(e[n])
       print(a[n],'\t',e[n])
print(len(c)/2)