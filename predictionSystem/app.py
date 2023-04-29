import streamlit as st
import pickle
import numpy as np

st.title("Diabetes Prediction System")
st.write("Please fill out the following information:")

pregnancies = st.slider("Pregnancies", 0, 17, 5)
glucose = st.slider("Glucose", 0, 199, 50)
blood_pressure = st.slider("Blood Pressure", 0, 122, 50)
skin_thickness = st.slider("Skin Thickness", 0, 99, 50)
insulin = st.slider("Insulin", 0, 900, 500)
bmi = st.slider("BMI", 0, 100, 50)
diabetes_pedigree_function = st.slider("Diabetes Pedigree Function", 0.01, 3.0, 2.5)
age = st.slider("Age", 10, 90, 50)

if st.button("Submit"):
    # Load the machine learning model
    with open("saved_steps", "rb") as file:
        dataset = pickle.load(file)
    regressor = dataset["regressor"]
    
    # Prepare the input data and make the prediction
    X = np.array([[pregnancies, glucose, blood_pressure, skin_thickness, insulin, bmi, diabetes_pedigree_function, age]])
    X = X.astype(float)
    prediction = regressor.predict(X)[0]
    
    # Display the result
    if prediction == 1:
        st.subheader("You have diabetes")
    else:
        st.subheader("You don't have diabetes")
