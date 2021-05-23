
import sys
import joblib
import pandas as pd
import numpy as np
import json
model = joblib.load('finalized_model.sav')
cols_when_model_builds = model.get_booster().feature_names
def predict(j):
    x= json.loads(j)
    data = [0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,1.0,0.0,0.0,0.0,1.0,0.0,1.0,0.0,0.0,0.0,0.0,0.0,3.0,409.0,749.0]
    col=[0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31]
    df = pd.DataFrame([data],columns = col)
    CV_NAMES=['86032','91010','M 265','SNK-09293',"PI 00-1110","CO VSI 08005"]
    for i in range(0,6):
        df[i][0]=(1 if (x["CV_NAME"]==CV_NAMES[i]) else 0)
    CROP_TYPE_NAMES=['R1','R2','PL']
    for i in range(0,3):
        df[i+6][0]=(1 if (x["CROP_TYPE_NAME"]==CROP_TYPE_NAMES[i]) else 0)
    CLUSTER_NAMES=['FACTORY-SW',
'KULIGOD',
'FACTORY EAST',
'MUDHOL-NW',
'RABAKAVI',
'SHIRAGUPPI',
'MUDALAGI',
'MUDHOL EAST',
'FACTORY-NW',
'TERADAL',
'MUDHOL-SE',
'MUDHOL-SW',
'BILAGI',
"FACTORY N",
"MAMADAPUR",
"GHATAPRABHA",
"YARAGATTI",
"RABAKAVI N",
"LOKAPUR",
"KATARAKI"]
    for i in range(0,20):
        df[i+9][0]=(1 if (x["CLUSTER_NAME"]==CLUSTER_NAMES[i]) else 0)
    df[29][0]=x["PLANT_AREA"]
    df[30][0]=x["AGE_IN_DAYS"]
    df[31][0]=x["DISPOSAL_TIME"]
    print (model.predict_proba(df)[0][1]*100000)
x =  '{"CV_NAME":"86032","CLUSTER_NAME":"SHIRAGUPPI","PLANT_AREA":3.0,"CROP_TYPE_NAME":"R1","AGE_IN_DAYS":409,"DISPOSAL_TIME":749}'
predict(sys.argv[1])
