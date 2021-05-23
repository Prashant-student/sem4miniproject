import pandas as pd
import numpy as np
import seaborn as sns
import matplotlib as plot
from matplotlib import style
from matplotlib import pyplot as plt
style.use('ggplot')

if __name__ == '__main__':
    df = pd.read_excel('PL_2019-2020.xlsx')

a = df.CROP_TYPE_NAME.unique()
b = df.PLOT_CLUSTER_CD.unique()
print(a)
print(b)
c = []
for i in range(0, len(b)):
    c.append((len(df[(df['CROP_TYPE_NAME'] == 'R1') & (df['PLOT_CLUSTER_CD'] == b[i])].CV_NAME) / len(
        df[df['CROP_TYPE_NAME'] == 'R1'].CROP_TYPE_NAME)) * 100)
d = []
for i in range(0, len(b)):
    d.append((len(df[(df['CROP_TYPE_NAME'] == 'R2') & (df['PLOT_CLUSTER_CD'] == b[i])].CV_NAME) / len(
        df[df['CROP_TYPE_NAME'] == 'R2'].CROP_TYPE_NAME)) * 100)
e = []
for i in range(0, len(b)):
    e.append((len(df[(df['CROP_TYPE_NAME'] == 'PL') & (df['PLOT_CLUSTER_CD'] == b[i])].CV_NAME) / len(
        df[df['CROP_TYPE_NAME'] == 'PL'].CROP_TYPE_NAME)) * 100)



cluster = b

R1 = c
R2 = d
PL = e

df = pd.DataFrame({'cluster':b,'R1':c,'R2':d,'PL':e})
print(df)
df.plot(x="cluster",y=["R1","R2","PL"],kind="bar",figsize=(9,8))
#plt.legend()
plt.ylabel('Percentage of crops grown in each sector')
plt.show()