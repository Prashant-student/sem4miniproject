import pandas as pd
import numpy as np
import matplotlib as plot
from matplotlib import style
from matplotlib import pyplot as plt
style.use('ggplot')

if __name__ == '__main__':
    df = pd.read_excel('PL_2019-2020.xlsx')

a = df.CROP_TYPE_NAME.unique()
b = []
for i in range(0, len(a)):
    b.append((len(df[(df['CROP_TYPE_NAME'] == a[i]) & (df['PLOT_CLUSTER_CD'] == 1)].CV_NAME) / len(
        df[df['CROP_TYPE_NAME'] == a[i]].CROP_TYPE_NAME)) * 100)

print(a)
plt.pie(b,labels=a,autopct='%1.1f%%')
plt.legend(a)
plt.title('PERCENTAGE OF TYPES OF CROPS GROWN IN A CLUSTER 1')
plt.show()
