import pandas as pd
import numpy as np
import matplotlib.pyplot as plt
from matplotlib import style
style.use('ggplot')


if __name__ == '__main__':
    df = pd.read_excel('PL_2019-2020.xlsx')

a = df[(df.AGE_IN_DAYS>0) & (df['DIVERSION_CENTER_NAME'] == 'GSM_HARVEST')].CV_NAME
b = df[(df.AGE_IN_DAYS>0) & (df['DIVERSION_CENTER_NAME'] == 'GSM_HARVEST')].AGE_IN_DAYS.to_numpy()
plt.scatter(b,a,s=1)
plt.show()
