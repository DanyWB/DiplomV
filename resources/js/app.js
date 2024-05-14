import "./bootstrap";

document.addEventListener("DOMContentLoaded", function () {
    const questions = document.querySelectorAll(".question");

    questions.forEach((question) => {
        question.addEventListener("click", () => {
            const answer = question.nextElementElement;

            if (answer.style.display === "block") {
                answer.style.display = "none";
            } else {
                answer.style.display = "block";
            }
        });
    });
});
