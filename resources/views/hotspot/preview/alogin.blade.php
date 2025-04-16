<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotspot  - Redireccionando</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #006847, #CE1126);
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 500px;
            width: 90%;
            border: 3px solid #006847;
        }
        h1 {
            color: #CE1126;
            margin-bottom: 20px;
            font-size: 24px;
            text-transform: uppercase;
            font-weight: bold;
            text-shadow: 1px 1px 1px rgba(0,0,0,0.1);
        }
        .message {
            font-size: 18px;
            margin-bottom: 20px;
            color: #006847;
            font-weight: bold;
        }
        .spinner {
            border: 5px solid #f3f3f3;
            border-top: 5px solid #006847;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 2s linear infinite;
            margin: 15px auto;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .continue-btn {
            background-color: #006847;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 15px;
            font-weight: bold;
        }
        .continue-btn:hover {
            background-color: #CE1126;
        }
        .noscript-warning {
            color: #e74c3c;
            font-weight: bold;
        }
    </style>
</head>
<body>
    $(if chap-id)
    <noscript>
        <div class="container">
            <p class="noscript-warning">JavaScript es necesario. Por favor, habilite JavaScript para continuar.</p>
        </div>
    </noscript>
    $(endif)

    <div class="container">
        <h1>¡OLIVIA VALERA 2025!</h1>
        <p class="message">Juntos con Olivia Valera construiremos un mejor Tierra Blanca. ¡Tu voto es nuestro compromiso para el 2025!</p>
        <div class="spinner"></div>

        <form name="redirect" action="https://oliviavalera.sattlink.com/" method="get">
            <input type="submit" value="Conectarse ahora" class="continue-btn">
        </form>
    </div>

    <script>
        // Redireccionamiento automático
        window.onload = function() {
            setTimeout(function() {
                document.redirect.submit();
            }, 3500); // Pequeña demora para mostrar el spinner
        }
    </script>
</body>
</html>
