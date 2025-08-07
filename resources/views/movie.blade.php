@php
    $videoFileName = $path; // Nombre del archivo de video
    $videoPath = 'movies/' . $videoFileName;
    $error = null;

    //echo "Video Path: " . $videoPath; // Para depuración

@endphp

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karate Kid Legends</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #0a0a0a;
            color: white;
            font-family: 'Arial', sans-serif;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .video-container {
            position: relative;
            background: #000;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        video {
            width: 100%;
            height: auto;
            display: block;
            min-height: 300px;
        }

        .controls {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
            padding: 20px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .video-container:hover .controls,
        .controls.show {
            opacity: 1;
        }

        .progress-container {
            margin-bottom: 15px;
        }

        .progress-bar {
            width: 100%;
            height: 6px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 3px;
            cursor: pointer;
            position: relative;
        }

        .progress {
            height: 100%;
            background: #e50914;
            border-radius: 3px;
            width: 0%;
            transition: width 0.1s ease;
        }

        .progress-handle {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            background: #e50914;
            border-radius: 50%;
            cursor: pointer;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .progress-bar:hover .progress-handle {
            opacity: 1;
        }

        .controls-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .controls-left,
        .controls-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .control-btn {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            padding: 8px;
            border-radius: 4px;
            transition: background 0.2s ease;
            font-size: 16px;
        }

        .control-btn:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .time-display {
            font-size: 14px;
            color: #ccc;
            min-width: 100px;
        }

        .volume-container {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .volume-slider {
            width: 80px;
            height: 4px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 2px;
            outline: none;
            cursor: pointer;
        }

        .volume-slider::-webkit-slider-thumb {
            appearance: none;
            width: 14px;
            height: 14px;
            background: #e50914;
            border-radius: 50%;
            cursor: pointer;
        }

        .loading {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: none;
        }

        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-top: 4px solid #e50914;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .error-message {
            background: rgba(229, 9, 20, 0.2);
            border: 1px solid #e50914;
            color: #fff;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            text-align: center;
        }

        .movie-title {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #e50914;
        }

        /* Pantalla completa */
        .video-container:-webkit-full-screen {
            width: 100vw;
            height: 100vh;
        }

        .video-container:-moz-full-screen {
            width: 100vw;
            height: 100vh;
        }

        .video-container:fullscreen {
            width: 100vw;
            height: 100vh;
        }

        .video-container:fullscreen video {
            height: 100vh;
            object-fit: contain;
        }

        @media (max-width: 768px) {
            .controls-row {
                flex-direction: column;
                gap: 10px;
            }
        }
        
        
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background: rgba(0, 0, 0, 0.7);
            border: none;
            color: white;
            padding: 12px 16px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s ease;
            z-index: 1000;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .back-button:hover {
            background: rgba(0, 0, 0, 0.9);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="movie-title">{{ $title }}</h1>
        <button class="back-button" onclick="window.history.back()">
    ← Regresar
</button>
        @if ($error)
            <div class="error-message">
            <h3>❌ Error</h3>
            <p><?php echo htmlspecialchars($error); ?></p>
            <p><small>Asegúrate de que el archivo esté en la misma carpeta que este script.</small></p>
            </div>
        @else
            <div class="video-container" id="videoContainer">
                <video id="videoPlayer" preload="metadata">
                    Tu navegador no soporta el elemento de video.
                </video>
                
                <div class="loading" id="loading">
                    <div class="spinner"></div>
                </div>
                
                <div class="controls" id="controls">
                    <div class="progress-container">
                        <div class="progress-bar" id="progressBar">
                            <div class="progress" id="progress"></div>
                            <div class="progress-handle" id="progressHandle"></div>
                        </div>
                    </div>
                    
                    <div class="controls-row">
                        <div class="controls-left">
                            <button class="control-btn" id="playPauseBtn">▶️</button>
                            <div class="time-display" id="timeDisplay">0:00 / 0:00</div>
                        </div>
                        
                        <div class="controls-right">
                            <div class="volume-container">
                                <button class="control-btn" id="muteBtn">🔊</button>
                                <input type="range" class="volume-slider" id="volumeSlider" min="0" max="100" value="100">
                            </div>
                            <button class="control-btn" id="fullscreenBtn">⛶</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <script>

        class StreamPlayer {
            constructor() {
                this.video = document.getElementById('videoPlayer');
                this.container = document.getElementById('videoContainer');
                this.controls = document.getElementById('controls');
                this.playPauseBtn = document.getElementById('playPauseBtn');
                this.progressBar = document.getElementById('progressBar');
                this.progress = document.getElementById('progress');
                this.progressHandle = document.getElementById('progressHandle');
                this.timeDisplay = document.getElementById('timeDisplay');
                this.volumeSlider = document.getElementById('volumeSlider');
                this.muteBtn = document.getElementById('muteBtn');
                this.fullscreenBtn = document.getElementById('fullscreenBtn');
                this.loading = document.getElementById('loading');
                
                this.isDragging = false;
                this.controlsTimeout = null;
                
                // URL del video local
                this.videoUrl = @json(asset($videoPath));

                
                this.init();
            }
            
            init() {
                this.loadVideo();
                this.bindEvents();
            }
            
            loadVideo() {
                this.video.src = this.videoUrl;
                this.showLoading();
            }
            
            showLoading() {
                this.loading.style.display = 'block';
            }
            
            hideLoading() {
                this.loading.style.display = 'none';
            }
            
            bindEvents() {
                // Eventos de video
                this.video.addEventListener('loadstart', () => this.showLoading());
                this.video.addEventListener('canplay', () => this.hideLoading());
                this.video.addEventListener('timeupdate', () => this.updateProgress());
                this.video.addEventListener('play', () => this.updatePlayButton());
                this.video.addEventListener('pause', () => this.updatePlayButton());
                this.video.addEventListener('error', (e) => this.handleVideoError(e));
                
                // Controles
                this.playPauseBtn.addEventListener('click', () => this.togglePlay());
                this.fullscreenBtn.addEventListener('click', () => this.toggleFullscreen());
                
                // Volumen
                this.volumeSlider.addEventListener('input', () => this.updateVolume());
                this.muteBtn.addEventListener('click', () => this.toggleMute());
                
                // Barra de progreso
                this.progressBar.addEventListener('click', (e) => this.seekVideo(e));
                this.progressHandle.addEventListener('mousedown', () => this.isDragging = true);
                document.addEventListener('mousemove', (e) => this.dragProgress(e));
                document.addEventListener('mouseup', () => this.isDragging = false);
                
                // Mostrar/ocultar controles
                this.container.addEventListener('mousemove', () => this.showControls());
                this.container.addEventListener('mouseleave', () => this.hideControls());
                
                // Teclado
                document.addEventListener('keydown', (e) => this.handleKeyboard(e));
                
                // Doble click para pantalla completa
                this.video.addEventListener('dblclick', () => this.toggleFullscreen());
            }
            
            handleVideoError(e) {
                console.error('Error de video:', e);
                this.hideLoading();
                alert('Error al cargar el video. Verifica que el archivo exista y sea compatible.');
            }
            
            togglePlay() {
                if (this.video.paused) {
                    this.video.play().catch(e => {
                        console.error('Error al reproducir:', e);
                        alert('No se pudo reproducir el video. Puede que el formato no sea compatible.');
                    });
                } else {
                    this.video.pause();
                }
            }
            
            updatePlayButton() {
                this.playPauseBtn.textContent = this.video.paused ? '▶️' : '⏸️';
            }
            
            updateProgress() {
                if (!this.isDragging && this.video.duration) {
                    const progress = (this.video.currentTime / this.video.duration) * 100;
                    this.progress.style.width = progress + '%';
                    this.progressHandle.style.left = progress + '%';
                    
                    const current = this.formatTime(this.video.currentTime);
                    const duration = this.formatTime(this.video.duration);
                    this.timeDisplay.textContent = `${current} / ${duration}`;
                }
            }
            
            seekVideo(e) {
                const rect = this.progressBar.getBoundingClientRect();
                const clickX = e.clientX - rect.left;
                const progress = clickX / rect.width;
                this.video.currentTime = progress * this.video.duration;
            }
            
            dragProgress(e) {
                if (this.isDragging && this.video.duration) {
                    const rect = this.progressBar.getBoundingClientRect();
                    const clickX = Math.max(0, Math.min(e.clientX - rect.left, rect.width));
                    const progress = clickX / rect.width;
                    this.video.currentTime = progress * this.video.duration;
                }
            }
            
            updateVolume() {
                this.video.volume = this.volumeSlider.value / 100;
                this.updateMuteButton();
            }
            
            toggleMute() {
                this.video.muted = !this.video.muted;
                this.updateMuteButton();
            }
            
            updateMuteButton() {
                if (this.video.muted || this.video.volume === 0) {
                    this.muteBtn.textContent = '🔇';
                } else if (this.video.volume < 0.5) {
                    this.muteBtn.textContent = '🔉';
                } else {
                    this.muteBtn.textContent = '🔊';
                }
            }
            
            toggleFullscreen() {
                if (!document.fullscreenElement) {
                    this.container.requestFullscreen().catch(err => {
                        console.log('Error al activar pantalla completa:', err);
                    });
                } else {
                    document.exitFullscreen();
                }
            }
            
            showControls() {
                this.controls.classList.add('show');
                clearTimeout(this.controlsTimeout);
                this.controlsTimeout = setTimeout(() => {
                    if (!this.video.paused) {
                        this.hideControls();
                    }
                }, 3000);
            }
            
            hideControls() {
                this.controls.classList.remove('show');
            }
            
            handleKeyboard(e) {
                switch(e.code) {
                    case 'Space':
                        e.preventDefault();
                        this.togglePlay();
                        break;
                    case 'ArrowLeft':
                        this.video.currentTime -= 10;
                        break;
                    case 'ArrowRight':
                        this.video.currentTime += 10;
                        break;
                    case 'ArrowUp':
                        e.preventDefault();
                        this.video.volume = Math.min(1, this.video.volume + 0.1);
                        this.volumeSlider.value = this.video.volume * 100;
                        break;
                    case 'ArrowDown':
                        e.preventDefault();
                        this.video.volume = Math.max(0, this.video.volume - 0.1);
                        this.volumeSlider.value = this.video.volume * 100;
                        break;
                    case 'KeyF':
                        this.toggleFullscreen();
                        break;
                    case 'KeyM':
                        this.toggleMute();
                        break;
                }
            }
            
            formatTime(seconds) {
                const mins = Math.floor(seconds / 60);
                const secs = Math.floor(seconds % 60);
                return `${mins}:${secs.toString().padStart(2, '0')}`;
            }
        }
        
        // Inicializar el reproductor cuando se carga la página
        document.addEventListener('DOMContentLoaded', () => {
            new StreamPlayer();
        });
    </script>
</body>
</html>