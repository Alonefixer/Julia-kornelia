<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Julia vs Kornelia</title>
    <style>
        /* Анимация переливающегося фона */
        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        body {
            font-family: Arial, sans-serif;
            text-align: center;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(45deg, #ff00ff, #ff00ff, #8400ff, #8c00ff); /* Переливающийся фон */
            background-size: 400% 400%;
            animation: gradientAnimation 6s infinite alternate ease-in-out;
            margin: 0;
            user-select: none; /* Запрещает выделение текста */
            overflow: hidden; /* Запрещает прокрутку */
        }

        /* Контейнер для персонажей, расположение рядом */
        .fighters-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 90%;
            max-width: 1200px;
            margin-top: 20px;
            position: relative;
            flex-wrap: wrap; /* Позволяет элементам располагаться в несколько строк на мобильных устройствах */
        }

        /* Стиль для блока с персонажем */
        .fighter {
            width: 250px;
            padding: 20px;
            border-radius: 10px;
            background: rgba(0, 0, 0, 0.6); /* Полупрозрачный фон для блоков с персонажами */
            box-shadow: 0px 0px 40px rgba(255, 255, 255, 0.4);
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
            margin: 0 40px; /* Отступы между персонажами */
            flex: 1; /* Делаем блоки равными по ширине */
            backdrop-filter: blur(10px); /* Добавляет эффект размытия фона */
        }

        .fighter:hover {
            transform: scale(1.05);
            box-shadow: 0px 0px 60px rgba(255, 255, 255, 0.6); /* Увеличение тени при наведении */
            background: rgba(255, 255, 255, 0.1); /* Легкое свечение при наведении */
        }

        /* Стили для изображений */
        .fighter img {
            width: 230px; /* Увеличено */
            height: 230px; /* Увеличено */
            border-radius: 50%;
            box-shadow: 0px 0px 30px rgba(255, 255, 255, 0.7);
            margin-bottom: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            pointer-events: none; /* Запрещает взаимодействие с изображениями */
        }

        .fighter img:hover {
            transform: scale(1.1);
            box-shadow: 0px 0px 40px rgba(255, 255, 255, 0.8); /* Эффект свечения */
        }

        /* Стили для текста "VS" */
        .vs {
            font-size: 60px;
            font-weight: bold;
            color: white;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
            margin: 0 40px;
            animation: vsTextAnimation 1s ease-in-out infinite alternate; /* Добавление анимации текста "VS" */
        }

        @keyframes vsTextAnimation {
            0% { color: white; transform: scale(1); }
            50% { color: #ff00ff; transform: scale(1.2); text-shadow: 0px 0px 30px rgba(255, 0, 255, 0.8); }
            100% { color: white; transform: scale(1); }
        }

        /* Информация о персонажах */
        .info {
            margin-top: 15px;
            font-size: 16px;
            color: #dcdcdc;
            line-height: 1.4;
            text-align: left;
            opacity: 0.8;
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .fighter:hover .info {
            opacity: 1;
            transform: translateY(-10px); /* Поднятие информации при наведении */
        }

        /* Кастомные стили для аудиоплеера */
        .audio-container {
            position: fixed;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            opacity: 0;
            animation: fadeInAudio 2s forwards;
        }

        @keyframes fadeInAudio {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        audio {
            width: 250px;
            opacity: 0.8;
            border-radius: 10px;
            box-shadow: 0px 0px 30px rgba(255, 255, 255, 0.6);
        }

        /* Добавление фона в элементы на hover */
        .fighter:hover {
            background: rgba(0, 0, 0, 0.8); /* Затемнение фона при наведении */
        }

        /* Плавное движение фона */
        .background-animation {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('background-image.jpg') center center no-repeat;
            background-size: cover;
            filter: blur(10px);
            animation: parallax 10s infinite linear;
        }

        @keyframes parallax {
            0% { transform: translateY(0); }
            50% { transform: translateY(10px); }
            100% { transform: translateY(0); }
        }

        /* Медиазапросы для мобильных устройств */
        @media (max-width: 768px) {
            .fighters-container {
                flex-direction: column; /* Переводим в вертикальное расположение на мобильных устройствах */
            }

            .fighter {
                width: 90%; /* Уменьшаем размер блока */
                margin: 10px 0; /* Убираем горизонтальные отступы */
                padding: 15px; /* Уменьшаем отступы внутри блока */
            }

            .vs {
                font-size: 40px; /* Уменьшаем размер текста "VS" */
            }

            .fighter img {
                width: 200px; /* Уменьшаем размер изображения */
                height: 200px; /* Уменьшаем размер изображения */
            }

            audio {
                width: 200px; /* Уменьшаем размер аудиоплеера */
            }
        }

        @media (max-width: 480px) {
            .fighter {
                width: 100%; /* Полная ширина для мобильных устройств */
                padding: 10px;
            }

            .vs {
                font-size: 30px; /* Еще больше уменьшаем размер текста "VS" */
            }

            .fighter img {
                width: 180px; /* Еще меньше изображения */
                height: 180px; /* Еще меньше изображения */
            }

            audio {
                width: 180px; /* Уменьшаем размер аудиоплеера для еще меньших экранов */
            }
        }
    </style>
</head>
<body>
    <!-- Добавление фона с эффектом параллакса -->
    <div class="background-animation"></div>

    <div class="fighters-container">
        <!-- Блок для Julia -->
        <div class="fighter">
            <img src="Julia.png" alt="Julia">
            <div>Julia</div>
            <div class="info">
                info: <br>
                Alt - 11 <br>
                Name - Julia <br>
                Mit - I don't now <br>
                Klasse - 6b <br>
            </div>
        </div>
        
        <!-- Текст "VS" по центру -->
        <div class="vs">VS</div>
        
        <!-- Блок для Kornelia -->
        <div class="fighter">
            <img src="Kornelia.png" alt="Kornelia">
            <div>Kornelia</div>
            <div class="info">
                info: <br>
                Alt - 11 <br>
                Name - Kornelia <br>
                Mit - Elias Glaus <br>
                Klasse - 5d <br>
            </div>
        </div>
    </div>

    <!-- Аудиоплеер с музыкой -->
    <div class="audio-container">
        <audio id="bg-music" autoplay loop>
            <source src="music.mp3" type="audio/mpeg">
            Ваш браузер не поддерживает аудиофайлы.
        </audio>
    </div>
</body>
</html>
