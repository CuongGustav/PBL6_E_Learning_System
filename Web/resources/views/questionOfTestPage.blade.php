<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Form</title>
    <link rel="stylesheet" href="/PBL6/public/css/style_questionPage.css">
    
</head>
<body>
    <div class="quiz-container">
        <form id="quizForm">
            @foreach (array_chunk($questions->toArray(), 5) as $pageNumber => $questionsPage)
                <div id="page{{ $pageNumber + 1 }}" class="page" style="display: {{ $pageNumber == 0 ? 'block' : 'none' }};">
                    @foreach ($questionsPage as $index => $question)
                        <div class="question">
                            {{ $pageNumber * 5 + $index + 1 }}. {{ $question['Name_question'] }}
                        </div>
                        <ul class="options">
                            <li><div class="option-container" id="q{{ $pageNumber + 1 }}_{{ $index + 1 }}_a"><input type="radio" name="q{{ $pageNumber + 1 }}_{{ $index + 1 }}" value="a"> A. {{ $question['Answer_A'] }}</div></li>
                            <li><div class="option-container" id="q{{ $pageNumber + 1 }}_{{ $index + 1 }}_b"><input type="radio" name="q{{ $pageNumber + 1 }}_{{ $index + 1 }}" value="b"> B. {{ $question['Answer_B'] }}</div></li>
                            <li><div class="option-container" id="q{{ $pageNumber + 1 }}_{{ $index + 1 }}_c"><input type="radio" name="q{{ $pageNumber + 1 }}_{{ $index + 1 }}" value="c"> C. {{ $question['Answer_C'] }}</div></li>
                            <li><div class="option-container" id="q{{ $pageNumber + 1 }}_{{ $index + 1 }}_d"><input type="radio" name="q{{ $pageNumber + 1 }}_{{ $index + 1 }}" value="d"> D. {{ $question['Answer_D'] }}</div></li>
                        </ul>
                    @endforeach
                    @if ($pageNumber + 1 == ceil(count($questions) / 5))
                        <div class="navigation-buttons">
                            <button type="button" class="nav-btn" onclick="submitQuiz()">Submit</button>
                        </div>
                    @endif
                </div>
            @endforeach

            <div class="navigation-buttons">
                @for ($i = 1; $i <= ceil(count($questions) / 5); $i++)
                    <button type="button" class="nav-btn" onclick="showPage({{ $i }})">{{ $i }}</button>
                @endfor
            </div>
        </form>
        <div class="result" id="result"></div>
        <div id="exitButton" class="navigation-buttons" style="display: none;">
            <button type="button" class="nav-btn" onclick="exitQuiz()">Exit</button>
        </div>
    </div>

    <script>
        const questions = @json($questions);
        let correctAnswersCount = 0;

        function showPage(pageNumber) {
            const pages = document.querySelectorAll(".page");
            pages.forEach((page, index) => {
                page.style.display = index + 1 === pageNumber ? "block" : "none";
            });
        }

        function submitQuiz() {
            const resultDiv = document.getElementById("result");
            resultDiv.innerHTML = "";
            correctAnswersCount = 0;

            questions.forEach((question, index) => {
                const pageIndex = Math.floor(index / 5) + 1;
                const questionIndex = (index % 5) + 1;
                const userAnswer = document.querySelector(`input[name='q${pageIndex}_${questionIndex}']:checked`);
                const correctAnswer = question.Answer_right;

                if (userAnswer && userAnswer.value === correctAnswer) {
                    correctAnswersCount++;
                }

                const optionContainers = ["a", "b", "c", "d"].map(option => document.getElementById(`q${pageIndex}_${questionIndex}_${option}`));
                optionContainers.forEach(optionContainer => {
                    optionContainer.classList.remove("highlight-correct", "highlight-incorrect");
                    if (optionContainer.querySelector("input").value === correctAnswer) {
                        optionContainer.classList.add("highlight-correct");
                    } else if (userAnswer && userAnswer.value === optionContainer.querySelector("input").value) {
                        optionContainer.classList.add("highlight-incorrect");
                    }
                });
            });

            resultDiv.innerHTML = `<div>Total Correct Answers: ${correctAnswersCount} out of ${questions.length}</div>`;
            showPage(questions.length / 5 + 1);
            document.getElementById("exitButton").style.display = "block";
            document.querySelector(".navigation-buttons").style.display = "none";
        }

        function exitQuiz() {
    window.location.href = "{{ route('listTestUser') }}";
}

    </script>
</body>
</html>
