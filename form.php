<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Quiz em PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }
        .quiz-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .question {
            margin-bottom: 30px;
        }
        .options label {
            display: block;
            margin-bottom: 10px;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            color: #fff;
            background-color: #333;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #444;
        }
        
    </style>
</head>
<body>
    <div class="quiz-container">
        <h2>Quiz em PHP</h2>
        <form method="post" action="resultado.php"<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="question">
                <p>1. Qual é o maior mamífero do Mundo?</p>
                <input type="text" name="q1">
            </div>
            <div class="question">
                <p>2. Qual é o maior planeta do sistema solar?</p>
                <input type="text" name="q2">
            </div>
            <div class="question">
                <p>3. Quem escreveu Dom Quixote?</p>
                <input type="text" name="q3">
            </div>
            <div class="question">
                <p>4. Qual é o maior rio do mundo?</p>
                <select name="q4">
                    <option value="a">Amazonas</option>
                    <option value="b">Nilo</option>
                    <option value="c">Mississipi</option>
                </select>
            </div>
            <div class="question">
                <p>5. Quantos continentes existem?</p>
                <select name="q5">
                    <option value="a">5</option>
                    <option value="b">6</option>
                    <option value="c">7</option>
                </select>
            </div>
            <div class="question">
                <p>6. Qual é o maior oceano do mundo?</p>
                <select name="q6">
                    <option value="a">Atlântico</option>
                    <option value="b">Pacífico</option>
                    <option value="c">Índico</option>
                </select>
            </div>
            <button type="submit">Enviar Respostas</button>
        </form>
        
        <?php
        // Processa as respostas
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $respostas_corretas = array(
                'q1' => 'Baleia',
                'q2' => 'Júpiter',
                'q3' => 'Miguel de Cervantes',
                'q4' => 'a', // Amazonas
                'q5' => 'c', // 7
                'q6' => 'b'  // Pacífico
            );

            $acertos = 0;

            foreach ($_POST as $pergunta => $resposta) {
                if (array_key_exists($pergunta, $respostas_corretas) && $respostas_corretas[$pergunta] == $resposta) {
                    $acertos++;
                }
            }

            echo "<h2>Resultado do Quiz</h2>";
            echo "<p>Você acertou $acertos de 6 perguntas.</p>";
        }
        ?>
          
    </div>
</body>
</html>
