# predict.py
import sys
import numpy as np
import joblib
import warnings
warnings.filterwarnings("ignore", category=UserWarning)

# Get input from command line
# iq = 7
# cgpa = 100
iq = float(sys.argv[1])
cgpa = float(sys.argv[2])

# Load model and scaler
model = joblib.load('model.pkl')
scaler = joblib.load('scaler.pkl')

# Prepare input and scale it
real_input = np.array([[cgpa, iq]])

scaled_input = scaler.transform(real_input)

# Predict
prediction = model.predict(scaled_input)

# Output result
print("Placed" if prediction[0] == 1 else "Not Placed")
