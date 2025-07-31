<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieStream - Suscripciones</title>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Seleccionar Plan</title>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Selecciona un plan</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #121212;
      color: #fff;
      padding: 2rem;
      margin: 0;
    }

    .hidden {
      display: none;
    }

    .plan-container, .payment-form {
      max-width: 500px;
      margin: auto;
      background: #1e1e1e;
      border-radius: 15px;
      padding: 2rem;
      box-shadow: 0 0 15px rgba(0,0,0,0.5);
    }

    .plan {
      margin-bottom: 1rem;
      padding: 1rem;
      border: 2px solid transparent;
      border-radius: 10px;
      background-color: #2a2a2a;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .plan:hover,
    .plan input:checked + label {
      border-color: #4caf50;
      background-color: #597640;
    }

    label {
      display: block;
      cursor: pointer;
    }

    input[type="radio"] {
      display: none;
    }

    button {
      margin-top: 1rem;
      width: 100%;
      padding: 0.8rem;
      background-color: #4caf50;
      border: none;
      color: white;
      font-weight: bold;
      font-size: 1rem;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #43a047;
    }

    input[type="text"] {
      width: 100%;
      padding: 0.7rem;
      border-radius: 8px;
      border: none;
      margin-bottom: 1rem;
      background-color: #333;
      color: white;
    }
  </style>
</head>
<body>

  <!-- Paso 1: Selección de plan -->
  <div class="plan-container" id="plan-section">
    <h2>Selecciona tu plan</h2>
    <form id="plan-form">
        @csrf
      <div class="plan">
        <input type="radio" id="plan_basico" name="plan" value="1">
        <label for="plan_basico"><strong>Básico:</strong> $99/mes - 1 pantalla</label>
      </div>
      <div class="plan">
        <input type="radio" id="plan_estandar" name="plan" value="2">
        <label for="plan_estandar"><strong>Estándar:</strong> $149/mes - 2 pantallas</label>
      </div>
      <div class="plan">
        <input type="radio" id="plan_premium" name="plan" value="3">
        <label for="plan_premium"><strong>Premium:</strong> $199/mes - 4 pantallas</label>
      </div>
      <button type="button" onclick="mostrarFormulario()">Continuar</button>
    </form>
  </div>

  <!-- Paso 2: Formulario de tarjeta -->
  <div class="payment-form hidden" id="payment-section">
    <h2>Ingresa los datos de tu tarjeta</h2>
    <form method="POST" action="{{ route('subscription.pay') }}">
        @csrf
      <input type="hidden" name="plan_seleccionado" id="planSeleccionado">

      <input type="text" name="card_number" placeholder="Número de tarjeta (16 dígitos)" required maxlength="16">
      <input type="text" name="card_name" placeholder="Nombre en la tarjeta" required>
      <input type="text" name="expiry_date" placeholder="Fecha de vencimiento (MM/AA)" required>
      <input type="text" name="cvv" placeholder="CVV" required maxlength="4">
      <button type="submit">Pagar</button>
    </form>
  </div>

  <script>
    function mostrarFormulario() {
      const planSeleccionado = document.querySelector('input[name="plan"]:checked');
      if (!planSeleccionado) {
        alert('Por favor selecciona un plan');
        return;
      }

      // Pasar el valor del plan al segundo formulario
      document.getElementById('planSeleccionado').value = planSeleccionado.value;

      // Oculta la sección de planes y muestra la de pago
      document.getElementById('plan-section').classList.add('hidden');
      document.getElementById('payment-section').classList.remove('hidden');
    }
  </script>
</body>
</html>


</body>
</html>

</body>
</html>