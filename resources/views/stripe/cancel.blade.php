<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
            <div class="text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                    <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>
                
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Pago Cancelado</h2>
                <p class="text-gray-600 mb-6">
                    Has cancelado el proceso de pago. No se ha realizado ningún cargo a tu tarjeta.
                </p>
                
                <div class="space-y-3">
                    <a href="{{ route('stripe.plans') }}" 
                       class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-200 inline-block">
                        Ver Planes Nuevamente
                    </a>
                    
                    <a href="{{ route('home') }}" 
                       class="w-full bg-gray-100 text-gray-800 py-2 px-4 rounded hover:bg-gray-200 transition duration-200 inline-block">
                        Volver al Inicio
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
