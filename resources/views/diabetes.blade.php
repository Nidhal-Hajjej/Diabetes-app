@extends('layouts.main')

@section('content')
    <div class="page-heading" style="background-image: url('../images/header-img-1.jpg');">
        <h1>About Diabetes</h1>          
    </div>

    <section class="what-is-diabetes">
        <h2>What is Diabetes?</h2>
        <div class="video-mask">
            <iframe src="https://www.youtube.com/embed/wZAjVQWbMlE"></iframe>    
        </div>

        <br>
        <p>Diabetes is a chronic (long-lasting) health condition that affects how your body turns food into energy.</p>
        <br>
        <p>Most of the food you eat is broken down into sugar (also called glucose) and released into your bloodstream. When your blood sugar goes up, it signals your pancreas to release insulin. Insulin acts like a key to let the blood sugar into your body’s cells for use as energy.</p>
        <br>
        <p>If you have diabetes, your body either doesn’t make enough insulin or can’t use the insulin it makes as well as it should. When there isn’t enough insulin or cells stop responding to insulin, too much blood sugar stays in your bloodstream. Over time, that can cause serious health problems, such as heart disease, vision loss, and kidney disease.</p>
    </section>

    <div class="filler-image" style="background-image: url('/images/girl-walking.jpg');">
        <h2>
            One in 11 adults has diabetes. One in 2 adults with diabetes is undiagnosed.
        </h2>
    </div>

    <section class="diabetes-type">
        <h2>Types of Diabetes</h2>
        <p>There are three main types of diabetes: type 1, type 2, and gestational diabetes (diabetes while pregnant).</p>

        <div class="accordion">

            <div class="accordion-item">
                <input type="checkbox" id="type-1">
                <label class="accordion-label" for="type-1">
                    <h3>Type 1 Diabetes</h3>
                </label>
                <div class="accordion-content">
                    <p>Type 1 diabetes is thought to be caused by an autoimmune reaction (the body attacks itself by mistake) that stops your body from making insulin. Approximately 5-10% of the people who have diabetes have type 1. Symptoms of type 1 diabetes often develop quickly. It’s usually diagnosed in children, teens, and young adults. If you have type 1 diabetes, you’ll need to take insulin every day to survive. Currently, no one knows how to prevent type 1 diabetes.</p>
                </div>
            </div>

            <div class="accordion-item">
                <input type="checkbox" id="type-2">
                <label class="accordion-label" for="type-2">
                    <h3>Type 2 Diabetes</h3>
                </label>
                <div class="accordion-content">
                    <p>With type 2 diabetes, your body doesn’t use insulin well and can’t keep blood sugar at normal levels. About 90-95% of people with diabetes have type 2. It develops over many years and is usually diagnosed in adults (but more and more in children, teens, and young adults). You may not notice any symptoms, so it’s important to get your blood sugar tested if you’re at risk. Type 2 diabetes can be prevented or delayed with healthy lifestyle changes, such as losing weight, eating healthy food, and being active.</p>
                </div>
            </div>

            <div class="accordion-item">
                <input type="checkbox" id="type-3">
                <label class="accordion-label" for="type-3">
                    <h3>Gestational Diabetes</h3>
                </label>
                <div class="accordion-content">
                    <p>Gestational diabetes develops in pregnant women who have never had diabetes. If you have gestational diabetes, your baby could be at higher risk for health problems. Gestational diabetes usually goes away after your baby is born but increases your risk for type 2 diabetes later in life. Your baby is more likely to have obesity as a child or teen, and more likely to develop type 2 diabetes later in life too.</p>
                </div>
            </div>

        </div>   
    </section>

    
@endsection


