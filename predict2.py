import sys
import pandas as pd
import pickle

iq = int(sys.argv[1])
cgpa = int(sys.argv[2])

model = pickle.load(open('model.pkl', 'rb'))
scaler = pickle.load(open('scaler.pkl', 'rb'))

input_df = pd.DataFrame([[iq, cgpa]])
scaled_input = scaler.transform(input_df)

prediction = model.predict(scaled_input)

if prediction[0] == 1:
    print("Placed")
else:
    print("Not Placed")
