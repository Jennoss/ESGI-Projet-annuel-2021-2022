function goToStep(step, actualStep){
    let progressBar = document.getElementsByClassName("progress-bar")[0];

    let current = document.getElementById("question" + actualStep);
    current.style.display='none';

    let question = document.getElementById("question" + step);
    question.style.display='block';

    let nbQuestion = document.getElementsByClassName("question").length;

    if(step < actualStep){
        progressBar.style.width = `${((step - 1) / nbQuestion) * 100}%`;
    } else {
        progressBar.style.width = `${(actualStep / nbQuestion) * 100}%`;
    }
}

