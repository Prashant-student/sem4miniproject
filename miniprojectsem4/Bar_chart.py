import pandas as pd
import numpy as np
import matplotlib.pyplot as plt
from matplotlib import style
from matplotlib import pyplot as plot
from statistics import mean
from numpy import math
style.use('ggplot')

if __name__ == '__main__':
    df = pd.read_excel('PL_2019-2020.xlsx')



a = df.CROP_TYPE_NAME.unique()
b = []
for i in range(0, len(a)):
    b.append((len(df[(df['CROP_TYPE_NAME'] == a[i]) & (df['DIVERSION_CENTER_NAME'] == 'GSM_HARVEST')].CROP_TYPE_NAME) / len(
        df[df['CROP_TYPE_NAME'] == a[i]].CROP_TYPE_NAME)) * 100)

print(a)
print(a,b)
plt.bar(a,b,color='rgb')


plt.xlabel('CROP_TYPE_NAME')
plt.ylabel('PERCENTAGE OF TYPES OF CORPS TAKEN BY GSM_HARVEST', fontsize= 9)
#plot.legend(a)
plt.show()