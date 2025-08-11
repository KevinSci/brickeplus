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
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Elige tu Plan</h1>
            <p class="text-xl text-gray-600">Selecciona el plan que mejor se adapte a tus necesidades</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            @foreach($plans as $plan)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden border {{ $plan->type === 'premium' ? 'border-blue-500 ring-2 ring-blue-200' : 'border-gray-200' }}">
                @if($plan->type === 'premium')
                <div class="bg-blue-500 text-white text-center py-2">
                    <span class="font-semibold">Más Popular</span>
                </div>
                @endif
                
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $plan->name }}</h3>
                    <div class="mb-4">
                        <span class="text-4xl font-bold text-gray-900">${{ number_format($plan->price, 0) }}</span>
                        <span class="text-gray-600">/ {{ $plan->billing_period === 'monthly' ? 'mes' : 'año' }}</span>
                    </div>
                    
                    @if($plan->description)
                    <p class="text-gray-600 mb-6">{{ $plan->description }}</p>
                    @endif

                    <form action="{{ route('stripe.checkout') }}" method="POST">
                        @csrf
                        <input type="hidden" name="plan" value="{{ $plan->billing_period }}_{{ $plan->type }}">
                        <button type="submit" 
                                class="w-full py-3 px-4 rounded-lg font-semibold transition duration-200 {{ $plan->type === 'premium' ? 'bg-blue-600 text-white hover:bg-blue-700' : 'bg-gray-100 text-gray-900 hover:bg-gray-200' }}">
                            Seleccionar Plan
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <p class="text-gray-600">
                ¿Tienes preguntas? 
                <a href="#" class="text-blue-600 hover:text-blue-700 font-medium">Contáctanos</a>
            </p>
        </div>
    </div>
</body>
</html>