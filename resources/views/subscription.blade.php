<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieStream - Suscripciones</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            color: white;
            margin-bottom: 40px;
        }

        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .billing-toggle {
            text-align: center;
            margin-bottom: 30px;
        }

        .toggle-container {
            display: inline-flex;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 25px;
            padding: 5px;
            backdrop-filter: blur(10px);
        }

        .toggle-option {
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            background: transparent;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .toggle-option.active {
            background: rgba(255, 255, 255, 0.2);
            transform: scale(1.05);
        }

        .plans-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .plan-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
        }

        .plan-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .plan-card.featured {
            border: 3px solid #667eea;
            transform: scale(1.05);
        }

        .plan-card.featured::before {
            content: "MÁS POPULAR";
            position: absolute;
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
            background: #667eea;
            color: white;
            padding: 5px 15px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: bold;
        }

        .plan-name {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        .plan-price {
            font-size: 2rem;
            font-weight: bold;
            color: #667eea;
            margin-bottom: 5px;
        }

        .plan-period {
            color: #666;
            margin-bottom: 20px;
        }

        .plan-features {
            list-style: none;
            margin-bottom: 30px;
        }

        .plan-features li {
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }

        .plan-features li:last-child {
            border-bottom: none;
        }

        .select-plan-btn {
            width: 100%;
            padding: 15px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .select-plan-btn:hover {
            background: #5a6fd8;
        }

        .payment-section {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 30px;
            margin-top: 20px;
            display: none;
        }

        .payment-section.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .payment-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .selected-plan-info {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #667eea;
        }

        .form-group.error input {
            border-color: #dc3545;
        }

        .error-message {
            color: #dc3545;
            font-size: 0.9rem;
            margin-top: 5px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 15px;
        }

        .complete-payment-btn {
            width: 100%;
            padding: 15px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .complete-payment-btn:hover {
            background: #218838;
        }

        .complete-payment-btn:disabled {
            background: #6c757d;
            cursor: not-allowed;
        }

        .back-btn {
            background: #6c757d;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }

        .back-btn:hover {
            background: #5a6268;
        }

        .success-message {
            text-align: center;
            padding: 30px;
            background: #d4edda;
            border-radius: 10px;
            color: #155724;
            display: none;
        }

        .success-message.show {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        .loading {
            display: none;
            text-align: center;
            padding: 20px;
        }

        .loading.show {
            display: block;
        }

        .spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #667eea;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 0 auto 20px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            display: none;
        }

        .alert.error {
            background: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }

        .alert.success {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }

        .alert.show {
            display: block;
            animation: fadeIn 0.5s ease;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎬 MovieStream</h1>
            <p>Elige tu plan perfecto para disfrutar películas sin límites</p>
        </div>

        <div class="billing-toggle">
            <div class="toggle-container">
                <button class="toggle-option active" id="monthly-toggle">Mensual</button>
                <button class="toggle-option" id="yearly-toggle">Anual (2 meses gratis)</button>
            </div>
        </div>

        <div class="plans-grid" id="plans-grid">
            <div class="plan-card">
                <div class="plan-name">Básico</div>
                <div class="plan-price" id="basic-price">$9.99</div>
                <div class="plan-period" id="basic-period">/ mes</div>
                <ul class="plan-features">
                    <li>✓ 1 pantalla simultánea</li>
                    <li>✓ Calidad HD</li>
                    <li>✓ Catálogo básico</li>
                    <li>✓ Acceso móvil y web</li>
                </ul>
                <button class="select-plan-btn" onclick="selectPlan('basic')">Seleccionar Plan</button>
            </div>

            <div class="plan-card featured">
                <div class="plan-name">Premium</div>
                <div class="plan-price" id="premium-price">$15.99</div>
                <div class="plan-period" id="premium-period">/ mes</div>
                <ul class="plan-features">
                    <li>✓ 2 pantallas simultáneas</li>
                    <li>✓ Calidad 4K Ultra HD</li>
                    <li>✓ Catálogo completo</li>
                    <li>✓ Descargas offline</li>
                    <li>✓ Sin anuncios</li>
                </ul>
                <button class="select-plan-btn" onclick="selectPlan('premium')">Seleccionar Plan</button>
            </div>

            <div class="plan-card">
                <div class="plan-name">Familiar</div>
                <div class="plan-price" id="family-price">$19.99</div>
                <div class="plan-period" id="family-period">/ mes</div>
                <ul class="plan-features">
                    <li>✓ 4 pantallas simultáneas</li>
                    <li>✓ Calidad 4K Ultra HD</li>
                    <li>✓ Catálogo completo</li>
                    <li>✓ Perfiles familiares</li>
                    <li>✓ Control parental</li>
                    <li>✓ Descargas offline</li>
                </ul>
                <button class="select-plan-btn" onclick="selectPlan('family')">Seleccionar Plan</button>
            </div>
        </div>

        <div class="payment-section" id="payment-section">
            <div class="payment-header">
                <h2>Completar Suscripción</h2>
            </div>

            <div class="alert" id="alert"></div>

            <div class="selected-plan-info" id="selected-plan-info">
                <!-- Plan info will be populated here -->
            </div>

            <div class="loading" id="loading">
                <div class="spinner"></div>
                <p>Procesando pago...</p>
            </div>

            <form id="payment-form">
                <div class="form-group">
                    <label for="card-number">Número de Tarjeta</label>
                    <input type="text" id="card-number" placeholder="1234 5678 9012 3456" maxlength="19">
                    <div class="error-message" id="card-number-error"></div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="expiry">Fecha de Vencimiento</label>
                        <input type="text" id="expiry" placeholder="MM/AA" maxlength="5">
                        <div class="error-message" id="expiry-error"></div>
                    </div>
                    <div class="form-group">
                        <label for="cvv">CVV</label>
                        <input type="text" id="cvv" placeholder="123" maxlength="4">
                        <div class="error-message" id="cvv-error"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="cardholder">Nombre del Titular</label>
                    <input type="text" id="cardholder" placeholder="Juan Pérez">
                    <div class="error-message" id="cardholder-error"></div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="juan@email.com">
                    <div class="error-message" id="email-error"></div>
                </div>

                <button type="button" class="back-btn" onclick="goBack()">Volver</button>
                <button type="submit" class="complete-payment-btn" id="submit-btn">Completar Pago</button>
            </form>
        </div>

        <div class="success-message" id="success-message">
            <h2>🎉 ¡Suscripción Exitosa!</h2>
            <p>Bienvenido a MovieStream. Tu suscripción está activa y puedes empezar a disfrutar inmediatamente.</p>
            <p><strong>Detalles de tu suscripción:</strong></p>
            <div id="subscription-details"></div>
        </div>
    </div>

    <script>
        let currentBilling = 'monthly';
        let selectedPlan = null;

        const plans = {
            monthly: {
                basic: { price: 9.99, name: 'Básico' },
                premium: { price: 15.99, name: 'Premium' },
                family: { price: 19.99, name: 'Familiar' }
            },
            yearly: {
                basic: { price: 99.99, name: 'Básico' },
                premium: { price: 159.99, name: 'Premium' },
                family: { price: 199.99, name: 'Familiar' }
            }
        };

        // Toggle billing period
        document.getElementById('monthly-toggle').addEventListener('click', function() {
            switchBilling('monthly');
        });

        document.getElementById('yearly-toggle').addEventListener('click', function() {
            switchBilling('yearly');
        });

        function switchBilling(billing) {
            currentBilling = billing;
            
            document.querySelectorAll('.toggle-option').forEach(btn => btn.classList.remove('active'));
            document.getElementById(billing + '-toggle').classList.add('active');
            
            const period = billing === 'monthly' ? '/ mes' : '/ año';
            document.getElementById('basic-price').textContent = `${plans[billing].basic.price}`;
            document.getElementById('premium-price').textContent = `${plans[billing].premium.price}`;
            document.getElementById('family-price').textContent = `${plans[billing].family.price}`;
            
            document.getElementById('basic-period').textContent = period;
            document.getElementById('premium-period').textContent = period;
            document.getElementById('family-period').textContent = period;
        }

        function selectPlan(planType) {
            selectedPlan = planType;
            const plan = plans[currentBilling][planType];
            
            document.getElementById('plans-grid').style.display = 'none';
            document.querySelector('.billing-toggle').style.display = 'none';
            document.getElementById('payment-section').classList.add('active');
            
            const billingText = currentBilling === 'monthly' ? 'Mensual' : 'Anual';
            const savings = currentBilling === 'yearly' ? '<div style="color: #28a745; font-weight: bold;">¡Ahorras 2 meses!</div>' : '';
            
            document.getElementById('selected-plan-info').innerHTML = `
                <h3>Plan Seleccionado: ${plan.name}</h3>
                <p><strong>Precio:</strong> ${plan.price} ${currentBilling === 'monthly' ? '/ mes' : '/ año'}</p>
                <p><strong>Facturación:</strong> ${billingText}</p>
                ${savings}
            `;
        }

        function goBack() {
            document.getElementById('payment-section').classList.remove('active');
            document.getElementById('plans-grid').style.display = 'grid';
            document.querySelector('.billing-toggle').style.display = 'block';
            clearErrors();
            selectedPlan = null;
        }

        function showAlert(message, type = 'error') {
            const alert = document.getElementById('alert');
            alert.textContent = message;
            alert.className = `alert ${type} show`;
            
            setTimeout(() => {
                alert.classList.remove('show');
            }, 5000);
        }

        function clearErrors() {
            document.querySelectorAll('.form-group').forEach(group => {
                group.classList.remove('error');
            });
            document.querySelectorAll('.error-message').forEach(error => {
                error.textContent = '';
            });
            document.getElementById('alert').classList.remove('show');
        }

        function validateForm() {
            clearErrors();
            let isValid = true;

            const cardNumber = document.getElementById('card-number').value;
            const expiry = document.getElementById('expiry').value;
            const cvv = document.getElementById('cvv').value;
            const cardholder = document.getElementById('cardholder').value;
            const email = document.getElementById('email').value;

            // Validar número de tarjeta
            if (!cardNumber || cardNumber.replace(/\s/g, '').length < 13) {
                showFieldError('card-number', 'Número de tarjeta inválido');
                isValid = false;
            }

            // Validar fecha de vencimiento
            if (!expiry || !/^(0[1-9]|1[0-2])\/[0-9]{2}$/.test(expiry)) {
                showFieldError('expiry', 'Fecha de vencimiento inválida (MM/AA)');
                isValid = false;
            }

            // Validar CVV
            if (!cvv || !/^[0-9]{3,4}$/.test(cvv)) {
                showFieldError('cvv', 'CVV inválido');
                isValid = false;
            }

            // Validar nombre del titular
            if (!cardholder || cardholder.length < 2) {
                showFieldError('cardholder', 'Nombre del titular requerido');
                isValid = false;
            }

            // Validar email
            if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                showFieldError('email', 'Email inválido');
                isValid = false;
            }

            return isValid;
        }

        function showFieldError(fieldId, message) {
            const field = document.getElementById(fieldId);
            const errorElement = document.getElementById(fieldId + '-error');
            
            field.parentElement.classList.add('error');
            errorElement.textContent = message;
        }

        // Format card number input
        document.getElementById('card-number').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
            let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
            e.target.value = formattedValue;
        });

        // Format expiry date
        document.getElementById('expiry').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length >= 2) {
                value = value.substring(0, 2) + '/' + value.substring(2, 4);
            }
            e.target.value = value;
        });

        // Only allow numbers in CVV
        document.getElementById('cvv').addEventListener('input', function(e) {
            e.target.value = e.target.value.replace(/[^0-9]/g, '');
        });

        // Handle form submission
        document.getElementById('payment-form').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            if (!validateForm()) {
                return;
            }

            const submitBtn = document.getElementById('submit-btn');
            const loading = document.getElementById('loading');
            
            // Show loading state
            submitBtn.disabled = true;
            loading.classList.add('show');
            
            try {
                const formData = {
                    planType: selectedPlan,
                    billingCycle: currentBilling,
                    cardNumber: document.getElementById('card-number').value,
                    expiryDate: document.getElementById('expiry').value,
                    cvv: document.getElementById('cvv').value,
                    cardholderName: document.getElementById('cardholder').value,
                    email: document.getElementById('email').value
                };

                const response = await fetch('payment_handler.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(formData)
                });

                const result = await response.json();

                if (result.success) {
                    // Hide payment section
                    document.getElementById('payment-section').classList.remove('active');
                    
                    // Show success message
                    const plan = result.subscription.plan;
                    const payment = result.payment;
                    const billingText = plan.billingCycle === 'monthly' ? 'Mensual' : 'Anual';
                    const nextBilling = plan.billingCycle === 'monthly' ? 'en 1 mes' : 'en 1 año';
                    
                    document.getElementById('subscription-details').innerHTML = `
                        <p><strong>Plan:</strong> ${plan.name}</p>
                        <p><strong>Precio:</strong> ${plan.price} ${plan.billingCycle === 'monthly' ? '/ mes' : '/ año'}</p>
                        <p><strong>Facturación:</strong> ${billingText}</p>
                        <p><strong>Próximo cargo:</strong> ${nextBilling}</p>
                        <p><strong>Email:</strong> ${formData.email}</p>
                        <p><strong>ID de Transacción:</strong> ${payment.transactionId}</p>
                        <p><strong>Tarjeta:</strong> ${result.cardInfo.type} ${result.cardInfo.maskedNumber}</p>
                    `;
                    
                    document.getElementById('success-message').classList.add('show');
                } else {
                    showAlert(result.error || 'Error al procesar el pago');
                }
            } catch (error) {
                showAlert('Error de conexión. Por favor, intenta nuevamente.');
                console.error('Error:', error);
            } finally {
                // Hide loading state
                submitBtn.disabled = false;
                loading.classList.remove('show');
            }
        });

    
   
    </script>
</body>
</html>