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
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 mb-4">
                <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            
            <h2 class="text-2xl font-bold text-gray-900 mb-4">¡Gracias por suscribirte!</h2>
            
            <div class="space-y-3 text-left">
                <div class="bg-gray-50 p-3 rounded">
                    <p class="text-sm font-medium text-gray-500">Tu correo electrónico:</p>
                    <p class="text-lg text-gray-900">{{ $email }}</p>
                </div>
                
                <div class="bg-gray-50 p-3 rounded">
                    <p class="text-sm font-medium text-gray-500">Plan adquirido:</p>
                    <p class="text-lg text-gray-900">{{ $plan->name }}</p>
                    <p class="text-sm text-gray-600">${{ number_format($plan->price, 2) }} / {{ $plan->billing_period }}</p>
                </div>
            </div>
            
            <div class="mt-6">
                <a href="{{ route('inicio') }}" 
                   class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-200 inline-block">
                    Ir al Dashboard
                </a>
            </div>
        </div>
    </div>
</div>
</body>
</html>