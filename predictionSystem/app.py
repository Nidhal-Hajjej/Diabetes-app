import streamlit as st
import requests
import json

st.title("WELCOME TO DIABETES PREDICTION SYSTEM")
st.write("""### We need some information !""")

pregnancies = st.slider("Pregnancies", 0, 17, 5)
glucose = st.slider("Glucose", 0, 199, 50)
blood_pressure = st.slider("BloodPressure", 0, 122, 50)
skin_thickness = st.slider("SkinThickness", 0, 99, 50)
insulin = st.slider("Insulin", 0, 900, 500)
bmi = st.slider("BMI", 0, 100, 50)
diabetes_pedigree_function = st.slider("DiabetesPedigreeFunction", 0.01, 3.0, 2.5)
age = st.slider("Age", 10, 90, 50)
submit = st.button("Submit")

url = 'http://localhost:8000/predict'
data = {'Pregnancies': pregnancies, 'Glucose': glucose, 'BloodPressure': blood_pressure, 'SkinThickness': skin_thickness, 'Insulin': insulin, 'BMI': bmi, 'DiabetesPedigreeFunction': diabetes_pedigree_function, 'Age': age}

response = requests.get(url, json=data)

if response.ok:
    result = response.json()
    if result == 1:
        st.subheader("You are diabetic")
    else:
        st.subheader("You are not diabetic")
else:
    st.write("An error occurred while making the request.")
