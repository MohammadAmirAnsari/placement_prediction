import sys
import pandas as pd
import pickle

iq = float(sys.argv[1])
cgpa = float(sys.argv[2])

model = pickle.load(open('model.pkl', 'rb'))
scaler = pickle.load(open('scaler.pkl', 'rb'))

input_df = pd.DataFrame([[cgpa, iq]])
scaled_input = scaler.transform(input_df)

prediction = model.predict(scaled_input)

if prediction[0] == 1:
    print("Placed")
else:
    print("Not Placed")
