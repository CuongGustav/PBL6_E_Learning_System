<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/PBL6/public/css/style_reviewVoca.css">
</head>
<body>
        <div class="container">
            <div class="icon"></div>
            <div class="title">{{ $nameTopic }}</div>

            @foreach ($vocabularies as $index => $vocabulary)
                <div class="vocabulary-item" id="vocabulary-item-{{ $index }}" style="display: {{ $index === 0 ? 'block' : 'none' }};">
                    <label for="inputWord-{{ $index }}" class="input-label">{{ $vocabulary->meaning }}</label>
                    <input type="text" class="input-word" id="inputWord-{{ $index }}" placeholder="Điền từ ở đây..." oninput="checkWord({{ $index }})">
                    
                    <div class="info" id="info-{{ $index }}" style="display: none;">
                        <h3>{{ $vocabulary->name_voca }}</h3>
                        <p>{{ $vocabulary->transcribe_phonetically }}</p>
                        <p>{{ $vocabulary->meaning }}</p>
                        <p>{{ $vocabulary->example }}</p>
                    </div>
                    
                    <button type="button" class="continue-btn" id="nextButton-{{ $index }}" onclick="goToNextWord()">Next</button>
                </div>
            @endforeach
            <div id="result" style="display: none; font-size: 1.5em; text-align: center; margin-top: 20px;"></div>
            <div class="button-container" style=" display: flex">
                {!! Form::open(['url' => 'user/topic/review/submit/'. $username, 'method' => 'POST']) !!}
                    {!! Form::submit('Finish', ['class' => 'continue-btn', 'id' => 'finishButton', 'style' => 'display:none; margin-right: 40px; margin-left: 70px;', 'value' => 'back1']) !!}
                {!! Form::close() !!}

                {!! Form::open(['url' => 'user/topic/review/back/'.$id_topic, 'method' => 'GET']) !!}
                    {!! Form::submit('Back', ['class' => 'continue-btn', 'id' => 'back', 'style' => 'display:none;', 'value' => 'back']) !!}
                {!! Form::close() !!}
                

            </div>
            
        </div>

    <script>
        const vocabularies = [
            @foreach ($vocabularies as $vocabulary)
                {
                    name_voca: "{{ strtolower(trim($vocabulary->name_voca)) }}",
                    meaning: "{{ $vocabulary->meaning }}",
                },
            @endforeach
        ];
        
        let currentIndex = 0;
        let correctAnswers = 0;

        function checkWord(index) {
            const input = document.getElementById(`inputWord-${index}`).value.trim().toLowerCase();
            const info = document.getElementById(`info-${index}`);
            const nextButton = document.getElementById(`nextButton-${index}`);
            
            if (input === vocabularies[index].name_voca) {
                if (info.style.display === "none") {
                    correctAnswers++;  
                }
                info.style.display = "block";
                nextButton.style.display = "inline-block"; 
            }
        }

        function goToNextWord() {
            document.getElementById(`vocabulary-item-${currentIndex}`).style.display = "none";
            currentIndex++;
            
            if (currentIndex < vocabularies.length) {
                document.getElementById(`vocabulary-item-${currentIndex}`).style.display = "block";
            } else {
                document.getElementById("finishButton").style.display = "block";
                document.getElementById("back").style.display = "block"; 
                showResult(); 
            }
        }

        function showResult(event) {
            if (event) event.preventDefault(); 
            const resultDiv = document.getElementById("result");
            resultDiv.innerText = `Bạn đã trả lời đúng ${correctAnswers} trên ${vocabularies.length} câu.`;
            resultDiv.style.display = "block";
        }
    </script>
</body>
</html>
